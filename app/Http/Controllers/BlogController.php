<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost;
use App\Models\BlogCategory;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $posts = BlogPost::published()->paginate(10);
        $categories = BlogCategory::all();
        $featuredPosts = BlogPost::published()->featured()->get();

        return view('blog.index', compact('posts', 'categories', 'featuredPosts'));
    }

    public function show($locale, $slug)
    {
        $post = BlogPost::with(['category', 'author'])->where('slug', $slug)->firstOrFail();
        
        // Only show published posts
        if (!$post->isPublished()) {
            abort(404);
        }

        // Increment views
        $post->incrementViews();

        // Get related posts
        $relatedPosts = BlogPost::published()
            ->where('blog_category_id', $post->blog_category_id)
            ->where('id', '!=', $post->id)
            ->with(['category', 'author'])
            ->recent()
            ->take(3)
            ->get();

        return view('blog.show', compact('post', 'relatedPosts'));
    }

    public function category($locale, $slug)
    {
        $category = BlogCategory::where('slug', $slug)->firstOrFail();
        
        if (!$category->is_active) {
            abort(404);
        }

        $posts = BlogPost::published()
            ->where('blog_category_id', $category->id)
            ->with(['category'])
            ->recent()
            ->paginate(12);

        return view('blog.category', compact('category', 'posts'));
    }
}
