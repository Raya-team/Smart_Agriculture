<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Land;
use Illuminate\Http\Request;

class LandHeatController extends Controller
{
    public function index(Land $land)
    {
        return view('admin.lands.heat', compact('land'));
   }
}
