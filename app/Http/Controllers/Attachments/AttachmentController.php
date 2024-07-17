<?php

namespace App\Http\Controllers\Attachments;

use App\Http\Controllers\Controller;
use App\Models\Attachment;

class AttachmentController extends Controller
{
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
    public static function create($name, $description, $file, $attachable, $authorable, $path)
    {
        // Set default values for ping and status
        $ping = true;
        $active = 'active';

        // Get the MIME type of the file
        $mime_type = $file->mediaType();

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
        self::createRaw($name, $description, $active, $ping, $metadata, $mime_type, $attachable, $authorable, $path);
    }

    /**
     * Create a new Attachment without processing the file.
     *
     * @param string $name The name of the Attachment.
     * @param string $description The description of the Attachment.
     * @param string $active The status of the Attachment.
     * @param bool $ping Whether the Attachment is pingable.
     * @param array $metadata The metadata of the Attachment.
     * @param string $mime_type The MIME type of the Attachment.
     * @param object $attachable The model that the Attachment is attached to.
     * @param object $authorable The model that created the Attachment.
     * @param string $path The file path of the Attachment.
     *
     * @return void
     */
    public static function createRaw(string $name, string $description, string $active, bool $ping, array $metadata, string $mime_type, object $attachable, object $authorable, string $path)
    {
        // Create the Attachment record in the database
        Attachment::create([
            'name' => $name,
            'description' => $description,
            'status' => $active,
            'ping' => $ping,
            'metadata' => json_encode($metadata),
            'mime_type' => $mime_type,
            'attachable_id' => $attachable->id,
            'attachable_type' => $attachable->type,
            'authorable_id' => $authorable->id,
            'authorable_type' => $authorable->type,
            'file_path' => $path,
        ]);
    }
}