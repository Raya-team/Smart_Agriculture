<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('admin.profile.index', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate(([
            'name' => ['required'],
            'username' => ['required', 'regex:/^\S*$/u', 'string', 'regex:/(^([a-zA-Z]+)(\d+)?$)/u', Rule::unique('users')->ignore($user->id)],
            'image' => ['max:15360','mimes:jpeg,jpg,png','file','image'],
        ]));

        if (! is_null($request->file('image'))){
            $url = $this->UploadImage($request->file('image'), $user->image);
            $user->image = $url;
        }

        if (! is_null($request->password)){
            $request->validate([
                'password' => ['required', 'min:6', 'confirmed']
            ]);

            if (Hash::check($request->current_password, $user->password)) {
                $data['password'] = Hash::make($request->password);
            }else{
                Session::flash('current_password', 'رمز عبور فعلی را اشتباه وارد کرده اید.');
                return redirect(route('admin.profile.index'));
            }

        }

        $user->update($data);

        alert()->success('اطلاعات شما با موفقیت ویرایش شد');
        return redirect(route('admin.profile.index'));
    }
}
