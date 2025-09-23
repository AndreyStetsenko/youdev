<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        return view('pages.contact');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'company' => 'nullable|string|max:255',
            'project_type' => 'required|in:web,website,ecommerce,design,marketing,other',
            'budget_range' => 'required|in:under_5k,5k_15k,15k_50k,50k_100k,over_100k',
            'message' => 'required|string|max:2000',
        ]);

        // Capture UTM parameters and additional data
        $utmData = [
            'utm_source' => $request->get('utm_source'),
            'utm_medium' => $request->get('utm_medium'),
            'utm_campaign' => $request->get('utm_campaign'),
            'utm_term' => $request->get('utm_term'),
            'utm_content' => $request->get('utm_content'),
            'referrer' => $request->header('referer'),
            'user_agent' => $request->header('user-agent'),
            'ip_address' => $request->ip(),
            'locale' => app()->getLocale(),
        ];

        $validated['utm_data'] = array_filter($utmData); // Remove null values
        $validated['source'] = 'website';

        ContactRequest::create($validated);

        return redirect()
            ->back()
            ->with('success', __('app.contact_success_message'));
    }
}
