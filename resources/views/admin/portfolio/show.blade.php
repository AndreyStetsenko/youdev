<x-admin.layouts.app>
    @section('title', 'Project Details')
    @section('subtitle', $portfolio->getLocalizedTitle())

    <div class="bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
            <h3 class="text-lg font-medium text-gray-900">{{ $portfolio->getLocalizedTitle() }}</h3>
            <div class="flex items-center space-x-2">
                <a href="{{ route('admin.portfolio.edit', $portfolio) }}" 
                   class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                    Edit Project
                </a>
                <a href="{{ route('admin.portfolio.index') }}" 
                   class="bg-gray-300 hover:bg-gray-400 text-gray-700 px-4 py-2 rounded-lg font-medium transition-colors">
                    Back to List
                </a>
            </div>
        </div>

        <div class="p-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                {{-- Project Image --}}
                <div>
                    @if($portfolio->image)
                        <img src="{{ asset('storage/' . $portfolio->image) }}" 
                             alt="{{ $portfolio->getLocalizedTitle() }}" 
                             class="w-full h-64 object-cover rounded-lg shadow-sm">
                    @else
                        <div class="w-full h-64 bg-gray-200 rounded-lg flex items-center justify-center">
                            <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                            </svg>
                        </div>
                    @endif
                </div>

                {{-- Project Details --}}
                <div class="space-y-6">
                    {{-- Status Badges --}}
                    <div class="flex flex-wrap gap-2">
                        @php
                            $statusColors = [
                                'completed' => 'bg-green-100 text-green-800',
                                'in_progress' => 'bg-yellow-100 text-yellow-800',
                                'draft' => 'bg-gray-100 text-gray-800'
                            ];
                        @endphp
                        <span class="px-3 py-1 text-sm font-medium rounded-full {{ $statusColors[$portfolio->status] }}">
                            {{ ucfirst(str_replace('_', ' ', $portfolio->status)) }}
                        </span>
                        <span class="px-3 py-1 text-sm font-medium rounded-full bg-blue-100 text-blue-800">
                            {{ ucfirst($portfolio->category) }}
                        </span>
                        @if($portfolio->is_featured)
                            <span class="px-3 py-1 text-sm font-medium rounded-full bg-yellow-100 text-yellow-800">
                                ⭐ Featured
                            </span>
                        @endif
                        @if($portfolio->is_published)
                            <span class="px-3 py-1 text-sm font-medium rounded-full bg-green-100 text-green-800">
                                ✓ Published
                            </span>
                        @else
                            <span class="px-3 py-1 text-sm font-medium rounded-full bg-red-100 text-red-800">
                                ✗ Unpublished
                            </span>
                        @endif
                    </div>

                    {{-- Basic Info --}}
                    <div>
                        <h4 class="text-sm font-medium text-gray-500 mb-2">BASIC INFORMATION</h4>
                        <div class="space-y-2">
                            <div>
                                <span class="text-sm font-medium text-gray-700">Order:</span>
                                <span class="text-sm text-gray-900">{{ $portfolio->order }}</span>
                            </div>
                            <div>
                                <span class="text-sm font-medium text-gray-700">Created:</span>
                                <span class="text-sm text-gray-900">{{ $portfolio->created_at->format('M d, Y H:i') }}</span>
                            </div>
                            <div>
                                <span class="text-sm font-medium text-gray-700">Updated:</span>
                                <span class="text-sm text-gray-900">{{ $portfolio->updated_at->format('M d, Y H:i') }}</span>
                            </div>
                        </div>
                    </div>

                    {{-- Technologies --}}
                    <div>
                        <h4 class="text-sm font-medium text-gray-500 mb-2">TECHNOLOGIES</h4>
                        <div class="flex flex-wrap gap-2">
                            @foreach($portfolio->technologies as $tech)
                                <span class="px-2 py-1 bg-gray-100 text-gray-700 text-sm rounded font-medium">
                                    {{ $tech }}
                                </span>
                            @endforeach
                        </div>
                    </div>

                    {{-- Links --}}
                    @if($portfolio->url || $portfolio->github_url)
                        <div>
                            <h4 class="text-sm font-medium text-gray-500 mb-2">LINKS</h4>
                            <div class="space-y-2">
                                @if($portfolio->url)
                                    <div>
                                        <a href="{{ $portfolio->url }}" target="_blank" 
                                           class="inline-flex items-center text-blue-600 hover:text-blue-800">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                            </svg>
                                            Live Demo
                                        </a>
                                    </div>
                                @endif
                                @if($portfolio->github_url)
                                    <div>
                                        <a href="{{ $portfolio->github_url }}" target="_blank" 
                                           class="inline-flex items-center text-gray-600 hover:text-gray-800">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M12 0C5.374 0 0 5.373 0 12 0 17.302 3.438 21.8 8.207 23.387c.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23A11.509 11.509 0 0112 5.803c1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576C20.566 21.797 24 17.3 24 12c0-6.627-5.373-12-12-12z"/>
                                            </svg>
                                            GitHub Repository
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Descriptions --}}
            <div class="mt-8 grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div>
                    <h4 class="text-sm font-medium text-gray-500 mb-2">DESCRIPTION (ENGLISH)</h4>
                    <div class="prose prose-sm max-w-none">
                        <p class="text-gray-700">{{ $portfolio->description['en'] ?? 'No description available' }}</p>
                    </div>
                </div>

                <div>
                    <h4 class="text-sm font-medium text-gray-500 mb-2">DESCRIPTION (UKRAINIAN)</h4>
                    <div class="prose prose-sm max-w-none">
                        <p class="text-gray-700">{{ $portfolio->description['uk'] ?? 'Опис недоступний' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin.layouts.app>
