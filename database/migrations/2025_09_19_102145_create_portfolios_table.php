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
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->json('title'); // Multilingual title
            $table->json('description'); // Multilingual description
            $table->json('technologies'); // Array of technologies used
            $table->string('image')->nullable(); // Main project image
            $table->json('gallery')->nullable(); // Additional images
            $table->string('url')->nullable(); // Project URL
            $table->string('github_url')->nullable(); // GitHub repository
            $table->enum('category', ['web', 'mobile', 'desktop', 'api', 'other']);
            $table->enum('status', ['completed', 'in_progress', 'draft']);
            $table->integer('order')->default(0); // For sorting
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolios');
    }
};
