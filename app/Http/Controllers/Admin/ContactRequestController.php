<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactRequest;

class ContactRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = ContactRequest::latest();

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by project type
        if ($request->filled('project_type')) {
            $query->where('project_type', $request->project_type);
        }

        // Search by name or email
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('company', 'like', "%{$search}%");
            });
        }

        $requests = $query->paginate(15);

        return view('admin.contact-requests.index', compact('requests'));
    }

    /**
     * Display the specified resource.
     */
    public function show(ContactRequest $contactRequest)
    {
        return view('admin.contact-requests.show', compact('contactRequest'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContactRequest $contactRequest)
    {
        return view('admin.contact-requests.edit', compact('contactRequest'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ContactRequest $contactRequest)
    {
        $validated = $request->validate([
            'status' => 'required|in:new,contacted,in_progress,completed,declined',
            'admin_notes' => 'nullable|string'
        ]);

        $contactRequest->update($validated);

        return redirect()->route('admin.contact-requests.show', $contactRequest)
                        ->with('success', 'Contact request updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactRequest $contactRequest)
    {
        $contactRequest->delete();

        return redirect()->route('admin.contact-requests.index')
                        ->with('success', 'Contact request deleted successfully!');
    }

    /**
     * Bulk update status
     */
    public function bulkUpdate(Request $request)
    {
        $validated = $request->validate([
            'requests' => 'required|array',
            'requests.*' => 'exists:contact_requests,id',
            'status' => 'required|in:new,contacted,in_progress,completed,declined'
        ]);

        ContactRequest::whereIn('id', $validated['requests'])
                     ->update(['status' => $validated['status']]);

        return redirect()->back()
                        ->with('success', 'Selected requests updated successfully!');
    }

    /**
     * We don't need create and store methods for contact requests
     * as they are created from the public contact form
     */
    public function create()
    {
        abort(404);
    }

    public function store(Request $request)
    {
        abort(404);
    }
}
