<x-admin.layouts.app>
    @section('title', 'Edit Blog Category')
    @section('subtitle', 'Update category: ' . $blogCategory->getLocalizedName())

    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-lg shadow">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Edit Category</h3>
            </div>

            <form method="POST" action="{{ route('admin.blog-categories.update', $blogCategory) }}" class="p-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    {{-- English Name --}}
                    <div>
                        <label for="name_en" class="block text-sm font-medium text-gray-700 mb-2">
                            Name (English) <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                               name="name[en]" 
                               id="name_en"
                               value="{{ old('name.en', $blogCategory->name['en'] ?? '') }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 @error('name.en') border-red-500 @enderror"
                               required>
                        @error('name.en')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Ukrainian Name --}}
                    <div>
                        <label for="name_uk" class="block text-sm font-medium text-gray-700 mb-2">
                            Name (Ukrainian) <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                               name="name[uk]" 
                               id="name_uk"
                               value="{{ old('name.uk', $blogCategory->name['uk'] ?? '') }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 @error('name.uk') border-red-500 @enderror"
                               required>
                        @error('name.uk')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Slug --}}
                <div class="mt-6">
                    <label for="slug" class="block text-sm font-medium text-gray-700 mb-2">
                        Slug <span class="text-red-500">*</span>
                    </label>
                    <input type="text" 
                           name="slug" 
                           id="slug"
                           value="{{ old('slug', $blogCategory->slug) }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 @error('slug') border-red-500 @enderror"
                           placeholder="e.g., web-development"
                           required>
                    <p class="mt-1 text-sm text-gray-500">URL-friendly version of the name. Use lowercase letters, numbers, and hyphens only.</p>
                    @error('slug')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Descriptions --}}
                <div class="mt-6 grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div>
                        <label for="description_en" class="block text-sm font-medium text-gray-700 mb-2">
                            Description (English)
                        </label>
                        <textarea name="description[en]" 
                                  id="description_en"
                                  rows="4"
                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 @error('description.en') border-red-500 @enderror"
                                  placeholder="Brief description of this category...">{{ old('description.en', $blogCategory->description['en'] ?? '') }}</textarea>
                        @error('description.en')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="description_uk" class="block text-sm font-medium text-gray-700 mb-2">
                            Description (Ukrainian)
                        </label>
                        <textarea name="description[uk]" 
                                  id="description_uk"
                                  rows="4"
                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 @error('description.uk') border-red-500 @enderror"
                                  placeholder="Короткий опис цієї категорії...">{{ old('description.uk', $blogCategory->description['uk'] ?? '') }}</textarea>
                        @error('description.uk')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Color and Order --}}
                <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label for="color" class="block text-sm font-medium text-gray-700 mb-2">
                            Color <span class="text-red-500">*</span>
                        </label>
                        <input type="color" 
                               name="color" 
                               id="color"
                               value="{{ old('color', $blogCategory->color) }}"
                               class="w-full h-10 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 @error('color') border-red-500 @enderror">
                        @error('color')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="order" class="block text-sm font-medium text-gray-700 mb-2">
                            Order
                        </label>
                        <input type="number" 
                               name="order" 
                               id="order"
                               value="{{ old('order', $blogCategory->order) }}"
                               min="0"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 @error('order') border-red-500 @enderror">
                        <p class="mt-1 text-sm text-gray-500">Lower numbers appear first</p>
                        @error('order')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                        <div class="flex items-center h-10">
                            <input type="checkbox" 
                                   name="is_active" 
                                   id="is_active"
                                   value="1"
                                   {{ old('is_active', $blogCategory->is_active) ? 'checked' : '' }}
                                   class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <label for="is_active" class="ml-2 text-sm text-gray-700">
                                Active
                            </label>
                        </div>
                    </div>
                </div>

                {{-- Category Stats --}}
                <div class="mt-6 p-4 bg-gray-50 rounded-lg">
                    <h4 class="text-sm font-medium text-gray-700 mb-2">Category Statistics</h4>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 text-sm">
                        <div>
                            <span class="text-gray-500">Total Posts:</span>
                            <span class="font-medium ml-1">{{ $blogCategory->posts()->count() }}</span>
                        </div>
                        <div>
                            <span class="text-gray-500">Published Posts:</span>
                            <span class="font-medium ml-1">{{ $blogCategory->publishedPosts()->count() }}</span>
                        </div>
                        <div>
                            <span class="text-gray-500">Created:</span>
                            <span class="font-medium ml-1">{{ $blogCategory->created_at->format('M d, Y') }}</span>
                        </div>
                    </div>
                </div>

                {{-- Actions --}}
                <div class="mt-8 flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
                    <a href="{{ route('admin.blog-categories.index') }}" 
                       class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        Cancel
                    </a>
                    <button type="submit" 
                            class="px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-500">
                        Update Category
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin.layouts.app>
