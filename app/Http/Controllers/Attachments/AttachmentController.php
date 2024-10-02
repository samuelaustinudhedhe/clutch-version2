<?php

namespace App\Http\Controllers\Attachments;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;

class AttachmentController extends Controller
{

    public function read($file)
    {
        $driver = ImageManager::gd();
        $file = $driver->read($file);

        return $file;
    }
    /**
     * Creates a directory on the specified disk.
     *
     * This function uses Laravel's Storage facade to create a directory on the specified disk.
     * If the directory already exists, no action is taken.
     *
     * @param string $directory The directory path to be created.
     * @param string $disk The name of the disk where the directory will be created. Defaults to 'public'.
     *
     * @return void
     */
    public static function makeDir(string $directory, string $disk = 'public')
    {
        // Use Laravel's Storage facade to create the directory on the specified disk.
        if (!Storage::disk($disk)->exists($directory)) {
            Storage::disk($disk)->makeDirectory($directory);
        }
    }

    /**
     * Retrieves the absolute path of a file from the specified disk.
     *
     * This function uses Laravel's Storage facade to retrieve the file path from the specified disk.
     * The function returns the absolute path of the file.
     *
     * @param string $disk The name of the disk where the file is located.
     * @param string $path The path of the file relative to the disk's root directory.
     *
     * @return string The absolute path of the file.
     */
    public static function readPath($disk, $path)
    {

        // It uses Laravel's Storage facade to retrieve the file path from the specified disk.
        // The function returns the absolute path of the file.
        return Storage::disk($disk)->path($path);
    }

    /**
     * Stores a file on the specified disk at the given path and returns the full path to the file.
     *
     * @param string $path The path where the file will be stored on the disk.
     * @param mixed $file The file to be stored. This can be a file path, a stream resource, or an instance of UploadedFile.
     * @param string $disk The name of the disk where the file will be stored. Defaults to 'public'.
     *
     * @return string The full path to the stored file.
     */
    public static function store(string $path, $file, $mimeType, $return = false)
    {
        // Ensure the path does not include "storage" at the beginning
        $path = preg_replace('/^.*\/storage\//', '', $path);

        // Check if the file is a PDF
        if (str_contains($mimeType, 'pdf')) {
            // Store the PDF file and get the full path
            Storage::put($path, file_get_contents($file));
        } else {
            // Store the file and get the full path
            Storage::put($path, $file);
        }

        // Return the full path to the stored file
        if ($return) {
            return Storage::path($path);
        }
    }


    /**
     * Create a new Attachment.
     *
     * @param string $name The name of the Attachment.
     * @param string $description The description of the Attachment.
     * @param \Illuminate\Http\UploadedFile $file The uploaded file.
     * @param object $attachable The model that the Attachment is attached to.
     * @param object $authorable The model that created the Attachment.
     * @param string $path The file path of the Attachment.
     *
     * @return void
     */
    public static function create($name, $description, $file, $mimeType, $is_featured = false, $attachable, $authorable, $path)
    {
        // Get the MIME type of the file
        $fileInfo =  getimagesize($file);

        // $exif = null;
        // if (!in_array($fileInfo['mime'], ['image/png', 'image/jpeg', 'image/gif'])) {
        //     $exif = exif_read_data($file);
        // }
        $width = $fileInfo[0] ?? null;
        $height = $fileInfo[1] ?? null;
        $ratio = ($height > 0) ? ($width / $height) : null; // Add condition to check if height is not zero before performing division
        $dimension = '';
        if ($fileInfo)
            $dimension = [
                'width' => $width,
                'height' => $height,
                'ratio' => $ratio,
            ];
        // Collect metadata about the file
        $metadata = [
            'size' => filesize($file),
            $dimension
            // 'exif' => $exif ?: null,
        ];

        // Create the Attachment using the raw method
        self::createRaw(
            $name,
            $description,
            'active',
            $is_featured,
            $metadata,
            $mimeType,
            $attachable,
            $authorable,
            $path
        );
    }

    /**
     * Create a new Attachment without processing the file.
     *
     * @param string $name The name of the Attachment.
     * @param string $description The description of the Attachment.
     * @param string $active The status of the Attachment.
     * @param bool $is_featured Whether the Attachment is is_featurable.
     * @param array $metadata The metadata of the Attachment.
     * @param string $mime_type The MIME type of the Attachment.
     * @param object $attachable The model that the Attachment is attached to.
     * @param object $authorable The model that created the Attachment.
     * @param string $path The file path of the Attachment.
     *
     * @return void
     */
    public static function createRaw(string $name, string $description, string $active, bool $is_featured, array $metadata, string $mimeType, object $attachable, object $authorable, string $path)
    {
        // Create the Attachment record in the database
        Attachment::create([
            'name' => $name,
            'description' => $description,
            'status' => $active,
            'is_featured' => $is_featured,
            'metadata' => json_encode($metadata),
            'mime_type' => $mimeType,
            'attachable_id' => $attachable->id,
            'attachable_type' => get_class($attachable),
            'authorable_id' => $authorable->id,
            'authorable_type' => get_class($authorable),
            'file_path' => $path,
        ]);
    }
}
