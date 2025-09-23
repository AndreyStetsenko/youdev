<x-admin.layouts.app>
    @section('title', 'Blog Post Details')
    @section('subtitle', $blogPost->getLocalizedTitle())

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        {{-- Main Content --}}
        <div class="lg:col-span-2">
            <div class="bg-white rounded-lg shadow">
                {{-- Header --}}
                <div class="px-6 py-4 border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-medium text-gray-900">Post Content</h3>
                        <div class="flex items-center space-x-2">
                            <a href="{{ route('admin.blog-posts.edit', $blogPost) }}" 
                               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                                Edit Post
                            </a>
                            @if($blogPost->status === 'published')
                                <a href="{{ route('blog.show', ['locale' => 'en', 'slug' => $blogPost->slug]) }}" 
                                   target="_blank"
                                   class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                                    View Live
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="p-6">
                    {{-- Featured Image --}}
                    @if($blogPost->featured_image)
                        <div class="mb-6">
                            <img src="{{ asset('storage/' . $blogPost->featured_image) }}" 
                                 alt="{{ $blogPost->getLocalizedTitle() }}"
                                 class="w-full h-64 object-cover rounded-lg">
                        </div>
                    @endif

                    {{-- Title --}}
                    <h1 class="text-3xl font-bold text-gray-900 mb-4">
                        {{ $blogPost->getLocalizedTitle() }}
                    </h1>

                    {{-- Excerpt --}}
                    @if($blogPost->getLocalizedExcerpt())
                        <div class="text-lg text-gray-600 mb-6 p-4 bg-gray-50 rounded-lg border-l-4 border-blue-500">
                            {{ $blogPost->getLocalizedExcerpt() }}
                        </div>
                    @endif

                    {{-- Content --}}
                    <div class="prose prose-lg max-w-none">
                        {!! nl2br(e($blogPost->getLocalizedContent())) !!}
                    </div>

                    {{-- Tags --}}
                    @if($blogPost->tags && count($blogPost->tags) > 0)
                        <div class="mt-8 pt-6 border-t border-gray-200">
                            <h4 class="text-sm font-medium text-gray-500 mb-3">Tags</h4>
                            <div class="flex flex-wrap gap-2">
                                @foreach($blogPost->tags as $tag)
                                    <span class="px-3 py-1 text-sm font-medium bg-blue-100 text-blue-800 rounded-full">
                                        {{ $tag }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Sidebar --}}
        <div class="lg:col-span-1">
            {{-- Post Info --}}
            <div class="bg-white rounded-lg shadow p-6 mb-6">
                <h4 class="text-lg font-medium text-gray-900 mb-4">Post Information</h4>
                
                <dl class="space-y-3">
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Status</dt>
                        <dd class="mt-1">
                            @php
                                $statusColors = [
                                    'published' => 'bg-green-100 text-green-800',
                                    'draft' => 'bg-yellow-100 text-yellow-800',
                                    'archived' => 'bg-gray-100 text-gray-800'
                                ];
                            @endphp
                            <span class="px-2 py-1 text-xs font-medium rounded-full {{ $statusColors[$blogPost->status] }}">
                                {{ ucfirst($blogPost->status) }}
                            </span>
                            @if($blogPost->is_featured)
                                <span class="ml-2 px-2 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-800">
                                    Featured
                                </span>
                            @endif
                        </dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-500">Category</dt>
                        <dd class="mt-1">
                            <span class="inline-flex items-center px-2 py-1 text-sm font-medium rounded-full border" 
                                  style="background-color: {{ $blogPost->category->color }}20; color: {{ $blogPost->category->color }}; border-color: {{ $blogPost->category->color }}40;">
                                {{ $blogPost->category->getLocalizedName() }}
                            </span>
                        </dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-500">Author</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $blogPost->author->name }}</dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-500">Reading Time</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $blogPost->reading_time }} min read</dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-500">Views</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ number_format($blogPost->views_count) }}</dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-500">Slug</dt>
                        <dd class="mt-1">
                            <code class="text-sm text-gray-600 bg-gray-100 px-2 py-1 rounded">{{ $blogPost->slug }}</code>
                        </dd>
                    </div>

                    @if($blogPost->published_at)
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Published At</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $blogPost->published_at->format('M d, Y H:i') }}</dd>
                        </div>
                    @endif

                    <div>
                        <dt class="text-sm font-medium text-gray-500">Created At</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $blogPost->created_at->format('M d, Y H:i') }}</dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-500">Updated At</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $blogPost->updated_at->format('M d, Y H:i') }}</dd>
                    </div>
                </dl>
            </div>

            {{-- Actions --}}
            <div class="bg-white rounded-lg shadow p-6">
                <h4 class="text-lg font-medium text-gray-900 mb-4">Actions</h4>
                
                <div class="space-y-3">
                    <a href="{{ route('admin.blog-posts.edit', $blogPost) }}" 
                       class="w-full bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition-colors text-center block">
                        Edit Post
                    </a>
                    
                    @if($blogPost->status === 'published')
                        <a href="{{ route('blog.show', ['locale' => 'en', 'slug' => $blogPost->slug]) }}" 
                           target="_blank"
                           class="w-full bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg font-medium transition-colors text-center block">
                            View Live Post
                        </a>
                    @endif
                    
                    <form method="POST" action="{{ route('admin.blog-posts.destroy', $blogPost) }}" 
                          onsubmit="return confirm('Are you sure you want to delete this post?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="w-full bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                            Delete Post
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Back Button --}}
    <div class="mt-8">
        <a href="{{ route('admin.blog-posts.index') }}" 
           class="inline-flex items-center text-blue-600 hover:text-blue-700 font-medium">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
            Back to Blog Posts
        </a>
    </div>
</x-admin.layouts.app>
