<x-admin.layouts.app>
    @section('title', 'Edit Contact Request')
    @section('subtitle', 'Update request status and notes')

    <div class="bg-white rounded-lg shadow">
        <form method="POST" action="{{ route('admin.contact-requests.update', $contactRequest) }}">
            @csrf
            @method('PUT')
            
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Edit Request from {{ $contactRequest->name }}</h3>
            </div>

            <div class="p-6 space-y-6">
                {{-- Contact Information (Read Only) --}}
                <div class="bg-gray-50 rounded-lg p-4">
                    <h4 class="text-sm font-medium text-gray-500 mb-3">CONTACT INFORMATION</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <span class="text-sm font-medium text-gray-700">Name:</span>
                            <span class="text-sm text-gray-900 ml-2">{{ $contactRequest->name }}</span>
                        </div>
                        <div>
                            <span class="text-sm font-medium text-gray-700">Email:</span>
                            <span class="text-sm text-gray-900 ml-2">{{ $contactRequest->email }}</span>
                        </div>
                        @if($contactRequest->phone)
                            <div>
                                <span class="text-sm font-medium text-gray-700">Phone:</span>
                                <span class="text-sm text-gray-900 ml-2">{{ $contactRequest->phone }}</span>
                            </div>
                        @endif
                        @if($contactRequest->company)
                            <div>
                                <span class="text-sm font-medium text-gray-700">Company:</span>
                                <span class="text-sm text-gray-900 ml-2">{{ $contactRequest->company }}</span>
                            </div>
                        @endif
                        <div>
                            <span class="text-sm font-medium text-gray-700">Project Type:</span>
                            <span class="text-sm text-gray-900 ml-2">{{ ucfirst($contactRequest->project_type) }}</span>
                        </div>
                        <div>
                            <span class="text-sm font-medium text-gray-700">Budget:</span>
                            <span class="text-sm text-gray-900 ml-2">{{ __('app.budget_' . $contactRequest->budget_range) }}</span>
                        </div>
                    </div>
                </div>

                {{-- Message (Read Only) --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Original Message
                    </label>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <p class="text-gray-700 whitespace-pre-wrap">{{ $contactRequest->message }}</p>
                    </div>
                </div>

                {{-- Status --}}
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-2">
                        Status *
                    </label>
                    <select name="status" id="status" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('status') border-red-500 @enderror">
                        <option value="new" {{ old('status', $contactRequest->status) == 'new' ? 'selected' : '' }}>New</option>
                        <option value="contacted" {{ old('status', $contactRequest->status) == 'contacted' ? 'selected' : '' }}>Contacted</option>
                        <option value="in_progress" {{ old('status', $contactRequest->status) == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                        <option value="completed" {{ old('status', $contactRequest->status) == 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="declined" {{ old('status', $contactRequest->status) == 'declined' ? 'selected' : '' }}>Declined</option>
                    </select>
                    @error('status')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    <p class="text-gray-500 text-sm mt-1">Update the status to track progress on this request</p>
                </div>

                {{-- Admin Notes --}}
                <div>
                    <label for="admin_notes" class="block text-sm font-medium text-gray-700 mb-2">
                        Admin Notes
                    </label>
                    <textarea name="admin_notes" id="admin_notes" rows="6"
                              placeholder="Add internal notes about this request, follow-up actions, meeting notes, etc."
                              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('admin_notes') border-red-500 @enderror">{{ old('admin_notes', $contactRequest->admin_notes) }}</textarea>
                    @error('admin_notes')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    <p class="text-gray-500 text-sm mt-1">These notes are only visible to admin users</p>
                </div>

                {{-- Request Details (Read Only) --}}
                <div class="bg-gray-50 rounded-lg p-4">
                    <h4 class="text-sm font-medium text-gray-500 mb-3">REQUEST DETAILS</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                        <div>
                            <span class="font-medium text-gray-700">Submitted:</span>
                            <span class="text-gray-900 ml-2">{{ $contactRequest->created_at->format('M d, Y H:i') }}</span>
                        </div>
                        <div>
                            <span class="font-medium text-gray-700">Source:</span>
                            <span class="text-gray-900 ml-2">{{ ucfirst($contactRequest->source) }}</span>
                        </div>
                        @if($contactRequest->utm_data && isset($contactRequest->utm_data['referrer']))
                            <div>
                                <span class="font-medium text-gray-700">Referrer:</span>
                                <span class="text-gray-900 ml-2">{{ $contactRequest->utm_data['referrer'] }}</span>
                            </div>
                        @endif
                        @if($contactRequest->utm_data && isset($contactRequest->utm_data['locale']))
                            <div>
                                <span class="font-medium text-gray-700">Language:</span>
                                <span class="text-gray-900 ml-2">{{ strtoupper($contactRequest->utm_data['locale']) }}</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="px-6 py-4 border-t border-gray-200 flex justify-between">
                <div class="flex space-x-3">
                    <a href="{{ route('admin.contact-requests.show', $contactRequest) }}" 
                       class="bg-gray-300 hover:bg-gray-400 text-gray-700 px-4 py-2 rounded-lg font-medium transition-colors">
                        Cancel
                    </a>
                    <a href="{{ route('admin.contact-requests.index') }}" 
                       class="text-gray-600 hover:text-gray-800 px-4 py-2 font-medium">
                        Back to List
                    </a>
                </div>
                <div class="flex space-x-3">
                    @if($contactRequest->email)
                        <a href="mailto:{{ $contactRequest->email }}?subject=Re: Your inquiry about {{ ucfirst($contactRequest->project_type) }} project" 
                           class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                            Send Email
                        </a>
                    @endif
                    <button type="submit" 
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                        Update Request
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-admin.layouts.app>
