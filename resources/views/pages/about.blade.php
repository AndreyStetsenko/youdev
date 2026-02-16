<x-layouts.app>
    {{-- Hero --}}
    <section class="bg-navy-950 pt-24 pb-20 relative overflow-hidden">
        <div class="absolute inset-0 bg-grid-subtle opacity-20"></div>
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <p class="section-label text-trust-400 mb-4">{{ __('app.about') }}</p>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6">
                {{ __('app.about_title') }}
            </h1>
            <p class="text-xl text-navy-300 max-w-2xl mx-auto">
                {{ __('app.about_description') }}
            </p>
        </div>
    </section>

    {{-- Team Values --}}
    <section class="bg-white py-24 lg:py-32">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl font-bold text-navy-900 mb-6">
                        {{ __('app.about_subtitle') }}
                    </h2>
                    <div class="space-y-6">
                        <div class="flex items-start group">
                            <div class="flex-shrink-0 w-12 h-12 bg-trust-100 rounded-lg flex items-center justify-center group-hover:bg-trust-200 transition-colors shadow-sm">
                                <svg class="w-6 h-6 text-trust-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold text-navy-900 mb-2">
                                    {{ __('app.quality') }}
                                </h3>
                                <p class="text-navy-700">
                                    {{ __('app.quality_desc') }}
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start group">
                            <div class="flex-shrink-0 w-12 h-12 bg-trust-100 rounded-lg flex items-center justify-center group-hover:bg-trust-200 transition-colors shadow-sm">
                                <svg class="w-6 h-6 text-trust-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold text-navy-900 mb-2">
                                    {{ __('app.innovation') }}
                                </h3>
                                <p class="text-navy-700">
                                    {{ __('app.innovation_desc') }}
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start group">
                            <div class="flex-shrink-0 w-12 h-12 bg-trust-100 rounded-lg flex items-center justify-center group-hover:bg-trust-200 transition-colors shadow-sm">
                                <svg class="w-6 h-6 text-trust-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold text-navy-900 mb-2">
                                    {{ __('app.collaboration') }}
                                </h3>
                                <p class="text-navy-700">
                                    {{ __('app.collaboration_desc') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="relative">
                    <div class="aspect-square bg-gradient-to-br from-trust-500 to-navy-600 rounded-3xl p-8 shadow-2xl">
                        <div class="w-full h-full bg-white/10 backdrop-blur-sm rounded-2xl flex items-center justify-center">
                            <div class="text-center text-white">
                                <svg class="w-24 h-24 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                                <h3 class="text-2xl font-bold">
                                    {{ __('app.our_team') }}
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Process Section --}}
    <section class="bg-navy-50 py-24 lg:py-32">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-16">
                <p class="section-label mb-3">01</p>
                <h2 class="text-4xl lg:text-5xl font-bold text-navy-900 mb-4">
                    {{ __('app.work_process') }}
                </h2>
                <p class="text-xl text-navy-600 max-w-2xl">
                    {{ __('app.work_process_desc') }}
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">
                {{-- Step 1 --}}
                <div class="text-center group">
                    <span class="text-5xl font-extrabold text-trust-200/80 leading-none">01</span>
                    <div class="mt-4">
                        <h3 class="text-xl font-bold text-navy-900 mb-2">{{ __('app.analysis') }}</h3>
                        <p class="text-navy-600">{{ __('app.analysis_desc') }}</p>
                    </div>
                </div>

                {{-- Step 2 --}}
                <div class="text-center group">
                    <span class="text-5xl font-extrabold text-trust-200/80 leading-none">02</span>
                    <div class="mt-4">
                        <h3 class="text-xl font-bold text-navy-900 mb-2">{{ __('app.design') }}</h3>
                        <p class="text-navy-600">{{ __('app.design_desc') }}</p>
                    </div>
                </div>

                {{-- Step 3 --}}
                <div class="text-center group">
                    <span class="text-5xl font-extrabold text-trust-200/80 leading-none">03</span>
                    <div class="mt-4">
                        <h3 class="text-xl font-bold text-navy-900 mb-2">{{ __('app.development') }}</h3>
                        <p class="text-navy-600">{{ __('app.development_desc') }}</p>
                    </div>
                </div>

                {{-- Step 4 --}}
                <div class="text-center group">
                    <span class="text-5xl font-extrabold text-trust-200/80 leading-none">04</span>
                    <div class="mt-4">
                        <h3 class="text-xl font-bold text-navy-900 mb-2">{{ __('app.launch') }}</h3>
                        <p class="text-navy-600">{{ __('app.launch_desc') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Technologies Section --}}
    <section class="bg-white py-24 lg:py-32">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-16">
                <p class="section-label mb-3">02</p>
                <h2 class="text-4xl lg:text-5xl font-bold text-navy-900 mb-4">
                    {{ __('app.technologies_tools') }}
                </h2>
                <p class="text-xl text-navy-600 max-w-2xl">
                    {{ __('app.technologies_desc') }}
                </p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-8">
                @php
                    $technologies = [
                        ['name' => 'Laravel', 'color' => 'text-red-600'],
                        ['name' => 'React', 'color' => 'text-blue-600'],
                        ['name' => 'Vue.js', 'color' => 'text-green-600'],
                        ['name' => 'PHP', 'color' => 'text-purple-600'],
                        ['name' => 'JavaScript', 'color' => 'text-yellow-600'],
                        ['name' => 'Figma', 'color' => 'text-purple-500'],
                        ['name' => 'Adobe XD', 'color' => 'text-pink-600'],
                        ['name' => 'Sketch', 'color' => 'text-yellow-500'],
                        ['name' => 'Google Ads', 'color' => 'text-green-700'],
                        ['name' => 'SEO', 'color' => 'text-blue-700'],
                        ['name' => 'Analytics', 'color' => 'text-orange-600'],
                        ['name' => 'SMM', 'color' => 'text-indigo-600'],
                    ];
                @endphp

                @foreach($technologies as $tech)
                    <div class="text-center group">
                        <div class="w-16 h-16 bg-navy-50 border border-navy-100 rounded-xl flex items-center justify-center mx-auto mb-3 group-hover:bg-trust-50 group-hover:border-trust-200 transition-colors">
                            <span class="text-xl font-bold text-trust-600">
                                {{ substr($tech['name'], 0, 1) }}
                            </span>
                        </div>
                        <h3 class="text-sm font-semibold text-navy-900">{{ $tech['name'] }}</h3>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="bg-navy-950 py-24 lg:py-32">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
                {{ __('app.ready_to_start') }}
            </h2>
            <p class="text-xl text-navy-300 mb-10">
                {{ __('app.ready_to_start_desc') }}
            </p>
            <a href="{{ route('contact', ['locale' => app()->getLocale()]) }}"
               class="inline-flex items-center bg-trust-500 hover:bg-trust-400 text-white px-10 py-4 rounded-xl font-semibold transition-all shadow-lg shadow-trust-500/25">
                {{ __('app.get_consultation') }}
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
    </section>
</x-layouts.app>
