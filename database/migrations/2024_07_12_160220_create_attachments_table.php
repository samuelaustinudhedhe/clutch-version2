<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('attachments', function (Blueprint $table) {
            $table->id()->startingValue(11300400100023);
            $table->string('name');
            $table->string('description')->nullable(); //content of the post (usually empty for attachments).
            $table->string('status')->default('active'); //The status of the attachment (usually inherit from its parent).
            $table->boolean('is_featured')->default(false)->nullable(); //
            $table->string('type'); // New column for attachment type accepts Profile Picture, Images, Gallery Images, Proof of Payment, Review Image, etc.
            $table->string('mime_type'); //image/jpeg, audio/mp3, video/mp4, plaintext/txt, document/pdf, word/docx 
            $table->json('metadata')->nullable(); // JSON field to store metadata of the attachment.
            $table->string('file_path'); // The path to the file.            
            $table->nullableMorphs('attachable'); // Polymorphic fields for parent models
            $table->morphs('authorable'); // Polymorphic fields for author (User or Admin)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attachments');
    }
};
