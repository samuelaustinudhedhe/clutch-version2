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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();            
            $table->string('name');            
            $table->string('slug')->unique();
            // $table->string('vin')->unique();
            $table->text('description');
            $table->float('rating')->default(0);
            $table->json('price')->nullable();
            $table->string('status')->default('active');
            $table->string('type');            
            $table->json('location');
            $table->json('details')->nullable();
            $table->json('specifications')->nullable();
            $table->json('features')->nullable();
            $table->json('service')->nullable();
            $table->text('faults')->default('none');

            $table->json('insurance')->nullable();
            $table->json('chauffeur')->nullable();

            $table->json('owner');
            // $table->unsignedBigInteger('owner');
            // $table->foreign('owner')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
