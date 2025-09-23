<x-layouts.app>
    {{-- Hero Section --}}
    <section class="bg-gradient-to-br from-trust-50 via-white to-navy-50 pt-20 pb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-navy-900 mb-4">
                    {{ __('app.terms_of_service') }}
                </h1>
                <p class="text-xl text-navy-700 max-w-3xl mx-auto">
                    {{ __('app.terms_subtitle') }}
                </p>
                <p class="text-sm text-gray-500 mt-4">
                    {{ __('app.last_updated') }}: {{ __('app.terms_last_updated') }}
                </p>
            </div>
        </div>
    </section>

    {{-- Content --}}
    <section class="bg-white py-20">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="prose prose-lg max-w-none">
                
                <h2 class="text-2xl font-bold text-navy-900 mb-6">{{ __('app.terms_section_1_title') }}</h2>
                <p class="text-navy-700 mb-6 leading-relaxed">
                    {{ __('app.terms_section_1_content') }}
                </p>

                <h2 class="text-2xl font-bold text-navy-900 mb-6">{{ __('app.terms_section_2_title') }}</h2>
                <p class="text-navy-700 mb-6 leading-relaxed">
                    {{ __('app.terms_section_2_content') }}
                </p>
                
                <ul class="list-disc list-inside text-navy-700 mb-6 space-y-2">
                    <li>{{ __('app.terms_service_1') }}</li>
                    <li>{{ __('app.terms_service_2') }}</li>
                    <li>{{ __('app.terms_service_3') }}</li>
                    <li>{{ __('app.terms_service_4') }}</li>
                    <li>{{ __('app.terms_service_5') }}</li>
                    <li>{{ __('app.terms_service_6') }}</li>
                </ul>

                <h2 class="text-2xl font-bold text-navy-900 mb-6">{{ __('app.terms_section_3_title') }}</h2>
                <p class="text-navy-700 mb-6 leading-relaxed">
                    {{ __('app.terms_section_3_content') }}
                </p>

                <h2 class="text-2xl font-bold text-navy-900 mb-6">{{ __('app.terms_section_4_title') }}</h2>
                <p class="text-navy-700 mb-6 leading-relaxed">
                    {{ __('app.terms_section_4_content') }}
                </p>

                <h2 class="text-2xl font-bold text-navy-900 mb-6">{{ __('app.terms_section_5_title') }}</h2>
                <p class="text-navy-700 mb-6 leading-relaxed">
                    {{ __('app.terms_section_5_content') }}
                </p>

                <h2 class="text-2xl font-bold text-navy-900 mb-6">{{ __('app.terms_section_6_title') }}</h2>
                <p class="text-navy-700 mb-6 leading-relaxed">
                    {{ __('app.terms_section_6_content') }}
                </p>

                <h2 class="text-2xl font-bold text-navy-900 mb-6">{{ __('app.terms_section_7_title') }}</h2>
                <p class="text-navy-700 mb-6 leading-relaxed">
                    {{ __('app.terms_section_7_content') }}
                </p>

                <h2 class="text-2xl font-bold text-navy-900 mb-6">{{ __('app.terms_section_8_title') }}</h2>
                <p class="text-navy-700 mb-6 leading-relaxed">
                    {{ __('app.terms_section_8_content') }}
                </p>

                <h2 class="text-2xl font-bold text-navy-900 mb-6">{{ __('app.terms_section_9_title') }}</h2>
                <p class="text-navy-700 mb-6 leading-relaxed">
                    {{ __('app.terms_section_9_content') }}
                </p>

                <h2 class="text-2xl font-bold text-navy-900 mb-6">{{ __('app.terms_section_10_title') }}</h2>
                <p class="text-navy-700 mb-6 leading-relaxed">
                    {{ __('app.terms_section_10_content') }}
                </p>

                <div class="bg-trust-50 border-l-4 border-trust-600 p-6 mt-8">
                    <h3 class="text-lg font-semibold text-navy-900 mb-2">{{ __('app.terms_contact_title') }}</h3>
                    <p class="text-navy-700 mb-2">{{ __('app.terms_contact_email') }}: <a href="mailto:andrey@stetsenko.org" class="text-trust-600 hover:text-trust-700">andrey@stetsenko.org</a></p>
                    <p class="text-navy-700">{{ __('app.terms_contact_address') }}</p>
                </div>

            </div>
        </div>
    </section>
</x-layouts.app>
