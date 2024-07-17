<?php

namespace App\Http\Controllers\Uploads;

use App\Http\Controllers\Attachments\AttachmentController;
use App\Http\Controllers\Controller;
use App\Models\Attachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Encoders\AutoEncoder;
use Intervention\Image\ImageManager;

class UploadController extends Controller
{

    public static function image($user, $image, $folder, $filename, $size = 'crop', ?int $width = null, ?int $height = null)
    {
        $path = $folder . '/' . $filename;
        Storage::disk('public')->makeDirectory($folder);

        $manager = ImageManager::gd();
        $image = $manager->read($image);

        if ($size == 'crop' && $width && $height) {

            $image->crop($width, $height);
        } elseif ($size === 'cover' && $width && $height) {

            $image->cover($width, $height);
        } elseif ($size === 'scaleDown') {

            if (isset($width)) {

                $image->scaleDown(width: $width);
            } elseif (isset($height)) {

                $image->scaleDown(height: $height);
            }
        } elseif ($width && $height) {
            $image->resize($width, $height);
        }

        $encodeImage =  (string) $image->encodeByPath($path);
        $encoded = $image->toJpeg()->save('images/test.jpg', true,  10);

        $metaData = [
            'size' => $image->size(),
            'dimension' => [
                'width' => $image->width(),
                'height' => $image->height(),
            ],
        ];

        AttachmentController::createRaw(
            $filename,
            'profile picture for ' . $user->name,
            'active',
            true,
            $metaData,
            mime_content_type($encodeImage),
            $user,
            $user,
            $path
        );



        // after compress this should return path and user

        Storage::disk('public')->put($path, $encodeImage);

        return $path;
    }
}
