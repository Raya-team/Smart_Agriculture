<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function show($sensor)
    {
        $details = Detail::where('sensor_id', $sensor)->get();
        $filters = Filter::all();

        return view('admin.chart.index', compact(['filters','details']));
    }
}
