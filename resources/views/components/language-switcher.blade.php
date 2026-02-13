<div class="fixed bottom-4 right-4 z-40" x-data="{ open: false }">
    <div class="relative">
        {{-- Language Toggle Button --}}
        <button @click="open = !open" 
                class="bg-white shadow-lg rounded-full p-3 hover:shadow-xl transition-shadow border border-gray-200">
            <div class="flex items-center space-x-2">
                <span class="text-sm font-medium text-gray-700">
                    {{ strtoupper(app()->getLocale()) }}
                </span>
                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"></path>
                </svg>
            </div>
        </button>

        {{-- Language Options --}}
        <div x-show="open" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 transform scale-95"
             x-transition:enter-end="opacity-100 transform scale-100"
             x-transition:leave="transition ease-in duration-75"
             x-transition:leave-start="opacity-100 transform scale-100"
             x-transition:leave-end="opacity-0 transform scale-95"
             @click.away="open = false"
             class="absolute bottom-full right-0 mb-2 bg-white rounded-lg shadow-lg border border-gray-200 py-2 min-w-[120px]">
            
            @php
                $currentRoute = request()->route()?->getName();
                $routeParams = request()->route()?->parameters() ?? [];
                unset($routeParams['locale']);
                $paramsEn = array_merge($routeParams, ['locale' => 'en']);
                $paramsUk = array_merge($routeParams, ['locale' => 'uk']);
                $urlEn = $currentRoute ? route($currentRoute, $paramsEn) : url('/en');
                $urlUk = $currentRoute ? route($currentRoute, $paramsUk) : url('/uk');
            @endphp

            {{-- English --}}
            <a href="{{ $urlEn }}"
               class="flex items-center px-4 py-2 text-sm hover:bg-gray-50 {{ app()->getLocale() === 'en' ? 'text-blue-600 font-medium' : 'text-gray-700' }}">
                <span class="mr-3">🇺🇸</span>
                English
            </a>

            {{-- Ukrainian --}}
            <a href="{{ $urlUk }}"
               class="flex items-center px-4 py-2 text-sm hover:bg-gray-50 {{ app()->getLocale() === 'uk' ? 'text-blue-600 font-medium' : 'text-gray-700' }}">
                <span class="mr-3">🇺🇦</span>
                Українська
            </a>
        </div>
    </div>
</div>
