<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Detail;
use App\Models\Filter;
use App\Models\Land;
use App\Models\Sensor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function index()
    {
        if (Gate::allows('show-land') || Auth::user()->level == 2) {
            $users_count = User::where('status','1')->count();
            $unapproved_users = User::where('status','0')->count();
            $lands_count = Land::all()->count();
            $sensors_count = Sensor::all()->count();
            $details = [];

            $sensors = Sensor::all();

            $all_details = Detail::createdAtDesc()->get();

            foreach ($sensors as $sensor) {
                    foreach ($all_details as $all_detail)
                    {
                        if ($all_detail->sensor_id == $sensor->id) {
                            if ($details == null){
                                array_push($details, $all_detail);
                            } else {
                                if ($this->SearchDetails($details, $all_detail, $sensor)){
                                    continue;
                                }else{
                                    array_push($details, $all_detail);
                                }
                            }
                        }
                    }
            }
//            return $details;
            $details = json_encode($details);

//            return view('admin.lands.heat', compact('land', 'details','filters'));
            return view('admin.dashboard.index', compact(['users_count','lands_count', 'sensors_count', 'unapproved_users', 'details']));

        }
        abort(401);
    }

    public function SearchDetails(array $details, $all_detail,$sensor)
    {
        for ($i = 0; $i < count($details); $i++) {
            if ($details[$i]->sensor_id == $sensor->id) {
                return true;
            }
        }
    }
}
