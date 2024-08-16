<?php

namespace App\Http\Controllers\Attachments;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttachmentThumbnailController extends AttachmentController
{
    
    //using image intervention create thumbnail for all images and save it in their thumbnail folder
    public function createThumbnail($image, $size, $folder){
        $thumb = parent::read($image);
        
        $thumb = $thumb->resize($size, null, function ($constraint) {
            $constraint->aspectRatio();
        })->encode('jpg', 80);

        $thumb->save(public_path($folder.'/'.$size.'-'.basename($image)));

        return $folder.'/'.$size.'-'.basename($image);


    }

}
