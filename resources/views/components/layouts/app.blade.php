<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" itemscope itemtype="https://schema.org/WebSite">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('favicon.ico') }}">
    
    {{-- SEO Meta Tags --}}
    @php
        $seoSettings = \App\Models\SeoSetting::getForPage(request()->route()->getName() ?? 'home');
        $currentUrl = url()->current();
        $canonicalUrl = $seoSettings?->custom_meta['canonical'] ?? $currentUrl;
    @endphp
    
    <title>{{ $seoSettings?->getLocalizedTitle() ?? config('app.name') }}</title>
    <meta name="description" content="{{ $seoSettings?->getLocalizedDescription() ?? 'Professional web development, UI/UX design and digital marketing services' }}">
    <meta name="keywords" content="{{ implode(', ', $seoSettings?->getLocalizedKeywords() ?? []) }}">
    <meta name="author" content="{{ $seoSettings?->custom_meta['author'] ?? 'YouDev Team' }}">
    <meta name="robots" content="{{ $seoSettings?->custom_meta['robots'] ?? 'index, follow' }}">
    <meta name="googlebot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <meta name="bingbot" content="index, follow">
    
    {{-- Canonical URL --}}
    <link rel="canonical" href="{{ $canonicalUrl }}">
    
    {{-- Alternate Language Versions --}}
    <link rel="alternate" hreflang="uk" href="{{ str_replace('/en', '', $currentUrl) }}">
    <link rel="alternate" hreflang="en" href="{{ str_replace('/uk', '/en', $currentUrl) }}">
    <link rel="alternate" hreflang="x-default" href="{{ str_replace('/en', '', $currentUrl) }}">
    
    {{-- Open Graph Meta Tags --}}
    <meta property="og:title" content="{{ $seoSettings?->getLocalizedTitle() ?? config('app.name') }}">
    <meta property="og:description" content="{{ $seoSettings?->getLocalizedDescription() ?? 'Professional web development, UI/UX design and digital marketing services' }}">
    <meta property="og:image" content="{{ $seoSettings?->og_image ? asset('storage/' . $seoSettings->og_image) : asset('images/og-default.png') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="{{ $seoSettings?->getLocalizedTitle() ?? config('app.name') }}">
    <meta property="og:url" content="{{ $currentUrl }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="YouDev">
    <meta property="og:locale" content="{{ app()->getLocale() === 'uk' ? 'uk_UA' : 'en_US' }}">
    
    {{-- Twitter Meta Tags --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@YouDev_team">
    <meta name="twitter:creator" content="@YouDev_team">
    <meta name="twitter:title" content="{{ $seoSettings?->getLocalizedTitle() ?? config('app.name') }}">
    <meta name="twitter:description" content="{{ $seoSettings?->getLocalizedDescription() ?? 'Professional web development, UI/UX design and digital marketing services' }}">
    <meta name="twitter:image" content="{{ $seoSettings?->og_image ? asset('storage/' . $seoSettings->og_image) : asset('images/og-default.png') }}">
    <meta name="twitter:image:alt" content="{{ $seoSettings?->getLocalizedTitle() ?? config('app.name') }}">
    
    {{-- Additional SEO Meta Tags --}}
    <meta name="geo.region" content="{{ $seoSettings?->custom_meta['geo.region'] ?? 'UA' }}">
    <meta name="geo.country" content="{{ $seoSettings?->custom_meta['geo.country'] ?? 'Ukraine' }}">
    <meta name="language" content="{{ $seoSettings?->custom_meta['language'] ?? 'uk, en' }}">
    <meta name="theme-color" content="#1e40af">
    <meta name="msapplication-TileColor" content="#1e40af">
    
    {{-- DNS Prefetch for Performance --}}
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link rel="dns-prefetch" href="//www.google-analytics.com">
    
    {{-- Fonts with Preload --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="preload" href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap"></noscript>
    
    {{-- Structured Data --}}
    <script type="application/ld+json">
    {!! json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'Organization',
        'name' => 'YouDev',
        'url' => url('/'),
        'logo' => asset('images/logo.svg'),
        'description' => $seoSettings?->getLocalizedDescription() ?? 'Professional web development, UI/UX design and digital marketing services',
        'address' => [
            '@type' => 'PostalAddress',
            'addressCountry' => 'UA',
            'addressRegion' => 'Ukraine'
        ],
        'contactPoint' => [
            '@type' => 'ContactPoint',
            'contactType' => 'customer service',
            'availableLanguage' => ['Ukrainian', 'English']
        ],
        'sameAs' => [
            'https://www.linkedin.com/company/YouDev',
            'https://github.com/YouDev-team',
            'https://twitter.com/YouDev_team'
        ],
        'foundingDate' => '2020',
        'numberOfEmployees' => '5-10',
        'areaServed' => 'Worldwide',
        'serviceType' => ['Web Development', 'UI/UX Design', 'Digital Marketing'],
        'hasOfferCatalog' => [
            '@type' => 'OfferCatalog',
            'name' => 'Web Development Services',
            'itemListElement' => [
                [
                    '@type' => 'Offer',
                    'itemOffered' => [
                        '@type' => 'Service',
                        'name' => 'Web Development',
                        'description' => 'Modern websites and web applications'
                    ]
                ],
                [
                    '@type' => 'Offer',
                    'itemOffered' => [
                        '@type' => 'Service',
                        'name' => 'UI/UX Design',
                        'description' => 'User interface and user experience design'
                    ]
                ],
                [
                    '@type' => 'Offer',
                    'itemOffered' => [
                        '@type' => 'Service',
                        'name' => 'Digital Marketing',
                        'description' => 'Digital marketing and SEO services'
                    ]
                ]
            ]
        ]
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
    </script>
    
    {{-- Website Structured Data --}}
    <script type="application/ld+json">
    {!! json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'WebSite',
        'name' => 'YouDev',
        'url' => url('/'),
        'potentialAction' => [
            '@type' => 'SearchAction',
            'target' => url('/search') . '?q={search_term_string}',
            'query-input' => 'required name=search_term_string'
        ]
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
    </script>
    
    {{-- Styles --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    {{-- Additional Head Content --}}
    @stack('head')
</head>
<body class="bg-trust-50 font-sans antialiased">
    {{-- Navigation --}}
    <x-navigation />
    
    {{-- Main Content --}}
    <main class="pt-20">
        {{ $slot }}
    </main>
    
    {{-- Footer --}}
    <x-footer />
    
    {{-- Language Switcher --}}
    <x-language-switcher />
    
    {{-- Scripts --}}
    @stack('scripts')
    
    {{-- Analytics --}}
    @if(config('services.google_analytics.id'))
        <!-- Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ config('services.google_analytics.id') }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', '{{ config('services.google_analytics.id') }}');
        </script>
    @endif
</body>
</html>
