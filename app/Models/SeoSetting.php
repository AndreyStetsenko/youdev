<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeoSetting extends Model
{
    protected $fillable = [
        'page',
        'title',
        'description',
        'keywords',
        'og_image',
        'custom_meta'
    ];

    protected $casts = [
        'title' => 'array',
        'description' => 'array',
        'keywords' => 'array',
        'custom_meta' => 'array'
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

    public function getLocalizedKeywords($locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        return $this->keywords[$locale] ?? $this->keywords['en'] ?? [];
    }

    public static function getForPage($page)
    {
        return static::where('page', $page)->first();
    }
}
