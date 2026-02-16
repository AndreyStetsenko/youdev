<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Portfolio::orderBy('order')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.portfolio.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.portfolio.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title.en' => 'required|string|max:255',
            'title.uk' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:portfolios,slug',
            'description.en' => 'required|string',
            'description.uk' => 'required|string',
            'technologies' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'presentation_pdf' => 'nullable|file|mimes:pdf|max:51200',
            'url' => 'nullable|url',
            'github_url' => 'nullable|url',
            'category' => 'required|in:web,website,ecommerce,design,marketing,other',
            'status' => 'required|in:completed,in_progress,draft',
            'order' => 'nullable|integer|min:0',
            'is_featured' => 'boolean',
            'is_published' => 'boolean',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('portfolio', 'public');
        }

        // Handle PDF upload
        if ($request->hasFile('presentation_pdf')) {
            $validated['presentation_pdf'] = $request->file('presentation_pdf')->store('portfolio/pdfs', 'public');
        }

        // Convert technologies string to array
        $validated['technologies'] = array_map('trim', explode(',', $validated['technologies']));

        // Set defaults
        $validated['order'] = $validated['order'] ?? 0;
        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_published'] = $request->has('is_published');

        Portfolio::create($validated);

        return redirect()->route('admin.portfolio.index')
                        ->with('success', 'Project created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Portfolio $portfolio)
    {
        return view('admin.portfolio.show', compact('portfolio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Portfolio $portfolio)
    {
        return view('admin.portfolio.edit', compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        $validated = $request->validate([
            'title.en' => 'required|string|max:255',
            'title.uk' => 'required|string|max:255',
            'description.en' => 'required|string',
            'description.uk' => 'required|string',
            'technologies' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'presentation_pdf' => 'nullable|file|mimes:pdf|max:51200',
            'url' => 'nullable|url',
            'github_url' => 'nullable|url',
            'category' => 'required|in:web,website,ecommerce,design,marketing,other',
            'status' => 'required|in:completed,in_progress,draft',
            'order' => 'nullable|integer|min:0',
            'is_featured' => 'boolean',
            'is_published' => 'boolean',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image
            if ($portfolio->image) {
                Storage::disk('public')->delete($portfolio->image);
            }
            $validated['image'] = $request->file('image')->store('portfolio', 'public');
        }

        // Handle PDF: remove or upload new
        if ($request->boolean('remove_presentation_pdf') && $portfolio->presentation_pdf) {
            Storage::disk('public')->delete($portfolio->presentation_pdf);
            $validated['presentation_pdf'] = null;
        } elseif ($request->hasFile('presentation_pdf')) {
            if ($portfolio->presentation_pdf) {
                Storage::disk('public')->delete($portfolio->presentation_pdf);
            }
            $validated['presentation_pdf'] = $request->file('presentation_pdf')->store('portfolio/pdfs', 'public');
        }

        // Convert technologies string to array
        $validated['technologies'] = array_map('trim', explode(',', $validated['technologies']));

        // Set defaults
        $validated['order'] = $validated['order'] ?? 0;
        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_published'] = $request->has('is_published');

        $portfolio->update($validated);

        return redirect()->route('admin.portfolio.index')
                        ->with('success', 'Project updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Portfolio $portfolio)
    {
        // Delete associated files
        if ($portfolio->image) {
            Storage::disk('public')->delete($portfolio->image);
        }
        if ($portfolio->presentation_pdf) {
            Storage::disk('public')->delete($portfolio->presentation_pdf);
        }

        $portfolio->delete();

        return redirect()->route('admin.portfolio.index')
                        ->with('success', 'Project deleted successfully!');
    }
}
