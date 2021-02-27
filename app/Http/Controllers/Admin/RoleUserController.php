<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_login = Auth::user();
        $users = User::where('level', '1')->with('roles')->get();
        return view('admin.role-user.index', compact(['users', 'user_login']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_login = Auth::user();
        $users = User::where('level', '1')->with('roles')->get();
        $roles = Role::all();
        return view('admin.role-user.create',compact(['users', 'roles', 'user_login']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param User $user
     * @return void
     */
    public function store(RoleUserRequest $request)
    {
        User::find($request->input('user_id'))->roles()->sync($request->input('role_id'));
        alert()->success('مقام کاربر با موفقیت ایجاد شد');
        return redirect(route('users-role.index'));
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
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.role-user.edit',compact(['user', 'roles']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleUserRequest $request, User $user)
    {
        $user->roles()->sync($request->input('role_id'));
        alert()->success('مقام کاربر با موفقیت ویرایش شد');
        return redirect(route('users-role.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->roles()->detach();
        alert()->success('مقام کاربر با موفقیت حذف شد');
        return back();
    }
}
