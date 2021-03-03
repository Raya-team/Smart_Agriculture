<?php

namespace App\Http\Controllers\User;

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
        return view('user.profile.index', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate(([
            'name' => ['required'],
            'username' => ['required', 'regex:/^\S*$/u', 'string', 'regex:/(^([a-zA-Z]+)(\d+)?$)/u', Rule::unique('users')->ignore($user->id)],
        ]));

        if (! is_null($request->file('image'))){
            if ($user->image != "/upload/images/default-profile.png"){
                unlink(public_path() . $user->image);
            }
            $file = $request->file('image');
            $imagePath = "/upload/images/";
            $filename = rand(1000,9999) . Carbon::now()->microsecond . $file->getClientOriginalName();
            $url = $imagePath . "160_" . $filename;

            $image = Image::make($file->getRealPath());
            $height = $image->height();
            $width = $image->width();
            if ($width >= $height){
                $size = $height;
            } elseif ($width <= $height) {
                $size = $width;
            }
            $image->resizeCanvas($size, $size, 'center', false, 'ff0000');
            $image->resize(160, 160, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image->save(public_path($url));

            $request->validate([
                'image' => ['mimes:jpeg,jpg,png']
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
        return redirect(route('user.profile.index'));
    }
}
