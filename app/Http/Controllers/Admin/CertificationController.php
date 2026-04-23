<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certification;
use Illuminate\Http\Request;

class CertificationController extends Controller
{
    public function index()
    {
        $certifications = Certification::orderBy('sort_order')->paginate(20);

        return view('admin.certifications.index', compact('certifications'));
    }

    public function create()
    {
        return view('admin.certifications.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'issuer' => 'required|string|max:255',
            'badge_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'issued_date' => 'required|date',
            'expiry_date' => 'nullable|date|after:issued_date',
            'credential_url' => 'nullable|url',
            'description' => 'nullable|string',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('badge_image')) {
            $validated['badge_image'] = $request->file('badge_image')->store('certifications', 'public');
        }

        $validated['is_active'] = $request->has('is_active');

        Certification::create($validated);

        return redirect()->route('admin.certifications.index')->with('success', 'Certification created successfully');
    }

    public function edit(Certification $certification)
    {
        return view('admin.certifications.edit', compact('certification'));
    }

    public function update(Request $request, Certification $certification)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'issuer' => 'required|string|max:255',
            'badge_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'issued_date' => 'required|date',
            'expiry_date' => 'nullable|date|after:issued_date',
            'credential_url' => 'nullable|url',
            'description' => 'nullable|string',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('badge_image')) {
            $validated['badge_image'] = $request->file('badge_image')->store('certifications', 'public');
        }

        $validated['is_active'] = $request->has('is_active');

        $certification->update($validated);

        return redirect()->route('admin.certifications.index')->with('success', 'Certification updated successfully');
    }

    public function destroy(Certification $certification)
    {
        $certification->delete();

        return redirect()->route('admin.certifications.index')->with('success', 'Certification deleted successfully');
    }
}
