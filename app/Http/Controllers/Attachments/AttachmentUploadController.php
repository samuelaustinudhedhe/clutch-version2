<?php

namespace App\Http\Controllers\Attachments;

use Illuminate\Http\Request;
use App\Http\Controllers\Attachments\AttachmentCompressController as Compress;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Encoders\AutoEncoder;

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
    public static function image($image, $folder, $filename, $size = 'resize', ?int $width = null, ?int $height = null, $quality = 80, object $authorable, object $attachable = null)
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

    /**
     * Uploads and processes a file, compresses it if necessary, and stores it in the specified folder.
     * It also creates a new attachment record in the database.
     *
     * @param object $authorable The user who is uploading the file.
     * @param mixed $file The source of the file (e.g., file path, stream, or uploaded file).
     * @param string $folder The folder where the file will be stored.
     * @param string $filename The name of the file.
     * @param int $quality The quality of the compressed file (default is 80).
     *
     * @return string The path of the stored file.
     */
    public static function file($name, $description, $file, $is_featured, $quality = 90, $authorable, $attachable, $path)
    {
        // Get the file extension from the filename
        $fileName = basename($file);
        $extension = pathinfo($fileName, PATHINFO_EXTENSION);
        $name = $name ?? $authorable->name . '\'s ' . ucwords(toSlug(pathinfo($fileName, PATHINFO_FILENAME), ' '));
        $description = $description ?? 'File uploaded by ' . $authorable->name . ' and attached to ' . $attachable->name;
        $mimeType = mime_content_type($file);
        // Check if the file is an image
        if (str_contains($mimeType, 'image')) {
            // Read the file from the provided source
            $file = (new parent)->read($file);
            // Compress the file and get the encoded file
            $file = Compress::image($file, 'jpg', $quality);
            
        }

        // Store the file to the specified path
        $file = self::store($path, $file, $mimeType, true);
        
        // Create a new attachment record in the database
        return AttachmentController::create(
            name: $name,
            description: $description,
            file: $file,
            is_featured: $is_featured,
            attachable: $attachable,
            authorable: $authorable,
            path: $path,
        );
    }


    public function video(Request $request) {}

    public function audio(Request $request) {}

    public function document(Request $request) {}
}
