<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Detail;
use App\Models\Land;
use App\Models\Sensor;
use Illuminate\Http\Request;

class LandHeatController extends Controller
{
    public function index(Land $land)
    {
        $details=[];

        $sensors = Sensor::all();

        foreach ($sensors as $sensor)
        {
            if($sensor->land_id == $land->id)
            {
                $all_details = Detail::all();

                foreach ($all_details as $all_detail)

                if($all_detail->sensor_id == $sensor->id)
                {
                    array_push($details,$all_detail);
                }
            }
        }
        return $details;
        return view('admin.lands.heat', compact('land','details'));
   }
}
