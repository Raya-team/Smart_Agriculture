<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

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
        ]));

        if (! is_null($request->file('image'))){
            $file = $request->file('image');
            $imagePath = "/upload/images/";
            $filename = rand(1000,9999) . Carbon::now()->microsecond . $file->getClientOriginalName();
            $url = $imagePath . "72_" . $filename;

            Image::make($file->getRealPath())->resize(160, 160, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path($url));
            //TODO Validation for image
            $request->validate([
                'image' => ['required']
            ]);
            $user->image = $url;
        }

        if (! is_null($request->password)){
            $request->validate([
                'password' => ['required', 'min:6', 'confirmed']
            ]);
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        alert()->success('اطلاعات شما با موفقیت ویرایش شد');
        return redirect(route('admin.profile.index'));
    }
}
