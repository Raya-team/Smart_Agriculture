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
        if (Auth::user()->level == 2) {
            $user_login = Auth::user();
            $users = User::where('level', '1')->with('roles')->get();
            return view('admin.role-user.index', compact(['users', 'user_login']));
        }
        abort(404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->level == 2) {
            $user_login = Auth::user();
            $users = User::where('level', '1')->with('roles')->get();
            $roles = Role::all();

            if ($roles->count() == 0) {
                alert()->error('برای ایجاد مقام باید ابتدا نقشی ایجاد شده باشد')->persistent('باشد');
                return back();
            }
            return view('admin.role-user.create', compact(['users', 'roles', 'user_login']));
        }
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
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
        if (Auth::user()->level == 2) {
            $roles = Role::all();
            return view('admin.role-user.edit', compact(['user', 'roles']));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param RoleUserRequest $request
     * @param User $user
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
