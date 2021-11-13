<?php

namespace App\Utils;

use Illuminate\Support\Facades\Response;
use Intervention\Image\Facades\Image;

class ImageFile
{
    public static function makeImage($url)
    {
        $image = Image::make($url);
        $img = self::toBase64($url);
        (String) Response::make($image->encode('data-url'));

        return $img;
    }

    public static function toBase64($base64)
    {
        // Get the image and convert into string
        $img = file_get_contents($base64);
        // Encode the image string data into base64
        $data = base64_encode($img);

        return $data;
    }

}
