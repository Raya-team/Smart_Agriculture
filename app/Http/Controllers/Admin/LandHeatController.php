<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Detail;
use App\Models\Filter;
use App\Models\Land;
use App\Models\Sensor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class LandHeatController extends Controller
{
    public function index(Land $land)
    {
        if (Gate::allows('show-land') || Auth::user()->level == 2) {
            $details = [];

            $sensors = Sensor::all();

            $all_details = Detail::createdAtDesc()->get();


            foreach ($sensors as $sensor) {

                if ($sensor->land_id == $land->id) {

                    foreach ($all_details as $all_detail)
                    {
                        if ($all_detail->sensor_id == $sensor->id) {
                            if ($details == null){
                                array_push($details, $all_detail);
                            } else {
                                for ($i = 0 ; $i < count($details); $i++)
                                {
                                    if ($all_detail->filter_id == $details[$i]->filter_id)
                                    {

                                    }
                                }

                            }
                        }

                    }
                }
            }
            return $details;
            $details = json_encode($details);

            return view('admin.lands.heat', compact('land', 'details'));
        }
        abort(401);
    }
}
