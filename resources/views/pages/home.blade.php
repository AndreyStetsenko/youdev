<x-layouts.app>
    {{-- Breadcrumb Structured Data --}}
    <script type="application/ld+json">
    {!! json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => [
            [
                '@type' => 'ListItem',
                'position' => 1,
                'name' => __('app.home'),
                'item' => url('/')
            ]
        ]
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
    </script>
    
    {{-- Service Structured Data --}}
    <script type="application/ld+json">
    {!! json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'Service',
        'name' => 'Web Development Services',
        'description' => __('app.hero_description'),
        'provider' => [
            '@type' => 'Organization',
            'name' => 'YDev'
        ],
        'areaServed' => 'Worldwide',
        'hasOfferCatalog' => [
            '@type' => 'OfferCatalog',
            'name' => 'Web Development Services',
            'itemListElement' => [
                [
                    '@type' => 'Offer',
                    'itemOffered' => [
                        '@type' => 'Service',
                        'name' => __('app.ecommerce'),
                        'description' => __('app.ecommerce_desc')
                    ]
                ],
                [
                    '@type' => 'Offer',
                    'itemOffered' => [
                        '@type' => 'Service',
                        'name' => __('app.crm_development'),
                        'description' => __('app.crm_development_desc')
                    ]
                ],
                [
                    '@type' => 'Offer',
                    'itemOffered' => [
                        '@type' => 'Service',
                        'name' => __('app.corporate_websites'),
                        'description' => __('app.corporate_websites_desc')
                    ]
                ],
                [
                    '@type' => 'Offer',
                    'itemOffered' => [
                        '@type' => 'Service',
                        'name' => __('app.ui_ux_design'),
                        'description' => __('app.ui_ux_design_desc')
                    ]
                ],
                [
                    '@type' => 'Offer',
                    'itemOffered' => [
                        '@type' => 'Service',
                        'name' => __('app.catalog'),
                        'description' => __('app.catalog_desc')
                    ]
                ],
                [
                    '@type' => 'Offer',
                    'itemOffered' => [
                        '@type' => 'Service',
                        'name' => __('app.business_card'),
                        'description' => __('app.business_card_desc')
                    ]
                ]
            ]
        ]
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
    </script>
    {{-- Hero Section - More Professional --}}
    <section class="relative bg-gradient-to-br from-trust-50 via-white to-blue-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div>
                    <div class="mb-6">
                        <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-trust-100 text-trust-800 border border-trust-200 shadow-sm">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                            {{ __('app.professional_development') }}
                        </span>
                    </div>
                    <h1 class="text-5xl lg:text-6xl font-bold text-navy-900 leading-tight mb-6">
                        {{ __('app.hero_title') }}
                    </h1>
                    <p class="text-xl text-navy-700 mb-8 leading-relaxed">
                        {{ __('app.hero_description') }}
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="{{ route('contact', ['locale' => app()->getLocale()]) }}" 
                           class="bg-gradient-to-r from-trust-600 to-trust-700 hover:from-trust-700 hover:to-trust-800 text-white px-8 py-4 rounded-lg font-semibold transition-all transform hover:scale-105 text-center shadow-lg hover:shadow-xl">
                            {{ __('app.start_project') }}
                        </a>
                        <a href="{{ route('portfolio', ['locale' => app()->getLocale()]) }}" 
                           class="border-2 border-trust-300 hover:border-trust-500 text-trust-700 hover:text-trust-800 hover:bg-trust-50 px-8 py-4 rounded-lg font-semibold transition-all text-center">
                            {{ __('app.our_work') }}
                        </a>
                    </div>
                </div>
                <div class="relative">
                    <div class="relative z-10 bg-white rounded-2xl shadow-2xl p-8 border border-trust-100">
                        <div class="space-y-6">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-trust-100 rounded-lg flex items-center justify-center mr-4 shadow-sm">
                                    <svg class="w-6 h-6 text-trust-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-navy-900">
                                        {{ __('app.web_development') }}
                                    </h3>
                                    <p class="text-navy-600 text-sm">
                                        {{ __('app.web_development_tech') }}
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-trust-100 rounded-lg flex items-center justify-center mr-4 shadow-sm">
                                    <svg class="w-6 h-6 text-trust-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4h4a2 2 0 002-2V5z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-navy-900">
                                        {{ __('app.ui_ux_design') }}
                                    </h3>
                                    <p class="text-navy-600 text-sm">
                                        {{ __('app.ui_ux_design_tech') }}
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-trust-100 rounded-lg flex items-center justify-center mr-4 shadow-sm">
                                    <svg class="w-6 h-6 text-trust-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-navy-900">
                                        {{ __('app.digital_marketing') }}
                                    </h3>
                                    <p class="text-navy-600 text-sm">
                                        {{ __('app.digital_marketing_tech') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Background decoration --}}
                    <div class="absolute inset-0 bg-gradient-to-br from-trust-50 to-trust-100 rounded-2xl transform rotate-6 shadow-lg"></div>
                </div>
            </div>
        </div>
        {{-- Background pattern --}}
        {{-- <div class="absolute inset-0 bg-grid-pattern opacity-5"></div> --}}
    </section>

    {{-- Trust Indicators --}}
    <section class="bg-gradient-to-r from-trust-50 via-gray-50 to-trust-50 py-16 border-t border-trust-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-sm font-semibold text-trust-700 uppercase tracking-wider">
                    @if(app()->getLocale() === 'uk')
                        Нам довіряють
                    @else
                        Trusted by
                    @endif
                </h2>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 items-center">
                <div class="text-center group">
                    <div class="text-4xl font-bold text-trust-600 mb-2 group-hover:text-trust-700 transition-colors">5+</div>
                    <p class="text-navy-700 font-medium">
                        @if(app()->getLocale() === 'uk')
                            Років досвіду
                        @else
                            Years Experience
                        @endif
                    </p>
                </div>
                <div class="text-center group">
                    <div class="text-4xl font-bold text-trust-600 mb-2 group-hover:text-trust-700 transition-colors">100+</div>
                    <p class="text-navy-700 font-medium">
                        @if(app()->getLocale() === 'uk')
                            Проектів
                        @else
                            Projects
                        @endif
                    </p>
                </div>
                <div class="text-center group">
                    <div class="text-4xl font-bold text-trust-600 mb-2 group-hover:text-trust-700 transition-colors">50+</div>
                    <p class="text-navy-700 font-medium">
                        @if(app()->getLocale() === 'uk')
                            Клієнтів
                        @else
                            Clients
                        @endif
                    </p>
                </div>
                <div class="text-center group">
                    <div class="text-4xl font-bold text-trust-600 mb-2 group-hover:text-trust-700 transition-colors">24/7</div>
                    <p class="text-navy-700 font-medium">
                        @if(app()->getLocale() === 'uk')
                            Підтримка
                        @else
                            Support
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Services Section --}}
    <section class="bg-white py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-navy-900 mb-4">
                    @if(app()->getLocale() === 'uk')
                        Наші послуги
                    @else
                        Our Services
                    @endif
                </h2>
                <p class="text-xl text-navy-700 max-w-3xl mx-auto">
                    @if(app()->getLocale() === 'uk')
                        Повний спектр послуг для розвитку вашого бізнесу
                    @else
                        Complete range of services for your business growth
                    @endif
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                {{-- E-commerce --}}
                <div class="group relative bg-white border border-trust-200 rounded-2xl p-8 hover:shadow-xl hover:border-trust-300 transition-all duration-300">
                    <div class="absolute inset-0 bg-gradient-to-br from-trust-50 to-trust-100 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div class="relative">
                        <div class="w-16 h-16 bg-trust-100 rounded-xl flex items-center justify-center mb-6 group-hover:bg-trust-200 transition-colors shadow-sm">
                            <svg class="w-8 h-8 text-trust-600" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 3L2.26491 3.0883C3.58495 3.52832 4.24497 3.74832 4.62248 4.2721C5 4.79587 5 5.49159 5 6.88304V9.5C5 12.3284 5 13.7426 5.87868 14.6213C6.75736 15.5 8.17157 15.5 11 15.5H13M19 15.5H17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                <path d="M7.5 18C8.32843 18 9 18.6716 9 19.5C9 20.3284 8.32843 21 7.5 21C6.67157 21 6 20.3284 6 19.5C6 18.6716 6.67157 18 7.5 18Z" stroke="currentColor" stroke-width="1.5"/>
                                <path d="M16.5 18.0001C17.3284 18.0001 18 18.6716 18 19.5001C18 20.3285 17.3284 21.0001 16.5 21.0001C15.6716 21.0001 15 20.3285 15 19.5001C15 18.6716 15.6716 18.0001 16.5 18.0001Z" stroke="currentColor" stroke-width="1.5"/>
                                <path d="M5 6H8M5.5 13H16.0218C16.9812 13 17.4609 13 17.8366 12.7523C18.2123 12.5045 18.4013 12.0636 18.7792 11.1818L19.2078 10.1818C20.0173 8.29294 20.4221 7.34853 19.9775 6.67426C19.5328 6 18.5054 6 16.4504 6H12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-navy-900 mb-4">
                            {{ __('app.ecommerce') }}
                        </h3>
                        <p class="text-navy-700 mb-6 leading-relaxed">
                            {{ __('app.ecommerce_desc') }}
                        </p>
                        <ul class="space-y-2 mb-6">
                            <li class="flex items-center text-navy-600">
                                <svg class="w-4 h-4 text-trust-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                {{ __('app.shopping_cart_feature') }}
                            </li>
                            <li class="flex items-center text-navy-600">
                                <svg class="w-4 h-4 text-trust-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                {{ __('app.payment_systems_feature') }}
                            </li>
                            <li class="flex items-center text-navy-600">
                                <svg class="w-4 h-4 text-trust-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                {{ __('app.product_management_feature') }}
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- CRM Development --}}
                <div class="group relative bg-white border border-trust-200 rounded-2xl p-8 hover:shadow-xl hover:border-trust-300 transition-all duration-300">
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div class="relative">
                        <div class="w-16 h-16 bg-blue-100 rounded-xl flex items-center justify-center mb-6 group-hover:bg-blue-200 transition-colors shadow-sm">
                            <svg class="w-8 h-8 text-blue-600" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="12" cy="6" r="4" stroke="currentColor" stroke-width="1.5"/>
                                <path d="M18 9C19.6569 9 21 7.88071 21 6.5C21 5.11929 19.6569 4 18 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                <path d="M6 9C4.34315 9 3 7.88071 3 6.5C3 5.11929 4.34315 4 6 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                <path d="M17.1973 15C17.7078 15.5883 18 16.2714 18 17C18 19.2091 15.3137 21 12 21C8.68629 21 6 19.2091 6 17C6 14.7909 8.68629 13 12 13C12.3407 13 12.6748 13.0189 13 13.0553" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                <path d="M20 19C21.7542 18.6153 23 17.6411 23 16.5C23 15.3589 21.7542 14.3847 20 14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                <path d="M4 19C2.24575 18.6153 1 17.6411 1 16.5C1 15.3589 2.24575 14.3847 4 14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-navy-900 mb-4">
                            {{ __('app.crm_development') }}
                        </h3>
                        <p class="text-navy-700 mb-6 leading-relaxed">
                            {{ __('app.crm_development_desc') }}
                        </p>
                        <ul class="space-y-2 mb-6">
                            <li class="flex items-center text-navy-600">
                                <svg class="w-4 h-4 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                {{ __('app.customer_database_feature') }}
                            </li>
                            <li class="flex items-center text-navy-600">
                                <svg class="w-4 h-4 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                {{ __('app.sales_analytics_feature') }}
                            </li>
                            <li class="flex items-center text-navy-600">
                                <svg class="w-4 h-4 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                {{ __('app.process_automation_feature') }}
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Corporate Websites --}}
                <div class="group relative bg-white border border-trust-200 rounded-2xl p-8 hover:shadow-xl hover:border-trust-300 transition-all duration-300">
                    <div class="absolute inset-0 bg-gradient-to-br from-green-50 to-green-100 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div class="relative">
                        <div class="w-16 h-16 bg-green-100 rounded-xl flex items-center justify-center mb-6 group-hover:bg-green-200 transition-colors shadow-sm">
                            <svg class="w-8 h-8 text-green-600" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M22 22L2 22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                <path d="M17 22V6C17 4.11438 17 3.17157 16.4142 2.58579C15.8284 2 14.8856 2 13 2H11C9.11438 2 8.17157 2 7.58579 2.58579C7 3.17157 7 4.11438 7 6V22" stroke="currentColor" stroke-width="1.5"/>
                                <path d="M20.25 11.5C20.25 11.9142 20.5858 12.25 21 12.25C21.4142 12.25 21.75 11.9142 21.75 11.5H20.25ZM20.1111 8.33706L19.6945 8.96066L19.6945 8.96066L20.1111 8.33706ZM20.6629 8.88886L20.0393 9.30554L20.0393 9.30554L20.6629 8.88886ZM21.75 15.5C21.75 15.0858 21.4142 14.75 21 14.75C20.5858 14.75 20.25 15.0858 20.25 15.5H21.75ZM17.5 8.75C18.2178 8.75 18.6998 8.75091 19.0672 8.78828C19.422 8.82438 19.586 8.8882 19.6945 8.96066L20.5278 7.71346C20.1318 7.44886 19.6925 7.34415 19.219 7.29598C18.758 7.24909 18.1866 7.25 17.5 7.25V8.75ZM21.75 11.5C21.75 10.8134 21.7509 10.242 21.704 9.78102C21.6559 9.30755 21.5511 8.86818 21.2865 8.47218L20.0393 9.30554C20.1118 9.41399 20.1756 9.57796 20.2117 9.93283C20.2491 10.3002 20.25 10.7822 20.25 11.5H21.75ZM19.6945 8.96066C19.831 9.05186 19.9481 9.16905 20.0393 9.30554L21.2865 8.47218C21.0859 8.17191 20.8281 7.91409 20.5278 7.71346L19.6945 8.96066ZM20.25 15.5V22H21.75V15.5H20.25Z" fill="currentColor"/>
                                <path d="M3.88886 8.33706L4.30554 8.96066L4.30554 8.96066L3.88886 8.33706ZM3.33706 8.88886L3.96066 9.30554L3.96066 9.30554L3.33706 8.88886ZM3.75 20C3.75 19.5858 3.41421 19.25 3 19.25C2.58579 19.25 2.25 19.5858 2.25 20H3.75ZM2.25 16C2.25 16.4142 2.58579 16.75 3 16.75C3.41421 16.75 3.75 16.4142 3.75 16H2.25ZM6.5 7.25C5.81338 7.25 5.24196 7.24909 4.78102 7.29598C4.30755 7.34415 3.86818 7.44886 3.47218 7.71346L4.30554 8.96066C4.41399 8.8882 4.57796 8.82438 4.93283 8.78828C5.30023 8.75091 5.78216 8.75 6.5 8.75V7.25ZM3.75 11.5C3.75 10.7822 3.75091 10.3002 3.78828 9.93283C3.82438 9.57796 3.8882 9.41399 3.96066 9.30554L2.71346 8.47218C2.44886 8.86818 2.34415 9.30755 2.29598 9.78102C2.24909 10.242 2.25 10.8134 2.25 11.5H3.75ZM3.47218 7.71346C3.17191 7.91409 2.91409 8.17191 2.71346 8.47218L3.96066 9.30554C4.05186 9.16905 4.16905 9.05186 4.30554 8.96066L3.47218 7.71346ZM2.25 20V22H3.75V20H2.25ZM2.25 11.5V16H3.75V11.5H2.25Z" fill="currentColor"/>
                                <path d="M12 22V19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                <path d="M10 5H14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                <path d="M10 14H10.5M14 14H12.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                <path d="M14 8H13.5M10 8H11.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                <path d="M10 11H14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-navy-900 mb-4">
                            {{ __('app.corporate_websites') }}
                        </h3>
                        <p class="text-navy-700 mb-6 leading-relaxed">
                            {{ __('app.corporate_websites_desc') }}
                        </p>
                        <ul class="space-y-2 mb-6">
                            <li class="flex items-center text-navy-600">
                                <svg class="w-4 h-4 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                {{ __('app.modern_design_feature') }}
                            </li>
                            <li class="flex items-center text-navy-600">
                                <svg class="w-4 h-4 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                {{ __('app.responsive_design_feature') }}
                            </li>
                            <li class="flex items-center text-navy-600">
                                <svg class="w-4 h-4 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                {{ __('app.seo_optimization_feature') }}
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- UI/UX Design --}}
                <div class="group relative bg-white border border-trust-200 rounded-2xl p-8 hover:shadow-xl hover:border-trust-300 transition-all duration-300">
                    <div class="absolute inset-0 bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div class="relative">
                        <div class="w-16 h-16 bg-purple-100 rounded-xl flex items-center justify-center mb-6 group-hover:bg-purple-200 transition-colors shadow-sm">
                            <svg class="w-8 h-8 text-purple-600" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14.3601 4.07866L15.2869 3.15178C16.8226 1.61607 19.3125 1.61607 20.8482 3.15178C22.3839 4.68748 22.3839 7.17735 20.8482 8.71306L19.9213 9.63993M14.3601 4.07866C14.3601 4.07866 14.4759 6.04828 16.2138 7.78618C17.9517 9.52407 19.9213 9.63993 19.9213 9.63993M14.3601 4.07866L12 6.43872M19.9213 9.63993L14.6607 14.9006L11.5613 18L11.4001 18.1612C10.8229 18.7383 10.5344 19.0269 10.2162 19.2751C9.84082 19.5679 9.43469 19.8189 9.00498 20.0237C8.6407 20.1973 8.25352 20.3263 7.47918 20.5844L4.19792 21.6782M4.19792 21.6782L3.39584 21.9456C3.01478 22.0726 2.59466 21.9734 2.31063 21.6894C2.0266 21.4053 1.92743 20.9852 2.05445 20.6042L2.32181 19.8021M4.19792 21.6782L2.32181 19.8021M2.32181 19.8021L3.41556 16.5208C3.67368 15.7465 3.80273 15.3593 3.97634 14.995C4.18114 14.5653 4.43213 14.1592 4.7249 13.7838C4.97308 13.4656 5.26166 13.1771 5.83882 12.5999L8.5 9.93872" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-navy-900 mb-4">
                            {{ __('app.ui_ux_design') }}
                        </h3>
                        <p class="text-navy-700 mb-6 leading-relaxed">
                            {{ __('app.ui_ux_design_desc') }}
                        </p>
                        <ul class="space-y-2 mb-6">
                            <li class="flex items-center text-navy-600">
                                <svg class="w-4 h-4 text-purple-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                {{ __('app.prototyping_feature') }}
                            </li>
                            <li class="flex items-center text-navy-600">
                                <svg class="w-4 h-4 text-purple-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                {{ __('app.user_testing_feature') }}
                            </li>
                            <li class="flex items-center text-navy-600">
                                <svg class="w-4 h-4 text-purple-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                {{ __('app.design_systems_feature') }}
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Catalog --}}
                <div class="group relative bg-white border border-trust-200 rounded-2xl p-8 hover:shadow-xl hover:border-trust-300 transition-all duration-300">
                    <div class="absolute inset-0 bg-gradient-to-br from-orange-50 to-orange-100 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div class="relative">
                        <div class="w-16 h-16 bg-orange-100 rounded-xl flex items-center justify-center mb-6 group-hover:bg-orange-200 transition-colors shadow-sm">
                            <svg class="w-8 h-8 text-orange-600" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.5 14L17 14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                <path d="M7 14H7.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                <path d="M7 10.5H7.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                <path d="M7 17.5H7.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                <path d="M10.5 10.5H17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                <path d="M10.5 17.5H17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                <path d="M8 3.5C8 2.67157 8.67157 2 9.5 2H14.5C15.3284 2 16 2.67157 16 3.5V4.5C16 5.32843 15.3284 6 14.5 6H9.5C8.67157 6 8 5.32843 8 4.5V3.5Z" stroke="currentColor" stroke-width="1.5"/>
                                <path d="M21 16.0002C21 18.8286 21 20.2429 20.1213 21.1215C19.2426 22.0002 17.8284 22.0002 15 22.0002H9C6.17157 22.0002 4.75736 22.0002 3.87868 21.1215C3 20.2429 3 18.8286 3 16.0002V13.0002M16 4.00195C18.175 4.01406 19.3529 4.11051 20.1213 4.87889C21 5.75757 21 7.17179 21 10.0002V12.0002M8 4.00195C5.82497 4.01406 4.64706 4.11051 3.87868 4.87889C3.11032 5.64725 3.01385 6.82511 3.00174 9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-navy-900 mb-4">
                            {{ __('app.catalog') }}
                        </h3>
                        <p class="text-navy-700 mb-6 leading-relaxed">
                            {{ __('app.catalog_desc') }}
                        </p>
                        <ul class="space-y-2 mb-6">
                            <li class="flex items-center text-navy-600">
                                <svg class="w-4 h-4 text-orange-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                {{ __('app.product_filtering_feature') }}
                            </li>
                            <li class="flex items-center text-navy-600">
                                <svg class="w-4 h-4 text-orange-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                {{ __('app.search_functionality_feature') }}
                            </li>
                            <li class="flex items-center text-navy-600">
                                <svg class="w-4 h-4 text-orange-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                {{ __('app.detail_pages_feature') }}
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Business Card --}}
                <div class="group relative bg-white border border-trust-200 rounded-2xl p-8 hover:shadow-xl hover:border-trust-300 transition-all duration-300">
                    <div class="absolute inset-0 bg-gradient-to-br from-red-50 to-red-100 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div class="relative">
                        <div class="w-16 h-16 bg-red-100 rounded-xl flex items-center justify-center mb-6 group-hover:bg-red-200 transition-colors shadow-sm">
                            <svg class="w-8 h-8 text-red-600" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="12" cy="6" r="4" stroke="currentColor" stroke-width="1.5"/>
                                <path d="M19.9975 18C20 17.8358 20 17.669 20 17.5C20 15.0147 16.4183 13 12 13C7.58172 13 4 15.0147 4 17.5C4 19.9853 4 22 12 22C14.231 22 15.8398 21.8433 17 21.5634" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-navy-900 mb-4">
                            {{ __('app.business_card') }}
                        </h3>
                        <p class="text-navy-700 mb-6 leading-relaxed">
                            {{ __('app.business_card_desc') }}
                        </p>
                        <ul class="space-y-2 mb-6">
                            <li class="flex items-center text-navy-600">
                                <svg class="w-4 h-4 text-red-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                {{ __('app.simple_design_feature') }}
                            </li>
                            <li class="flex items-center text-navy-600">
                                <svg class="w-4 h-4 text-red-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                {{ __('app.fast_loading_feature') }}
                            </li>
                            <li class="flex items-center text-navy-600">
                                <svg class="w-4 h-4 text-red-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                {{ __('app.contact_information_feature') }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('contact', ['locale' => app()->getLocale()]) }}" 
                   class="bg-gradient-to-r from-trust-600 to-trust-700 hover:from-trust-700 hover:to-trust-800 text-white px-8 py-4 rounded-lg font-semibold transition-all transform hover:scale-105 shadow-lg hover:shadow-xl">
                    {{ __('app.get_consultation') }}
                </a>
                    </div>
                </div>
    </section>

    {{-- Why Choose Us --}}
    <section class="bg-gray-50 py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-navy-900 mb-4">
                    @if(app()->getLocale() === 'uk')
                        Чому обирають нас
                    @else
                        Why Choose Us
                    @endif
                </h2>
                <p class="text-xl text-navy-700 max-w-3xl mx-auto">
                    @if(app()->getLocale() === 'uk')
                        Наш підхід до роботи та досвід роботи з клієнтами
                    @else
                        Our approach to work and experience with clients
                    @endif
                </p>
                </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                {{-- Modern Technologies --}}
                <div class="group relative bg-white border border-trust-200 rounded-2xl p-8 hover:shadow-xl hover:border-trust-300 transition-all duration-300">
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div class="relative">
                        <div class="w-16 h-16 bg-blue-100 rounded-xl flex items-center justify-center mb-6 group-hover:bg-blue-200 transition-colors shadow-sm">
                            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-navy-900 mb-4">
                            @if(app()->getLocale() === 'uk')
                                Сучасні технології
                            @else
                                Modern Technologies
                            @endif
                        </h3>
                        <p class="text-navy-700 mb-6 leading-relaxed">
                            @if(app()->getLocale() === 'uk')
                                Використовуємо найновіші фреймворки та інструменти для створення швидких та надійних рішень
                            @else
                                We use the latest frameworks and tools to create fast and reliable solutions
                            @endif
                        </p>
                        <ul class="space-y-2 mb-6">
                            <li class="flex items-center text-navy-600">
                                <svg class="w-4 h-4 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Laravel, React, Vue.js
                            </li>
                            <li class="flex items-center text-navy-600">
                                <svg class="w-4 h-4 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                @if(app()->getLocale() === 'uk')
                                    Адаптивний дизайн
                                @else
                                    Responsive design
                                @endif
                            </li>
                            <li class="flex items-center text-navy-600">
                                <svg class="w-4 h-4 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                @if(app()->getLocale() === 'uk')
                                    SEO оптимізація
                                @else
                                    SEO optimization
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- User-Centered Design --}}
                <div class="group relative bg-white border border-trust-200 rounded-2xl p-8 hover:shadow-xl hover:border-trust-300 transition-all duration-300">
                    <div class="absolute inset-0 bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div class="relative">
                        <div class="w-16 h-16 bg-purple-100 rounded-xl flex items-center justify-center mb-6 group-hover:bg-purple-200 transition-colors shadow-sm">
                            <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-navy-900 mb-4">
                            @if(app()->getLocale() === 'uk')
                                Користувацький підхід
                            @else
                                User-Centered Approach
                            @endif
                        </h3>
                        <p class="text-navy-700 mb-6 leading-relaxed">
                            @if(app()->getLocale() === 'uk')
                                Створюємо інтерфейси, орієнтовані на користувача, що забезпечують зручність та ефективність
                            @else
                                We create user-oriented interfaces that ensure convenience and efficiency
                            @endif
                        </p>
                        <ul class="space-y-2 mb-6">
                            <li class="flex items-center text-navy-600">
                                <svg class="w-4 h-4 text-purple-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                @if(app()->getLocale() === 'uk')
                                    UX дослідження
                                @else
                                    UX research
                                @endif
                            </li>
                            <li class="flex items-center text-navy-600">
                                <svg class="w-4 h-4 text-purple-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                @if(app()->getLocale() === 'uk')
                                    Прототипування
                                @else
                                    Prototyping
                                @endif
                            </li>
                            <li class="flex items-center text-navy-600">
                                <svg class="w-4 h-4 text-purple-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                @if(app()->getLocale() === 'uk')
                                    Тестування
                                @else
                                    Testing
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Marketing Results --}}
                <div class="group relative bg-white border border-trust-200 rounded-2xl p-8 hover:shadow-xl hover:border-trust-300 transition-all duration-300">
                    <div class="absolute inset-0 bg-gradient-to-br from-green-50 to-green-100 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div class="relative">
                        <div class="w-16 h-16 bg-green-100 rounded-xl flex items-center justify-center mb-6 group-hover:bg-green-200 transition-colors shadow-sm">
                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-navy-900 mb-4">
                            @if(app()->getLocale() === 'uk')
                                Маркетингові результати
                            @else
                                Marketing Results
                            @endif
                        </h3>
                        <p class="text-navy-700 mb-6 leading-relaxed">
                            @if(app()->getLocale() === 'uk')
                                Забезпечуємо зростання впізнаваності бренду та збільшення продажів через ефективний цифровий маркетинг
                            @else
                                We ensure brand awareness growth and increased sales through effective digital marketing
                            @endif
                        </p>
                        <ul class="space-y-2 mb-6">
                            <li class="flex items-center text-navy-600">
                                <svg class="w-4 h-4 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                @if(app()->getLocale() === 'uk')
                                    Зростання трафіку
                                @else
                                    Traffic growth
                                @endif
                            </li>
                            <li class="flex items-center text-navy-600">
                                <svg class="w-4 h-4 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                @if(app()->getLocale() === 'uk')
                                    Підвищення конверсії
                                @else
                                    Conversion increase
                                @endif
                            </li>
                            <li class="flex items-center text-navy-600">
                                <svg class="w-4 h-4 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                @if(app()->getLocale() === 'uk')
                                    ROI аналітика
                                @else
                                    ROI analytics
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Featured Portfolio --}}
    <section class="bg-gray-50 py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-end mb-12">
                <div>
                    <h2 class="text-4xl font-bold text-gray-900 mb-4">
                        @if(app()->getLocale() === 'uk')
                            Наші успішні проекти
                        @else
                            Our Success Stories
                        @endif
                    </h2>
                    <p class="text-xl text-gray-600">
                        @if(app()->getLocale() === 'uk')
                            Рішення, які приносять результат
                        @else
                            Solutions that deliver results
                        @endif
                    </p>
                </div>
                <a href="{{ route('portfolio', ['locale' => app()->getLocale()]) }}" 
                   class="hidden md:inline-flex items-center text-blue-600 hover:text-blue-700 font-semibold">
                    @if(app()->getLocale() === 'uk')
                        Всі проекти
                    @else
                        View All Projects
                    @endif
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @php
                    $featuredProjects = \App\Models\Portfolio::published()
                        ->featured()
                        ->ordered()
                        ->take(3)
                        ->get();
                @endphp

                @forelse($featuredProjects as $project)
                    <div class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300">
                        @if($project->image)
                            <div class="aspect-video overflow-hidden">
                                <img src="{{ asset('storage/' . $project->image) }}" 
                                     alt="{{ $project->getLocalizedTitle() }}" 
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            </div>
                        @else
                            <div class="aspect-video bg-gradient-to-br from-blue-100 to-purple-100 flex items-center justify-center">
                                <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                </svg>
                            </div>
                        @endif
                        
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-3">
                                <span class="px-3 py-1 bg-blue-50 text-blue-700 text-sm rounded-full font-medium border border-blue-200">
                                    {{ __('app.project_' . $project->category) }}
                                </span>
                                @if($project->is_featured)
                                    <span class="text-yellow-500">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                        </svg>
                                    </span>
                                @endif
                            </div>

                            <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-blue-600 transition-colors">
                                <a href="{{ route('portfolio.show', ['locale' => app()->getLocale(), 'slug' => $project->slug]) }}">
                                    {{ $project->getLocalizedTitle() }}
                                </a>
                            </h3>
                            
                            <p class="text-gray-600 mb-4 leading-relaxed">
                                {{ Str::limit($project->getLocalizedDescription(), 120) }}
                            </p>

                            <div class="flex flex-wrap gap-2 mb-4">
                                @foreach(array_slice($project->technologies, 0, 3) as $tech)
                                    <span class="px-2 py-1 bg-gray-100 text-gray-700 text-xs rounded-full font-medium">
                                        {{ $tech }}
                                    </span>
                                @endforeach
                                @if(count($project->technologies) > 3)
                                    <span class="px-2 py-1 bg-gray-100 text-gray-500 text-xs rounded-full">
                                        +{{ count($project->technologies) - 3 }}
                                    </span>
                                @endif
                            </div>

                            <a href="{{ route('portfolio.show', ['locale' => app()->getLocale(), 'slug' => $project->slug]) }}" 
                               class="inline-flex items-center text-blue-600 hover:text-blue-700 font-semibold">
                                @if(app()->getLocale() === 'uk')
                                    Переглянути проект
                                @else
                                    View Project
                                @endif
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                @empty
                    {{-- Placeholder if no projects --}}
                    <div class="col-span-full text-center py-12">
                        <p class="text-gray-500">
                            @if(app()->getLocale() === 'uk')
                                Проекти з'являться тут незабаром
                            @else
                                Projects will appear here soon
                            @endif
                        </p>
                    </div>
                @endforelse
            </div>

            <div class="text-center mt-12 md:hidden">
                <a href="{{ route('portfolio', ['locale' => app()->getLocale()]) }}" 
                   class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-semibold transition-colors">
                    @if(app()->getLocale() === 'uk')
                        Всі проекти
                    @else
                        View All Projects
                    @endif
                </a>
            </div>
        </div>
    </section>

    {{-- Latest Blog Posts --}}
    <section class="bg-white py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-end mb-12">
                <div>
                    <h2 class="text-4xl font-bold text-gray-900 mb-4">
                        @if(app()->getLocale() === 'uk')
                            Останні статті
                        @else
                            Latest Insights
                        @endif
                    </h2>
                    <p class="text-xl text-gray-600">
                        @if(app()->getLocale() === 'uk')
                            Експертні думки та тренди індустрії
                        @else
                            Expert opinions and industry trends
                        @endif
                    </p>
                </div>
                <a href="{{ route('blog', ['locale' => app()->getLocale()]) }}" 
                   class="hidden md:inline-flex items-center text-blue-600 hover:text-blue-700 font-semibold">
                    @if(app()->getLocale() === 'uk')
                        Всі статті
                    @else
                        View All Posts
                    @endif
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @php
                    // Временно отключаем блог на главной
                    $latestPosts = $blogPosts;
                @endphp

                @forelse($latestPosts as $post)
                    <article class="group bg-white border border-gray-200 rounded-2xl overflow-hidden hover:shadow-xl transition-all duration-300">
                        <div class="p-6">
                            <div class="flex items-center mb-3">
                                <span class="px-3 py-1 text-xs font-medium rounded-full border" 
                                      style="background-color: {{ $post->category->color }}20; color: {{ $post->category->color }}; border-color: {{ $post->category->color }}40;">
                                    {{ $post->category->getLocalizedName() }}
                                </span>
                                <span class="ml-auto text-sm text-gray-500">
                                    {{ $post->published_at->format('M d, Y') }}
                                </span>
                            </div>

                            <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-blue-600 transition-colors">
                                <a href="{{ route('blog.show', ['locale' => app()->getLocale(), 'slug' => $post->slug]) }}">
                                    {{ $post->getLocalizedTitle() }}
                                </a>
                            </h3>
                            
                            <p class="text-gray-600 mb-4 leading-relaxed">
                                {{ Str::limit($post->getLocalizedExcerpt(), 120) }}
                            </p>

                            <div class="flex items-center justify-between">
                                <a href="{{ route('blog.show', ['locale' => app()->getLocale(), 'slug' => $post->slug]) }}" 
                                   class="inline-flex items-center text-blue-600 hover:text-blue-700 font-semibold">
                                    @if(app()->getLocale() === 'uk')
                                        Читати далі
                                    @else
                                        Read More
                                    @endif
                                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                    </svg>
                                </a>
                                <div class="flex items-center text-gray-500 text-sm">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    {{ $post->reading_time }} 
                                    @if(app()->getLocale() === 'uk')
                                        хв
                                    @else
                                        min
                                    @endif
                                </div>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="col-span-full text-center py-12">
                        <p class="text-gray-500">
                            @if(app()->getLocale() === 'uk')
                                Статті з'являться тут незабаром
                            @else
                                Blog posts will appear here soon
                            @endif
                        </p>
                    </div>
                @endforelse
            </div>

            <div class="text-center mt-12 md:hidden">
                <a href="{{ route('blog', ['locale' => app()->getLocale()]) }}" 
                   class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-semibold transition-colors">
                    @if(app()->getLocale() === 'uk')
                        Всі статті
                    @else
                        View All Posts
                    @endif
                </a>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="bg-gradient-to-br from-navy-900 via-trust-800 to-navy-800 py-24 relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-trust-900/20 to-navy-900/20"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
                @if(app()->getLocale() === 'uk')
                    Готові трансформувати ваш бізнес?
                @else
                    Ready to Transform Your Business?
                @endif
            </h2>
            <p class="text-xl text-trust-100 mb-8 max-w-3xl mx-auto leading-relaxed">
                @if(app()->getLocale() === 'uk')
                    Розкажіть нам про ваші виклики, і ми створимо технологічне рішення, яке допоможе вам досягти ваших цілей
                @else
                    Tell us about your challenges and we'll create a technology solution that helps you achieve your goals
                @endif
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('contact', ['locale' => app()->getLocale()]) }}" 
                   class="bg-white hover:bg-trust-50 text-trust-800 hover:text-trust-900 px-8 py-4 rounded-lg font-semibold transition-all transform hover:scale-105 shadow-lg hover:shadow-xl">
                    @if(app()->getLocale() === 'uk')
                        Безкоштовна консультація
                    @else
                        Free Consultation
                    @endif
                </a>
                <a href="{{ route('capabilities.data-analytics', ['locale' => app()->getLocale()]) }}" 
                   class="border-2 border-white text-white hover:bg-white hover:text-trust-800 px-8 py-4 rounded-lg font-semibold transition-all">
                    @if(app()->getLocale() === 'uk')
                        Наші можливості
                    @else
                        Our Capabilities
                    @endif
                </a>
            </div>
        </div>
    </section>
</x-layouts.app>
