<x-layouts.app>
    <section class="bg-navy-950 pt-24 pb-20 relative overflow-hidden">
        <div class="absolute inset-0 bg-grid-subtle opacity-20"></div>
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <div class="mb-6">
                <span class="inline-flex items-center px-4 py-2 rounded-xl text-sm font-medium bg-trust-500/20 text-trust-300 border border-trust-400/30">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                    </svg>
                    @if(app()->getLocale() === 'uk') Розробка на замовлення @else Custom Development @endif
                </span>
            </div>
            <h1 class="text-5xl lg:text-6xl font-bold text-white mb-6">
                @if(app()->getLocale() === 'uk')
                    Створюємо <span class="text-trust-400">унікальні</span> рішення
                @else
                    Building <span class="text-trust-400">Unique</span> Solutions
                @endif
            </h1>
            <p class="text-xl text-navy-300 max-w-2xl mx-auto leading-relaxed">
                    @if(app()->getLocale() === 'uk')
                        Повний цикл розробки програмного забезпечення від ідеї до впровадження. Веб-додатки, мобільні програми, корпоративні системи - ми втілюємо ваші ідеї в життя.
                    @else
                        Full-cycle software development from idea to implementation. Web applications, mobile apps, enterprise systems - we bring your ideas to life.
                    @endif
                </p>
        </div>
    </section>

    {{-- Development Services --}}
    <section class="bg-white py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">
                    @if(app()->getLocale() === 'uk')
                        Наші послуги розробки
                    @else
                        Our Development Services
                    @endif
                </h2>
                <p class="text-xl text-gray-600">
                    @if(app()->getLocale() === 'uk')
                        Комплексні рішення для всіх ваших технологічних потреб
                    @else
                        Comprehensive solutions for all your technology needs
                    @endif
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-20">
                {{-- Web Development --}}
                <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-8">
                    <div class="w-16 h-16 bg-blue-600 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9v-9m0-9v9"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">
                        @if(app()->getLocale() === 'uk')
                            Веб-розробка
                        @else
                            Web Development
                        @endif
                    </h3>
                    <p class="text-gray-600 mb-6">
                        @if(app()->getLocale() === 'uk')
                            Сучасні веб-додатки з високою продуктивністю та масштабованістю
                        @else
                            Modern web applications with high performance and scalability
                        @endif
                    </p>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <h4 class="font-semibold text-gray-900 mb-2">Frontend</h4>
                            <ul class="text-sm text-gray-600 space-y-1">
                                <li>• React.js</li>
                                <li>• Vue.js</li>
                                <li>• Angular</li>
                                <li>• TypeScript</li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900 mb-2">Backend</h4>
                            <ul class="text-sm text-gray-600 space-y-1">
                                <li>• Laravel</li>
                                <li>• Node.js</li>
                                <li>• Python</li>
                                <li>• .NET</li>
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- Mobile Development --}}
                <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-2xl p-8">
                    <div class="w-16 h-16 bg-green-600 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">
                        @if(app()->getLocale() === 'uk')
                            Мобільна розробка
                        @else
                            Mobile Development
                        @endif
                    </h3>
                    <p class="text-gray-600 mb-6">
                        @if(app()->getLocale() === 'uk')
                            Нативні та кросплатформенні мобільні додатки для iOS та Android
                        @else
                            Native and cross-platform mobile applications for iOS and Android
                        @endif
                    </p>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <h4 class="font-semibold text-gray-900 mb-2">Native</h4>
                            <ul class="text-sm text-gray-600 space-y-1">
                                <li>• Swift (iOS)</li>
                                <li>• Kotlin (Android)</li>
                                <li>• Objective-C</li>
                                <li>• Java</li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900 mb-2">Cross-platform</h4>
                            <ul class="text-sm text-gray-600 space-y-1">
                                <li>• Flutter</li>
                                <li>• Xamarin</li>
                                <li>• Ionic</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Additional Services --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="w-16 h-16 bg-purple-100 rounded-xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">
                        @if(app()->getLocale() === 'uk')
                            Тестування ПЗ
                        @else
                            Software Testing
                        @endif
                    </h3>
                    <p class="text-gray-600">
                        @if(app()->getLocale() === 'uk')
                            Комплексне тестування для забезпечення якості та надійності
                        @else
                            Comprehensive testing to ensure quality and reliability
                        @endif
                    </p>
                </div>

                <div class="text-center">
                    <div class="w-16 h-16 bg-indigo-100 rounded-xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">
                        @if(app()->getLocale() === 'uk')
                            API розробка
                        @else
                            API Development
                        @endif
                    </h3>
                    <p class="text-gray-600">
                        @if(app()->getLocale() === 'uk')
                            RESTful API та мікросервіси для інтеграції систем
                        @else
                            RESTful APIs and microservices for system integration
                        @endif
                    </p>
                </div>

                <div class="text-center">
                    <div class="w-16 h-16 bg-pink-100 rounded-xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">
                        @if(app()->getLocale() === 'uk')
                            Повна інтеграція
                        @else
                            Full Integration
                        @endif
                    </h3>
                    <p class="text-gray-600">
                        @if(app()->getLocale() === 'uk')
                            Інтеграція з існуючими системами та сторонніми сервісами
                        @else
                            Integration with existing systems and third-party services
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="bg-purple-600 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                @if(app()->getLocale() === 'uk')
                    Є ідея для проекту?
                @else
                    Have a Project Idea?
                @endif
            </h2>
            <p class="text-xl text-purple-100 mb-8 max-w-2xl mx-auto">
                @if(app()->getLocale() === 'uk')
                    Розкажіть нам про ваш проект, і ми створимо технічне рішення
                @else
                    Tell us about your project and we'll create a technical solution
                @endif
            </p>
            <a href="{{ route('contact', ['locale' => app()->getLocale()]) }}" 
               class="bg-white hover:bg-gray-100 text-purple-600 px-8 py-4 rounded-lg font-semibold transition-all transform hover:scale-105">
                @if(app()->getLocale() === 'uk')
                    Розпочати проект
                @else
                    Start Your Project
                @endif
            </a>
        </div>
    </section>
</x-layouts.app>
