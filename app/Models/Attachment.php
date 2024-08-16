<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Attachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'size',
        'status',
        'metadata',
        'mime_type',
        'file_path',
        'attachable_id',
        'attachable_type',
        'authorable_id',
        'authorable_type',
    ];

    protected $casts = [
        'metadata' => 'object',
        'dimensions' => 'object',
    ];

    // You can use the $documentMimeTypes array in your code
    public static $documentMimeTypes = [
        'application/pdf',
        'application/msword',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        'application/vnd.ms-excel',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        'application/vnd.ms-powerpoint',
        'application/vnd.openxmlformats-officedocument.presentationml.presentation',
        'application/vnd.oasis.opendocument.text',
        'application/vnd.oasis.opendocument.spreadsheet',
        'application/vnd.oasis.opendocument.presentation',
        'text/plain',
        'text/rtf',
        'application/rtf',
        'application/zip',
        'application/gzip',
        'application/xml',
        'application/json',
    ];

    // You can use the $imageMimeTypes array in your code
    public static $imageMimeTypes = [
        'image/jpeg',
        'image/png',
        'image/gif',
        'image/bmp',
        'image/svg+xml',
        'image/webp',
    ];


    /**
     * Establish a polymorphic relationship to the parent model.
     *
     * This function defines a polymorphic relationship to the parent model, 
     * which can be any model that the attachment is associated with, such as Post or Vehicle.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo The polymorphic relationship to the parent model.
     */
    public function attachable()
    {
        return $this->morphTo();
    }

    /**
     * Establish a polymorphic relationship to the author model.
     *
     * This function defines a polymorphic relationship to the author model, 
     * which can be either a User or an Admin.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo The polymorphic relationship to the author model.
     */
    public function authorable()
    {
        return $this->morphTo();
    }

    /**
     * Get the URL of the attachment file.
     *
     * This function checks if the file path is a valid URL. If it is, it returns the file path as is.
     * Otherwise, it generates a URL using the public disk storage.
     *
     * @return string The URL of the attachment file.
     */
    public function getUrlAttribute()
    {
        $filePath = $this->file_path;
        if (filter_var($filePath, FILTER_VALIDATE_URL)) {
            return $filePath;
        }
        return Storage::disk('public')->url($filePath);
    }
}
