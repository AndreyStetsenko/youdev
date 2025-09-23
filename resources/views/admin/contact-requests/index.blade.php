<x-admin.layouts.app>
    @section('title', 'Contact Requests')
    @section('subtitle', 'Manage incoming contact requests')

    <div class="bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <h3 class="text-lg font-medium text-gray-900">Contact Requests</h3>
                
                {{-- Filters --}}
                <form method="GET" class="flex flex-wrap gap-2">
                    <select name="status" class="px-3 py-2 border border-gray-300 rounded-lg text-sm">
                        <option value="">All Statuses</option>
                        <option value="new" {{ request('status') == 'new' ? 'selected' : '' }}>New</option>
                        <option value="contacted" {{ request('status') == 'contacted' ? 'selected' : '' }}>Contacted</option>
                        <option value="in_progress" {{ request('status') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                        <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="declined" {{ request('status') == 'declined' ? 'selected' : '' }}>Declined</option>
                    </select>
                    
                    <select name="project_type" class="px-3 py-2 border border-gray-300 rounded-lg text-sm">
                        <option value="">All Types</option>
                        <option value="web" {{ request('project_type') == 'web' ? 'selected' : '' }}>Web</option>
                        <option value="mobile" {{ request('project_type') == 'mobile' ? 'selected' : '' }}>Mobile</option>
                        <option value="desktop" {{ request('project_type') == 'desktop' ? 'selected' : '' }}>Desktop</option>
                        <option value="api" {{ request('project_type') == 'api' ? 'selected' : '' }}>API</option>
                        <option value="consulting" {{ request('project_type') == 'consulting' ? 'selected' : '' }}>Consulting</option>
                        <option value="other" {{ request('project_type') == 'other' ? 'selected' : '' }}>Other</option>
                    </select>
                    
                    <input type="text" name="search" placeholder="Search name, email, company..." 
                           value="{{ request('search') }}"
                           class="px-3 py-2 border border-gray-300 rounded-lg text-sm">
                    
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                        Filter
                    </button>
                    
                    @if(request()->hasAny(['status', 'project_type', 'search']))
                        <a href="{{ route('admin.contact-requests.index') }}" 
                           class="bg-gray-300 hover:bg-gray-400 text-gray-700 px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                            Clear
                        </a>
                    @endif
                </form>
            </div>
        </div>

        @if($requests->count() > 0)
            <form method="POST" action="{{ route('admin.contact-requests.bulk-update') }}" id="bulkForm">
                @csrf
                
                {{-- Bulk Actions --}}
                <div class="px-6 py-3 bg-gray-50 border-b border-gray-200">
                    <div class="flex items-center gap-4">
                        <select name="status" class="px-3 py-2 border border-gray-300 rounded-lg text-sm">
                            <option value="">Bulk Action</option>
                            <option value="new">Mark as New</option>
                            <option value="contacted">Mark as Contacted</option>
                            <option value="in_progress">Mark as In Progress</option>
                            <option value="completed">Mark as Completed</option>
                            <option value="declined">Mark as Declined</option>
                        </select>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                            Apply to Selected
                        </button>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left">
                                    <input type="checkbox" id="selectAll" 
                                           class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Contact
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Project
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Budget
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Date
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($requests as $request)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4">
                                        <input type="checkbox" name="requests[]" value="{{ $request->id }}" 
                                               class="request-checkbox h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                    </td>
                                    <td class="px-6 py-4">
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">{{ $request->name }}</div>
                                            <div class="text-sm text-gray-500">{{ $request->email }}</div>
                                            @if($request->company)
                                                <div class="text-sm text-gray-500">{{ $request->company }}</div>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">{{ ucfirst($request->project_type) }}</div>
                                            <div class="text-sm text-gray-500">{{ Str::limit($request->message, 50) }}</div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 py-1 text-xs font-medium rounded-full bg-gray-100 text-gray-800">
                                            {{ __('app.budget_' . $request->budget_range) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 py-1 text-xs font-medium rounded-full {{ $request->status_color }}">
                                            {{ ucfirst($request->status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <div>{{ $request->created_at->format('M d, Y') }}</div>
                                        <div class="text-xs">{{ $request->created_at->format('H:i') }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex items-center space-x-2">
                                            <a href="{{ route('admin.contact-requests.show', $request) }}" 
                                               class="text-blue-600 hover:text-blue-900">
                                                View
                                            </a>
                                            <a href="{{ route('admin.contact-requests.edit', $request) }}" 
                                               class="text-indigo-600 hover:text-indigo-900">
                                                Edit
                                            </a>
                                            <form method="POST" action="{{ route('admin.contact-requests.destroy', $request) }}" 
                                                  class="inline"
                                                  onsubmit="return confirm('Are you sure you want to delete this request?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="text-red-600 hover:text-red-900">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </form>

            {{-- Pagination --}}
            <div class="px-6 py-4 border-t border-gray-200">
                {{ $requests->withQueryString()->links() }}
            </div>
        @else
            <div class="text-center py-12">
                <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
                <h3 class="text-lg font-medium text-gray-900 mb-2">No contact requests found</h3>
                <p class="text-gray-600">
                    @if(request()->hasAny(['status', 'project_type', 'search']))
                        Try adjusting your filters to see more results.
                    @else
                        Contact requests will appear here when visitors submit the contact form.
                    @endif
                </p>
            </div>
        @endif
    </div>

    @push('scripts')
    <script>
        // Select all functionality
        document.getElementById('selectAll').addEventListener('change', function() {
            const checkboxes = document.querySelectorAll('.request-checkbox');
            checkboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
        });

        // Bulk form validation
        document.getElementById('bulkForm').addEventListener('submit', function(e) {
            const selectedCheckboxes = document.querySelectorAll('.request-checkbox:checked');
            const statusSelect = document.querySelector('select[name="status"]');
            
            if (selectedCheckboxes.length === 0) {
                e.preventDefault();
                alert('Please select at least one request.');
                return false;
            }
            
            if (!statusSelect.value) {
                e.preventDefault();
                alert('Please select an action.');
                return false;
            }
            
            return confirm('Are you sure you want to apply this action to ' + selectedCheckboxes.length + ' selected requests?');
        });
    </script>
    @endpush
</x-admin.layouts.app>
