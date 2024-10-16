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
     * Fetch images associated with the model.
     *
     * @return \Illuminate\Database\Eloquent\Collection|string
     */
    public function images($placeholder = 'image')
    {
        $types = [
            Attachment::TYPE_IMAGE,
            Attachment::TYPE_GALLERY_IMAGE,
        ];

        // Get all attachments of the specified types
        $images = $this->attachments()->ofType($types)->get();

        // Filter images by checking if their MIME type is in the imageMimeTypes array
        $filteredImages = $images->filter(function ($attachment) {
            return Attachment::isImageMimeType($attachment->mime_type);
        });

        // Return the filtered images if any exist, otherwise return the placeholder
        return $filteredImages->isNotEmpty() ? $filteredImages : $this->getPlaceholder($placeholder, true);
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
     * Fetch the featured image associated with the model.
     *
     * @return \App\Models\Attachment|string
     */
    public function featuredImage($placeholder = 'image')
    {
        $image = $this->gallery($placeholder);

        // check if image is an attachment
        if (!is_string($image)) {
            return $image->where('is_featured', true)->first();
        }

        return $image;
    }

    /**
     * Get a placeholder image based on the type.
     * Placeholder images must be in SVG format and should be named "default_{type}_placeholder.svg"
     *
     * @param string $type
     * @param bool $collection
     * @return \App\Models\Attachment|\Illuminate\Support\Collection<TKey, TValue>
     */
    public function getPlaceholder($type = 'image', $collection = true)
    {
        // Define the types of placeholders
        $placeholderTypes = Attachment::$placeholderTypes;

        // Check if the type is valid
        if (!array_key_exists($type, $placeholderTypes)) {
            throw new InvalidArgumentException("Invalid placeholder type: $type");
        }

        // Attempt to retrieve the placeholder from the database
        $placeholder = Attachment::where('type', $placeholderTypes[$type])->first();

        // Determine the return type based on the $collection parameter
        if ($placeholder) {
            return $collection ? collect([$placeholder]) : $placeholder;
        }

        // Return a default path if no placeholder is found
        $defaultPath = "/assets/images/placeholders/{$type}.svg";
        $defaultAttachment = new Attachment(['file_path' => $defaultPath]);

        return $collection ? collect([$defaultAttachment]) : $defaultAttachment;
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
