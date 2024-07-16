<?php
namespace App\Traits;

use App\Models\Attachment;

trait Attachments
{
    // Polymorphic relationship to the attachments
    public function attachments()
    {
        return $this->morphMany(Attachment::class, 'attachable');
    }

    // Fetch documents associated with the model
    public function documents()
    {
        return $this->attachments()->where('type', 'document')->get();
    }

    // Fetch videos associated with the model
    public function videos()
    {
        return $this->attachments()->where('type', 'video')->get();
    }

    // Fetch images associated with the model
    public function images()
    {
        return $this->attachments()->where('type', 'image')->get();
    }

    // Check if the model has any attachments
    public function hasAttachment()
    {
        return $this->attachments()->exists();
    }

    // Check if the model has any videos
    public function hasVideo()
    {
        return $this->videos()->count() > 0;
    }

    // Check if the model has any images
    public function hasImage()
    {
        return $this->images()->count() > 0;
    }

    // Get attachment by ID
    public function getAttachmentById($id)
    {
        return $this->attachments()->find($id);
    }

    // Attach a file to the model with the correct author
    public function upload($file, $author, $type = 'document')
    {
        $path = $file->store('attachments');

        return $this->attachments()->create([
            'file_path' => $path,
            'type' => $type,
            'authorable_type' => get_class($author),
            'authorable_id' => $author->id,
            'attachable_id' => $this->id,
            'attachable_type' => get_class($this)
        ]);
    }
}
