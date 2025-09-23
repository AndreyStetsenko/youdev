<x-admin.layouts.app>
    @section('title', 'Blog Category Details')
    @section('subtitle', $blogCategory->getLocalizedName())

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        {{-- Main Content --}}
        <div class="lg:col-span-2">
            <div class="bg-white rounded-lg shadow">
                <div class="px-6 py-4 border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-medium text-gray-900">Category Information</h3>
                        <div class="flex items-center space-x-2">
                            <a href="{{ route('admin.blog-categories.edit', $blogCategory) }}" 
                               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                                Edit Category
                            </a>
                            @if($blogCategory->is_active)
                                <a href="{{ route('blog.category', ['locale' => 'en', 'slug' => $blogCategory->slug]) }}" 
                                   target="_blank"
                                   class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                                    View Live
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="p-6">
                    {{-- Category Header --}}
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 rounded-lg flex items-center justify-center mr-4" 
                             style="background-color: {{ $blogCategory->color }}20;">
                            <div class="w-6 h-6 rounded-full" style="background-color: {{ $blogCategory->color }};"></div>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold text-gray-900">
                                {{ $blogCategory->getLocalizedName() }}
                            </h1>
                            <p class="text-gray-600">
                                {{ $blogCategory->posts()->count() }} posts in this category
                            </p>
                        </div>
                    </div>

                    {{-- Description --}}
                    @if($blogCategory->getLocalizedDescription())
                        <div class="mb-6">
                            <h4 class="text-sm font-medium text-gray-700 mb-2">Description</h4>
                            <p class="text-gray-600 leading-relaxed">{{ $blogCategory->getLocalizedDescription() }}</p>
                        </div>
                    @endif

                    {{-- Recent Posts --}}
                    <div class="mt-8">
                        <h4 class="text-lg font-medium text-gray-900 mb-4">Recent Posts in This Category</h4>
                        
                        @php
                            $recentPosts = $blogCategory->posts()->orderBy('created_at', 'desc')->take(5)->get();
                        @endphp

                        @if($recentPosts->count() > 0)
                            <div class="space-y-4">
                                @foreach($recentPosts as $post)
                                    <div class="flex items-center p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                                        @if($post->featured_image)
                                            <img class="h-12 w-12 rounded-lg object-cover mr-4" 
                                                 src="{{ asset('storage/' . $post->featured_image) }}" 
                                                 alt="{{ $post->getLocalizedTitle() }}">
                                        @else
                                            <div class="h-12 w-12 bg-gray-200 rounded-lg flex items-center justify-center mr-4">
                                                <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                                </svg>
                                            </div>
                                        @endif
                                        <div class="flex-1">
                                            <h5 class="font-medium text-gray-900">
                                                <a href="{{ route('admin.blog-posts.show', $post) }}" class="hover:text-blue-600">
                                                    {{ $post->getLocalizedTitle() }}
                                                </a>
                                            </h5>
                                            <p class="text-sm text-gray-500">
                                                {{ $post->created_at->format('M d, Y') }} • 
                                                {{ ucfirst($post->status) }}
                                                @if($post->is_featured)
                                                    • Featured
                                                @endif
                                            </p>
                                        </div>
                                        <div class="flex items-center space-x-2">
                                            <a href="{{ route('admin.blog-posts.show', $post) }}" 
                                               class="text-blue-600 hover:text-blue-700 text-sm font-medium">
                                                View
                                            </a>
                                            <a href="{{ route('admin.blog-posts.edit', $post) }}" 
                                               class="text-indigo-600 hover:text-indigo-700 text-sm font-medium">
                                                Edit
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            @if($blogCategory->posts()->count() > 5)
                                <div class="mt-4 text-center">
                                    <a href="{{ route('admin.blog-posts.index', ['category' => $blogCategory->id]) }}" 
                                       class="text-blue-600 hover:text-blue-700 font-medium">
                                        View all {{ $blogCategory->posts()->count() }} posts →
                                    </a>
                                </div>
                            @endif
                        @else
                            <div class="text-center py-8">
                                <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                <h3 class="text-lg font-medium text-gray-900 mb-2">No posts yet</h3>
                                <p class="text-gray-600 mb-4">This category doesn't have any posts yet.</p>
                                <a href="{{ route('admin.blog-posts.create') }}" 
                                   class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                                    Create First Post
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- Sidebar --}}
        <div class="lg:col-span-1">
            {{-- Category Details --}}
            <div class="bg-white rounded-lg shadow p-6 mb-6">
                <h4 class="text-lg font-medium text-gray-900 mb-4">Category Details</h4>
                
                <dl class="space-y-3">
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Status</dt>
                        <dd class="mt-1">
                            @if($blogCategory->is_active)
                                <span class="px-2 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">
                                    Active
                                </span>
                            @else
                                <span class="px-2 py-1 text-xs font-medium rounded-full bg-red-100 text-red-800">
                                    Inactive
                                </span>
                            @endif
                        </dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-500">Color</dt>
                        <dd class="mt-1 flex items-center">
                            <div class="w-4 h-4 rounded-full mr-2" style="background-color: {{ $blogCategory->color }};"></div>
                            <code class="text-sm text-gray-600">{{ $blogCategory->color }}</code>
                        </dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-500">Order</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $blogCategory->order }}</dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-500">Slug</dt>
                        <dd class="mt-1">
                            <code class="text-sm text-gray-600 bg-gray-100 px-2 py-1 rounded">{{ $blogCategory->slug }}</code>
                        </dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-500">Created At</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $blogCategory->created_at->format('M d, Y H:i') }}</dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-500">Updated At</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $blogCategory->updated_at->format('M d, Y H:i') }}</dd>
                    </div>
                </dl>
            </div>

            {{-- Statistics --}}
            <div class="bg-white rounded-lg shadow p-6 mb-6">
                <h4 class="text-lg font-medium text-gray-900 mb-4">Statistics</h4>
                
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600">Total Posts</span>
                        <span class="text-lg font-semibold text-gray-900">{{ $blogCategory->posts()->count() }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600">Published</span>
                        <span class="text-lg font-semibold text-green-600">{{ $blogCategory->publishedPosts()->count() }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600">Drafts</span>
                        <span class="text-lg font-semibold text-yellow-600">{{ $blogCategory->posts()->where('status', 'draft')->count() }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600">Total Views</span>
                        <span class="text-lg font-semibold text-blue-600">{{ number_format($blogCategory->posts()->sum('views_count')) }}</span>
                    </div>
                </div>
            </div>

            {{-- Actions --}}
            <div class="bg-white rounded-lg shadow p-6">
                <h4 class="text-lg font-medium text-gray-900 mb-4">Actions</h4>
                
                <div class="space-y-3">
                    <a href="{{ route('admin.blog-categories.edit', $blogCategory) }}" 
                       class="w-full bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition-colors text-center block">
                        Edit Category
                    </a>
                    
                    @if($blogCategory->is_active)
                        <a href="{{ route('blog.category', ['locale' => 'en', 'slug' => $blogCategory->slug]) }}" 
                           target="_blank"
                           class="w-full bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg font-medium transition-colors text-center block">
                            View Live Category
                        </a>
                    @endif
                    
                    @if($blogCategory->posts()->count() === 0)
                        <form method="POST" action="{{ route('admin.blog-categories.destroy', $blogCategory) }}" 
                              onsubmit="return confirm('Are you sure you want to delete this category?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="w-full bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                                Delete Category
                            </button>
                        </form>
                    @else
                        <div class="text-sm text-gray-500 text-center p-2 bg-gray-50 rounded-lg">
                            Cannot delete category with existing posts
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- Back Button --}}
    <div class="mt-8">
        <a href="{{ route('admin.blog-categories.index') }}" 
           class="inline-flex items-center text-blue-600 hover:text-blue-700 font-medium">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
            Back to Categories
        </a>
    </div>
</x-admin.layouts.app>
