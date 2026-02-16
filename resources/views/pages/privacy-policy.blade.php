<x-layouts.app>
    <section class="bg-navy-950 pt-24 pb-20 relative overflow-hidden">
        <div class="absolute inset-0 bg-grid-subtle opacity-20"></div>
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <p class="section-label text-trust-400 mb-4">{{ __('app.privacy_policy') }}</p>
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">
                {{ __('app.privacy_policy') }}
            </h1>
            <p class="text-xl text-navy-300 max-w-2xl mx-auto">
                {{ __('app.privacy_policy_subtitle') }}
            </p>
            <p class="text-sm text-navy-500 mt-4">
                {{ __('app.last_updated') }}: {{ __('app.privacy_last_updated') }}
            </p>
        </div>
    </section>

    <section class="bg-white py-20">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="prose prose-lg max-w-none">
                
                <h2 class="text-2xl font-bold text-navy-900 mb-6">{{ __('app.privacy_section_1_title') }}</h2>
                <p class="text-navy-700 mb-6 leading-relaxed">
                    {{ __('app.privacy_section_1_content') }}
                </p>

                <h2 class="text-2xl font-bold text-navy-900 mb-6">{{ __('app.privacy_section_2_title') }}</h2>
                <p class="text-navy-700 mb-6 leading-relaxed">
                    {{ __('app.privacy_section_2_content') }}
                </p>
                
                <ul class="list-disc list-inside text-navy-700 mb-6 space-y-2">
                    <li>{{ __('app.privacy_data_type_1') }}</li>
                    <li>{{ __('app.privacy_data_type_2') }}</li>
                    <li>{{ __('app.privacy_data_type_3') }}</li>
                    <li>{{ __('app.privacy_data_type_4') }}</li>
                    <li>{{ __('app.privacy_data_type_5') }}</li>
                </ul>

                <h2 class="text-2xl font-bold text-navy-900 mb-6">{{ __('app.privacy_section_3_title') }}</h2>
                <p class="text-navy-700 mb-6 leading-relaxed">
                    {{ __('app.privacy_section_3_content') }}
                </p>
                
                <ul class="list-disc list-inside text-navy-700 mb-6 space-y-2">
                    <li>{{ __('app.privacy_usage_1') }}</li>
                    <li>{{ __('app.privacy_usage_2') }}</li>
                    <li>{{ __('app.privacy_usage_3') }}</li>
                    <li>{{ __('app.privacy_usage_4') }}</li>
                    <li>{{ __('app.privacy_usage_5') }}</li>
                </ul>

                <h2 class="text-2xl font-bold text-navy-900 mb-6">{{ __('app.privacy_section_4_title') }}</h2>
                <p class="text-navy-700 mb-6 leading-relaxed">
                    {{ __('app.privacy_section_4_content') }}
                </p>

                <h2 class="text-2xl font-bold text-navy-900 mb-6">{{ __('app.privacy_section_5_title') }}</h2>
                <p class="text-navy-700 mb-6 leading-relaxed">
                    {{ __('app.privacy_section_5_content') }}
                </p>

                <h2 class="text-2xl font-bold text-navy-900 mb-6">{{ __('app.privacy_section_6_title') }}</h2>
                <p class="text-navy-700 mb-6 leading-relaxed">
                    {{ __('app.privacy_section_6_content') }}
                </p>

                <h2 class="text-2xl font-bold text-navy-900 mb-6">{{ __('app.privacy_section_7_title') }}</h2>
                <p class="text-navy-700 mb-6 leading-relaxed">
                    {{ __('app.privacy_section_7_content') }}
                </p>

                <h2 class="text-2xl font-bold text-navy-900 mb-6">{{ __('app.privacy_section_8_title') }}</h2>
                <p class="text-navy-700 mb-6 leading-relaxed">
                    {{ __('app.privacy_section_8_content') }}
                </p>

                <h2 class="text-2xl font-bold text-navy-900 mb-6">{{ __('app.privacy_section_9_title') }}</h2>
                <p class="text-navy-700 mb-6 leading-relaxed">
                    {{ __('app.privacy_section_9_content') }}
                </p>

                <h2 class="text-2xl font-bold text-navy-900 mb-6">{{ __('app.privacy_section_10_title') }}</h2>
                <p class="text-navy-700 mb-6 leading-relaxed">
                    {{ __('app.privacy_section_10_content') }}
                </p>

                <div class="bg-trust-50 border-l-4 border-trust-600 p-6 mt-8">
                    <h3 class="text-lg font-semibold text-navy-900 mb-2">{{ __('app.privacy_contact_title') }}</h3>
                    <p class="text-navy-700 mb-2">{{ __('app.privacy_contact_email') }}: <a href="mailto:andrey@stetsenko.org" class="text-trust-600 hover:text-trust-700">andrey@stetsenko.org</a></p>
                    <p class="text-navy-700">{{ __('app.privacy_contact_address') }}</p>
                </div>

            </div>
        </div>
    </section>
</x-layouts.app>
