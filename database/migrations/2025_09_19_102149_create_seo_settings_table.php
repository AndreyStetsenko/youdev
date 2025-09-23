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
        Schema::create('seo_settings', function (Blueprint $table) {
            $table->id();
            $table->string('page'); // home, about, portfolio, etc.
            $table->json('title'); // Multilingual meta title
            $table->json('description'); // Multilingual meta description
            $table->json('keywords')->nullable(); // Multilingual keywords
            $table->string('og_image')->nullable(); // Open Graph image
            $table->json('custom_meta')->nullable(); // Additional meta tags
            $table->timestamps();
            
            $table->unique('page');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seo_settings');
    }
};
