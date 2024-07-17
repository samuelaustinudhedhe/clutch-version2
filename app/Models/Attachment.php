<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'size', 'status', 'mime_type', 'file_path', 'attachable_id', 'attachable_type', 'authorable_id', 'authorable_type',
    ];

    protected $appends = [
        'author',
    ];

    protected $casts = [
        'meta' => 'array',
        'dimensions' => 'array',
        // 'post' => 'object',
        // 'author' => 'object',
    ];
    public $documentMimeTypes = [
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

    public $imageMimeTypes = [
        'image/jpeg',
        'image/png',
        'image/gif',
        'image/bmp',
        'image/svg+xml',
        'image/webp',
    ];

    // You can use the $imageMimeTypes array in your code
    // You can use the $documentMimeTypes array in your code
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
}
