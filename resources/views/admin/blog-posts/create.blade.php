<x-admin.layouts.app>
    @section('title', 'Create Blog Post')
    @section('subtitle', 'Add a new blog post')

    <div class="bg-white rounded-lg shadow">
        <form method="POST" action="{{ route('admin.blog-posts.store') }}" enctype="multipart/form-data">
            @csrf
            
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Create New Blog Post</h3>
            </div>

            <div class="p-6 space-y-6">
                {{-- Title Fields --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="title_en" class="block text-sm font-medium text-gray-700 mb-2">
                            Title (English) *
                        </label>
                        <input type="text" name="title[en]" id="title_en" required
                               value="{{ old('title.en') }}"
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
                               value="{{ old('title.uk') }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('title.uk') border-red-500 @enderror">
                        @error('title.uk')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Slug --}}
                <div>
                    <label for="slug" class="block text-sm font-medium text-gray-700 mb-2">
                        URL Slug
                    </label>
                    <input type="text" name="slug" id="slug"
                           value="{{ old('slug') }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('slug') border-red-500 @enderror">
                    @error('slug')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    <p class="text-gray-500 text-sm mt-1">Leave empty to auto-generate from title. Only lowercase letters, numbers, and hyphens.</p>
                </div>

                {{-- Excerpt Fields --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="excerpt_en" class="block text-sm font-medium text-gray-700 mb-2">
                            Excerpt (English)
                        </label>
                        <textarea name="excerpt[en]" id="excerpt_en" rows="3"
                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('excerpt.en') border-red-500 @enderror">{{ old('excerpt.en') }}</textarea>
                        @error('excerpt.en')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <p class="text-gray-500 text-sm mt-1">Brief summary of the post (max 500 characters)</p>
                    </div>

                    <div>
                        <label for="excerpt_uk" class="block text-sm font-medium text-gray-700 mb-2">
                            Excerpt (Ukrainian)
                        </label>
                        <textarea name="excerpt[uk]" id="excerpt_uk" rows="3"
                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('excerpt.uk') border-red-500 @enderror">{{ old('excerpt.uk') }}</textarea>
                        @error('excerpt.uk')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Content Fields --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="content_en" class="block text-sm font-medium text-gray-700 mb-2">
                            Content (English) *
                        </label>
                        <textarea name="content[en]" id="content_en" rows="10" required
                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('content.en') border-red-500 @enderror">{{ old('content.en') }}</textarea>
                        @error('content.en')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="content_uk" class="block text-sm font-medium text-gray-700 mb-2">
                            Content (Ukrainian) *
                        </label>
                        <textarea name="content[uk]" id="content_uk" rows="10" required
                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('content.uk') border-red-500 @enderror">{{ old('content.uk') }}</textarea>
                        @error('content.uk')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Featured Image and Category --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="featured_image" class="block text-sm font-medium text-gray-700 mb-2">
                            Featured Image
                        </label>
                        <input type="file" name="featured_image" id="featured_image" accept="image/*"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('featured_image') border-red-500 @enderror">
                        @error('featured_image')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <p class="text-gray-500 text-sm mt-1">Max size: 2MB. Formats: JPEG, PNG, JPG, GIF</p>
                    </div>

                    <div>
                        <label for="blog_category_id" class="block text-sm font-medium text-gray-700 mb-2">
                            Category *
                        </label>
                        <select name="blog_category_id" id="blog_category_id" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('blog_category_id') border-red-500 @enderror">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" 
                                        {{ old('blog_category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->getLocalizedName() }}
                                </option>
                            @endforeach
                        </select>
                        @error('blog_category_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Tags and Status --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="tags" class="block text-sm font-medium text-gray-700 mb-2">
                            Tags (comma separated)
                        </label>
                        <input type="text" name="tags" id="tags"
                               value="{{ old('tags') }}"
                               placeholder="web development, laravel, php"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('tags') border-red-500 @enderror">
                        @error('tags')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <p class="text-gray-500 text-sm mt-1">Separate tags with commas</p>
                    </div>

                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-2">
                            Status *
                        </label>
                        <select name="status" id="status" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('status') border-red-500 @enderror">
                            <option value="">Select Status</option>
                            <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                            <option value="archived" {{ old('status') == 'archived' ? 'selected' : '' }}>Archived</option>
                        </select>
                        @error('status')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Featured Post Checkbox --}}
                <div class="flex items-center">
                    <input type="checkbox" name="is_featured" id="is_featured" value="1"
                           {{ old('is_featured') ? 'checked' : '' }}
                           class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="is_featured" class="ml-2 block text-sm text-gray-700">
                        Featured Post
                    </label>
                </div>
            </div>

            <div class="px-6 py-4 border-t border-gray-200 flex justify-end space-x-3">
                <a href="{{ route('admin.blog-posts.index') }}" 
                   class="bg-gray-300 hover:bg-gray-400 text-gray-700 px-4 py-2 rounded-lg font-medium transition-colors">
                    Cancel
                </a>
                <button type="submit" 
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                    Create Blog Post
                </button>
            </div>
        </form>
    </div>
</x-admin.layouts.app>
