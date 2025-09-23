<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogPost;
use App\Models\BlogCategory;
use Illuminate\Support\Facades\Storage;

class BlogPostController extends Controller
{
    public function index()
    {
        $posts = BlogPost::with(['category'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('admin.blog-posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = BlogCategory::active()->ordered()->get();
        return view('admin.blog-posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title.en' => 'required|string|max:255',
            'title.uk' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blog_posts,slug',
            'excerpt.en' => 'nullable|string|max:500',
            'excerpt.uk' => 'nullable|string|max:500',
            'content.en' => 'required|string',
            'content.uk' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'blog_category_id' => 'required|exists:blog_categories,id',
            'status' => 'required|in:draft,published,archived',
            'tags' => 'nullable|string',
            'is_featured' => 'boolean',
        ]);

        // Handle image upload
        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('blog', 'public');
        }

        // Convert tags string to array
        if ($validated['tags']) {
            $validated['tags'] = array_map('trim', explode(',', $validated['tags']));
        }

        // Set defaults
        $validated['user_id'] = auth()->id();
        $validated['is_featured'] = $request->has('is_featured');

        // Generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = \App\Models\BlogPost::generateSlug($validated['title']['en']);
        }

        BlogPost::create($validated);

        return redirect()->route('admin.blog-posts.index')
                        ->with('success', 'Blog post created successfully!');
    }

    public function show(BlogPost $blogPost)
    {
        return view('admin.blog-posts.show', compact('blogPost'));
    }

    public function edit(BlogPost $blogPost)
    {
        $categories = BlogCategory::active()->ordered()->get();
        return view('admin.blog-posts.edit', compact('blogPost', 'categories'));
    }

    public function update(Request $request, BlogPost $blogPost)
    {
        $validated = $request->validate([
            'title.en' => 'required|string|max:255',
            'title.uk' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:blog_posts,slug,' . $blogPost->id,
            'excerpt.en' => 'nullable|string|max:500',
            'excerpt.uk' => 'nullable|string|max:500',
            'content.en' => 'required|string',
            'content.uk' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'blog_category_id' => 'required|exists:blog_categories,id',
            'status' => 'required|in:draft,published,archived',
            'tags' => 'nullable|string',
            'is_featured' => 'boolean',
        ]);

        // Handle image upload
        if ($request->hasFile('featured_image')) {
            // Delete old image
            if ($blogPost->featured_image) {
                Storage::disk('public')->delete($blogPost->featured_image);
            }
            $validated['featured_image'] = $request->file('featured_image')->store('blog', 'public');
        }

        // Convert tags string to array
        if ($validated['tags']) {
            $validated['tags'] = array_map('trim', explode(',', $validated['tags']));
        } else {
            $validated['tags'] = [];
        }

        $validated['is_featured'] = $request->has('is_featured');

        $blogPost->update($validated);

        return redirect()->route('admin.blog-posts.index')
                        ->with('success', 'Blog post updated successfully!');
    }

    public function destroy(BlogPost $blogPost)
    {
        // Delete associated image
        if ($blogPost->featured_image) {
            Storage::disk('public')->delete($blogPost->featured_image);
        }

        $blogPost->delete();

        return redirect()->route('admin.blog-posts.index')
                        ->with('success', 'Blog post deleted successfully!');
    }
}
