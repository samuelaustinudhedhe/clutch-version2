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
        Schema::create('orders', function (Blueprint $table) {
            $table->id()->startingValue(1009007001);
            $table->json('details'); // Scalable JSON column for order details like notes, payment gateway, etc.
            $table->json('price'); // Total price of the order
            $table->morphs('orderable'); // Polymorphic relation to Trip, Refund, Insurance, etc.
            $table->morphs('authorable'); // Polymorphic relation to User, Admin, etc.
            $table->json('payment'); // Payment status
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
