<?php

namespace App\Http\Controllers\Attachments;

use Illuminate\Http\Request;
use App\Http\Controllers\Attachments\AttachmentCompressController as Compress;
use App\Models\Attachment;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Encoders\AutoEncoder;

use function PHPUnit\Framework\isReadable;

class AttachmentUploadController extends AttachmentController
{

    /**
     * Uploads and processes an image file, resizes it if necessary, compresses it, and stores it in the specified folder.
     * It also creates a new attachment record in the database.
     *
     * @param object $authorable The user who is uploading the image.
     * @param mixed $image The source of the image (e.g., file path, stream, or uploaded file).
     * @param string $resize The folder where the image will be stored.
     * @param string $filename The name of the image file.
     * @param string $size The resizing method (e.g., 'resize', 'fit', 'fit-to-width', 'fit-to-height').
     * @param int|null $width The desired width of the resized image (optional).
     * @param int|null $height The desired height of the resized image (optional).
     * @param int $quality The quality of the compressed image (default is 80).
     *
     * @return string The path of the stored image file.
     */
    // public static function image($image, $folder, $filename, $size = 'resize', ?int $width = null, ?int $height = null, $quality = 80, object $authorable, object $attachable = null)
    // {
    //     // Get the file extension from the filename
    //     $extension = pathinfo($filename, PATHINFO_EXTENSION);

    //     // Construct the full path for the file
    //     $path = $folder . '/' . $filename;

    //     // Create the directory if it doesn't exist
    //     parent::makeDir($folder);

    //     // Read the image from the provided source
    //     $image = (new parent)->read($image);

    //     // Check if $size is not empty before applying the resizing operation
    //     if (!empty($size)) {
    //         // Resize the image based on the specified size and dimensions
    //         $image = $image->$size($width, $height);
    //     }

    //     // Compress the image and get the encoded image
    //     $encodedImage = Compress::image($image, $extension, $quality);

    //     // Store the encoded image to the specified path
    //     self::store($path, $encodedImage);

    //     // Create a new attachment record in the database
    //     AttachmentController::createRaw(
    //         // Generate a title from the filename
    //         $authorable->name . '\'s ' . ucwords(toSlug(pathinfo($filename, PATHINFO_FILENAME), ' ')),
    //         'profile picture for ' . $authorable->name,
    //         'active',
    //         true,
    //         [
    //             'size' => filesize(parent::readPath('public', $path)),
    //             'dimension' => [
    //                 'width' => $image->width(),
    //                 'height' => $image->height(),
    //                 'ratio' => $image->width() / $image->height(),
    //             ],
    //             'format' => $extension,
    //         ],
    //         $encodedImage->mediaType(),
    //         $attachable ?? $authorable,
    //         $authorable,
    //         $path
    //     );

    //     // Return the path of the stored file
    //     return $path;
    // }


    /**
     * Processes and stores an image, applying optional resizing and compression, and creates a new attachment record in the database.
     *
     * @param string|null $name The name of the image. If null, a default name is generated.
     * @param string|null $description A description of the image. If null, a default description is generated.
     * @param mixed $image The source of the image (e.g., file path, stream, or uploaded file).
     * @param string $mimeType The MIME type of the image.
     * @param bool $is_featured Indicates if the image is featured.
     * @param string $type The type of the image (e.g., 'image', 'document', 'video').
     * @param array $resize An array containing resizing options, including type, width, height, and additional options.
     * @param int $quality The quality of the compressed image (default is 90).
     * @param object $authorable The user who is uploading the image.
     * @param object $attachable The entity to which the image is attached.
     * @param string $path The path where the image will be stored.
     *
     * @return \App\Models\Attachment The newly created Attachment instance.
     */
    public static function image($name, $description, $image, $mimeType, $is_featured, $type, $resizing, $quality = 90, $authorable, $attachable, $path)
    {
        // Get the file extension from the filename
        $fileName = basename($image);
        $name = $name ?? $authorable->name . '\'s ' . ucwords(toSlug(pathinfo($fileName, PATHINFO_FILENAME), ' '));
        $description = $description ?? 'Image uploaded by ' . $authorable->name . ' and attached to ' . $attachable->name;

        // Read the image from the provided source
        $isReadable = (new parent)->read($image);

        // if error skip compression and resizing 
        if ($isReadable) {
            // Read the image from the provided source
            $image = $isReadable;

            // Check if resizing is required
            if (!empty($resizing['type'])) {
                // Apply the specified resizing type
                $resizingType = $resizing['type'];
                // Get the dimensions if provided
                $resizingWidth = $resizing['width'] ?? null;
                $resizingHeight = $resizing['height'] ?? null;
                // Get the options if provided
                $resizingOptions = $resizing['options'] ?? [];

                // Resize the image based on the specified size and dimensions and options
                $image = (new parent)->resizing($image, $resizingType, $resizingWidth, $resizingHeight, $resizingOptions);
            }

            // Compress the image and get the encoded image
            $image = Compress::image($image, $mimeType, $quality);
        }

        // Store the image to the specified path
        $image = self::store($path, $image, 'image/jpeg', true);

        // Create a new attachment record in the database
        $attachment = AttachmentController::create(
            name: $name,
            description: $description,
            file: $image,
            mimeType: $mimeType,
            is_featured: $is_featured,
            type: $type,
            attachable: $attachable,
            authorable: $authorable,
            path: $path,
        );

        return $attachment;
    }


    /**
     * Processes and stores a file, compressing it if it's an image, and creates a new attachment record in the database.
     *
     * @param string|null $name The name of the file. If null, a default name is generated.
     * @param string|null $description A description of the file. If null, a default description is generated.
     * @param mixed $file The source of the file (e.g., file path, stream, or uploaded file).
     * @param string $mimeType The MIME type of the file.
     * @param bool $is_featured Indicates if the file is featured.
     * @param string $type The type of the file (e.g., 'image', 'gallery_image', 'document', 'video').
     * @param object $authorable The user who is uploading the file.
     * @param object $attachable The entity to which the file is attached.
     * @param string $path The path where the file will be stored.
     *
     * @return \App\Models\Attachment The newly created Attachment instance.
     */
    public static function file($name, $description, $file, $mimeType, $is_featured, $type, $authorable, $attachable, $path)
    {
        // Get the file extension from the filename
        $fileName = basename($file);

        // Get the file extension from the filename
        $extension = pathinfo($fileName, PATHINFO_EXTENSION);

        // Get the name if provided, otherwise generate a default name
        $name = $name ?? $authorable->name . '\'s ' . ucwords(toSlug(pathinfo($fileName, PATHINFO_FILENAME), ' '));

        // Get the description if provided, otherwise generate a default description
        $description = $description ?? 'File uploaded by ' . $authorable->name . ' and attached to ' . $attachable->name;

        // Check if the file is an image
        if (str_contains($mimeType, 'image')) {
            // Read the file from the provided source
            $isReadable = (new parent)->read($file);

            // if error skip compression 
            if ($isReadable) {
                // Compress the file and get the encoded file
                $file = Compress::image($isReadable, 'jpg', 100);
            }
        }

        // Store the file to the specified path
        $file = self::store($path, $file, $mimeType, true);

        // Create a new attachment record in the database
        $attachment = AttachmentController::create(
            name: $name,
            description: $description,
            file: $file,
            mimeType: $mimeType,
            is_featured: $is_featured,
            type: $type,
            attachable: $attachable,
            authorable: $authorable,
            path: $path,
        );

        return $attachment;
    }


    public function video(Request $request) {}

    public function audio(Request $request) {}

    public function document(Request $request) {}
}
