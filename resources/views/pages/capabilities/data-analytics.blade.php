<x-layouts.app>
    {{-- Hero Section --}}
    <section class="bg-gradient-to-br from-blue-900 via-blue-800 to-purple-900 pt-20 pb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center text-white">
                <div class="mb-6">
                    <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-blue-500/20 text-blue-200 border border-blue-400/30">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                        @if(app()->getLocale() === 'uk')
                            Аналітика даних
                        @else
                            Data Analytics
                        @endif
                    </span>
                </div>
                <h1 class="text-5xl lg:text-6xl font-bold mb-6">
                    @if(app()->getLocale() === 'uk')
                        Перетворюємо дані на <span class="text-blue-400">рішення</span>
                    @else
                        Transform Data into <span class="text-blue-400">Decisions</span>
                    @endif
                </h1>
                <p class="text-xl text-blue-100 max-w-4xl mx-auto leading-relaxed">
                    @if(app()->getLocale() === 'uk')
                        Розкрийте потенціал ваших даних з нашими передовими аналітичними рішеннями. Від предиктивної аналітики до бізнес-інтелекту - ми допомагаємо приймати обґрунтовані рішення.
                    @else
                        Unlock the potential of your data with our advanced analytics solutions. From predictive analytics to business intelligence - we help you make informed decisions.
                    @endif
                </p>
            </div>
        </div>
    </section>

    {{-- Services Overview --}}
    <section class="bg-white py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center mb-20">
                <div>
                    <h2 class="text-4xl font-bold text-gray-900 mb-6">
                        @if(app()->getLocale() === 'uk')
                            Комплексні послуги аналітики даних
                        @else
                            Comprehensive Data Analytics Services
                        @endif
                    </h2>
                    <p class="text-lg text-gray-600 mb-8 leading-relaxed">
                        @if(app()->getLocale() === 'uk')
                            Ми допомагаємо організаціям перетворити сирі дані на цінні інсайти, які стимулюють зростання бізнесу та інновації.
                        @else
                            We help organizations transform raw data into valuable insights that drive business growth and innovation.
                        @endif
                    </p>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <svg class="w-6 h-6 text-blue-600 mr-3 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <div>
                                <h4 class="font-semibold text-gray-900">
                                    @if(app()->getLocale() === 'uk')
                                        Швидке впровадження
                                    @else
                                        Rapid Implementation
                                    @endif
                                </h4>
                                <p class="text-gray-600">
                                    @if(app()->getLocale() === 'uk')
                                        Від концепції до робочого рішення за 2-4 тижні
                                    @else
                                        From concept to working solution in 2-4 weeks
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <svg class="w-6 h-6 text-blue-600 mr-3 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                            <div>
                                <h4 class="font-semibold text-gray-900">
                                    @if(app()->getLocale() === 'uk')
                                        Сучасні технології
                                    @else
                                        Modern Technologies
                                    @endif
                                </h4>
                                <p class="text-gray-600">Python, R, TensorFlow, Apache Spark, Tableau</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <div class="bg-gradient-to-br from-blue-100 to-purple-100 rounded-2xl p-8 h-96 flex items-center justify-center">
                        <svg class="w-32 h-32 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                    </div>
                </div>
            </div>

            {{-- Services Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                {{-- Predictive Analytics --}}
                <div class="bg-white border border-gray-200 rounded-xl p-8 hover:shadow-lg transition-shadow">
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">
                        @if(app()->getLocale() === 'uk')
                            Предиктивна аналітика
                        @else
                            Predictive Analytics
                        @endif
                    </h3>
                    <p class="text-gray-600 mb-4">
                        @if(app()->getLocale() === 'uk')
                            Прогнозування трендів та поведінки клієнтів для стратегічного планування
                        @else
                            Forecast trends and customer behavior for strategic planning
                        @endif
                    </p>
                    <ul class="text-sm text-gray-600 space-y-1">
                        <li>• Machine Learning Models</li>
                        <li>• Time Series Forecasting</li>
                        <li>• Risk Assessment</li>
                        <li>• Customer Segmentation</li>
                    </ul>
                </div>

                {{-- Business Intelligence --}}
                <div class="bg-white border border-gray-200 rounded-xl p-8 hover:shadow-lg transition-shadow">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">
                        @if(app()->getLocale() === 'uk')
                            Бізнес-аналітика
                        @else
                            Business Intelligence
                        @endif
                    </h3>
                    <p class="text-gray-600 mb-4">
                        @if(app()->getLocale() === 'uk')
                            Інтерактивні дашборди та звіти для моніторингу KPI та продуктивності
                        @else
                            Interactive dashboards and reports for monitoring KPIs and performance
                        @endif
                    </p>
                    <ul class="text-sm text-gray-600 space-y-1">
                        <li>• Real-time Dashboards</li>
                        <li>• Custom Reports</li>
                        <li>• KPI Monitoring</li>
                        <li>• Data Visualization</li>
                    </ul>
                </div>

                {{-- Data Management --}}
                <div class="bg-white border border-gray-200 rounded-xl p-8 hover:shadow-lg transition-shadow">
                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">
                        @if(app()->getLocale() === 'uk')
                            Управління даними
                        @else
                            Data Management
                        @endif
                    </h3>
                    <p class="text-gray-600 mb-4">
                        @if(app()->getLocale() === 'uk')
                            Інтеграція, очищення та структурування даних з різних джерел
                        @else
                            Integration, cleaning and structuring data from various sources
                        @endif
                    </p>
                    <ul class="text-sm text-gray-600 space-y-1">
                        <li>• Data Integration</li>
                        <li>• ETL Processes</li>
                        <li>• Data Quality</li>
                        <li>• Data Warehousing</li>
                    </ul>
                </div>

                {{-- Data Processing --}}
                <div class="bg-white border border-gray-200 rounded-xl p-8 hover:shadow-lg transition-shadow">
                    <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">
                        @if(app()->getLocale() === 'uk')
                            Обробка даних
                        @else
                            Data Processing
                        @endif
                    </h3>
                    <p class="text-gray-600 mb-4">
                        @if(app()->getLocale() === 'uk')
                            Високопродуктивна обробка великих обсягів даних в реальному часі
                        @else
                            High-performance processing of large data volumes in real-time
                        @endif
                    </p>
                    <ul class="text-sm text-gray-600 space-y-1">
                        <li>• Big Data Processing</li>
                        <li>• Stream Processing</li>
                        <li>• Batch Processing</li>
                        <li>• Data Pipelines</li>
                    </ul>
                </div>

                {{-- Machine Learning --}}
                <div class="bg-white border border-gray-200 rounded-xl p-8 hover:shadow-lg transition-shadow">
                    <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">
                        @if(app()->getLocale() === 'uk')
                            Машинне навчання
                        @else
                            Machine Learning
                        @endif
                    </h3>
                    <p class="text-gray-600 mb-4">
                        @if(app()->getLocale() === 'uk')
                            Розробка та впровадження ML-моделей для автоматизації та оптимізації
                        @else
                            Development and implementation of ML models for automation and optimization
                        @endif
                    </p>
                    <ul class="text-sm text-gray-600 space-y-1">
                        <li>• Custom ML Models</li>
                        <li>• Natural Language Processing</li>
                        <li>• Computer Vision</li>
                        <li>• Recommendation Systems</li>
                    </ul>
                </div>

                {{-- Data Visualization --}}
                <div class="bg-white border border-gray-200 rounded-xl p-8 hover:shadow-lg transition-shadow">
                    <div class="w-12 h-12 bg-pink-100 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">
                        @if(app()->getLocale() === 'uk')
                            Візуалізація даних
                        @else
                            Data Visualization
                        @endif
                    </h3>
                    <p class="text-gray-600 mb-4">
                        @if(app()->getLocale() === 'uk')
                            Інтуїтивні візуалізації, що роблять складні дані зрозумілими
                        @else
                            Intuitive visualizations that make complex data understandable
                        @endif
                    </p>
                    <ul class="text-sm text-gray-600 space-y-1">
                        <li>• Interactive Charts</li>
                        <li>• Custom Dashboards</li>
                        <li>• Real-time Updates</li>
                        <li>• Mobile-responsive</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- Process Section --}}
    <section class="bg-gray-50 py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">
                    @if(app()->getLocale() === 'uk')
                        Наш процес роботи з даними
                    @else
                        Our Data Analytics Process
                    @endif
                </h2>
                <p class="text-xl text-gray-600">
                    @if(app()->getLocale() === 'uk')
                        Структурований підхід від збору даних до впровадження рішень
                    @else
                        Structured approach from data collection to solution implementation
                    @endif
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-2xl font-bold text-white">1</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">
                        @if(app()->getLocale() === 'uk')
                            Аудит даних
                        @else
                            Data Audit
                        @endif
                    </h3>
                    <p class="text-gray-600">
                        @if(app()->getLocale() === 'uk')
                            Аналіз існуючих даних та визначення можливостей
                        @else
                            Analysis of existing data and identifying opportunities
                        @endif
                    </p>
                </div>

                <div class="text-center">
                    <div class="w-16 h-16 bg-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-2xl font-bold text-white">2</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">
                        @if(app()->getLocale() === 'uk')
                            Стратегія
                        @else
                            Strategy
                        @endif
                    </h3>
                    <p class="text-gray-600">
                        @if(app()->getLocale() === 'uk')
                            Розробка стратегії аналітики відповідно до бізнес-цілей
                        @else
                            Develop analytics strategy aligned with business goals
                        @endif
                    </p>
                </div>

                <div class="text-center">
                    <div class="w-16 h-16 bg-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-2xl font-bold text-white">3</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">
                        @if(app()->getLocale() === 'uk')
                            Впровадження
                        @else
                            Implementation
                        @endif
                    </h3>
                    <p class="text-gray-600">
                        @if(app()->getLocale() === 'uk')
                            Розробка та налаштування аналітичних рішень
                        @else
                            Development and configuration of analytics solutions
                        @endif
                    </p>
                </div>

                <div class="text-center">
                    <div class="w-16 h-16 bg-orange-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-2xl font-bold text-white">4</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">
                        @if(app()->getLocale() === 'uk')
                            Оптимізація
                        @else
                            Optimization
                        @endif
                    </h3>
                    <p class="text-gray-600">
                        @if(app()->getLocale() === 'uk')
                            Постійне вдосконалення та масштабування рішень
                        @else
                            Continuous improvement and scaling of solutions
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="bg-blue-600 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                @if(app()->getLocale() === 'uk')
                    Готові розкрити потенціал ваших даних?
                @else
                    Ready to Unlock Your Data's Potential?
                @endif
            </h2>
            <p class="text-xl text-blue-100 mb-8 max-w-2xl mx-auto">
                @if(app()->getLocale() === 'uk')
                    Отримайте безкоштовну консультацію з нашими експертами з аналітики даних
                @else
                    Get a free consultation with our data analytics experts
                @endif
            </p>
            <a href="{{ route('contact', ['locale' => app()->getLocale()]) }}" 
               class="bg-white hover:bg-gray-100 text-blue-600 px-8 py-4 rounded-lg font-semibold transition-all transform hover:scale-105">
                @if(app()->getLocale() === 'uk')
                    Розпочати проект
                @else
                    Start Your Project
                @endif
            </a>
        </div>
    </section>
</x-layouts.app>
