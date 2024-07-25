<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Attachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'size', 'status', 'metadata', 'mime_type', 'file_path', 'attachable_id', 'attachable_type', 'authorable_id', 'authorable_type',
    ];

    protected $casts = [
        'metadata' => 'array',
        'dimensions' => 'array',
        // 'post' => 'object',
        // 'author' => 'object',
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

    // public function author()
    // {
    //     $author = $this->author;

    //     if ($author && isset($author['type'], $author['id'])) {
    //         $modelClass = $author['type'];
    //         return $modelClass::find($author['id']);
    //     }

    //     return null;
    // }

    // Polymorphic relationship to the parent model (e.g., Post, Vehicle)
    public function attachable()
    {
        return $this->morphTo();
    }

    // Polymorphic relationship to the author (User or Admin)
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
