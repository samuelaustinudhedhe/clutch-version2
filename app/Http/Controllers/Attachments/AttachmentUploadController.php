<?php

namespace App\Http\Controllers\Attachments;

use Illuminate\Http\Request;
use App\Http\Controllers\Attachments\AttachmentCompressController as Compress;

class AttachmentUploadController extends AttachmentController
{

    /**
     * Uploads and processes an image file, resizes it if necessary, compresses it, and stores it in the specified folder.
     * It also creates a new attachment record in the database.
     *
     * @param object $authorable The user who is uploading the image.
     * @param mixed $image The source of the image (e.g., file path, stream, or uploaded file).
     * @param string $folder The folder where the image will be stored.
     * @param string $filename The name of the image file.
     * @param string $size The resizing method (e.g., 'resize', 'fit', 'fit-to-width', 'fit-to-height').
     * @param int|null $width The desired width of the resized image (optional).
     * @param int|null $height The desired height of the resized image (optional).
     * @param int $quality The quality of the compressed image (default is 80).
     *
     * @return string The path of the stored image file.
     */
    public static function image(object $authorable, $image, $folder, $filename, $size = 'resize', ?int $width = null, ?int $height = null, $quality = 80, $attachable = null)
    {
        // Get the file extension from the filename
        $extension = pathinfo($filename, PATHINFO_EXTENSION);

        // Construct the full path for the file
        $path = $folder . '/' . $filename;

        // Create the directory if it doesn't exist
        parent::makeDir($folder);

        // Read the image from the provided source
        $image = (new parent)->read($image);

        // Check if $size is not empty before applying the resizing operation
        if (!empty($size)) {
            // Resize the image based on the specified size and dimensions
            $image = $image->$size($width, $height);
        }

        // Compress the image and get the encoded image
        $encodedImage = Compress::image($image, $extension, $quality);

        // Store the encoded image to the specified path
        self::store($path, $encodedImage);

        // Create a new attachment record in the database
        AttachmentController::createRaw(
            // Generate a title from the filename
            $authorable->name . '\'s ' . ucwords(toSlug(pathinfo($filename, PATHINFO_FILENAME), ' ')),
            'profile picture for ' . $authorable->name,
            'active',
            true,
            [
                'size' => filesize(parent::readPath('public', $path)),
                'dimension' => [
                    'width' => $image->width(),
                    'height' => $image->height(),
                    'ratio' => $image->width() / $image->height(),
                ],
                'format' => $extension,
            ],
            $encodedImage->mediaType(),
            $attachable ?? $authorable,
            $authorable,
            $path
        );

        // Return the path of the stored file
        return $path;
    }

    public function video(Request $request)
    {
    }

    public function audio(Request $request)
    {
    }

    public function document(Request $request)
    {
    }
}
