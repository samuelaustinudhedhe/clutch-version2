<?php

namespace App\Http\Controllers\Attachments;

use App\Models\Attachment;
use Illuminate\Http\Request;
use Intervention\Image\Encoders\AutoEncoder;
use Intervention\Image\Interfaces\ImageInterface;

class AttachmentCompressController extends AttachmentController
{

    /**
     * Compresses an image to a specified format and quality.
     *
     * This function takes an image and compresses it based on the provided file extension
     * and quality. It supports various image formats and uses the appropriate method
     * for compression.
     *
     * @param ImageInterface $image The image to be compressed.
     * @param string $extension The file extension indicating the desired output format.
     *                          It can include 'image/' or '.' which will be stripped.
     * @param int $quality The quality of the compression, ranging from 0 to 100.
     *                     Defaults to 80.
     * 
     * @return mixed The compressed image in the specified format.
     */
    public static function image(ImageInterface $image, string $extension, int $quality = 80)
    {
        // Check if the extension contains 'image/' or '.' and strip it if present
        if (str_contains($extension, 'image/')) {
            $extension = str_replace('image/', '', $extension);
        } elseif (str_contains($extension, '.')) {
            $extension = str_replace('.', '', $extension);
        }

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
                //return $image->toPng($quality); // error: Argument #1 ($interlaced) must be of type bool, int given. png is not accepting (int)quality and must be replaced  with auto  encoder
                return $image->encode(new AutoEncoder($quality));

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

    public function video() {}

    public function audio() {}

    public function document() {}
}
