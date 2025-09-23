<x-layouts.app>
    {{-- Hero Section --}}
    <section class="bg-white pt-20 pb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="flex justify-center mb-8" aria-label="Breadcrumb">
                <ol class="flex items-center space-x-2 text-sm">
                    <li>
                        <a href="{{ route('home', ['locale' => app()->getLocale()]) }}" 
                           class="text-gray-500 hover:text-gray-700">
                            {{ __('app.home') }}
                        </a>
                    </li>
                    <li class="text-gray-400">/</li>
                    <li>
                        <a href="{{ route('blog', ['locale' => app()->getLocale()]) }}" 
                           class="text-gray-500 hover:text-gray-700">
                            @if(app()->getLocale() === 'uk')
                                Блог
                            @else
                                Blog
                            @endif
                        </a>
                    </li>
                    <li class="text-gray-400">/</li>
                    <li class="text-gray-900">{{ $category->getLocalizedName() }}</li>
                </ol>
            </nav>

            <div class="text-center">
                <div class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium border mb-6" 
                     style="background-color: {{ $category->color }}20; color: {{ $category->color }}; border-color: {{ $category->color }}40;">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                    </svg>
                    {{ $category->getLocalizedName() }}
                </div>
                
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                    {{ $category->getLocalizedName() }}
                </h1>
                
                @if($category->getLocalizedDescription())
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                        {{ $category->getLocalizedDescription() }}
                    </p>
                @endif
            </div>
        </div>
    </section>

    {{-- Posts Grid --}}
    <section class="bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($posts->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($posts as $post)
                        <article class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition-shadow">
                            <div class="p-6">
                                <div class="flex items-center mb-3">
                                    <span class="text-sm text-gray-500">
                                        {{ $post->published_at->format('M d, Y') }}
                                    </span>
                                    <span class="ml-auto text-sm text-gray-500">
                                        {{ $post->reading_time }} 
                                        @if(app()->getLocale() === 'uk')
                                            хв
                                        @else
                                            min
                                        @endif
                                    </span>
                                </div>

                                <h3 class="text-xl font-bold text-gray-900 mb-3 hover:text-blue-600 transition-colors">
                                    <a href="{{ route('blog.show', ['locale' => app()->getLocale(), 'slug' => $post->slug]) }}">
                                        {{ $post->getLocalizedTitle() }}
                                    </a>
                                </h3>
                                
                                <p class="text-gray-600 mb-4 leading-relaxed">
                                    {{ Str::limit($post->getLocalizedExcerpt(), 120) }}
                                </p>

                                @if($post->tags && count($post->tags) > 0)
                                    <div class="flex flex-wrap gap-2 mb-4">
                                        @foreach(array_slice($post->tags, 0, 3) as $tag)
                                            <span class="px-2 py-1 bg-gray-100 text-gray-600 text-xs rounded-full">
                                                {{ $tag }}
                                            </span>
                                        @endforeach
                                    </div>
                                @endif

                                <a href="{{ route('blog.show', ['locale' => app()->getLocale(), 'slug' => $post->slug]) }}" 
                                   class="inline-flex items-center text-blue-600 hover:text-blue-700 font-medium">
                                    @if(app()->getLocale() === 'uk')
                                        Читати далі
                                    @else
                                        Read More
                                    @endif
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                    </svg>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>

                {{-- Pagination --}}
                <div class="mt-12">
                    {{ $posts->links() }}
                </div>
            @else
                <div class="text-center py-16">
                    <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">
                        @if(app()->getLocale() === 'uk')
                            Статей у цій категорії поки немає
                        @else
                            No articles in this category yet
                        @endif
                    </h3>
                    <p class="text-gray-600 mb-4">
                        @if(app()->getLocale() === 'uk')
                            Перегляньте інші категорії або поверніться пізніше
                        @else
                            Check other categories or come back later
                        @endif
                    </p>
                    <a href="{{ route('blog', ['locale' => app()->getLocale()]) }}" 
                       class="text-blue-600 hover:text-blue-700 font-medium">
                        ← 
                        @if(app()->getLocale() === 'uk')
                            Повернутися до блогу
                        @else
                            Back to Blog
                        @endif
                    </a>
                </div>
            @endif
        </div>
    </section>
</x-layouts.app>
