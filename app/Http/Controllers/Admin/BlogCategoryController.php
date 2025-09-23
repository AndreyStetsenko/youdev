<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;

class BlogCategoryController extends Controller
{
    public function index()
    {
        $categories = BlogCategory::orderBy('order')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.blog-categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.blog-categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name.en' => 'required|string|max:255',
            'name.uk' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:blog_categories,slug',
            'description.en' => 'nullable|string',
            'description.uk' => 'nullable|string',
            'color' => 'required|string|max:7',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $validated['order'] = $validated['order'] ?? 0;
        $validated['is_active'] = $request->has('is_active');

        BlogCategory::create($validated);

        return redirect()->route('admin.blog-categories.index')
                        ->with('success', 'Category created successfully!');
    }

    public function show(BlogCategory $blogCategory)
    {
        return view('admin.blog-categories.show', compact('blogCategory'));
    }

    public function edit(BlogCategory $blogCategory)
    {
        return view('admin.blog-categories.edit', compact('blogCategory'));
    }

    public function update(Request $request, BlogCategory $blogCategory)
    {
        $validated = $request->validate([
            'name.en' => 'required|string|max:255',
            'name.uk' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:blog_categories,slug,' . $blogCategory->id,
            'description.en' => 'nullable|string',
            'description.uk' => 'nullable|string',
            'color' => 'required|string|max:7',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $validated['order'] = $validated['order'] ?? 0;
        $validated['is_active'] = $request->has('is_active');

        $blogCategory->update($validated);

        return redirect()->route('admin.blog-categories.index')
                        ->with('success', 'Category updated successfully!');
    }

    public function destroy(BlogCategory $blogCategory)
    {
        // Check if category has posts
        if ($blogCategory->posts()->count() > 0) {
            return redirect()->back()
                            ->with('error', 'Cannot delete category with existing posts.');
        }

        $blogCategory->delete();

        return redirect()->route('admin.blog-categories.index')
                        ->with('success', 'Category deleted successfully!');
    }
}
