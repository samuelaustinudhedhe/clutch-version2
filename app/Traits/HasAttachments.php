<?php

namespace App\Traits;

use App\Models\Attachment;
use Illuminate\Support\Facades\Storage;
use InvalidArgumentException;

trait HasAttachments
{
    /**
     * Polymorphic relationship to the attachments.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function attachments()
    {
        $attachments = $this->morphMany(Attachment::class, 'attachable');

        if (is_string($attachments)) {
            $attachments = json_decode($attachments, true);
        }

        return $attachments;
    }

    /**
     * Fetch documents associated with the model.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function documents()
    {
        return $this->attachments()->ofType(Attachment::TYPE_DOCUMENT)->get();
    }

    /**
     * Fetch videos associated with the model.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function videos()
    {
        return $this->attachments()->ofType(Attachment::TYPE_VIDEO)->get();
    }

    /**
     * Fetch the featured image associated with the model.
     *
     * @return \App\Models\Attachment|string
     */
    public function featuredImage($placeholder = 'car')
    {
        $image = $this->gallery()->where('is_featured', true)->first();
        return $image ?? getPlaceHolder($placeholder);
    }

    /**
     * Fetch images associated with the model.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function images($placeholder = 'car')
    {
        $types = [
            Attachment::TYPE_IMAGE,
            Attachment::TYPE_GALLERY_IMAGE,
        ];
        $images = $this->attachments()->ofType($types)->search('mime_type', 'image')->get();
        return $images ?? getPlaceHolder($placeholder);
    }

    /**
     * Fetch gallery associated with the model.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function gallery($placeholder = 'car')
    {
        return $this->images($placeholder);
    }

    /**
     * Check if the model has any attachments.
     *
     * @return bool
     */
    public function hasAttachment()
    {
        return $this->attachments()->exists();
    }

    /**
     * Check if the model has any videos.
     *
     * @return bool
     */
    public function hasVideo()
    {
        return $this->videos()->count() > 0;
    }

    /**
     * Check if the model has any images.
     *
     * @return bool
     */
    public function hasImage()
    {
        return $this->images()->count() > 0;
    }

    /**
     * Get attachment by ID.
     *
     * @param int $id
     * @return \App\Models\Attachment|null
     */
    public function getAttachmentById($id)
    {
        return $this->attachments()->find($id);
    }

    /**
     * Attach a file to the model with the correct author.
     *
     * @param string $file
     * @param \App\Models\User $author
     * @param string $type
     * @return \App\Models\Attachment
     * @throws \InvalidArgumentException
     */
    public function upload($file, $author, $type)
    {
        // Validate the file type
        $validTypes = Attachment::getFileTypes();

        if (!in_array($type, $validTypes)) {
            throw new InvalidArgumentException("Invalid file type: $type");
        }

        return $this->attachments()->create([
            'name' => $author->name . '\'s ' . basename(Storage::disk('public')->path($file)),
            'status' => 'active',
            'is_featured' => true,
            'type' => $type,
            'metadata' => [
                'size' => filesize($file),
                'dimension' => [
                    'width' => null,
                    'height' => null,
                ],
            ],
            'file_path' => $file,
            'mime_type' => mime_content_type(Storage::disk('public')->path($file)),
            'authorable_type' => get_class($author),
            'authorable_id' => $author->id,
            'attachable_id' => $this->id,
            'attachable_type' => get_class($this)
        ]);
    }

    /**
     * Polymorphic relationship to the authorable.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function authorable()
    {
        return $this->morphMany(Attachment::class, 'authorable');
    }
}