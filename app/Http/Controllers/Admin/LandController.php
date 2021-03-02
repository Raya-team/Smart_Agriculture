<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LandRequest;
use Illuminate\Http\Request;
use App\Models\Land;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class LandController extends Controller
{

    public function __construct()
    {
//        $this->middleware('can:creatse-land', ['only' => ['create']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lands = Land::all();
        return view('admin.lands.index',compact('lands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::allows('create-land') || Auth::user()->level == 2){
            $users=User::all();
            return view('admin.lands.create',compact('users'));
        }
        abort(401);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param LandRequest $request
     * @param Land $land
     * @return \Illuminate\Http\Response
     */
    public function store(LandRequest $request,Land $land)
    {
        $land->name = $request->input('name');
        $land->user_id = $request->input('user_id');
        $land->points = $request->input('points');
        $land->save();
        alert()->success('زمین با موفقیت ثبت شد', 'Optional Title');
        return redirect(route('lands.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param Land $land
     * @return \Illuminate\Http\Response
     */
    public function show(Land $land)
    {
        return view('admin.lands.show',compact(['land']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Land $land
     * @return \Illuminate\Http\Response
     */
    public function edit(Land $land)
    {
        $users = User::all();
        return view('admin.lands.edit', compact(['land','users']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param LandRequest $request
     * @param Land $land
     * @return \Illuminate\Http\Response
     */
    public function update(LandRequest $request, Land $land)
    {
        $land->name = $request->input('name');
        $land->user_id = $request->input('user_id');
        $land->points = $request->input('points');
        $land->save();
        alert()->success('زمین با موفقیت ویرایش شد', 'Optional Title');
        return redirect(route('lands.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Land $land
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Land $land)
    {
        $land->delete();
        foreach ($land->sensors as $sensor){
            $sensor->delete();
        }
        alert()->success('زمین با موفقیت حذف شد');
        return redirect(route('lands.index'));
    }
}

