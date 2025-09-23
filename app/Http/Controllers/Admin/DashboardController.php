<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactRequest;
use App\Models\Portfolio;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistics
        $stats = [
            'total_requests' => ContactRequest::count(),
            'new_requests' => ContactRequest::where('status', 'new')->count(),
            'portfolio_projects' => Portfolio::count(),
            'month_requests' => ContactRequest::whereMonth('created_at', now()->month)
                                            ->whereYear('created_at', now()->year)
                                            ->count(),
        ];

        // Recent requests
        $recent_requests = ContactRequest::latest()
                                       ->take(5)
                                       ->get();

        // Request types distribution
        $request_types = ContactRequest::select('project_type', DB::raw('count(*) as total'))
                                     ->groupBy('project_type')
                                     ->orderBy('total', 'desc')
                                     ->get();

        return view('admin.dashboard', compact('stats', 'recent_requests', 'request_types'));
    }

    public function analytics()
    {
        // Monthly requests for the last 12 months
        $monthly_requests = ContactRequest::select(
            DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'),
            DB::raw('count(*) as total')
        )
        ->where('created_at', '>=', now()->subMonths(12))
        ->groupBy('month')
        ->orderBy('month')
        ->get();

        // Budget range distribution
        $budget_ranges = ContactRequest::select('budget_range', DB::raw('count(*) as total'))
                                     ->groupBy('budget_range')
                                     ->orderBy('total', 'desc')
                                     ->get();

        // Source distribution
        $sources = ContactRequest::select('source', DB::raw('count(*) as total'))
                                ->groupBy('source')
                                ->orderBy('total', 'desc')
                                ->get();

        // Status distribution
        $statuses = ContactRequest::select('status', DB::raw('count(*) as total'))
                                 ->groupBy('status')
                                 ->orderBy('total', 'desc')
                                 ->get();

        return view('admin.analytics', compact('monthly_requests', 'budget_ranges', 'sources', 'statuses'));
    }

    public function seoSettings()
    {
        $seoSettings = \App\Models\SeoSetting::all()->keyBy('page');
        
        return view('admin.seo-settings', compact('seoSettings'));
    }

    public function updateSeoSettings(Request $request)
    {
        $validated = $request->validate([
            'settings' => 'required|array',
            'settings.*.title.en' => 'required|string|max:255',
            'settings.*.title.uk' => 'required|string|max:255',
            'settings.*.description.en' => 'required|string|max:500',
            'settings.*.description.uk' => 'required|string|max:500',
            'settings.*.keywords.en' => 'nullable|string',
            'settings.*.keywords.uk' => 'nullable|string',
        ]);

        foreach ($validated['settings'] as $page => $data) {
            $keywords = [
                'en' => array_filter(array_map('trim', explode(',', $data['keywords']['en'] ?? ''))),
                'uk' => array_filter(array_map('trim', explode(',', $data['keywords']['uk'] ?? ''))),
            ];

            \App\Models\SeoSetting::updateOrCreate(
                ['page' => $page],
                [
                    'title' => $data['title'],
                    'description' => $data['description'],
                    'keywords' => $keywords,
                ]
            );
        }

        return redirect()->back()->with('success', 'SEO settings updated successfully!');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/');
    }
}
