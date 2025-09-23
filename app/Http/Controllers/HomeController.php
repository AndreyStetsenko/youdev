<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;
use App\Models\CompanyInfo;
use App\Models\BlogPost;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProjects = Portfolio::published()
            ->featured()
            ->ordered()
            ->take(3)
            ->get();

        $blogPosts = BlogPost::published()
            ->take(3)
            ->get();

        return view('pages.home', compact('featuredProjects', 'blogPosts'));
    }

    public function about()
    {
        $companyInfo = CompanyInfo::active()->ordered()->get();
        
        return view('pages.about', compact('companyInfo'));
    }

    public function portfolio()
    {
        $projects = Portfolio::published()
            ->ordered()
            ->paginate(12);

        $categories = Portfolio::published()
            ->distinct()
            ->pluck('category')
            ->toArray();

        return view('pages.portfolio', compact('projects', 'categories'));
    }

    public function services()
    {
        return view('pages.services');
    }

    public function portfolioShow($locale, $slug)
    {
        $portfolio = Portfolio::where('slug', $slug)->firstOrFail();
        
        // Only show published projects
        if (!$portfolio->is_published) {
            abort(404);
        }

        // Get related projects (same category, excluding current)
        $relatedProjects = Portfolio::published()
            ->where('category', $portfolio->category)
            ->where('id', '!=', $portfolio->id)
            ->ordered()
            ->take(3)
            ->get();

        return view('pages.portfolio-detail', compact('portfolio', 'relatedProjects'));
    }

    public function dataAnalytics()
    {
        return view('pages.capabilities.data-analytics');
    }

    public function cloudServices()
    {
        return view('pages.capabilities.cloud-services');
    }

    public function customDevelopment()
    {
        return view('pages.capabilities.custom-development');
    }
}
