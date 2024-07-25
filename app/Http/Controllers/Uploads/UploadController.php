<?php

namespace App\Http\Controllers\Uploads;

use App\Http\Controllers\Attachments\AttachmentController;
use App\Http\Controllers\Controller;
use App\Models\Attachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Encoders\WebpEncoder;
use Intervention\Image\Encoders\AutoEncoder;
use Intervention\Image\Format;
use Intervention\Image\ImageManager;

class UploadController extends Controller
{

    public static function image(object $user, $image, $folder, $filename, $size = 'resize', ?int $width = null, ?int $height = null, $quality = 80)
    {
        $extension = pathinfo($filename, PATHINFO_EXTENSION);

        $path = $folder . '/' . $filename;

        self::makeDir($folder);

        $image = self::read($image);

        // Check if $size is not empty before applying the resizing operation
        if (!empty($size)) {
            $image = $image->$size($width, $height);
        }

        $encodedImage = self::compress($image, $extension, $quality);
        $encodedImageFormat = $encodedImage->mediaType();

        self::store($path, $encodedImage);


        AttachmentController::createRaw(
             ucwords(preg_replace('/[^A-Za-z0-9]/', ' ',pathinfo($filename, PATHINFO_FILENAME))),
            'profile picture for ' . $user->name,
            'active',
            true,
            [
                'size' => filesize(Storage::disk('public')->path($path)),
                'dimension' => [
                    'width' => $image->width(),
                    'height' => $image->height(),
                ],
                'format' => $extension,
            ],
            $encodedImageFormat,
            $user,
            $user,
            $path
        );


        return $path;
    }

    public static function read($image)
    {
        $manager = ImageManager::gd();
        $image = $manager->read($image);
        return $image;
    }


    public static function makeDir(string $directory, string $disk = 'public')
    {
        Storage::disk($disk)->makeDirectory($directory);
    }

    public static function store(string $path, $file, string $disk = 'public')
    {
        Storage::disk($disk)->put($path, $file);
    }


    public static function compress($image, $extension, $quality = 80 )
    {

        if (!in_array($extension, Attachment::$imageMimeTypes)) {
            return  $image->encode(new AutoEncoder(10));
        }

        switch ($extension) {
            case 'jpg':
            case 'jpeg':
                $image->toJpeg($quality);
                break;
            case 'jpeg2000':
                $image->toJpeg2000($quality);
                break;
            case 'png':
                $image->toPng($quality);
                break;
            case 'gif':
                $image->toGif($quality);
                break;
            case 'bmp':
                $image->toBmp($quality);
                break;
            case 'webp':
                $image->toWebp($quality);
                break;
            case 'avif':
                $image->toAvif($quality);
                break;
            case 'heic':
                $image->toHeic($quality);
                break;
            case 'tiff':
                $image->toTiff($quality);
                break;
            default:
                return  $image->encode(new AutoEncoder($quality));
        }
    }

    //     public static function resize($image, $size, ?int $width = null, ?int $height = null)
    //     {
    //         if ($size == 'crop' && $width && $height) {
    //             $image->crop($width, $height);
    //         } elseif ($size === 'cover' && $width && $height) {
    //             $image->cover($width, $height);
    //         } elseif ($size === 'scaleDown') {
    //             if (isset($width)) {
    //                 $image->scaleDown(width: $width);
    //             } elseif (isset($height)) {
    //                 $image->scaleDown(height: $height);
    //             }
    //         } elseif ($width && $height) {
    //             $image->resize($width, $height);
    //         }

    //         return $image;
    //     }


}
