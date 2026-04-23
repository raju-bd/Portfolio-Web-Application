<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SuccessStory;

class SuccessStorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stories = [
            [
                'title' => '40% Revenue Increase Through E-Commerce Platform',
                'slug' => '40-percent-revenue-increase',
                'description' => 'Helped a retail business increase online sales by 40% through a custom e-commerce platform with integrated payment processing and inventory management.',
                'featured_image' => '/images/success/ecommerce-success.svg',
                'category' => 'E-Commerce',
                'is_published' => true,
            ],
            [
                'title' => 'Reduced Operational Costs by 60% with Automation',
                'slug' => 'reduced-operational-costs-automation',
                'description' => 'Developed an automated workflow system that reduced manual processes by 60%, saving the client significant operational costs and improving efficiency.',
                'featured_image' => '/images/success/automation-success.svg',
                'category' => 'Process Optimization',
                'is_published' => true,
            ],
            [
                'title' => '3x Faster Database Performance with Optimization',
                'slug' => 'faster-database-performance',
                'description' => 'Optimized database queries and implemented caching strategies that improved application performance by 300%, resulting in better user experience.',
                'featured_image' => '/images/success/performance-success.svg',
                'category' => 'Performance',
                'is_published' => true,
            ],
            [
                'title' => 'Successfully Migrated Legacy System with Zero Downtime',
                'slug' => 'legacy-system-migration',
                'description' => 'Orchestrated a complex migration from a legacy system to modern cloud infrastructure with zero downtime and 100% data integrity.',
                'featured_image' => '/images/success/migration-success.svg',
                'category' => 'Infrastructure',
                'is_published' => true,
            ],
            [
                'title' => 'Mobile App Launch Serves 50K Daily Active Users',
                'slug' => 'mobile-app-50k-users',
                'description' => 'Launched a cross-platform mobile application that attracted 50,000 daily active users within the first 3 months of release.',
                'featured_image' => '/images/success/mobile-success.svg',
                'category' => 'Mobile Development',
                'is_published' => true,
            ],
        ];

        foreach ($stories as $story) {
            SuccessStory::create($story);
        }
    }
}
