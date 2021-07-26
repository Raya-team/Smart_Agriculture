<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Detail;
use App\Models\Land;
use App\Models\Sensor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;
        $users_count = User::where('status', '1')->count();
        $lands_count = Land::where('user_id', $user_id)->count();
        $lands = Land::where('user_id', $user_id)->get();
        $total_area = Land::where('user_id', $user_id)->sum('area');
        $total_area = round($total_area/10000,2);
        $sensors = Sensor::all();
        $user_sensors=[];
        foreach ($lands as $land)
        {
            foreach ($sensors as $sensor)
            {
                if($land->id == $sensor->land_id)
                {
                    array_push($user_sensors,$sensor);
                }
            }
        }
        $sensors_count = count($user_sensors);
        $details = [];
        $all_details = Detail::createdAtDesc()->get();
        foreach ($user_sensors as $user_sensor) {
            foreach ($all_details as $all_detail) {
                if ($all_detail->sensor_id == $user_sensor->id) {
                    if ($details == null) {
                        array_push($details, $all_detail);
                    } else {
                        if ($this->SearchDetails($details, $all_detail, $user_sensor)) {
                            continue;
                        } else {
                            array_push($details, $all_detail);
                        }
                    }
                }
            }
        }
//            return $details;
        $details = json_encode($details);

//            return view('admin.lands.heat', compact('land', 'details','filters'));
        return view('user.dashboard.index', compact(['users_count', 'lands_count', 'sensors_count', 'details','total_area']));
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