<?php

namespace App\Http\Controllers\Uploads;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Encoders\AutoEncoder;
use Intervention\Image\ImageManager;

class UploadController extends Controller
{

    // write a cunction that will save uploade file in the attachment databade table 
    public function image( $image, $folder , $filename, $encode = new AutoEncoder(65) )
    {
        // Ensure the directory exists
        Storage::disk('public')->makeDirectory($folder);

        // Resize and compress the image
        $manager = ImageManager::gd();
        $image = $manager->read($image);
        $image = $image->resize(300, 300)->encode($encode);

        // Save the image
        Storage::disk('public')->put("$folder/$filename", $image);

        return $folder.'/'.$filename;
    }
}
