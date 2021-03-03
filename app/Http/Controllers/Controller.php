<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Intervention\Image\Facades\Image;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function UploadImage($file, $user_image){
        if ($user_image != "/upload/images/default-profile.png"){
            $address_file = public_path() . $user_image;
            if (file_exists($address_file)){
                unlink($address_file);
            }
        }
        $imagePath = "/upload/images/";
        $filename = rand(1000,9999) . Carbon::now()->microsecond . "." . $file->guessClientExtension();
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

        return $url;
    }
}
