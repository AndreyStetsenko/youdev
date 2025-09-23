<x-admin.layouts.app>
    @section('title', 'SEO Settings')
    @section('subtitle', 'Manage meta tags and SEO optimization for all pages')

    <div class="bg-white rounded-lg shadow">
        <form method="POST" action="{{ route('admin.seo-settings.update') }}">
            @csrf
            
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">SEO Settings</h3>
                <p class="text-sm text-gray-600 mt-1">Configure meta titles, descriptions, and keywords for each page</p>
            </div>

            <div class="p-6 space-y-8">
                @php
                    $pages = [
                        'home' => 'Home Page',
                        'about' => 'About Page',
                        'portfolio' => 'Portfolio Page',
                        'services' => 'Services Page',
                        'contact' => 'Contact Page'
                    ];
                @endphp

                @foreach($pages as $pageKey => $pageName)
                    @php
                        $pageSettings = $seoSettings[$pageKey] ?? null;
                    @endphp
                    
                    <div class="border border-gray-200 rounded-lg p-6">
                        <h4 class="text-lg font-medium text-gray-900 mb-4">{{ $pageName }}</h4>
                        
                        {{-- Meta Titles --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Meta Title (English) *
                                </label>
                                <input type="text" 
                                       name="settings[{{ $pageKey }}][title][en]" 
                                       value="{{ old("settings.{$pageKey}.title.en", $pageSettings->title['en'] ?? '') }}"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error("settings.{$pageKey}.title.en") border-red-500 @enderror"
                                       maxlength="60"
                                       required>
                                @error("settings.{$pageKey}.title.en")
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                                <p class="text-xs text-gray-500 mt-1">Recommended: 50-60 characters</p>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Meta Title (Ukrainian) *
                                </label>
                                <input type="text" 
                                       name="settings[{{ $pageKey }}][title][uk]" 
                                       value="{{ old("settings.{$pageKey}.title.uk", $pageSettings->title['uk'] ?? '') }}"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error("settings.{$pageKey}.title.uk") border-red-500 @enderror"
                                       maxlength="60"
                                       required>
                                @error("settings.{$pageKey}.title.uk")
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                                <p class="text-xs text-gray-500 mt-1">Рекомендовано: 50-60 символів</p>
                            </div>
                        </div>

                        {{-- Meta Descriptions --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Meta Description (English) *
                                </label>
                                <textarea name="settings[{{ $pageKey }}][description][en]" 
                                          rows="3"
                                          class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error("settings.{$pageKey}.description.en") border-red-500 @enderror"
                                          maxlength="160"
                                          required>{{ old("settings.{$pageKey}.description.en", $pageSettings->description['en'] ?? '') }}</textarea>
                                @error("settings.{$pageKey}.description.en")
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                                <p class="text-xs text-gray-500 mt-1">Recommended: 150-160 characters</p>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Meta Description (Ukrainian) *
                                </label>
                                <textarea name="settings[{{ $pageKey }}][description][uk]" 
                                          rows="3"
                                          class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error("settings.{$pageKey}.description.uk") border-red-500 @enderror"
                                          maxlength="160"
                                          required>{{ old("settings.{$pageKey}.description.uk", $pageSettings->description['uk'] ?? '') }}</textarea>
                                @error("settings.{$pageKey}.description.uk")
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                                <p class="text-xs text-gray-500 mt-1">Рекомендовано: 150-160 символів</p>
                            </div>
                        </div>

                        {{-- Keywords --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Keywords (English)
                                </label>
                                <input type="text" 
                                       name="settings[{{ $pageKey }}][keywords][en]" 
                                       value="{{ old("settings.{$pageKey}.keywords.en", is_array($pageSettings->keywords['en'] ?? null) ? implode(', ', $pageSettings->keywords['en']) : '') }}"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                       placeholder="keyword1, keyword2, keyword3">
                                <p class="text-xs text-gray-500 mt-1">Separate keywords with commas</p>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Keywords (Ukrainian)
                                </label>
                                <input type="text" 
                                       name="settings[{{ $pageKey }}][keywords][uk]" 
                                       value="{{ old("settings.{$pageKey}.keywords.uk", is_array($pageSettings->keywords['uk'] ?? null) ? implode(', ', $pageSettings->keywords['uk']) : '') }}"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                       placeholder="ключове слово1, ключове слово2, ключове слово3">
                                <p class="text-xs text-gray-500 mt-1">Розділяйте ключові слова комами</p>
                            </div>
                        </div>

                        {{-- Preview --}}
                        <div class="mt-6 p-4 bg-gray-50 rounded-lg">
                            <h5 class="text-sm font-medium text-gray-700 mb-2">Google Search Preview (English):</h5>
                            <div class="bg-white border rounded p-3">
                                <div class="text-blue-600 text-lg hover:underline cursor-pointer" id="preview-title-en-{{ $pageKey }}">
                                    {{ $pageSettings->title['en'] ?? 'Page Title' }}
                                </div>
                                <div class="text-green-700 text-sm" id="preview-url-{{ $pageKey }}">
                                    {{ url('/en/' . ($pageKey === 'home' ? '' : $pageKey)) }}
                                </div>
                                <div class="text-gray-600 text-sm mt-1" id="preview-description-en-{{ $pageKey }}">
                                    {{ $pageSettings->description['en'] ?? 'Page description...' }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="px-6 py-4 border-t border-gray-200 flex justify-end">
                <button type="submit" 
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-medium transition-colors">
                    Save SEO Settings
                </button>
            </div>
        </form>
    </div>

    {{-- SEO Tips --}}
    <div class="mt-8 bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">SEO Best Practices</h3>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="flex items-start">
                    <div class="flex-shrink-0 w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-sm font-medium text-gray-900 mb-1">Title Tags</h4>
                        <p class="text-sm text-gray-600">Keep titles under 60 characters and include your main keyword near the beginning.</p>
                    </div>
                </div>

                <div class="flex items-start">
                    <div class="flex-shrink-0 w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/>
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-sm font-medium text-gray-900 mb-1">Meta Descriptions</h4>
                        <p class="text-sm text-gray-600">Write compelling descriptions under 160 characters that encourage clicks.</p>
                    </div>
                </div>

                <div class="flex items-start">
                    <div class="flex-shrink-0 w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                        <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-sm font-medium text-gray-900 mb-1">Keywords</h4>
                        <p class="text-sm text-gray-600">Focus on 3-5 relevant keywords per page and use them naturally in content.</p>
                    </div>
                </div>

                <div class="flex items-start">
                    <div class="flex-shrink-0 w-8 h-8 bg-yellow-100 rounded-lg flex items-center justify-center mr-3">
                        <svg class="w-4 h-4 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9v-9m0-9v9"/>
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-sm font-medium text-gray-900 mb-1">Multilingual SEO</h4>
                        <p class="text-sm text-gray-600">Optimize content for both languages with culturally relevant keywords.</p>
                    </div>
                </div>

                <div class="flex items-start">
                    <div class="flex-shrink-0 w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center mr-3">
                        <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-sm font-medium text-gray-900 mb-1">Unique Content</h4>
                        <p class="text-sm text-gray-600">Ensure each page has unique titles and descriptions to avoid duplication.</p>
                    </div>
                </div>

                <div class="flex items-start">
                    <div class="flex-shrink-0 w-8 h-8 bg-indigo-100 rounded-lg flex items-center justify-center mr-3">
                        <svg class="w-4 h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-sm font-medium text-gray-900 mb-1">Monitor Performance</h4>
                        <p class="text-sm text-gray-600">Use Google Analytics and Search Console to track SEO performance.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        // Live preview updates
        document.querySelectorAll('input[name*="[title][en]"]').forEach(input => {
            input.addEventListener('input', function() {
                const pageKey = this.name.match(/settings\[(\w+)\]/)[1];
                const previewElement = document.getElementById(`preview-title-en-${pageKey}`);
                if (previewElement) {
                    previewElement.textContent = this.value || 'Page Title';
                }
            });
        });

        document.querySelectorAll('textarea[name*="[description][en]"]').forEach(textarea => {
            textarea.addEventListener('input', function() {
                const pageKey = this.name.match(/settings\[(\w+)\]/)[1];
                const previewElement = document.getElementById(`preview-description-en-${pageKey}`);
                if (previewElement) {
                    previewElement.textContent = this.value || 'Page description...';
                }
            });
        });

        // Character counters
        document.querySelectorAll('input[maxlength], textarea[maxlength]').forEach(element => {
            const maxLength = element.getAttribute('maxlength');
            const counter = document.createElement('div');
            counter.className = 'text-xs text-gray-400 mt-1 text-right';
            counter.textContent = `${element.value.length}/${maxLength}`;
            element.parentNode.appendChild(counter);

            element.addEventListener('input', function() {
                counter.textContent = `${this.value.length}/${maxLength}`;
                if (this.value.length > maxLength * 0.9) {
                    counter.className = 'text-xs text-orange-500 mt-1 text-right';
                } else {
                    counter.className = 'text-xs text-gray-400 mt-1 text-right';
                }
            });
        });
    </script>
    @endpush
</x-admin.layouts.app>
