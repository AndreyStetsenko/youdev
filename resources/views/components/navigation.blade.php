@php
    $currentRoute = request()->route()?->getName();
    $routeParams = request()->route()?->parameters() ?? [];
    unset($routeParams['locale']);
    $urlEn = $currentRoute ? route($currentRoute, array_merge($routeParams, ['locale' => 'en'])) : url('/en');
    $urlUk = $currentRoute ? route($currentRoute, array_merge($routeParams, ['locale' => 'uk'])) : url('/uk');
@endphp
<nav class="bg-white shadow-lg fixed w-full z-50 border-b border-trust-100" x-data="{ mobileMenuOpen: false, langOpen: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            {{-- Logo --}}
            <div class="flex items-center">
                <a href="{{ route('home', ['locale' => app()->getLocale()]) }}" class="flex items-center group">
                    <div class="flex-shrink-0">
                        <img class="h-8 w-auto" src="{{ asset('images/logo.svg') }}" alt="{{ config('app.name') }}">
                    </div>
                    <div class="ml-2">
                        <span class="text-xl font-bold text-navy-900 group-hover:text-trust-600 transition-colors">YouDev</span>
                    </div>
                </a>
            </div>

            {{-- Desktop Navigation --}}
            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ route('home', ['locale' => app()->getLocale()]) }}" 
                   class="text-navy-700 hover:text-trust-600 px-3 py-2 text-sm font-medium transition-colors relative group">
                    {{ __('app.home') }}
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-trust-600 group-hover:w-full transition-all duration-200"></span>
                </a>
                <a href="{{ route('about', ['locale' => app()->getLocale()]) }}" 
                   class="text-navy-700 hover:text-trust-600 px-3 py-2 text-sm font-medium transition-colors relative group">
                    {{ __('app.about') }}
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-trust-600 group-hover:w-full transition-all duration-200"></span>
                </a>
                <a href="{{ route('portfolio', ['locale' => app()->getLocale()]) }}" 
                   class="text-navy-700 hover:text-trust-600 px-3 py-2 text-sm font-medium transition-colors relative group">
                    {{ __('app.portfolio') }}
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-trust-600 group-hover:w-full transition-all duration-200"></span>
                </a>
                <a href="{{ route('services', ['locale' => app()->getLocale()]) }}" 
                   class="text-navy-700 hover:text-trust-600 px-3 py-2 text-sm font-medium transition-colors relative group">
                    {{ __('app.services') }}
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-trust-600 group-hover:w-full transition-all duration-200"></span>
                </a>
                <a href="{{ route('blog', ['locale' => app()->getLocale()]) }}" 
                   class="text-navy-700 hover:text-trust-600 px-3 py-2 text-sm font-medium transition-colors relative group">
                    {{ __('app.blog') }}
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-trust-600 group-hover:w-full transition-all duration-200"></span>
                </a>
                <a href="{{ route('contact', ['locale' => app()->getLocale()]) }}" 
                   class="text-navy-700 hover:text-trust-600 px-3 py-2 text-sm font-medium transition-colors relative group">
                    {{ __('app.contact') }}
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-trust-600 group-hover:w-full transition-all duration-200"></span>
                </a>

                {{-- Language switcher --}}
                <div class="relative" @click.away="langOpen = false">
                    <button @click="langOpen = !langOpen"
                            class="flex items-center gap-1 text-navy-700 hover:text-trust-600 px-3 py-2 text-sm font-medium transition-colors border border-navy-200 rounded-lg hover:border-trust-400">
                        <span>{{ strtoupper(app()->getLocale()) }}</span>
                        <svg class="w-4 h-4 transition-transform" :class="{ 'rotate-180': langOpen }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div x-show="langOpen"
                         x-transition
                         class="absolute right-0 top-full mt-1 py-1 bg-white rounded-lg shadow-lg border border-gray-200 min-w-[120px]">
                        <a href="{{ $urlEn }}" class="flex items-center px-4 py-2 text-sm hover:bg-gray-50 {{ app()->getLocale() === 'en' ? 'text-trust-600 font-medium' : 'text-gray-700' }}">
                            <span class="mr-2">🇺🇸</span> English
                        </a>
                        <a href="{{ $urlUk }}" class="flex items-center px-4 py-2 text-sm hover:bg-gray-50 {{ app()->getLocale() === 'uk' ? 'text-trust-600 font-medium' : 'text-gray-700' }}">
                            <span class="mr-2">🇺🇦</span> Українська
                        </a>
                    </div>
                </div>

                {{-- CTA Button --}}
                <a href="{{ route('contact', ['locale' => app()->getLocale()]) }}" 
                   class="bg-gradient-to-r from-trust-600 to-trust-700 hover:from-trust-700 hover:to-trust-800 text-white px-4 py-2 rounded-lg text-sm font-medium transition-all shadow-md hover:shadow-lg transform hover:scale-105">
                    {{ __('app.get_consultation') }}
                </a>
            </div>

            {{-- Mobile: language + menu button --}}
            <div class="md:hidden flex items-center gap-3">
                <div class="flex items-center gap-1 text-sm">
                    <a href="{{ $urlEn }}" class="px-2 py-1 rounded {{ app()->getLocale() === 'en' ? 'text-trust-600 font-medium bg-trust-50' : 'text-navy-600' }}">EN</a>
                    <span class="text-navy-300">|</span>
                    <a href="{{ $urlUk }}" class="px-2 py-1 rounded {{ app()->getLocale() === 'uk' ? 'text-trust-600 font-medium bg-trust-50' : 'text-navy-600' }}">UK</a>
                </div>
                <button @click="mobileMenuOpen = !mobileMenuOpen" 
                        class="text-navy-700 hover:text-trust-600 focus:outline-none focus:text-trust-600">
                    <svg class="h-6 w-6" x-show="!mobileMenuOpen" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg class="h-6 w-6" x-show="mobileMenuOpen" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile Navigation --}}
    <div x-show="mobileMenuOpen" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 transform scale-95"
         x-transition:enter-end="opacity-100 transform scale-100"
         x-transition:leave="transition ease-in duration-75"
         x-transition:leave-start="opacity-100 transform scale-100"
         x-transition:leave-end="opacity-0 transform scale-95"
         class="md:hidden">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-white border-t border-trust-100">
            <a href="{{ route('home', ['locale' => app()->getLocale()]) }}" 
               class="text-navy-700 hover:text-trust-600 hover:bg-trust-50 block px-3 py-2 text-base font-medium rounded-lg transition-colors">
                {{ __('app.home') }}
            </a>
            <a href="{{ route('about', ['locale' => app()->getLocale()]) }}" 
               class="text-navy-700 hover:text-trust-600 hover:bg-trust-50 block px-3 py-2 text-base font-medium rounded-lg transition-colors">
                {{ __('app.about') }}
            </a>
            <a href="{{ route('portfolio', ['locale' => app()->getLocale()]) }}" 
               class="text-navy-700 hover:text-trust-600 hover:bg-trust-50 block px-3 py-2 text-base font-medium rounded-lg transition-colors">
                {{ __('app.portfolio') }}
            </a>
            <a href="{{ route('services', ['locale' => app()->getLocale()]) }}" 
               class="text-navy-700 hover:text-trust-600 hover:bg-trust-50 block px-3 py-2 text-base font-medium rounded-lg transition-colors">
                {{ __('app.services') }}
            </a>
            <a href="{{ route('blog', ['locale' => app()->getLocale()]) }}" 
               class="text-navy-700 hover:text-trust-600 hover:bg-trust-50 block px-3 py-2 text-base font-medium rounded-lg transition-colors">
                {{ __('app.blog') }}
            </a>
            <a href="{{ route('contact', ['locale' => app()->getLocale()]) }}" 
               class="text-navy-700 hover:text-trust-600 hover:bg-trust-50 block px-3 py-2 text-base font-medium rounded-lg transition-colors">
                {{ __('app.contact') }}
            </a>
            <a href="{{ route('contact', ['locale' => app()->getLocale()]) }}" 
               class="bg-gradient-to-r from-trust-600 to-trust-700 hover:from-trust-700 hover:to-trust-800 text-white block px-3 py-2 text-base font-medium rounded-lg mt-4 shadow-md">
                {{ __('app.get_consultation') }}
            </a>
            <div class="mt-4 pt-4 border-t border-trust-100 flex gap-4">
                <a href="{{ $urlEn }}" class="text-navy-600 {{ app()->getLocale() === 'en' ? 'font-medium text-trust-600' : '' }}">🇺🇸 English</a>
                <a href="{{ $urlUk }}" class="text-navy-600 {{ app()->getLocale() === 'uk' ? 'font-medium text-trust-600' : '' }}">🇺🇦 Українська</a>
            </div>
        </div>
    </div>
</nav>
