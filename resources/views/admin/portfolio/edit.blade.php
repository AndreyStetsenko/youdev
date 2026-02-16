<x-admin.layouts.app>
    @section('title', 'Edit Project')
    @section('subtitle', 'Update project information')

    <div class="bg-white rounded-lg shadow">
        <form method="POST" action="{{ route('admin.portfolio.update', $portfolio) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Edit Project: {{ $portfolio->getLocalizedTitle() }}</h3>
            </div>

            <div class="p-6 space-y-6">
                {{-- Title Fields --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="title_en" class="block text-sm font-medium text-gray-700 mb-2">
                            Title (English) *
                        </label>
                        <input type="text" name="title[en]" id="title_en" required
                               value="{{ old('title.en', $portfolio->title['en'] ?? '') }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('title.en') border-red-500 @enderror">
                        @error('title.en')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="title_uk" class="block text-sm font-medium text-gray-700 mb-2">
                            Title (Ukrainian) *
                        </label>
                        <input type="text" name="title[uk]" id="title_uk" required
                               value="{{ old('title.uk', $portfolio->title['uk'] ?? '') }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('title.uk') border-red-500 @enderror">
                        @error('title.uk')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Description Fields --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="description_en" class="block text-sm font-medium text-gray-700 mb-2">
                            Description (English) *
                        </label>
                        <textarea name="description[en]" id="description_en" rows="4" required
                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('description.en') border-red-500 @enderror">{{ old('description.en', $portfolio->description['en'] ?? '') }}</textarea>
                        @error('description.en')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="description_uk" class="block text-sm font-medium text-gray-700 mb-2">
                            Description (Ukrainian) *
                        </label>
                        <textarea name="description[uk]" id="description_uk" rows="4" required
                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('description.uk') border-red-500 @enderror">{{ old('description.uk', $portfolio->description['uk'] ?? '') }}</textarea>
                        @error('description.uk')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Technologies and Image --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="technologies" class="block text-sm font-medium text-gray-700 mb-2">
                            Technologies (comma separated) *
                        </label>
                        <input type="text" name="technologies" id="technologies" required
                               value="{{ old('technologies', implode(', ', $portfolio->technologies ?? [])) }}"
                               placeholder="Laravel, Vue.js, MySQL, Docker"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('technologies') border-red-500 @enderror">
                        @error('technologies')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-700 mb-2">
                            Project Image
                        </label>
                        @if($portfolio->image)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $portfolio->image) }}" 
                                     alt="Current image" 
                                     class="h-20 w-20 object-cover rounded-lg">
                                <p class="text-sm text-gray-500 mt-1">Current image</p>
                            </div>
                        @endif
                        <input type="file" name="image" id="image" accept="image/*"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('image') border-red-500 @enderror">
                        @error('image')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <p class="text-gray-500 text-sm mt-1">Max size: 2MB. Formats: JPEG, PNG, JPG, GIF</p>
                    </div>
                </div>

                {{-- Presentation PDF --}}
                <div>
                    <label for="presentation_pdf" class="block text-sm font-medium text-gray-700 mb-2">
                        Presentation PDF
                    </label>
                    @if($portfolio->presentation_pdf)
                        <div class="mb-2 flex items-center gap-4">
                            <a href="{{ asset('storage/' . $portfolio->presentation_pdf) }}" target="_blank"
                               class="text-blue-600 hover:underline text-sm">View current PDF</a>
                            <label class="flex items-center gap-2 text-sm text-gray-600">
                                <input type="checkbox" name="remove_presentation_pdf" value="1"
                                       class="h-4 w-4 text-red-600 border-gray-300 rounded">
                                Remove PDF
                            </label>
                        </div>
                    @endif
                    <input type="file" name="presentation_pdf" id="presentation_pdf" accept=".pdf,application/pdf"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('presentation_pdf') border-red-500 @enderror">
                    @error('presentation_pdf')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    <p class="text-gray-500 text-sm mt-1">Max size: 50MB. PDF only. Upload new file to replace.</p>
                </div>

                {{-- URLs --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="url" class="block text-sm font-medium text-gray-700 mb-2">
                            Live Demo URL
                        </label>
                        <input type="url" name="url" id="url"
                               value="{{ old('url', $portfolio->url) }}"
                               placeholder="https://example.com"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('url') border-red-500 @enderror">
                        @error('url')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="github_url" class="block text-sm font-medium text-gray-700 mb-2">
                            GitHub URL
                        </label>
                        <input type="url" name="github_url" id="github_url"
                               value="{{ old('github_url', $portfolio->github_url) }}"
                               placeholder="https://github.com/username/repo"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('github_url') border-red-500 @enderror">
                        @error('github_url')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Category and Status --}}
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-700 mb-2">
                            Category *
                        </label>
                        <select name="category" id="category" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('category') border-red-500 @enderror">
                            <option value="">Select Category</option>
                            <option value="website" {{ old('category', $portfolio->category) == 'website' ? 'selected' : '' }}>Website</option>
                            <option value="ecommerce" {{ old('category', $portfolio->category) == 'ecommerce' ? 'selected' : '' }}>E-commerce</option>
                            <option value="design" {{ old('category', $portfolio->category) == 'design' ? 'selected' : '' }}>Design</option>
                            <option value="marketing" {{ old('category', $portfolio->category) == 'marketing' ? 'selected' : '' }}>Marketing</option>
                            <option value="other" {{ old('category', $portfolio->category) == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                        @error('category')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-2">
                            Status *
                        </label>
                        <select name="status" id="status" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('status') border-red-500 @enderror">
                            <option value="">Select Status</option>
                            <option value="completed" {{ old('status', $portfolio->status) == 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="in_progress" {{ old('status', $portfolio->status) == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                            <option value="draft" {{ old('status', $portfolio->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                        </select>
                        @error('status')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="order" class="block text-sm font-medium text-gray-700 mb-2">
                            Display Order
                        </label>
                        <input type="number" name="order" id="order" min="0"
                               value="{{ old('order', $portfolio->order) }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('order') border-red-500 @enderror">
                        @error('order')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <p class="text-gray-500 text-sm mt-1">Lower numbers appear first</p>
                    </div>
                </div>

                {{-- Checkboxes --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="flex items-center">
                        <input type="checkbox" name="is_featured" id="is_featured" value="1"
                               {{ old('is_featured', $portfolio->is_featured) ? 'checked' : '' }}
                               class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <label for="is_featured" class="ml-2 block text-sm text-gray-700">
                            Featured Project
                        </label>
                    </div>

                    <div class="flex items-center">
                        <input type="checkbox" name="is_published" id="is_published" value="1"
                               {{ old('is_published', $portfolio->is_published) ? 'checked' : '' }}
                               class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <label for="is_published" class="ml-2 block text-sm text-gray-700">
                            Published
                        </label>
                    </div>
                </div>
            </div>

            <div class="px-6 py-4 border-t border-gray-200 flex justify-end space-x-3">
                <a href="{{ route('admin.portfolio.index') }}" 
                   class="bg-gray-300 hover:bg-gray-400 text-gray-700 px-4 py-2 rounded-lg font-medium transition-colors">
                    Cancel
                </a>
                <button type="submit" 
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                    Update Project
                </button>
            </div>
        </form>
    </div>
</x-admin.layouts.app>
