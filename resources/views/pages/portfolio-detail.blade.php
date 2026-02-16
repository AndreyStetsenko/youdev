<x-layouts.app>
    {{-- Structured Data for Portfolio --}}
    <script type="application/ld+json">
    {!! json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'CreativeWork',
        'name' => $portfolio->getLocalizedTitle(),
        'description' => $portfolio->getLocalizedDescription(),
        'url' => route('portfolio.show', ['locale' => app()->getLocale(), 'slug' => $portfolio->slug]),
        'image' => $portfolio->image ? asset('storage/' . $portfolio->image) : asset('images/og-default.png'),
        'author' => [
            '@type' => 'Organization',
            'name' => 'YouDev'
        ],
        'dateCreated' => $portfolio->created_at->toW3cString(),
        'dateModified' => $portfolio->updated_at->toW3cString(),
        'inLanguage' => app()->getLocale(),
        'genre' => $portfolio->category,
        'keywords' => $portfolio->tags ? implode(', ', $portfolio->tags) : '',
        'about' => [
            '@type' => 'Thing',
            'name' => __('app.project_' . $portfolio->category)
        ]
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
    </script>
    {{-- Hero --}}
    <section class="bg-navy-950 pt-24 pb-20 relative overflow-hidden">
        <div class="absolute inset-0 bg-grid-subtle opacity-20"></div>
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <nav class="flex justify-center mb-6" aria-label="Breadcrumb">
                <ol class="flex items-center space-x-2 text-sm">
                    <li><a href="{{ route('home', ['locale' => app()->getLocale()]) }}" class="text-navy-400 hover:text-white transition-colors">{{ __('app.home') }}</a></li>
                    <li class="text-navy-500">/</li>
                    <li><a href="{{ route('portfolio', ['locale' => app()->getLocale()]) }}" class="text-navy-400 hover:text-white transition-colors">{{ __('app.portfolio') }}</a></li>
                    <li class="text-navy-500">/</li>
                    <li class="text-white font-medium truncate max-w-[200px] sm:max-w-none">{{ $portfolio->getLocalizedTitle() }}</li>
                </ol>
            </nav>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6">
                {{ $portfolio->getLocalizedTitle() }}
            </h1>
            <div class="flex flex-wrap justify-center gap-3 mb-8">
                <span class="px-4 py-2 bg-trust-500/20 text-trust-300 rounded-xl font-medium border border-trust-400/30">
                    {{ __('app.project_' . $portfolio->category) }}
                </span>
                    @if($portfolio->status === 'completed')
                        <span class="px-4 py-2 bg-green-500/20 text-green-300 rounded-xl font-medium border border-green-400/30">
                            @if(app()->getLocale() === 'uk') Завершено @else Completed @endif
                        </span>
                    @endif
                    @if($portfolio->is_featured)
                        <span class="px-4 py-2 bg-amber-500/20 text-amber-300 rounded-xl font-medium border border-amber-400/30">
                            ⭐ @if(app()->getLocale() === 'uk') Рекомендований @else Featured @endif
                        </span>
                    @endif
            </div>
            <div class="flex flex-wrap justify-center gap-4">
                    @if($portfolio->url)
                        <a href="{{ $portfolio->url }}" target="_blank"
                           class="bg-trust-500 hover:bg-trust-400 text-white px-6 py-3 rounded-xl font-semibold transition-colors inline-flex items-center shadow-lg shadow-trust-500/25">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                            </svg>
                            {{ __('app.live_demo') }}
                        </a>
                    @endif
                    @if($portfolio->github_url)
                        <a href="{{ $portfolio->github_url }}" target="_blank"
                           class="bg-navy-800 hover:bg-navy-700 text-white px-6 py-3 rounded-xl font-semibold transition-colors inline-flex items-center border border-navy-600">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 0C5.374 0 0 5.373 0 12 0 17.302 3.438 21.8 8.207 23.387c.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23A11.509 11.509 0 0112 5.803c1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.30.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576C20.566 21.797 24 17.3 24 12c0-6.627-5.373-12-12-12z"/>
                            </svg>
                            {{ __('app.github_link') }}
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </section>

    @if($portfolio->image)
        <section class="bg-navy-50 py-16 lg:py-24">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="rounded-2xl overflow-hidden shadow-xl border border-navy-100">
                    <img src="{{ asset('storage/' . $portfolio->image) }}" 
                         alt="{{ $portfolio->getLocalizedTitle() }}" 
                         class="w-full h-96 object-cover">
                </div>
            </div>
        </section>
    @endif

    {{-- Presentation PDF --}}
    @if($portfolio->presentation_pdf ?? null)
        <section class="bg-white py-16 lg:py-24">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-2xl font-bold text-navy-900">
                        @if(app()->getLocale() === 'uk') Презентація @else Presentation @endif
                    </h2>
                    <a href="{{ asset('storage/' . $portfolio->presentation_pdf) }}" target="_blank" rel="noopener"
                       class="text-trust-600 hover:text-trust-700 font-semibold inline-flex items-center gap-2">
                        @if(app()->getLocale() === 'uk')
                            Відкрити в новій вкладці
                        @else
                            Open in new tab
                        @endif
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                        </svg>
                    </a>
                </div>
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden" style="min-height: 600px;">
                    <iframe src="{{ asset('storage/' . $portfolio->presentation_pdf) }}#toolbar=1&navpanes=1" 
                            class="w-full border-0"
                            style="height: 75vh; min-height: 600px;"
                            title="{{ $portfolio->getLocalizedTitle() }} — PDF">
                    </iframe>
                </div>
            </div>
        </section>
    @endif

    {{-- Project Details --}}
    <section class="bg-navy-50 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                {{-- Main Content --}}
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl p-8 shadow-sm">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">
                            @if(app()->getLocale() === 'uk')
                                Про проект
                            @else
                                About the Project
                            @endif
                        </h2>
                        
                        <div class="prose prose-lg max-w-none">
                            <p class="text-gray-700 leading-relaxed text-lg">
                                {{ $portfolio->getLocalizedDescription() }}
                            </p>
                        </div>

                        {{-- Technologies Used --}}
                        <div class="mt-8">
                            <h3 class="text-xl font-semibold text-gray-900 mb-4">
                                @if(app()->getLocale() === 'uk')
                                    Використані технології
                                @else
                                    Technologies Used
                                @endif
                            </h3>
                            <div class="flex flex-wrap gap-3">
                                @foreach($portfolio->technologies as $tech)
                                    <span class="px-4 py-2 bg-gray-100 text-gray-800 rounded-lg font-medium hover:bg-gray-200 transition-colors">
                                        {{ $tech }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Sidebar --}}
                <div class="space-y-8">
                    {{-- Project Info --}}
                    <div class="bg-white rounded-xl p-6 shadow-sm">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">
                            {{ __('app.project_info') }}
                        </h3>
                        <div class="space-y-3">
                            <div>
                                <span class="text-sm font-medium text-gray-500">
                                    {{ __('app.category') }}
                                </span>
                                <p class="text-gray-900">{{ __('app.project_' . $portfolio->category) }}</p>
                            </div>
                            <div>
                                <span class="text-sm font-medium text-gray-500">
                                    @if(app()->getLocale() === 'uk')
                                        Статус:
                                    @else
                                        Status:
                                    @endif
                                </span>
                                <p class="text-gray-900">
                                    @if($portfolio->status === 'completed')
                                        @if(app()->getLocale() === 'uk')
                                            Завершено
                                        @else
                                            Completed
                                        @endif
                                    @elseif($portfolio->status === 'in_progress')
                                        @if(app()->getLocale() === 'uk')
                                            В процесі
                                        @else
                                            In Progress
                                        @endif
                                    @endif
                                </p>
                            </div>
                            @if($portfolio->url)
                                <div>
                                    <span class="text-sm font-medium text-gray-500">
                                        @if(app()->getLocale() === 'uk')
                                            Веб-сайт:
                                        @else
                                            Website:
                                        @endif
                                    </span>
                                    <p>
                                        <a href="{{ $portfolio->url }}" target="_blank" 
                                           class="text-blue-600 hover:text-blue-800 break-all">
                                            {{ parse_url($portfolio->url, PHP_URL_HOST) }}
                                        </a>
                                    </p>
                                </div>
                            @endif
                        </div>
                    </div>

                    {{-- Contact CTA --}}
                    <div class="bg-navy-900 rounded-2xl p-6 text-white border border-navy-700">
                        <h3 class="text-lg font-semibold mb-3">
                            @if(app()->getLocale() === 'uk')
                                Хочете подібний проект?
                            @else
                                Want a Similar Project?
                            @endif
                        </h3>
                        <p class="text-navy-300 mb-4">
                            @if(app()->getLocale() === 'uk')
                                Розкажіть нам про свої потреби
                            @else
                                Tell us about your needs
                            @endif
                        </p>
                        <a href="{{ route('contact', ['locale' => app()->getLocale()]) }}" 
                           class="bg-white hover:bg-navy-50 text-trust-600 px-6 py-2 rounded-xl font-semibold transition-colors inline-block">
                            {{ __('app.get_consultation') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Related Projects --}}
    @if($relatedProjects->count() > 0)
        <section class="bg-white py-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">
                        @if(app()->getLocale() === 'uk')
                            Схожі проекти
                        @else
                            Related Projects
                        @endif
                    </h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($relatedProjects as $project)
                        <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition-shadow">
                            @if($project->image)
                                <img src="{{ asset('storage/' . $project->image) }}" 
                                     alt="{{ $project->getLocalizedTitle() }}" 
                                     class="w-full h-48 object-cover">
                            @else
                                <div class="w-full h-48 bg-gradient-to-br from-blue-100 to-purple-100 flex items-center justify-center">
                                    <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                    </svg>
                                </div>
                            @endif
                            
                            <div class="p-6">
                                <h3 class="text-xl font-semibold text-gray-900 mb-2">
                                    <a href="{{ route('portfolio.show', ['locale' => app()->getLocale(), 'slug' => $project->slug]) }}" 
                                       class="hover:text-blue-600 transition-colors">
                                        {{ $project->getLocalizedTitle() }}
                                    </a>
                                </h3>
                                <p class="text-gray-600 mb-4">
                                    {{ Str::limit($project->getLocalizedDescription(), 100) }}
                                </p>
                                <a href="{{ route('portfolio.show', ['locale' => app()->getLocale(), 'slug' => $project->slug]) }}" 
                                   class="text-blue-600 hover:text-blue-700 font-medium">
                                    {{ __('app.view_project') }} →
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- CTA Section --}}
    <section class="bg-navy-950 py-24">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
                @if(app()->getLocale() === 'uk') Готові почати свій проект? @else Ready to Start Your Project? @endif
            </h2>
            <p class="text-xl text-navy-300 mb-10 max-w-2xl mx-auto">
                @if(app()->getLocale() === 'uk') Розкажіть нам про свої ідеї @else Tell us about your ideas @endif
            </p>
            <a href="{{ route('contact', ['locale' => app()->getLocale()]) }}"
               class="inline-flex items-center bg-trust-500 hover:bg-trust-400 text-white px-10 py-4 rounded-xl font-semibold transition-all shadow-lg shadow-trust-500/25">
                {{ __('app.get_consultation') }}
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
    </section>
</x-layouts.app>