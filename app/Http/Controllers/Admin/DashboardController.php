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
            $total_area = Land::sum('area');
            $total_area = round($total_area/10000,2);
            $details = [];

            $sensors = Sensor::with('details')->get();
            foreach ($sensors as $sensor)
            {
                $sensor = $sensor->details->last();
                array_push($details, $sensor);
            }
//            return $details;
            $details = json_encode($details);

//            return view('admin.lands.heat', compact('land', 'details','filters'));
            return view('admin.dashboard.index', compact(['users_count','lands_count', 'sensors_count', 'unapproved_users', 'details', 'total_area']));

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
