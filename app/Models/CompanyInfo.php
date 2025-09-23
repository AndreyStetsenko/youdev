<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyInfo extends Model
{
    protected $fillable = [
        'key',
        'title',
        'content',
        'image',
        'order',
        'is_active'
    ];

    protected $casts = [
        'title' => 'array',
        'content' => 'array',
        'is_active' => 'boolean'
    ];

    public function getLocalizedTitle($locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        return $this->title[$locale] ?? $this->title['en'] ?? '';
    }

    public function getLocalizedContent($locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        return $this->content[$locale] ?? $this->content['en'] ?? '';
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }

    public static function getByKey($key)
    {
        return static::where('key', $key)->where('is_active', true)->first();
    }
}
