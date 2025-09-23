<x-admin.layouts.app>
    @section('title', 'Contact Request Details')
    @section('subtitle', 'Request from ' . $contactRequest->name)

    <div class="bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
            <div>
                <h3 class="text-lg font-medium text-gray-900">{{ $contactRequest->name }}</h3>
                <p class="text-sm text-gray-500">{{ $contactRequest->email }}</p>
            </div>
            <div class="flex items-center space-x-2">
                <span class="px-3 py-1 text-sm font-medium rounded-full {{ $contactRequest->status_color }}">
                    {{ ucfirst($contactRequest->status) }}
                </span>
                <a href="{{ route('admin.contact-requests.edit', $contactRequest) }}" 
                   class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                    Edit Status
                </a>
                <a href="{{ route('admin.contact-requests.index') }}" 
                   class="bg-gray-300 hover:bg-gray-400 text-gray-700 px-4 py-2 rounded-lg font-medium transition-colors">
                    Back to List
                </a>
            </div>
        </div>

        <div class="p-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                {{-- Contact Information --}}
                <div>
                    <h4 class="text-sm font-medium text-gray-500 mb-4">CONTACT INFORMATION</h4>
                    <div class="space-y-3">
                        <div>
                            <span class="text-sm font-medium text-gray-700">Name:</span>
                            <span class="text-sm text-gray-900 ml-2">{{ $contactRequest->name }}</span>
                        </div>
                        <div>
                            <span class="text-sm font-medium text-gray-700">Email:</span>
                            <a href="mailto:{{ $contactRequest->email }}" 
                               class="text-sm text-blue-600 hover:text-blue-800 ml-2">
                                {{ $contactRequest->email }}
                            </a>
                        </div>
                        @if($contactRequest->phone)
                            <div>
                                <span class="text-sm font-medium text-gray-700">Phone:</span>
                                <a href="tel:{{ $contactRequest->phone }}" 
                                   class="text-sm text-blue-600 hover:text-blue-800 ml-2">
                                    {{ $contactRequest->phone }}
                                </a>
                            </div>
                        @endif
                        @if($contactRequest->company)
                            <div>
                                <span class="text-sm font-medium text-gray-700">Company:</span>
                                <span class="text-sm text-gray-900 ml-2">{{ $contactRequest->company }}</span>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Project Information --}}
                <div>
                    <h4 class="text-sm font-medium text-gray-500 mb-4">PROJECT INFORMATION</h4>
                    <div class="space-y-3">
                        <div>
                            <span class="text-sm font-medium text-gray-700">Project Type:</span>
                            <span class="text-sm text-gray-900 ml-2">{{ ucfirst($contactRequest->project_type) }}</span>
                        </div>
                        <div>
                            <span class="text-sm font-medium text-gray-700">Budget Range:</span>
                            <span class="text-sm text-gray-900 ml-2">{{ __('app.budget_' . $contactRequest->budget_range) }}</span>
                        </div>
                        <div>
                            <span class="text-sm font-medium text-gray-700">Source:</span>
                            <span class="text-sm text-gray-900 ml-2">{{ ucfirst($contactRequest->source) }}</span>
                        </div>
                        <div>
                            <span class="text-sm font-medium text-gray-700">Submitted:</span>
                            <span class="text-sm text-gray-900 ml-2">{{ $contactRequest->created_at->format('M d, Y H:i') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Message --}}
            <div class="mt-8">
                <h4 class="text-sm font-medium text-gray-500 mb-4">MESSAGE</h4>
                <div class="bg-gray-50 rounded-lg p-4">
                    <p class="text-gray-700 whitespace-pre-wrap">{{ $contactRequest->message }}</p>
                </div>
            </div>

            {{-- Admin Notes --}}
            <div class="mt-8">
                <h4 class="text-sm font-medium text-gray-500 mb-4">ADMIN NOTES</h4>
                <div class="bg-gray-50 rounded-lg p-4">
                    @if($contactRequest->admin_notes)
                        <p class="text-gray-700 whitespace-pre-wrap">{{ $contactRequest->admin_notes }}</p>
                    @else
                        <p class="text-gray-500 italic">No notes added yet.</p>
                    @endif
                </div>
            </div>

            {{-- UTM Data --}}
            @if($contactRequest->utm_data && count($contactRequest->utm_data) > 0)
                <div class="mt-8">
                    <h4 class="text-sm font-medium text-gray-500 mb-4">TRACKING DATA</h4>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @foreach($contactRequest->utm_data as $key => $value)
                                @if($value)
                                    <div>
                                        <span class="text-sm font-medium text-gray-700">{{ ucfirst(str_replace('_', ' ', $key)) }}:</span>
                                        <span class="text-sm text-gray-900 ml-2">{{ $value }}</span>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            {{-- Quick Actions --}}
            <div class="mt-8 pt-6 border-t border-gray-200">
                <h4 class="text-sm font-medium text-gray-500 mb-4">QUICK ACTIONS</h4>
                <div class="flex flex-wrap gap-2">
                    @if($contactRequest->status === 'new')
                        <form method="POST" action="{{ route('admin.contact-requests.update', $contactRequest) }}" class="inline">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="contacted">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded text-sm font-medium transition-colors">
                                Mark as Contacted
                            </button>
                        </form>
                    @endif

                    @if($contactRequest->status === 'contacted')
                        <form method="POST" action="{{ route('admin.contact-requests.update', $contactRequest) }}" class="inline">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="in_progress">
                            <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white px-3 py-1 rounded text-sm font-medium transition-colors">
                                Mark as In Progress
                            </button>
                        </form>
                    @endif

                    @if(in_array($contactRequest->status, ['contacted', 'in_progress']))
                        <form method="POST" action="{{ route('admin.contact-requests.update', $contactRequest) }}" class="inline">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="completed">
                            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded text-sm font-medium transition-colors">
                                Mark as Completed
                            </button>
                        </form>
                    @endif

                    <a href="mailto:{{ $contactRequest->email }}?subject=Re: Your inquiry about {{ ucfirst($contactRequest->project_type) }} project" 
                       class="bg-gray-600 hover:bg-gray-700 text-white px-3 py-1 rounded text-sm font-medium transition-colors">
                        Send Email
                    </a>

                    @if($contactRequest->phone)
                        <a href="tel:{{ $contactRequest->phone }}" 
                           class="bg-gray-600 hover:bg-gray-700 text-white px-3 py-1 rounded text-sm font-medium transition-colors">
                            Call Phone
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-admin.layouts.app>
