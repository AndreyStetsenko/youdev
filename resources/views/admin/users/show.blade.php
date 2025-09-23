<x-admin.layouts.app>
    @section('title', 'User Details')
    @section('subtitle', $user->name)

    <div class="bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
            <div class="flex items-center">
                <div class="h-12 w-12 rounded-full bg-gray-300 flex items-center justify-center mr-4">
                    <span class="text-lg font-medium text-gray-700">
                        {{ strtoupper(substr($user->name, 0, 2)) }}
                    </span>
                </div>
                <div>
                    <h3 class="text-lg font-medium text-gray-900">{{ $user->name }}</h3>
                    <p class="text-sm text-gray-500">{{ $user->email }}</p>
                </div>
            </div>
            <div class="flex items-center space-x-2">
                <a href="{{ route('admin.users.edit', $user) }}" 
                   class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                    Edit User
                </a>
                <a href="{{ route('admin.users.index') }}" 
                   class="bg-gray-300 hover:bg-gray-400 text-gray-700 px-4 py-2 rounded-lg font-medium transition-colors">
                    Back to List
                </a>
            </div>
        </div>

        <div class="p-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                {{-- User Information --}}
                <div>
                    <h4 class="text-sm font-medium text-gray-500 mb-4">USER INFORMATION</h4>
                    <div class="space-y-4">
                        <div>
                            <span class="text-sm font-medium text-gray-700">Full Name:</span>
                            <span class="text-sm text-gray-900 ml-2">{{ $user->name }}</span>
                        </div>
                        <div>
                            <span class="text-sm font-medium text-gray-700">Email Address:</span>
                            <a href="mailto:{{ $user->email }}" 
                               class="text-sm text-blue-600 hover:text-blue-800 ml-2">
                                {{ $user->email }}
                            </a>
                        </div>
                        <div>
                            <span class="text-sm font-medium text-gray-700">Email Verification:</span>
                            @if($user->email_verified_at)
                                <span class="text-sm text-green-600 ml-2">
                                    ✓ Verified on {{ $user->email_verified_at->format('M d, Y H:i') }}
                                </span>
                            @else
                                <span class="text-sm text-red-600 ml-2">✗ Not verified</span>
                            @endif
                        </div>
                        <div>
                            <span class="text-sm font-medium text-gray-700">Account Status:</span>
                            @if($user->id === auth()->id())
                                <span class="text-sm text-green-600 ml-2">✓ Current User (You)</span>
                            @else
                                <span class="text-sm text-blue-600 ml-2">✓ Active Admin</span>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Account Activity --}}
                <div>
                    <h4 class="text-sm font-medium text-gray-500 mb-4">ACCOUNT ACTIVITY</h4>
                    <div class="space-y-4">
                        <div>
                            <span class="text-sm font-medium text-gray-700">Account Created:</span>
                            <span class="text-sm text-gray-900 ml-2">{{ $user->created_at->format('M d, Y H:i') }}</span>
                        </div>
                        <div>
                            <span class="text-sm font-medium text-gray-700">Last Updated:</span>
                            <span class="text-sm text-gray-900 ml-2">{{ $user->updated_at->format('M d, Y H:i') }}</span>
                        </div>
                        <div>
                            <span class="text-sm font-medium text-gray-700">Member Since:</span>
                            <span class="text-sm text-gray-900 ml-2">{{ $user->created_at->diffForHumans() }}</span>
                        </div>
                        <div>
                            <span class="text-sm font-medium text-gray-700">Last Activity:</span>
                            <span class="text-sm text-gray-900 ml-2">{{ $user->updated_at->diffForHumans() }}</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- User Statistics --}}
            <div class="mt-8">
                <h4 class="text-sm font-medium text-gray-500 mb-4">USER ACTIVITY STATISTICS</h4>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    {{-- Portfolio Projects --}}
                    <div class="bg-blue-50 rounded-lg p-4">
                        <div class="flex items-center">
                            <svg class="w-8 h-8 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                            </svg>
                            <div>
                                <h5 class="text-sm font-medium text-blue-900">Portfolio Projects</h5>
                                <p class="text-lg font-semibold text-blue-700">{{ $user->portfolios()->count() ?? 0 }}</p>
                            </div>
                        </div>
                    </div>

                    {{-- Blog Posts --}}
                    <div class="bg-green-50 rounded-lg p-4">
                        <div class="flex items-center">
                            <svg class="w-8 h-8 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            <div>
                                <h5 class="text-sm font-medium text-green-900">Blog Posts</h5>
                                <p class="text-lg font-semibold text-green-700">{{ $user->blogPosts()->count() ?? 0 }}</p>
                            </div>
                        </div>
                    </div>

                    {{-- Last Login --}}
                    <div class="bg-purple-50 rounded-lg p-4">
                        <div class="flex items-center">
                            <svg class="w-8 h-8 text-purple-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <div>
                                <h5 class="text-sm font-medium text-purple-900">Admin Access</h5>
                                <p class="text-sm font-semibold text-purple-700">Full Access</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Security Information --}}
            <div class="mt-8 p-4 bg-gray-50 rounded-lg">
                <h4 class="text-sm font-medium text-gray-500 mb-3">SECURITY INFORMATION</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                    <div>
                        <span class="font-medium text-gray-700">User ID:</span>
                        <span class="text-gray-900 ml-2">#{{ $user->id }}</span>
                    </div>
                    <div>
                        <span class="font-medium text-gray-700">Password:</span>
                        <span class="text-gray-500 ml-2">Protected (last updated {{ $user->updated_at->format('M d, Y') }})</span>
                    </div>
                    <div>
                        <span class="font-medium text-gray-700">Role:</span>
                        <span class="text-blue-600 ml-2">Administrator</span>
                    </div>
                    <div>
                        <span class="font-medium text-gray-700">Permissions:</span>
                        <span class="text-green-600 ml-2">Full Admin Access</span>
                    </div>
                </div>
            </div>

            {{-- Quick Actions --}}
            <div class="mt-8 pt-6 border-t border-gray-200">
                <h4 class="text-sm font-medium text-gray-500 mb-4">QUICK ACTIONS</h4>
                <div class="flex flex-wrap gap-2">
                    <a href="{{ route('admin.users.edit', $user) }}" 
                       class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded text-sm font-medium transition-colors">
                        Edit Profile
                    </a>
                    
                    <a href="mailto:{{ $user->email }}" 
                       class="bg-gray-600 hover:bg-gray-700 text-white px-3 py-1 rounded text-sm font-medium transition-colors">
                        Send Email
                    </a>

                    @if($user->id !== auth()->id())
                        <button onclick="resetPassword()" 
                                class="bg-yellow-600 hover:bg-yellow-700 text-white px-3 py-1 rounded text-sm font-medium transition-colors">
                            Reset Password
                        </button>
                    @endif

                    @if($user->id !== auth()->id() && \App\Models\User::count() > 1)
                        <form method="POST" action="{{ route('admin.users.destroy', $user) }}" 
                              class="inline"
                              onsubmit="return confirm('Are you sure you want to delete this user? This action cannot be undone.')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm font-medium transition-colors">
                                Delete User
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function resetPassword() {
            if (confirm('This will require the user to create a new password. Continue?')) {
                // In a real application, you might implement a password reset email
                alert('Password reset functionality would be implemented here. The user would receive an email with reset instructions.');
            }
        }
    </script>
    @endpush
</x-admin.layouts.app>
