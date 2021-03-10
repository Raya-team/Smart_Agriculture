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

        $sensors = Sensor::with('details')->get();
        
//        foreach($sensors->details as $detail)
//        {
//            array_push($arr,$detail);
//        }
//        return $arr;
////        return view('admin.lands.heat', compact('land','detail'));
   }
}
