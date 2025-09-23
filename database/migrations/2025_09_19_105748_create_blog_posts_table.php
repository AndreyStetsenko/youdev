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
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->json('title'); // Multilingual title
            $table->string('slug')->unique();
            $table->json('excerpt')->nullable(); // Multilingual excerpt
            $table->json('content'); // Multilingual content
            $table->string('featured_image')->nullable();
            $table->json('meta_title')->nullable(); // SEO meta title
            $table->json('meta_description')->nullable(); // SEO meta description
            $table->json('tags')->nullable(); // Array of tags
            $table->foreignId('blog_category_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); // Author
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft');
            $table->timestamp('published_at')->nullable();
            $table->integer('views_count')->default(0);
            $table->integer('reading_time')->nullable(); // In minutes
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
            
            $table->index(['status', 'published_at']);
            $table->index(['blog_category_id', 'status']);
            $table->index(['is_featured', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_posts');
    }
};
