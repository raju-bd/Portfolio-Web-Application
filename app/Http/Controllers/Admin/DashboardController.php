<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\Certification;
use App\Models\ContactMessage;
use App\Models\Counter;
use App\Models\Gallery;
use App\Models\Project;
use App\Models\Service;
use App\Models\Skill;
use App\Models\SiteSetting;
use App\Models\SuccessStory;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'users' => User::count(),
            'projects' => Project::count(),
            'blog_posts' => BlogPost::count(),
            'messages' => ContactMessage::count(),
            'unread_messages' => ContactMessage::unread()->count(),
            'skills' => Skill::count(),
            'services' => Service::count(),
            'galleries' => Gallery::count(),
            'certifications' => Certification::count(),
            'success_stories' => SuccessStory::count(),
        ];

        $recentMessages = ContactMessage::latest()->take(5)->get();
        $recentBlogPosts = BlogPost::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentMessages', 'recentBlogPosts'));
    }

    public function maintenance()
    {
        $maintenanceMode = SiteSetting::isMaintenanceMode();
        $themeMode = SiteSetting::getThemeMode();

        return view('admin.maintenance', compact('maintenanceMode', 'themeMode'));
    }

    public function updateMaintenance(\Illuminate\Http\Request $request)
    {
        SiteSetting::set('maintenance_mode', $request->has('maintenance_mode') ? '1' : '0');
        SiteSetting::set('theme_mode', $request->input('theme_mode', 'system'));

        return redirect()->back()->with('success', 'Settings updated successfully');
    }
}
