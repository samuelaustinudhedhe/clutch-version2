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
     * Stores a file on the specified disk at the given path.
     *
     * @param string $path The path where the file will be stored on the disk.
     * @param mixed $file The file to be stored. This can be a file path, a stream resource, or an instance of UploadedFile.
     * @param string $disk The name of the disk where the file will be stored. Defaults to 'public'.
     *
     * @return void
     */
    public static function store(string $path, $file, string $disk = 'public')
    {
        // Use Laravel's Storage facade to store the file at the specified path on the specified disk.
        Storage::disk($disk)->put($path, $file);
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
    public static function create($name, $description, $file, $attachable, $authorable, $path, $is_featured = false)
    {
        // Set default values for is_featured and status
        $active = 'active';

        // Get the MIME type of the file
        $mime_type = mime_content_type($file->getRealPath());

        // Collect metadata about the file
        $metadata = [
            'size' => $file->size(),
            'dimensions' => [
                'width' => $file->width(),
                'height' => $file->height(),
                'ratio' => $file->width() / $file->height(),
                'exif' => $file->exif() ? $file->exif() : null,
                'orientation' => $file->isPortrait() ? 'portrait' : 'landscape',
            ],
        ];

        // Create the Attachment using the raw method
        self::createRaw($name, $description, $active, $is_featured, $metadata, $mime_type, $attachable, $authorable, $path);
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
    public static function createRaw(string $name, string $description, string $active, bool $is_featured, array $metadata, string $mime_type, object $attachable, object $authorable, string $path)
    {
        // Create the Attachment record in the database
        Attachment::create([
            'name' => $name,
            'description' => $description,
            'status' => $active,
            'is_featured' => $is_featured,
            'metadata' => json_encode($metadata),
            'mime_type' => $mime_type,
            'attachable_id' => $attachable->id,
            'attachable_type' => get_class($attachable),
            'authorable_id' => $authorable->id,
            'authorable_type' => get_class($authorable),
            'file_path' => $path,
        ]);
    }
}
