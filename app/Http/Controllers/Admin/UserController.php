<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $users = User::where('status', 1)->get();
        $users = User::where('status', 1)->whereNotIn('level', [2])->get();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request, User $user)
    {

        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->level = $request->input('level');
        $user->status = 1;
        $user->password = Hash::make($request->input('password'));
        $user->save();

        alert()->success('کاربر با موفقیت ایجاد شد');

        return redirect(route('users.index'));
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
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => ['required'],
            'username' => ['required', 'regex:/^\S*$/u', 'string', 'regex:/(^([a-zA-Z]+)(\d+)?$)/u', Rule::unique('users')->ignore($user->id)],
            'level' => ['required'],
        ]);

        if (! is_null($request->password)){
            $request->validate([
                'password' => ['required', 'min:6', 'confirmed']
            ]);
            $data['password'] = Hash::make($request->password);
        }
        $user->level = $request->input('level');

        $user->update($data);

        alert()->success('کاربر با موفقیت ویرایش شد');
        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return $request;
        $user = User::findOrFail($request->user_id);
        $user->delete();

        alert()->success('کاربر با موفقیت حذف شد');
        return back();
    }

    public function verify()
    {
        $users = User::all();
        return view('admin.users.verify', compact('users'));
    }

    public function verified(User $user)
    {
        $user->update(['status' => 1]);

        alert()->success('کاربر با موفقیت تایید شد');

        return redirect(route('users.verify'));
    }
}
