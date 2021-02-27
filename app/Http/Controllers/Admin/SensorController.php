<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSensorRequest;
use App\Http\Requests\EditSensorRequest;
use App\Models\Land;
use App\Models\Sensor;
use Illuminate\Http\Request;

class SensorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sensors = Sensor::all();
        return view('admin.sensors.index',compact('sensors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lands = Land::all();
        return view('admin.sensors.create', compact('lands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSensorRequest $request, Sensor $sensor)
    {
        $sensor->serial = $request->input('serial');
        $sensor->land_id = $request->input('land_id');
        $sensor->save();

        alert()->success('سنسور با موفقیت ایجاد شد');

        return redirect(route('sensors.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Sensor $sensor)
    {
        $lands = Land::all();
        return view('admin.sensors.edit', compact(['sensor', 'lands']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\SensorRequest;  $request
     * @param  int  $sensor
     * @return \Illuminate\Http\Response
     */
    public function update(EditSensorRequest $request, Sensor $sensor)
    {
        $sensor->serial = $request->input('serial');
        $sensor->land_id = $request->input('land_id');
        $sensor->save();

        alert()->success('اطلاعات با موفقیت ویرایش شد');

        return redirect(route('sensors.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sensor $sensor)
    {
        $sensor->delete();

        alert()->success('سنسور با موفقیت حذف شد');

        return back();
    }
}
