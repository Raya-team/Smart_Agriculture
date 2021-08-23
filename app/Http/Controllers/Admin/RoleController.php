<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->level == 2) {
            $roles = Role::with('permissions')->get();
            return view('admin.roles.index', compact('roles'));
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
            $permissions = Permission::all();
            return view('admin.roles.create', compact('permissions'));
        }
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RoleRequest $request
     * @param Role $role
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request,role $role)
    {
        $role->name = $request->input('name');
        $role->save();
        $role->permissions()->sync($request->input('permissions'));

        alert()->success('نقش با موفقیت ایجاد شد');

        return redirect(route('roles.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return void
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Role $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        if (Auth::user()->level == 2) {
            $permissions = Permission::all();
            return view('admin.roles.edit', compact(['role', 'permissions']));
        }
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param RoleRequest $request
     * @param Role $role
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request,Role $role)
    {
        $role->permissions()->sync($request->input('permissions'));
        alert()->success('نقش با موفقیت ویرایش شد');
        return redirect(route('roles.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Role $role
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Role $role)
    {
        $role->delete();
        alert()->success('نقش با موفقیت حذف شد');
        return back();
    }
}
