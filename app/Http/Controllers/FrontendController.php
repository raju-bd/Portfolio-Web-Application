<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Certification;
use App\Models\ContactMessage;
use App\Models\Counter;
use App\Models\Gallery;
use App\Models\Project;
use App\Models\Service;
use App\Models\Skill;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * Home page
     */
    public function home()
    {
        $skills = Skill::active()->orderBy('sort_order')->get();
        $projects = Project::active()->featured()->orderBy('sort_order')->limit(6)->get();
        $services = Service::active()->orderBy('sort_order')->limit(6)->get();
        $galleries = Gallery::active()->colleague()->orderBy('sort_order')->limit(12)->get();
        $counters = Counter::all();
        $certifications = Certification::active()->orderBy('sort_order')->limit(8)->get();

        return view('frontend.home', compact(
            'skills',
            'projects',
            'services',
            'galleries',
            'counters',
            'certifications'
        ));
    }

    /**
     * About page
     */
    public function about()
    {
        $skills = Skill::active()->orderBy('category')->orderBy('sort_order')->get();
        $certifications = Certification::active()->orderBy('sort_order')->get();

        return view('frontend.about', compact('skills', 'certifications'));
    }

    /**
     * Portfolio page
     */
    public function portfolio()
    {
        $projects = Project::active()->orderBy('category')->orderBy('sort_order')->paginate(12);
        $categories = Project::active()->distinct()->pluck('category');

        return view('frontend.portfolio', compact('projects', 'categories'));
    }

    /**
     * Portfolio detail page
     */
    public function portfolioDetail($slug)
    {
        $project = Project::active()->where('slug', $slug)->firstOrFail();
        $relatedProjects = Project::active()
            ->where('category', $project->category)
            ->where('id', '!=', $project->id)
            ->limit(3)
            ->get();

        return view('frontend.portfolio-detail', compact('project', 'relatedProjects'));
    }

    /**
     * Services page
     */
    public function services()
    {
        $services = Service::active()->orderBy('sort_order')->get();

        return view('frontend.services', compact('services'));
    }

    /**
     * Success stories page
     */
    public function successStories()
    {
        $stories = \App\Models\SuccessStory::active()->paginate(12);

        return view('frontend.success-stories', compact('stories'));
    }

    /**
     * Success story detail page
     */
    public function successStoryDetail($slug)
    {
        $story = \App\Models\SuccessStory::active()->where('slug', $slug)->firstOrFail();
        $relatedStories = \App\Models\SuccessStory::active()
            ->where('category', $story->category)
            ->where('id', '!=', $story->id)
            ->limit(3)
            ->get();

        return view('frontend.success-story-detail', compact('story', 'relatedStories'));
    }

    /**
     * Blog page
     */
    public function blog()
    {
        $posts = BlogPost::active()->published()->latest('published_at')->paginate(12);
        $categories = \App\Models\BlogCategory::active()->withCount('posts')->get();

        return view('frontend.blog', compact('posts', 'categories'));
    }

    /**
     * Blog detail page
     */
    public function blogDetail($slug)
    {
        $post = BlogPost::active()->published()->where('slug', $slug)->firstOrFail();
        $post->incrementViews();
        $relatedPosts = BlogPost::active()
            ->published()
            ->where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->limit(3)
            ->get();

        return view('frontend.blog-detail', compact('post', 'relatedPosts'));
    }

    /**
     * Blog by category
     */
    public function blogByCategory($slug)
    {
        $category = \App\Models\BlogCategory::where('slug', $slug)->firstOrFail();
        $posts = $category->posts()->active()->published()->latest('published_at')->paginate(12);

        return view('frontend.blog-category', compact('posts', 'category'));
    }

    /**
     * Contact page
     */
    public function contact()
    {
        return view('frontend.contact');
    }

    /**
     * Store contact message
     */
    public function storeContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|min:10',
        ]);

        try {
            ContactMessage::create($validated);

            // TODO: Send email notification

            return redirect()->route('home')
                ->with('success', 'Thank you! Your message has been sent successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error sending message. Please try again.');
        }
    }

    /**
     * Gallery page with lightbox
     */
    public function gallery()
    {
        $screenshots = Gallery::active()->screenshot()->orderBy('category')->orderBy('sort_order')->get();
        $colleagues = Gallery::active()->colleague()->orderBy('sort_order')->get();

        return view('frontend.gallery', compact('screenshots', 'colleagues'));
    }
}
