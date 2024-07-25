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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->json('phone')->nullable();
            $table->string('password');
            $table->rememberToken();            
            $table->string('status')->default('inactive'); // (active or inactive or suspended)
            $table->date('date_of_birth')->nullable(); // user status (active or inactive or suspended)
            $table->string('gender')->nullable();
            $table->json('address')->nullable();
            $table->json('social')->nullable();
            $table->integer('rating')->default(0); // (active or inactive or suspended)
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
