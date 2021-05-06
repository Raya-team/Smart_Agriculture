<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Detail;
use App\Models\Filter;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function show($sensor)
    {
        $details = Detail::where('sensor_id', $sensor)->get();
        $filters = Filter::all();

//        return $details;
        return view('user.chart.index', compact(['filters','details']));
    }
}
