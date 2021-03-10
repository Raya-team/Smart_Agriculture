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
        $arr=[];

        $sensors = Sensor::all();

        foreach ($sensors as $sensor)
        {
            if($sensor->land_id == $land->id)
            {
                $details = Detail::all();

                foreach ($details as $detail)

                if($detail->sensor_id == $sensor->id)
                {
                    array_push($arr,$detail);
                }
            }
        }
//        return $arr;
        return view('admin.lands.heat', compact('land','arr'));
   }
}
