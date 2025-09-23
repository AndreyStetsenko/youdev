<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Portfolio;
use App\Models\BlogPost;

class SitemapController extends Controller
{
    public function index()
    {
        $sitemap = '<?xml version="1.0" encoding="UTF-8"?>';
        $sitemap .= '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        
        // Main sitemap
        $sitemap .= '<sitemap>';
        $sitemap .= '<loc>' . url('/sitemap-main.xml') . '</loc>';
        $sitemap .= '<lastmod>' . now()->toW3cString() . '</lastmod>';
        $sitemap .= '</sitemap>';
        
        // Portfolio sitemap
        if (Portfolio::count() > 0) {
            $sitemap .= '<sitemap>';
            $sitemap .= '<loc>' . url('/sitemap-portfolio.xml') . '</loc>';
            $sitemap .= '<lastmod>' . Portfolio::latest()->first()->updated_at->toW3cString() . '</lastmod>';
            $sitemap .= '</sitemap>';
        }
        
        // Blog sitemap
        if (BlogPost::count() > 0) {
            $sitemap .= '<sitemap>';
            $sitemap .= '<loc>' . url('/sitemap-blog.xml') . '</loc>';
            $sitemap .= '<lastmod>' . BlogPost::latest()->first()->updated_at->toW3cString() . '</lastmod>';
            $sitemap .= '</sitemap>';
        }
        
        $sitemap .= '</sitemapindex>';
        
        return response($sitemap, 200, [
            'Content-Type' => 'application/xml'
        ]);
    }
    
    public function main()
    {
        $sitemap = '<?xml version="1.0" encoding="UTF-8"?>';
        $sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">';
        
        // Main pages
        $mainPages = [
            ['url' => '/', 'priority' => '1.0', 'changefreq' => 'weekly'],
            ['url' => '/about', 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['url' => '/services', 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['url' => '/portfolio', 'priority' => '0.8', 'changefreq' => 'weekly'],
            ['url' => '/contact', 'priority' => '0.7', 'changefreq' => 'monthly'],
        ];
        
        foreach ($mainPages as $page) {
            $sitemap .= '<url>';
            $sitemap .= '<loc>' . url($page['url']) . '</loc>';
            $sitemap .= '<lastmod>' . now()->toW3cString() . '</lastmod>';
            $sitemap .= '<changefreq>' . $page['changefreq'] . '</changefreq>';
            $sitemap .= '<priority>' . $page['priority'] . '</priority>';
            
            // Add alternate language versions
            if (app()->getLocale() === 'uk') {
                $sitemap .= '<xhtml:link rel="alternate" hreflang="en" href="' . url('/en' . $page['url']) . '"/>';
                $sitemap .= '<xhtml:link rel="alternate" hreflang="x-default" href="' . url($page['url']) . '"/>';
            } else {
                $sitemap .= '<xhtml:link rel="alternate" hreflang="uk" href="' . str_replace('/en', '', url($page['url'])) . '"/>';
                $sitemap .= '<xhtml:link rel="alternate" hreflang="x-default" href="' . str_replace('/en', '', url($page['url'])) . '"/>';
            }
            
            $sitemap .= '</url>';
        }
        
        $sitemap .= '</urlset>';
        
        return response($sitemap, 200, [
            'Content-Type' => 'application/xml'
        ]);
    }
    
    public function portfolio()
    {
        $sitemap = '<?xml version="1.0" encoding="UTF-8"?>';
        $sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        
        $portfolios = Portfolio::where('status', 'published')->get();
        
        foreach ($portfolios as $portfolio) {
            $sitemap .= '<url>';
            $sitemap .= '<loc>' . route('portfolio.show', ['locale' => app()->getLocale(), 'slug' => $portfolio->slug]) . '</loc>';
            $sitemap .= '<lastmod>' . $portfolio->updated_at->toW3cString() . '</lastmod>';
            $sitemap .= '<changefreq>monthly</changefreq>';
            $sitemap .= '<priority>0.6</priority>';
            $sitemap .= '</url>';
        }
        
        $sitemap .= '</urlset>';
        
        return response($sitemap, 200, [
            'Content-Type' => 'application/xml'
        ]);
    }
    
    public function blog()
    {
        $sitemap = '<?xml version="1.0" encoding="UTF-8"?>';
        $sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        
        $blogPosts = BlogPost::where('status', 'published')->get();
        
        foreach ($blogPosts as $post) {
            $sitemap .= '<url>';
            $sitemap .= '<loc>' . route('blog.show', ['locale' => app()->getLocale(), 'slug' => $post->slug]) . '</loc>';
            $sitemap .= '<lastmod>' . $post->updated_at->toW3cString() . '</lastmod>';
            $sitemap .= '<changefreq>monthly</changefreq>';
            $sitemap .= '<priority>0.6</priority>';
            $sitemap .= '</url>';
        }
        
        $sitemap .= '</urlset>';
        
        return response($sitemap, 200, [
            'Content-Type' => 'application/xml'
        ]);
    }
}
