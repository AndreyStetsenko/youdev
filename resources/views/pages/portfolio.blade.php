<x-layouts.app>
    {{-- Hero Section --}}
    <section class="bg-gradient-to-br from-blue-50 via-white to-purple-50 pt-20 pb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                    {{ __('app.portfolio_title') }}
                </h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    @if(app()->getLocale() === 'uk')
                        Ознайомтеся з нашими успішними проектами та рішеннями, які ми створили для наших клієнтів
                    @else
                        Explore our successful projects and solutions we've created for our clients
                    @endif
                </p>
            </div>
        </div>
    </section>

    {{-- Portfolio Filter --}}
    <section class="bg-white py-8 sticky top-16 z-40 border-b">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-wrap justify-center gap-4" x-data="{ activeFilter: 'all' }">
                <button @click="activeFilter = 'all'; filterProjects('all')"
                        :class="activeFilter === 'all' ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'"
                        class="px-6 py-2 rounded-lg font-medium transition-colors">
                    @if(app()->getLocale() === 'uk')
                        Всі проекти
                    @else
                        All Projects
                    @endif
                </button>
                @foreach($categories as $category)
                    <button @click="activeFilter = '{{ $category }}'; filterProjects('{{ $category }}')"
                            :class="activeFilter === '{{ $category }}' ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'"
                            class="px-6 py-2 rounded-lg font-medium transition-colors">
                        {{ __('app.project_' . $category) }}
                    </button>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Portfolio Grid --}}
    <section class="bg-gray-50 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="portfolio-grid">
                @foreach($projects as $project)
                    <div class="portfolio-item bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition-shadow" 
                         data-category="{{ $project->category }}">
                        @if($project->image)
                            <img src="{{ asset('storage/' . $project->image) }}" 
                                 alt="{{ $project->getLocalizedTitle() }}" 
                                 class="w-full h-64 object-cover">
                        @else
                            <div class="w-full h-64 bg-gradient-to-br from-blue-100 to-purple-100 flex items-center justify-center">
                                <svg class="w-20 h-20 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                </svg>
                            </div>
                        @endif
                        
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-3">
                                <span class="px-3 py-1 bg-blue-100 text-blue-700 text-sm rounded-full font-medium">
                                    {{ __('app.project_' . $project->category) }}
                                </span>
                                @if($project->status === 'completed')
                                    <span class="px-3 py-1 bg-green-100 text-green-700 text-sm rounded-full">
                                        @if(app()->getLocale() === 'uk')
                                            Завершено
                                        @else
                                            Completed
                                        @endif
                                    </span>
                                @elseif($project->status === 'in_progress')
                                    <span class="px-3 py-1 bg-yellow-100 text-yellow-700 text-sm rounded-full">
                                        @if(app()->getLocale() === 'uk')
                                            В процесі
                                        @else
                                            In Progress
                                        @endif
                                    </span>
                                @endif
                            </div>

                            <h3 class="text-xl font-semibold text-gray-900 mb-3">
                                <a href="{{ route('portfolio.show', ['locale' => app()->getLocale(), 'slug' => $project->slug]) }}" 
                                   class="hover:text-blue-600 transition-colors">
                                    {{ $project->getLocalizedTitle() }}
                                </a>
                            </h3>
                            
                            <p class="text-gray-600 mb-4 line-clamp-3">
                                {{ $project->getLocalizedDescription() }}
                            </p>

                            {{-- Technologies --}}
                            <div class="flex flex-wrap gap-2 mb-6">
                                @foreach($project->technologies as $tech)
                                    <span class="px-2 py-1 bg-gray-100 text-gray-700 text-xs rounded font-medium">
                                        {{ $tech }}
                                    </span>
                                @endforeach
                            </div>

                            {{-- Project Links --}}
                            <div class="flex items-center justify-between">
                                <a href="{{ route('portfolio.show', ['locale' => app()->getLocale(), 'slug' => $project->slug]) }}" 
                                   class="text-blue-600 hover:text-blue-700 font-medium">
                                    {{ __('app.view_project') }} →
                                </a>
                                <div class="flex space-x-2">
                                    @if($project->url)
                                        <a href="{{ $project->url }}" target="_blank" 
                                           class="text-gray-600 hover:text-gray-700" title="{{ __('app.live_demo') }}">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                            </svg>
                                        </a>
                                    @endif
                                    @if($project->github_url)
                                        <a href="{{ $project->github_url }}" target="_blank" 
                                           class="text-gray-600 hover:text-gray-700" title="{{ __('app.github_link') }}">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M12 0C5.374 0 0 5.373 0 12 0 17.302 3.438 21.8 8.207 23.387c.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23A11.509 11.509 0 0112 5.803c1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576C20.566 21.797 24 17.3 24 12c0-6.627-5.373-12-12-12z"/>
                                            </svg>
                                        </a>
                                    @endif
                                </div>

                                @if($project->is_featured)
                                    <div class="flex items-center text-yellow-600">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                        </svg>
                                        <span class="text-sm font-medium">
                                            @if(app()->getLocale() === 'uk')
                                                Рекомендований
                                            @else
                                                Featured
                                            @endif
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Pagination --}}
            <div class="mt-12">
                {{ $projects->links() }}
            </div>

            {{-- Empty State --}}
            <div id="no-results" class="text-center py-12 hidden">
                <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                <h3 class="text-lg font-medium text-gray-900 mb-2">
                    @if(app()->getLocale() === 'uk')
                        Проектів не знайдено
                    @else
                        No projects found
                    @endif
                </h3>
                <p class="text-gray-600">
                    @if(app()->getLocale() === 'uk')
                        Спробуйте вибрати іншу категорію або переглянути всі проекти
                    @else
                        Try selecting a different category or view all projects
                    @endif
                </p>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="bg-gradient-to-r from-blue-600 to-purple-600 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                @if(app()->getLocale() === 'uk')
                    Хочете такий же проект?
                @else
                    Want a Similar Project?
                @endif
            </h2>
            <p class="text-xl text-blue-100 mb-8 max-w-2xl mx-auto">
                @if(app()->getLocale() === 'uk')
                    Розкажіть нам про свої потреби, і ми створимо унікальне рішення для вашого бізнесу
                @else
                    Tell us about your needs and we'll create a unique solution for your business
                @endif
            </p>
            <a href="{{ route('contact', ['locale' => app()->getLocale()]) }}" 
               class="bg-white hover:bg-gray-100 text-blue-600 px-8 py-3 rounded-lg font-medium transition-colors">
                {{ __('app.get_consultation') }}
            </a>
        </div>
    </section>

    @push('scripts')
    <script>
        function filterProjects(category) {
            const items = document.querySelectorAll('.portfolio-item');
            const noResults = document.getElementById('no-results');
            let visibleCount = 0;

            items.forEach(item => {
                if (category === 'all' || item.dataset.category === category) {
                    item.style.display = 'block';
                    visibleCount++;
                } else {
                    item.style.display = 'none';
                }
            });

            if (visibleCount === 0) {
                noResults.classList.remove('hidden');
            } else {
                noResults.classList.add('hidden');
            }
        }
    </script>
    @endpush
</x-layouts.app>
