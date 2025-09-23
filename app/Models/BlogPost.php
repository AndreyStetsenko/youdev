<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;

class BlogPost extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'featured_image',
        'meta_title',
        'meta_description',
        'tags',
        'blog_category_id',
        'user_id',
        'status',
        'published_at',
        'reading_time',
        'is_featured'
    ];

    protected $casts = [
        'title' => 'array',
        'excerpt' => 'array',
        'content' => 'array',
        'meta_title' => 'array',
        'meta_description' => 'array',
        'tags' => 'array',
        'published_at' => 'datetime',
        'is_featured' => 'boolean'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(BlogCategory::class, 'blog_category_id');
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getLocalizedTitle($locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        return $this->title[$locale] ?? $this->title['en'] ?? '';
    }

    public function getLocalizedExcerpt($locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        return $this->excerpt[$locale] ?? $this->excerpt['en'] ?? '';
    }

    public function getLocalizedContent($locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        return $this->content[$locale] ?? $this->content['en'] ?? '';
    }

    public function getLocalizedMetaTitle($locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        return $this->meta_title[$locale] ?? $this->meta_title['en'] ?? $this->getLocalizedTitle($locale);
    }

    public function getLocalizedMetaDescription($locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        return $this->meta_description[$locale] ?? $this->meta_description['en'] ?? $this->getLocalizedExcerpt($locale);
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published')
                    ->where('published_at', '<=', now());
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeRecent($query)
    {
        return $query->orderBy('published_at', 'desc');
    }

    public function scopePopular($query)
    {
        return $query->orderBy('views_count', 'desc');
    }

    public function incrementViews()
    {
        $this->increment('views_count');
    }

    public function getReadingTimeAttribute()
    {
        // If reading_time is stored in database, use it
        if (isset($this->attributes['reading_time']) && $this->attributes['reading_time']) {
            return $this->attributes['reading_time'];
        }

        // Calculate reading time based on content (average 200 words per minute)
        $content = $this->getLocalizedContent();
        $wordCount = str_word_count(strip_tags($content));
        return max(1, ceil($wordCount / 200));
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function isPublished()
    {
        return $this->status === 'published' && $this->published_at <= now();
    }

    public static function generateSlug($title)
    {
        $slug = \Illuminate\Support\Str::slug($title);
        $originalSlug = $slug;
        $counter = 1;

        while (static::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            if ($post->status === 'published' && !$post->published_at) {
                $post->published_at = now();
            }
            if (empty($post->slug)) {
                $post->slug = static::generateSlug($post->getLocalizedTitle());
            }
        });

        static::updating(function ($post) {
            if ($post->status === 'published' && !$post->published_at) {
                $post->published_at = now();
            }
        });
    }
}
