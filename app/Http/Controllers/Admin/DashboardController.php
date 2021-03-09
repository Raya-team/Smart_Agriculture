<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Land;
use App\Models\Sensor;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $users=User::where('status','1')->count()->get();
        return $users;
        $lands=Land::all()->count();
        $sensors=Sensor::all();
        return view('admin.dashboard.master',compact('users','lands','sensors'));
    }
}
