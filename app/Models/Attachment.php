<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use ReflectionClass;

class Attachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'status',
        'is_featured',
        'type',
        'metadata',
        'mime_type',
        'file_path',
        'attachable_id',
        'attachable_type',
        'authorable_id',
        'authorable_type',
    ];

    protected $casts = [
        'is_featured' => 'bool',
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

    public static $placeholderTypes = [
        'image' => 'default_image_placeholder',
        'car' => 'default_car_placeholder',
        'document' => 'default_document_placeholder',
        'video' => 'default_video_placeholder',
        'gallery' => 'default_gallery_placeholder',
        'audio' => 'default_audio_placeholder',
        'map' => 'default_map_placeholder',
    ];

    // Define constants for attachment types
    const TYPE_IMAGE = 'image';
    const TYPE_PHOTO = 'photo';    //
    const TYPE_GALLERY_IMAGE = 'gallery_image';
    const TYPE_REVIEW_IMAGE = 'review_image';
    const TYPE_PROOF_OF_PAYMENT = 'proof_of_payment';

    // Define constants for document and specific documents types    
    const TYPE_DOCUMENT = 'document';
    const TYPE_REGISTRATION_DOCUMENT = 'registration_document';
    const TYPE_PROOF_OF_OWNERSHIP_DOCUMENT = 'proof_of_ownership_document';
    const TYPE_INSURANCE_DOCUMENT = 'insurance_document';

    // define constants for video and audio types
    const TYPE_VIDEO = 'video';
    const TYPE_AUDIO = 'audio';


    /**
     * Get all defined file types.
     *
     * @return array
     */
    public static function getFileTypes()
    {
        $reflection = new ReflectionClass(__CLASS__);
        $constants = $reflection->getConstants();

        // Filter constants to only include those that start with 'TYPE_'
        return array_filter($constants, function ($key) {
            return strpos($key, 'TYPE_') === 0;
        }, ARRAY_FILTER_USE_KEY);
    }

    /**
     * Check if a given MIME type is an image MIME type.
     *
     * @param string $mimeType The MIME type to check.
     * @return bool True if the MIME type is an image MIME type, false otherwise.
     */
    public static function isImageMimeType($mimeType)
    {
        return in_array($mimeType, self::$imageMimeTypes);
    }

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
     * Scope a query to only include attachments of given types.
     *
     * This function adds a condition to the query to filter attachments based on the specified types.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query The query builder instance.
     * @param array|string $types The type(s) of attachments to filter by.
     * @return \Illuminate\Database\Eloquent\Builder The modified query builder instance.
     */
    public function scopeOfType($query, $types)
    {
        if (is_array($types)) {
            return $query->whereIn('type', $types);
        }

        return $query->where('type', $types);
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

        // Check if the file path is a valid URL
        if (filter_var($filePath, FILTER_VALIDATE_URL)) {
            return $filePath;
        }

        // Check if the file path is a public asset
        if (strpos($filePath, '/assets/') === 0) {
            return $filePath;
        }

        // Generate a URL using the public disk storage
        return Storage::url($filePath);
    }
}
