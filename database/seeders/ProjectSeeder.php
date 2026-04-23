<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'title' => 'E-Commerce Platform',
                'slug' => 'ecommerce-platform',
                'description' => 'A complete e-commerce solution with payment integration, product management, and order tracking built with Laravel and Vue.js',
                'category' => 'Web Development',
                'tech_stack' => json_encode(['Laravel', 'Vue.js', 'MySQL', 'Stripe']),
                'featured_image' => '/images/projects/ecommerce.svg',
                'github_url' => 'https://github.com',
                'live_url' => 'https://example.com',
                'is_featured' => true,
            ],
            [
                'title' => 'Mobile Task Manager',
                'slug' => 'mobile-task-manager',
                'description' => 'A cross-platform mobile app for task management with real-time sync, notifications, and team collaboration features',
                'category' => 'Mobile Development',
                'tech_stack' => json_encode(['React Native', 'Firebase', 'Node.js']),
                'featured_image' => '/images/projects/taskmanager.svg',
                'github_url' => 'https://github.com',
                'live_url' => 'https://example.com',
                'is_featured' => true,
            ],
            [
                'title' => 'AI Content Generator',
                'slug' => 'ai-content-generator',
                'description' => 'An intelligent content generation tool using GPT API for creating marketing copy, blog posts, and social media content',
                'category' => 'AI/ML',
                'tech_stack' => json_encode(['Python', 'GPT API', 'Flask', 'React']),
                'featured_image' => '/images/projects/ai-generator.svg',
                'github_url' => 'https://github.com',
                'live_url' => 'https://example.com',
                'is_featured' => false,
            ],
            [
                'title' => 'Real Estate Dashboard',
                'slug' => 'real-estate-dashboard',
                'description' => 'A comprehensive dashboard for real estate agents to manage properties, leads, and sales with analytics and reporting',
                'category' => 'Web Development',
                'tech_stack' => json_encode(['Laravel', 'React', 'PostgreSQL', 'Charts.js']),
                'featured_image' => '/images/projects/realestate.svg',
                'github_url' => 'https://github.com',
                'live_url' => 'https://example.com',
                'is_featured' => true,
            ],
            [
                'title' => 'Healthcare Booking System',
                'slug' => 'healthcare-booking',
                'description' => 'An appointment booking system for healthcare providers with patient records, billing, and prescription management',
                'category' => 'Web Development',
                'tech_stack' => json_encode(['Laravel', 'MySQL', 'Twilio API']),
                'featured_image' => '/images/projects/healthcare.svg',
                'github_url' => 'https://github.com',
                'live_url' => 'https://example.com',
                'is_featured' => false,
            ],
            [
                'title' => 'Social Media Analytics',
                'slug' => 'social-media-analytics',
                'description' => 'Advanced analytics platform for tracking social media metrics, engagement, and audience insights across multiple platforms',
                'category' => 'Web Development',
                'tech_stack' => json_encode(['Node.js', 'React', 'MongoDB', 'Chart.js']),
                'featured_image' => '/images/projects/analytics.svg',
                'github_url' => 'https://github.com',
                'live_url' => 'https://example.com',
                'is_featured' => false,
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}
