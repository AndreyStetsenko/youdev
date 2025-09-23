<x-layouts.app>
    {{-- Hero Section --}}
    <section class="bg-gradient-to-br from-gray-900 via-blue-900 to-purple-900 pt-20 pb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center text-white">
                <h1 class="text-5xl lg:text-6xl font-bold mb-6">
                    @if(app()->getLocale() === 'uk')
                        Блог про технології
                    @else
                        Technology Blog
                    @endif
                </h1>
                <p class="text-xl text-blue-100 max-w-3xl mx-auto leading-relaxed">
                    @if(app()->getLocale() === 'uk')
                        Експертні думки, інсайти та тренди в світі розробки програмного забезпечення
                    @else
                        Expert opinions, insights and trends in the world of software development
                    @endif
                </p>
            </div>
        </div>
    </section>

    {{-- Search and Filter --}}
    <section class="bg-white py-8 border-b">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                {{-- Search --}}
                <form method="GET" class="flex-1 max-w-md">
                    <div class="relative">
                        <input type="text" 
                               name="search" 
                               value="{{ request('search') }}"
                               placeholder="@if(app()->getLocale() === 'uk') Пошук статей... @else Search articles... @endif"
                               class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>
                    </div>
                </form>

                {{-- Categories Filter --}}
                <div class="flex flex-wrap gap-2">
                    <a href="{{ route('blog', ['locale' => app()->getLocale()]) }}" 
                       class="px-4 py-2 rounded-lg font-medium transition-colors {{ !request('category') ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                        @if(app()->getLocale() === 'uk')
                            Всі
                        @else
                            All
                        @endif
                    </a>
                    @foreach($categories as $category)
                        <a href="{{ route('blog.category', ['locale' => app()->getLocale(), 'slug' => $category->slug]) }}" 
                           class="px-4 py-2 rounded-lg font-medium transition-colors {{ request('category') === $category->slug ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                            {{ $category->getLocalizedName() }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- Featured Posts --}}
    @if($featuredPosts->count() > 0 && !request()->hasAny(['search', 'category']))
        <section class="bg-gray-50 py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">
                    @if(app()->getLocale() === 'uk')
                        Рекомендовані статті
                    @else
                        Featured Articles
                    @endif
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach($featuredPosts as $post)
                        <article class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition-shadow">
                            <div class="p-6">
                                <div class="flex items-center mb-3">
                                    <span class="px-3 py-1 text-xs font-medium rounded-full border" 
                                          style="background-color: {{ $post->category->color }}20; color: {{ $post->category->color }}; border-color: {{ $post->category->color }}40;">
                                        {{ $post->category->getLocalizedName() }}
                                    </span>
                                    <span class="ml-auto text-sm text-gray-500">
                                        {{ $post->published_at->format('M d, Y') }}
                                    </span>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 mb-3 hover:text-blue-600 transition-colors">
                                    <a href="{{ route('blog.show', ['locale' => app()->getLocale(), 'slug' => $post->slug]) }}">
                                        {{ $post->getLocalizedTitle() }}
                                    </a>
                                </h3>
                                <p class="text-gray-600 mb-4">
                                    {{ Str::limit($post->getLocalizedExcerpt(), 120) }}
                                </p>
                                <div class="flex items-center justify-between">
                                    <a href="{{ route('blog.show', ['locale' => app()->getLocale(), 'slug' => $post->slug]) }}" 
                                       class="text-blue-600 hover:text-blue-700 font-medium">
                                        @if(app()->getLocale() === 'uk')
                                            Читати далі →
                                        @else
                                            Read More →
                                        @endif
                                    </a>
                                    <span class="text-sm text-gray-500">
                                        {{ $post->reading_time }} 
                                        @if(app()->getLocale() === 'uk')
                                            хв
                                        @else
                                            min
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Blog Posts --}}
    <section class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($posts->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($posts as $post)
                        <article class="bg-white border border-gray-200 rounded-xl overflow-hidden hover:shadow-lg transition-shadow">
                            <div class="p-6">
                                <div class="flex items-center mb-3">
                                    <span class="px-3 py-1 text-xs font-medium rounded-full border" 
                                          style="background-color: {{ $post->category->color }}20; color: {{ $post->category->color }}; border-color: {{ $post->category->color }}40;">
                                        {{ $post->category->getLocalizedName() }}
                                    </span>
                                    <span class="ml-auto text-sm text-gray-500">
                                        {{ $post->published_at->format('M d, Y') }}
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

                                <div class="flex items-center justify-between">
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
                                    <div class="flex items-center text-gray-500 text-sm">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        {{ $post->reading_time }} 
                                        @if(app()->getLocale() === 'uk')
                                            хв
                                        @else
                                            min
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>

                {{-- Pagination --}}
                <div class="mt-12">
                    {{ $posts->withQueryString()->links() }}
                </div>
            @else
                <div class="text-center py-16">
                    <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">
                        @if(app()->getLocale() === 'uk')
                            Статей не знайдено
                        @else
                            No articles found
                        @endif
                    </h3>
                    <p class="text-gray-600">
                        @if(request()->hasAny(['search', 'category']))
                            @if(app()->getLocale() === 'uk')
                                Спробуйте змінити фільтри або пошуковий запит
                            @else
                                Try adjusting your filters or search query
                            @endif
                        @else
                            @if(app()->getLocale() === 'uk')
                                Статті з'являться тут незабаром
                            @else
                                Articles will appear here soon
                            @endif
                        @endif
                    </p>
                </div>
            @endif
        </div>
    </section>

    {{-- Newsletter CTA --}}
    <section class="bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">
                @if(app()->getLocale() === 'uk')
                    Не пропустіть нові статті
                @else
                    Don't Miss New Articles
                @endif
            </h2>
            <p class="text-xl text-gray-600 mb-8 max-w-2xl mx-auto">
                @if(app()->getLocale() === 'uk')
                    Підпишіться на наші оновлення та отримуйте останні інсайти про технології
                @else
                    Subscribe to our updates and get the latest technology insights
                @endif
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center max-w-md mx-auto">
                <input type="email" 
                       placeholder="@if(app()->getLocale() === 'uk') Ваш email @else Your email @endif"
                       class="flex-1 px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-medium transition-colors">
                    @if(app()->getLocale() === 'uk')
                        Підписатися
                    @else
                        Subscribe
                    @endif
                </button>
            </div>
        </div>
    </section>
</x-layouts.app>
