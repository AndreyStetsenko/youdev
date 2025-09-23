<x-layouts.app>
    <section class="bg-gray-50 pt-20 pb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                    {{ __('app.contact_title') }}
                </h1>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    {{ __('app.contact_subtitle') }}
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                {{-- Contact Form --}}
                <div class="bg-white rounded-xl p-8 shadow-lg">
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('contact.store', ['locale' => app()->getLocale()]) }}" 
                          x-data="contactForm()" @submit="submitForm">
                        @csrf
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                    {{ __('app.name') }} *
                                </label>
                                <input type="text" name="name" id="name" required
                                       value="{{ old('name') }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('name') border-red-500 @enderror">
                                @error('name')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                    {{ __('app.email') }} *
                                </label>
                                <input type="email" name="email" id="email" required
                                       value="{{ old('email') }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('email') border-red-500 @enderror">
                                @error('email')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                                    {{ __('app.phone') }}
                                </label>
                                <input type="tel" name="phone" id="phone"
                                       value="{{ old('phone') }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('phone') border-red-500 @enderror">
                                @error('phone')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="company" class="block text-sm font-medium text-gray-700 mb-2">
                                    {{ __('app.company') }}
                                </label>
                                <input type="text" name="company" id="company"
                                       value="{{ old('company') }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('company') border-red-500 @enderror">
                                @error('company')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label for="project_type" class="block text-sm font-medium text-gray-700 mb-2">
                                    {{ __('app.project_type') }} *
                                </label>
                                <select name="project_type" id="project_type" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('project_type') border-red-500 @enderror">
                                    <option value="">Choose project type</option>
                                    <option value="web" {{ old('project_type') == 'web' ? 'selected' : '' }}>{{ __('app.project_web') }}</option>
                                    <option value="website" {{ old('project_type') == 'website' ? 'selected' : '' }}>{{ __('app.project_website') }}</option>
                                    <option value="ecommerce" {{ old('project_type') == 'ecommerce' ? 'selected' : '' }}>{{ __('app.project_ecommerce') }}</option>
                                    <option value="design" {{ old('project_type') == 'design' ? 'selected' : '' }}>{{ __('app.project_design') }}</option>
                                    <option value="marketing" {{ old('project_type') == 'marketing' ? 'selected' : '' }}>{{ __('app.project_marketing') }}</option>
                                    <option value="other" {{ old('project_type') == 'other' ? 'selected' : '' }}>{{ __('app.project_other') }}</option>
                                </select>
                                @error('project_type')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="budget_range" class="block text-sm font-medium text-gray-700 mb-2">
                                    {{ __('app.budget_range') }} *
                                </label>
                                <select name="budget_range" id="budget_range" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('budget_range') border-red-500 @enderror">
                                    <option value="">Choose budget range</option>
                                    <option value="under_5k" {{ old('budget_range') == 'under_5k' ? 'selected' : '' }}>{{ __('app.budget_under_5k') }}</option>
                                    <option value="5k_15k" {{ old('budget_range') == '5k_15k' ? 'selected' : '' }}>{{ __('app.budget_5k_15k') }}</option>
                                    <option value="15k_50k" {{ old('budget_range') == '15k_50k' ? 'selected' : '' }}>{{ __('app.budget_15k_50k') }}</option>
                                    <option value="50k_100k" {{ old('budget_range') == '50k_100k' ? 'selected' : '' }}>{{ __('app.budget_50k_100k') }}</option>
                                    <option value="over_100k" {{ old('budget_range') == 'over_100k' ? 'selected' : '' }}>{{ __('app.budget_over_100k') }}</option>
                                </select>
                                @error('budget_range')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-6">
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-2">
                                {{ __('app.message') }} *
                            </label>
                            <textarea name="message" id="message" rows="6" required
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('message') border-red-500 @enderror">{{ old('message') }}</textarea>
                            @error('message')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" 
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 px-6 rounded-lg font-medium transition-colors"
                                :disabled="loading"
                                :class="{ 'opacity-50 cursor-not-allowed': loading }">
                            <span x-show="!loading">{{ __('app.send_request') }}</span>
                            <span x-show="loading" class="flex items-center justify-center">
                                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                Sending...
                            </span>
                        </button>
                    </form>
                </div>

                {{-- Contact Information --}}
                <div class="space-y-8">
                    <div class="bg-white rounded-xl p-8 shadow-lg">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6">{{ __('app.contact_info') }}</h3>
                        
                        <div class="space-y-6">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-lg font-medium text-gray-900">Email</h4>
                                    <p class="text-gray-600">andrey@stetsenko.org</p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-lg font-medium text-gray-900">Phone</h4>
                                    <p class="text-gray-600">+380 (67) 100-16-64</p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                                        <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-lg font-medium text-gray-900">Address</h4>
                                    <p class="text-gray-600">Kyiv, Ukraine</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Response Time --}}
                    <div class="bg-gradient-to-r from-blue-50 to-purple-50 rounded-xl p-8">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Quick Response</h3>
                        <p class="text-gray-600 mb-4">
                            We typically respond to all inquiries within 24 hours. For urgent matters, please call us directly.
                        </p>
                        <div class="flex items-center text-blue-600">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span class="font-medium">Response time: &lt; 24 hours</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
    <script>
        function contactForm() {
            return {
                loading: false,
                submitForm(event) {
                    this.loading = true;
                    // Form will submit normally, loading state will reset on page reload
                }
            }
        }
    </script>
    @endpush
</x-layouts.app>
