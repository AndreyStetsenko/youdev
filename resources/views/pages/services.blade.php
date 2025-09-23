<x-layouts.app>
    {{-- Hero Section --}}
    <section class="bg-gradient-to-br from-blue-50 via-white to-purple-50 pt-20 pb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                    {{ __('app.services_title') }}
                </h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    {{ __('app.services_subtitle') }}
                </p>
            </div>
        </div>
    </section>

    {{-- Main Services --}}
    <section class="bg-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-20">
                {{-- Web Development --}}
                <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-8">
                    <div class="w-16 h-16 bg-blue-600 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9v-9m0-9v9"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">{{ __('app.web_development') }}</h3>
                    <p class="text-gray-600 mb-6">{{ __('app.web_development_desc') }}</p>
                    <div class="space-y-3 mb-6">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span class="text-gray-700">
                                @if(app()->getLocale() === 'uk')
                                    Корпоративні веб-додатки
                                @else
                                    Enterprise web applications
                                @endif
                            </span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span class="text-gray-700">
                                @if(app()->getLocale() === 'uk')
                                    E-commerce платформи
                                @else
                                    E-commerce platforms
                                @endif
                            </span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span class="text-gray-700">
                                @if(app()->getLocale() === 'uk')
                                    CRM та ERP системи
                                @else
                                    CRM and ERP systems
                                @endif
                            </span>
                        </div>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 bg-white text-blue-700 text-sm rounded-full font-medium">Laravel</span>
                        <span class="px-3 py-1 bg-white text-blue-700 text-sm rounded-full font-medium">React</span>
                        <span class="px-3 py-1 bg-white text-blue-700 text-sm rounded-full font-medium">Vue.js</span>
                        <span class="px-3 py-1 bg-white text-blue-700 text-sm rounded-full font-medium">PHP</span>
                    </div>
                </div>

                {{-- UI/UX Design --}}
                <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl p-8">
                    <div class="w-16 h-16 bg-purple-600 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4h4a2 2 0 002-2V5z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">
                        @if(app()->getLocale() === 'uk')
                            UI/UX Дизайн
                        @else
                            UI/UX Design
                        @endif
                    </h3>
                    <p class="text-gray-600 mb-6">
                        @if(app()->getLocale() === 'uk')
                            Створюємо інтуїтивні та привабливі інтерфейси, що забезпечують відмінний користувацький досвід
                        @else
                            We create intuitive and attractive interfaces that provide excellent user experience
                        @endif
                    </p>
                    <div class="space-y-3 mb-6">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-purple-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span class="text-gray-700">
                                @if(app()->getLocale() === 'uk')
                                    UX дослідження та аналіз
                                @else
                                    UX research & analysis
                                @endif
                            </span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-purple-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span class="text-gray-700">
                                @if(app()->getLocale() === 'uk')
                                    Прототипування та wireframing
                                @else
                                    Prototyping & wireframing
                                @endif
                            </span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-purple-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span class="text-gray-700">
                                @if(app()->getLocale() === 'uk')
                                    Тестування користувачів
                                @else
                                    User testing
                                @endif
                            </span>
                        </div>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 bg-white text-purple-700 text-sm rounded-full font-medium">Figma</span>
                        <span class="px-3 py-1 bg-white text-purple-700 text-sm rounded-full font-medium">Adobe XD</span>
                        <span class="px-3 py-1 bg-white text-purple-700 text-sm rounded-full font-medium">Sketch</span>
                        <span class="px-3 py-1 bg-white text-purple-700 text-sm rounded-full font-medium">InVision</span>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                {{-- Digital Marketing --}}
                <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-2xl p-8">
                    <div class="w-16 h-16 bg-green-600 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">
                        @if(app()->getLocale() === 'uk')
                            Цифровий маркетинг
                        @else
                            Digital Marketing
                        @endif
                    </h3>
                    <p class="text-gray-600 mb-6">
                        @if(app()->getLocale() === 'uk')
                            Комплексний підхід до цифрового маркетингу для збільшення впізнаваності бренду та продажів
                        @else
                            Comprehensive digital marketing approach to increase brand awareness and sales
                        @endif
                    </p>
                    <div class="space-y-3 mb-6">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span class="text-gray-700">
                                @if(app()->getLocale() === 'uk')
                                    SEO оптимізація
                                @else
                                    SEO optimization
                                @endif
                            </span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span class="text-gray-700">
                                @if(app()->getLocale() === 'uk')
                                    SMM та реклама
                                @else
                                    SMM & advertising
                                @endif
                            </span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span class="text-gray-700">
                                @if(app()->getLocale() === 'uk')
                                    Контент-маркетинг
                                @else
                                    Content marketing
                                @endif
                            </span>
                        </div>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 bg-white text-green-700 text-sm rounded-full font-medium">Google Ads</span>
                        <span class="px-3 py-1 bg-white text-green-700 text-sm rounded-full font-medium">Facebook Ads</span>
                        <span class="px-3 py-1 bg-white text-green-700 text-sm rounded-full font-medium">SEO</span>
                        <span class="px-3 py-1 bg-white text-green-700 text-sm rounded-full font-medium">Analytics</span>
                    </div>
                </div>

                {{-- Marketing Strategy --}}
                <div class="bg-gradient-to-br from-orange-50 to-orange-100 rounded-2xl p-8">
                    <div class="w-16 h-16 bg-orange-600 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">
                        @if(app()->getLocale() === 'uk')
                            Маркетингова стратегія
                        @else
                            Marketing Strategy
                        @endif
                    </h3>
                    <p class="text-gray-600 mb-6">
                        @if(app()->getLocale() === 'uk')
                            Розробляємо комплексну маркетингову стратегію для досягнення ваших бізнес-цілей
                        @else
                            We develop comprehensive marketing strategies to achieve your business goals
                        @endif
                    </p>
                    <div class="space-y-3 mb-6">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-orange-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span class="text-gray-700">
                                @if(app()->getLocale() === 'uk')
                                    Аналіз ринку та конкурентів
                                @else
                                    Market & competitor analysis
                                @endif
                            </span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-orange-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span class="text-gray-700">
                                @if(app()->getLocale() === 'uk')
                                    Визначення цільової аудиторії
                                @else
                                    Target audience definition
                                @endif
                            </span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-orange-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span class="text-gray-700">
                                @if(app()->getLocale() === 'uk')
                                    План дій та метрики
                                @else
                                    Action plan & metrics
                                @endif
                            </span>
                        </div>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 bg-white text-orange-700 text-sm rounded-full font-medium">
                            @if(app()->getLocale() === 'uk')
                                Стратегія
                            @else
                                Strategy
                            @endif
                        </span>
                        <span class="px-3 py-1 bg-white text-orange-700 text-sm rounded-full font-medium">
                            @if(app()->getLocale() === 'uk')
                                Аналіз
                            @else
                                Analysis
                            @endif
                        </span>
                        <span class="px-3 py-1 bg-white text-orange-700 text-sm rounded-full font-medium">
                            @if(app()->getLocale() === 'uk')
                                Метрики
                            @else
                                Metrics
                            @endif
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Process Section --}}
    <section class="bg-gray-50 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    @if(app()->getLocale() === 'uk')
                        Як ми працюємо
                    @else
                        How We Work
                    @endif
                </h2>
                <p class="text-xl text-gray-600">
                    @if(app()->getLocale() === 'uk')
                        Прозорий та ефективний процес від ідеї до реалізації
                    @else
                        Transparent and efficient process from idea to implementation
                    @endif
                </p>
            </div>

            <div class="relative">
                {{-- Timeline line --}}
                <div class="absolute left-1/2 transform -translate-x-1/2 w-1 h-full bg-gradient-to-b from-blue-500 to-purple-500 hidden lg:block"></div>

                <div class="space-y-12 lg:space-y-24">
                    {{-- Step 1 --}}
                    <div class="relative flex items-center">
                        <div class="lg:w-1/2 lg:pr-12">
                            <div class="bg-white rounded-xl p-8 shadow-sm hover:shadow-lg transition-shadow">
                                <div class="flex items-center mb-4">
                                    <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center text-white font-bold text-xl">1</div>
                                    <h3 class="text-xl font-semibold text-gray-900 ml-4">
                                        @if(app()->getLocale() === 'uk')
                                            Консультація та аналіз
                                        @else
                                            Consultation & Analysis
                                        @endif
                                    </h3>
                                </div>
                                <p class="text-gray-600">
                                    @if(app()->getLocale() === 'uk')
                                        Детально вивчаємо ваші потреби, аналізуємо бізнес-процеси та визначаємо технічні вимоги до проекту.
                                    @else
                                        We thoroughly study your needs, analyze business processes, and define technical project requirements.
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="absolute left-1/2 transform -translate-x-1/2 w-6 h-6 bg-blue-600 rounded-full border-4 border-white hidden lg:block"></div>
                        <div class="lg:w-1/2 lg:pl-12 hidden lg:block"></div>
                    </div>

                    {{-- Step 2 --}}
                    <div class="relative flex items-center">
                        <div class="lg:w-1/2 lg:pr-12 hidden lg:block"></div>
                        <div class="absolute left-1/2 transform -translate-x-1/2 w-6 h-6 bg-green-600 rounded-full border-4 border-white hidden lg:block"></div>
                        <div class="lg:w-1/2 lg:pl-12">
                            <div class="bg-white rounded-xl p-8 shadow-sm hover:shadow-lg transition-shadow">
                                <div class="flex items-center mb-4">
                                    <div class="w-12 h-12 bg-green-600 rounded-full flex items-center justify-center text-white font-bold text-xl">2</div>
                                    <h3 class="text-xl font-semibold text-gray-900 ml-4">
                                        @if(app()->getLocale() === 'uk')
                                            Планування та дизайн
                                        @else
                                            Planning & Design
                                        @endif
                                    </h3>
                                </div>
                                <p class="text-gray-600">
                                    @if(app()->getLocale() === 'uk')
                                        Створюємо архітектуру системи, дизайн інтерфейсів та детальний план розробки з чіткими термінами.
                                    @else
                                        We create system architecture, interface design, and a detailed development plan with clear timelines.
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Step 3 --}}
                    <div class="relative flex items-center">
                        <div class="lg:w-1/2 lg:pr-12">
                            <div class="bg-white rounded-xl p-8 shadow-sm hover:shadow-lg transition-shadow">
                                <div class="flex items-center mb-4">
                                    <div class="w-12 h-12 bg-purple-600 rounded-full flex items-center justify-center text-white font-bold text-xl">3</div>
                                    <h3 class="text-xl font-semibold text-gray-900 ml-4">
                                        @if(app()->getLocale() === 'uk')
                                            Розробка та тестування
                                        @else
                                            Development & Testing
                                        @endif
                                    </h3>
                                </div>
                                <p class="text-gray-600">
                                    @if(app()->getLocale() === 'uk')
                                        Реалізуємо функціонал згідно з планом, проводимо тестування та регулярно демонструємо прогрес.
                                    @else
                                        We implement functionality according to the plan, conduct testing, and regularly demonstrate progress.
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="absolute left-1/2 transform -translate-x-1/2 w-6 h-6 bg-purple-600 rounded-full border-4 border-white hidden lg:block"></div>
                        <div class="lg:w-1/2 lg:pl-12 hidden lg:block"></div>
                    </div>

                    {{-- Step 4 --}}
                    <div class="relative flex items-center">
                        <div class="lg:w-1/2 lg:pr-12 hidden lg:block"></div>
                        <div class="absolute left-1/2 transform -translate-x-1/2 w-6 h-6 bg-orange-600 rounded-full border-4 border-white hidden lg:block"></div>
                        <div class="lg:w-1/2 lg:pl-12">
                            <div class="bg-white rounded-xl p-8 shadow-sm hover:shadow-lg transition-shadow">
                                <div class="flex items-center mb-4">
                                    <div class="w-12 h-12 bg-orange-600 rounded-full flex items-center justify-center text-white font-bold text-xl">4</div>
                                    <h3 class="text-xl font-semibold text-gray-900 ml-4">
                                        @if(app()->getLocale() === 'uk')
                                            Запуск та підтримка
                                        @else
                                            Launch & Support
                                        @endif
                                    </h3>
                                </div>
                                <p class="text-gray-600">
                                    @if(app()->getLocale() === 'uk')
                                        Розгортаємо проект, навчаємо команду користування та забезпечуємо технічну підтримку.
                                    @else
                                        We deploy the project, train the team on usage, and provide ongoing technical support.
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="bg-gradient-to-r from-blue-600 to-purple-600 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                @if(app()->getLocale() === 'uk')
                    Готові почати ваш проект?
                @else
                    Ready to Start Your Project?
                @endif
            </h2>
            <p class="text-xl text-blue-100 mb-8 max-w-2xl mx-auto">
                @if(app()->getLocale() === 'uk')
                    Отримайте безкоштовну консультацію та оцінку вашого проекту від наших експертів
                @else
                    Get a free consultation and project estimate from our experts
                @endif
            </p>
            <a href="{{ route('contact', ['locale' => app()->getLocale()]) }}" 
               class="bg-white hover:bg-gray-100 text-blue-600 px-8 py-3 rounded-lg font-medium transition-colors">
                {{ __('app.get_consultation') }}
            </a>
        </div>
    </section>
</x-layouts.app>
