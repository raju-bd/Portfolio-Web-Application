<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SuccessStory;
use Illuminate\Http\Request;

class SuccessStoryController extends Controller
{
    public function index()
    {
        $stories = SuccessStory::orderBy('sort_order')->paginate(20);

        return view('admin.success-stories.index', compact('stories'));
    }

    public function create()
    {
        return view('admin.success-stories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:success_stories',
            'description' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'client_name' => 'nullable|string|max:255',
            'category' => 'required|string|max:255',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('success-stories', 'public');
        }

        $validated['is_active'] = $request->has('is_active');

        SuccessStory::create($validated);

        return redirect()->route('admin.success-stories.index')->with('success', 'Success story created successfully');
    }

    public function edit(SuccessStory $successStory)
    {
        return view('admin.success-stories.edit', compact('successStory'));
    }

    public function update(Request $request, SuccessStory $successStory)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:success_stories,slug,' . $successStory->id,
            'description' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'client_name' => 'nullable|string|max:255',
            'category' => 'required|string|max:255',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('success-stories', 'public');
        }

        $validated['is_active'] = $request->has('is_active');

        $successStory->update($validated);

        return redirect()->route('admin.success-stories.index')->with('success', 'Success story updated successfully');
    }

    public function destroy(SuccessStory $successStory)
    {
        $successStory->delete();

        return redirect()->route('admin.success-stories.index')->with('success', 'Success story deleted successfully');
    }
}
