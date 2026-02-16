<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Portfolio extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'technologies',
        'image',
        'presentation_pdf',
        'gallery',
        'url',
        'github_url',
        'category',
        'status',
        'order',
        'is_featured',
        'is_published'
    ];

    protected $casts = [
        'title' => 'array',
        'description' => 'array',
        'technologies' => 'array',
        'gallery' => 'array',
        'is_featured' => 'boolean',
        'is_published' => 'boolean'
    ];

    public function getLocalizedTitle($locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        return $this->title[$locale] ?? $this->title['en'] ?? '';
    }

    public function getLocalizedDescription($locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        return $this->description[$locale] ?? $this->description['en'] ?? '';
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order')->orderBy('created_at', 'desc');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($portfolio) {
            if (empty($portfolio->slug)) {
                $portfolio->slug = static::generateSlug($portfolio->getLocalizedTitle());
            }
        });

        static::updating(function ($portfolio) {
            if (empty($portfolio->slug)) {
                $portfolio->slug = static::generateSlug($portfolio->getLocalizedTitle());
            }
        });
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
}
