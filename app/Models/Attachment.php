<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'size',
        'mime_type',
        'path', 'meta',
        'dimensions',
        
    ];

    protected $appends = [
        'author',
        'attachable_type',
        'attachable_id',


    ];

    protected $casts = [
        'meta' => 'array',
        'dimensions' => 'array',
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
}
