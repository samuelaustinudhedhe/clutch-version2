<?php

namespace App\Http\Controllers\Attachments;

use App\Models\Attachment;
use Illuminate\Http\Request;
use Intervention\Image\Encoders\AutoEncoder;
use Intervention\Image\Interfaces\ImageInterface;

class AttachmentCompressController extends AttachmentController
{

    public static function image(ImageInterface $image, string $extension, int $quality = 80)
    {
        // Switch statement to handle different image compression methods based on file extension
        switch ($extension) {
            case 'jpg':
            case 'jpeg':
                // Compress the image to JPEG format with the specified quality
                return $image->toJpeg($quality);
                break;
            case 'jpeg2000':
                // Compress the image to JPEG 2000 format with the specified quality
                return $image->toJpeg2000($quality);
                break;
            case 'png':
                // Compress the image to PNG format with the specified quality
                return $image->toPng($quality);
                break;
            case 'gif':
                // Compress the image to GIF format with the specified quality
                return $image->toGif($quality);
                break;
            case 'bmp':
            case 'dib':
                // Compress the image to BMP format with the specified quality
                return $image->toBitmap($quality);
                break;
            case 'webp':
                // Compress the image to WebP format with the specified quality
                return $image->toWebp($quality);
                break;
            case 'avif':
                // Compress the image to AVIF format with the specified quality
                return $image->toAvif($quality);
                break;
            case 'heic':
                // Compress the image to HEIC format with the specified quality
                return $image->toHeic($quality);
                break;
            case 'tiff':
                // Compress the image to TIFF format with the specified quality
                return $image->toTiff($quality);
                break;
            default:
                // If the file extension is not recognized, return the compressed image using AutoEncoder with the provided quality
                return $image->encode(new AutoEncoder($quality));
        }
    }

    public function video()
    {
    }

    public function audio()
    {
    }

    public function document()
    {
    }
}
