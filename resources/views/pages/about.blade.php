<x-layouts.app>
    {{-- Hero Section --}}
    <section class="bg-gradient-to-br from-trust-50 via-white to-navy-50 pt-20 pb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-navy-900 mb-4">
                    {{ __('app.about_title') }}
                </h1>
                <p class="text-xl text-navy-700 max-w-3xl mx-auto">
                    {{ __('app.about_description') }}
                </p>
            </div>
        </div>
    </section>

    {{-- Team Values --}}
    <section class="bg-white py-20">
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
    <section class="bg-gradient-to-r from-trust-50 via-gray-50 to-navy-50 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-navy-900 mb-4">
                    {{ __('app.work_process') }}
                </h2>
                <p class="text-xl text-navy-700">
                    {{ __('app.work_process_desc') }}
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                {{-- Step 1 --}}
                <div class="text-center group">
                    <div class="w-16 h-16 bg-trust-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-trust-200 transition-colors shadow-md">
                        <span class="text-2xl font-bold text-trust-600">1</span>
                    </div>
                    <h3 class="text-xl font-semibold text-navy-900 mb-2">
                        {{ __('app.analysis') }}
                    </h3>
                    <p class="text-navy-700">
                        {{ __('app.analysis_desc') }}
                    </p>
                </div>

                {{-- Step 2 --}}
                <div class="text-center group">
                    <div class="w-16 h-16 bg-trust-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-trust-200 transition-colors shadow-md">
                        <span class="text-2xl font-bold text-trust-600">2</span>
                    </div>
                    <h3 class="text-xl font-semibold text-navy-900 mb-2">
                        {{ __('app.design') }}
                    </h3>
                    <p class="text-navy-700">
                        {{ __('app.design_desc') }}
                    </p>
                </div>

                {{-- Step 3 --}}
                <div class="text-center group">
                    <div class="w-16 h-16 bg-trust-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-trust-200 transition-colors shadow-md">
                        <span class="text-2xl font-bold text-trust-600">3</span>
                    </div>
                    <h3 class="text-xl font-semibold text-navy-900 mb-2">
                        {{ __('app.development') }}
                    </h3>
                    <p class="text-navy-700">
                        {{ __('app.development_desc') }}
                    </p>
                </div>

                {{-- Step 4 --}}
                <div class="text-center group">
                    <div class="w-16 h-16 bg-trust-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-trust-200 transition-colors shadow-md">
                        <span class="text-2xl font-bold text-trust-600">4</span>
                    </div>
                    <h3 class="text-xl font-semibold text-navy-900 mb-2">
                        {{ __('app.launch') }}
                    </h3>
                    <p class="text-navy-700">
                        {{ __('app.launch_desc') }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Technologies Section --}}
    <section class="bg-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-navy-900 mb-4">
                    {{ __('app.technologies_tools') }}
                </h2>
                <p class="text-xl text-navy-700">
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
                        <div class="w-16 h-16 bg-trust-50 border border-trust-200 rounded-lg flex items-center justify-center mx-auto mb-3 group-hover:bg-trust-100 group-hover:border-trust-300 transition-colors shadow-sm">
                            <span class="text-2xl font-bold text-trust-600">
                                {{ substr($tech['name'], 0, 1) }}
                            </span>
                        </div>
                        <h3 class="text-sm font-medium text-navy-900">{{ $tech['name'] }}</h3>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="bg-gradient-to-br from-trust-600 via-trust-700 to-navy-800 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                {{ __('app.ready_to_start') }}
            </h2>
            <p class="text-xl text-trust-100 mb-8 max-w-2xl mx-auto">
                {{ __('app.ready_to_start_desc') }}
            </p>
            <a href="{{ route('contact', ['locale' => app()->getLocale()]) }}" 
               class="bg-white hover:bg-trust-50 text-trust-700 hover:text-trust-800 px-8 py-3 rounded-lg font-medium transition-all shadow-lg hover:shadow-xl transform hover:scale-105">
                {{ __('app.get_consultation') }}
            </a>
        </div>
    </section>
</x-layouts.app>
