<x-layouts.app>
    {{-- Hero Section --}}
    <section class="bg-gradient-to-br from-green-900 via-green-800 to-blue-900 pt-20 pb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center text-white">
                <div class="mb-6">
                    <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-green-500/20 text-green-200 border border-green-400/30">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"/>
                        </svg>
                        @if(app()->getLocale() === 'uk')
                            Хмарні сервіси
                        @else
                            Cloud Services
                        @endif
                    </span>
                </div>
                <h1 class="text-5xl lg:text-6xl font-bold mb-6">
                    @if(app()->getLocale() === 'uk')
                        Хмарні рішення для <span class="text-green-400">сучасного бізнесу</span>
                    @else
                        Cloud Solutions for <span class="text-green-400">Modern Business</span>
                    @endif
                </h1>
                <p class="text-xl text-green-100 max-w-4xl mx-auto leading-relaxed">
                    @if(app()->getLocale() === 'uk')
                        Масштабуйте ваш бізнес з надійними хмарними рішеннями. Від стратегії до впровадження - ми забезпечуємо безперебійну міграцію та оптимізацію.
                    @else
                        Scale your business with reliable cloud solutions. From strategy to implementation - we ensure seamless migration and optimization.
                    @endif
                </p>
            </div>
        </div>
    </section>

    {{-- Services Grid --}}
    <section class="bg-white py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-20">
                {{-- Cloud Strategy --}}
                <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-2xl p-8">
                    <div class="w-16 h-16 bg-green-600 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">
                        @if(app()->getLocale() === 'uk')
                            Консалтинг хмарної стратегії
                        @else
                            Cloud Strategy Consulting
                        @endif
                    </h3>
                    <p class="text-gray-600 mb-6">
                        @if(app()->getLocale() === 'uk')
                            Розробляємо комплексні стратегії переходу в хмару, що відповідають вашим бізнес-цілям
                        @else
                            Develop comprehensive cloud transition strategies aligned with your business goals
                        @endif
                    </p>
                    <ul class="space-y-3">
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            @if(app()->getLocale() === 'uk')
                                Аудит поточної інфраструктури
                            @else
                                Current infrastructure audit
                            @endif
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            @if(app()->getLocale() === 'uk')
                                Вибір оптимального хмарного провайдера
                            @else
                                Optimal cloud provider selection
                            @endif
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            @if(app()->getLocale() === 'uk')
                                Планування міграції
                            @else
                                Migration planning
                            @endif
                        </li>
                    </ul>
                </div>

                {{-- Cloud Migration --}}
                <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-8">
                    <div class="w-16 h-16 bg-blue-600 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">
                        @if(app()->getLocale() === 'uk')
                            Міграція в хмару
                        @else
                            Cloud Migration
                        @endif
                    </h3>
                    <p class="text-gray-600 mb-6">
                        @if(app()->getLocale() === 'uk')
                            Безпечний та ефективний перенос ваших додатків та даних у хмарне середовище
                        @else
                            Safe and efficient transfer of your applications and data to cloud environment
                        @endif
                    </p>
                    <ul class="space-y-3">
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            @if(app()->getLocale() === 'uk')
                                Міграція без простоїв
                            @else
                                Zero-downtime migration
                            @endif
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            @if(app()->getLocale() === 'uk')
                                Безпека даних
                            @else
                                Data security
                            @endif
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            @if(app()->getLocale() === 'uk')
                                Оптимізація витрат
                            @else
                                Cost optimization
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="bg-green-600 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                @if(app()->getLocale() === 'uk')
                    Готові перейти в хмару?
                @else
                    Ready to Move to the Cloud?
                @endif
            </h2>
            <p class="text-xl text-green-100 mb-8 max-w-2xl mx-auto">
                @if(app()->getLocale() === 'uk')
                    Отримайте безкоштовну оцінку вашої інфраструктури та план міграції
                @else
                    Get a free assessment of your infrastructure and migration plan
                @endif
            </p>
            <a href="{{ route('contact', ['locale' => app()->getLocale()]) }}" 
               class="bg-white hover:bg-gray-100 text-green-600 px-8 py-4 rounded-lg font-semibold transition-all transform hover:scale-105">
                @if(app()->getLocale() === 'uk')
                    Розпочати проект
                @else
                    Start Your Project
                @endif
            </a>
        </div>
    </section>
</x-layouts.app>
