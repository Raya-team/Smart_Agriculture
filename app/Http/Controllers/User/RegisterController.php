<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function store(User $user,Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'username' => ['required', 'regex:/^\S*$/u', 'string', 'regex:/(^([a-zA-Z]+)(\d+)?$)/u'],
            'phone_number'=>['required','regex:/(09)[0-9]{9}/','digits:11','numeric'],
            'password' => ['required', 'min:6'],
            'password_confirmation' => ['required_with:password', 'same:password'],
        ]);

        $user->name = $data['name'];
        $user->username = $data['username'];
        $user->phone_number = $data['phone_number'];
        $user->password = Hash::make($data['password']);
        $user->level = 0;
        $user->status = 0;
        $user->save();

        alert()->success('ثبت نام شما با موفیت انجام شد، منتظر تایید مدیر باشید','کاربر : ' . $data['name'])->persistent('تایید');
        return redirect(route('login'));
    }
}
