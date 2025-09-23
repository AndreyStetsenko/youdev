<x-layouts.app>
    {{-- Hero Section --}}
    <section class="bg-white pt-20 pb-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="flex mb-8" aria-label="Breadcrumb">
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
                    <li class="text-gray-900">{{ $post->getLocalizedTitle() }}</li>
                </ol>
            </nav>

            <div class="mb-8">
                <div class="flex items-center mb-4">
                    <span class="px-3 py-1 text-sm font-medium rounded-full border" 
                          style="background-color: {{ $post->category->color }}20; color: {{ $post->category->color }}; border-color: {{ $post->category->color }}40;">
                        {{ $post->category->getLocalizedName() }}
                    </span>
                    <span class="ml-4 text-gray-500">{{ $post->published_at->format('F d, Y') }}</span>
                    <span class="ml-4 text-gray-500">
                        {{ $post->reading_time }} 
                        @if(app()->getLocale() === 'uk')
                            хв читання
                        @else
                            min read
                        @endif
                    </span>
                </div>
                
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 leading-tight">
                    {{ $post->getLocalizedTitle() }}
                </h1>
                
                @if($post->getLocalizedExcerpt())
                    <p class="text-xl text-gray-600 mt-6 leading-relaxed">
                        {{ $post->getLocalizedExcerpt() }}
                    </p>
                @endif
            </div>

            <div class="flex items-center justify-between py-6 border-t border-b border-gray-200">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center mr-3">
                        <span class="text-sm font-medium text-gray-700">DS</span>
                    </div>
                    <div>
                        <div class="text-sm font-medium text-gray-900">DevStudio Team</div>
                        <div class="text-sm text-gray-500">
                            @if(app()->getLocale() === 'uk')
                                Автор
                            @else
                                Author
                            @endif
                        </div>
                    </div>
                </div>
                
                {{-- Share buttons --}}
                <div class="flex items-center space-x-3">
                    <span class="text-sm text-gray-500 mr-2">
                        @if(app()->getLocale() === 'uk')
                            Поділитися:
                        @else
                            Share:
                        @endif
                    </span>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($post->getLocalizedTitle()) }}" 
                       target="_blank"
                       class="text-gray-600 hover:text-blue-500 transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                        </svg>
                    </a>
                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}" 
                       target="_blank"
                       class="text-gray-600 hover:text-blue-700 transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Article Content --}}
    <article class="bg-white py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="prose prose-lg max-w-none">
                <div class="text-gray-700 leading-relaxed">
                    {!! nl2br(e($post->getLocalizedContent())) !!}
                </div>
            </div>

            {{-- Tags --}}
            @if($post->tags && count($post->tags) > 0)
                <div class="mt-12 pt-8 border-t border-gray-200">
                    <h4 class="text-lg font-semibold text-gray-900 mb-4">
                        {{ __('app.tags') }}
                    </h4>
                    <div class="flex flex-wrap gap-2">
                        @foreach($post->tags as $tag)
                            <span class="px-3 py-1 bg-gray-100 text-gray-700 rounded-full text-sm font-medium">
                                {{ $tag }}
                            </span>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </article>

    {{-- Related Posts --}}
    @if($relatedPosts->count() > 0)
        <section class="bg-gray-50 py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">
                    @if(app()->getLocale() === 'uk')
                        Схожі статті
                    @else
                        Related Articles
                    @endif
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach($relatedPosts as $relatedPost)
                        <article class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition-shadow">
                            <div class="p-6">
                                <div class="flex items-center mb-3">
                                    <span class="px-3 py-1 text-xs font-medium rounded-full border" 
                                          style="background-color: {{ $relatedPost->category->color }}20; color: {{ $relatedPost->category->color }}; border-color: {{ $relatedPost->category->color }}40;">
                                        {{ $relatedPost->category->getLocalizedName() }}
                                    </span>
                                </div>
                                <h3 class="text-lg font-bold text-gray-900 mb-3 hover:text-blue-600 transition-colors">
                                    <a href="{{ route('blog.show', ['locale' => app()->getLocale(), 'slug' => $relatedPost->slug]) }}">
                                        {{ $relatedPost->getLocalizedTitle() }}
                                    </a>
                                </h3>
                                <p class="text-gray-600 mb-4">
                                    {{ Str::limit($relatedPost->getLocalizedExcerpt(), 100) }}
                                </p>
                                <a href="{{ route('blog.show', ['locale' => app()->getLocale(), 'slug' => $relatedPost->slug]) }}" 
                                   class="text-blue-600 hover:text-blue-700 font-medium">
                                    @if(app()->getLocale() === 'uk')
                                        Читати далі →
                                    @else
                                        Read More →
                                    @endif
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- CTA Section --}}
    <section class="bg-blue-600 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-white mb-4">
                @if(app()->getLocale() === 'uk')
                    Потрібна консультація з технологій?
                @else
                    Need Technology Consultation?
                @endif
            </h2>
            <p class="text-xl text-blue-100 mb-8 max-w-2xl mx-auto">
                @if(app()->getLocale() === 'uk')
                    Наші експерти готові допомогти вам з вашими технологічними викликами
                @else
                    Our experts are ready to help you with your technology challenges
                @endif
            </p>
            <a href="{{ route('contact', ['locale' => app()->getLocale()]) }}" 
               class="bg-white hover:bg-gray-100 text-blue-600 px-8 py-3 rounded-lg font-semibold transition-colors">
                @if(app()->getLocale() === 'uk')
                    Зв'язатися з нами
                @else
                    Contact Us
                @endif
            </a>
        </div>
    </section>
</x-layouts.app>
