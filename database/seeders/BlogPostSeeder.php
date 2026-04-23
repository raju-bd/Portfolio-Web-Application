<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BlogPost;
use App\Models\BlogCategory;

class BlogPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = BlogCategory::all();

        $posts = [
            [
                'title' => 'Getting Started with Laravel 11',
                'slug' => 'getting-started-laravel-11',
                'content' => '<p>Laravel 11 brings exciting new features and improvements. In this comprehensive guide, we\'ll explore the latest features including improved routing, enhanced middleware, and performance optimizations.</p><p>Learn how to set up your first Laravel 11 project and build scalable applications with best practices.</p>',
                'featured_image' => '/images/blog/laravel-11.svg',
                'category_id' => $categories->where('slug', 'technology')->first()->id ?? 1,
                'is_published' => true,
            ],
            [
                'title' => 'Best Practices for API Development',
                'slug' => 'api-development-best-practices',
                'content' => '<p>Building scalable and secure APIs requires careful planning and adherence to best practices.</p><p>In this article, we cover versioning strategies, authentication mechanisms, rate limiting, and error handling patterns that will help you create robust APIs.</p>',
                'featured_image' => '/images/blog/api.svg',
                'category_id' => $categories->where('slug', 'technology')->first()->id ?? 1,
                'is_published' => true,
            ],
            [
                'title' => 'The Rise of AI in Web Development',
                'slug' => 'ai-in-web-development',
                'content' => '<p>Artificial Intelligence is revolutionizing how we develop web applications. From AI-powered code completion to automated testing, the technology landscape is rapidly evolving.</p><p>Discover how AI tools can boost your productivity and create smarter applications.</p>',
                'featured_image' => '/images/blog/ai-dev.svg',
                'category_id' => $categories->where('slug', 'technology')->first()->id ?? 1,
                'is_published' => true,
            ],
            [
                'title' => 'Digital Transformation in Business',
                'slug' => 'digital-transformation-business',
                'content' => '<p>Digital transformation has become a critical factor for business success. Companies that embrace digital technologies gain competitive advantages and improve operational efficiency.</p><p>Learn about the key aspects of digital transformation and how to implement it effectively in your organization.</p>',
                'featured_image' => '/images/blog/business.svg',
                'category_id' => $categories->where('slug', 'business')->first()->id ?? 2,
                'is_published' => true,
            ],
            [
                'title' => 'Remote Work: Tips and Tools',
                'slug' => 'remote-work-tips-tools',
                'content' => '<p>Remote work has become the new normal for many teams. Success in a remote environment requires proper tools, communication strategies, and management practices.</p><p>Explore the best tools and strategies for maintaining productivity while working remotely.</p>',
                'featured_image' => '/images/blog/remote-work.svg',
                'category_id' => $categories->where('slug', 'business')->first()->id ?? 2,
                'is_published' => true,
            ],
            [
                'title' => 'Building a Personal Brand Online',
                'slug' => 'personal-brand-online',
                'content' => '<p>Your personal brand is crucial in the digital age. Whether you\'re a freelancer, entrepreneur, or professional, building a strong online presence can open doors to new opportunities.</p><p>Discover strategies for effectively showcasing your expertise and building credibility online.</p>',
                'featured_image' => '/images/blog/personal-brand.svg',
                'category_id' => $categories->where('slug', 'lifestyle')->first()->id ?? 3,
                'is_published' => true,
            ],
        ];

        foreach ($posts as $post) {
            BlogPost::create($post);
        }
    }
}
