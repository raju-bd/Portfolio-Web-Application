<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'title' => 'Web Development',
                'description' => 'Full-stack web development with modern technologies',
                'icon' => '💻',
                'features' => ['Responsive Design', 'Fast Loading', 'SEO Optimized', 'Mobile Friendly'],
            ],
            [
                'title' => 'API Development',
                'description' => 'RESTful and modern API development',
                'icon' => '🔌',
                'features' => ['RESTful Architecture', 'JWT Authentication', 'Rate Limiting', 'Documentation'],
            ],
            [
                'title' => 'E-Commerce Solutions',
                'description' => 'Complete e-commerce platform development',
                'icon' => '🛒',
                'features' => ['Payment Gateway', 'Inventory Management', 'Order Tracking', 'Mobile App'],
            ],
            [
                'title' => 'Database Design',
                'description' => 'Efficient and scalable database architecture',
                'icon' => '🗄️',
                'features' => ['Optimization', 'Backup Strategy', 'Replication', 'Security'],
            ],
            [
                'title' => 'Cloud Solutions',
                'description' => 'AWS and cloud infrastructure management',
                'icon' => '☁️',
                'features' => ['Auto Scaling', 'Load Balancing', 'CDN Integration', 'Monitoring'],
            ],
            [
                'title' => 'DevOps & Deployment',
                'description' => 'CI/CD pipeline and deployment automation',
                'icon' => '🚀',
                'features' => ['Docker', 'Kubernetes', 'Github Actions', 'Monitoring'],
            ],
        ];

        foreach ($services as $service) {
            Service::create(array_merge($service, ['is_active' => true]));
        }
    }
}
