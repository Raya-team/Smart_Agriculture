<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Land;
use App\Models\Sensor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SensorController extends Controller
{
    public function index()
    {
        $user_login = Auth::user()->id;
        $lands = Land::with('sensors')->get();
        return view('user.sensors.index',compact(['user_login','lands']));
    }
}
