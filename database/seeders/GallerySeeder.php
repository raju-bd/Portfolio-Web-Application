<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gallery;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            // Colleague Photos
            [
                'title' => 'Team Meeting - Company Culture',
                'image' => '/images/gallery/team-1.svg',
                'category' => 'colleague',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Office Environment',
                'image' => '/images/gallery/team-2.svg',
                'category' => 'colleague',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Team Collaboration',
                'image' => '/images/gallery/team-3.svg',
                'category' => 'colleague',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Project Celebration',
                'image' => '/images/gallery/team-4.svg',
                'category' => 'colleague',
                'order' => 4,
                'is_active' => true,
            ],
            // App Screenshots
            [
                'title' => 'Dashboard Interface',
                'image' => '/images/gallery/screenshot-1.svg',
                'category' => 'screenshot',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Analytics Page',
                'image' => '/images/gallery/screenshot-2.svg',
                'category' => 'screenshot',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'User Management Interface',
                'image' => '/images/gallery/screenshot-3.svg',
                'category' => 'screenshot',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Mobile Responsive Design',
                'image' => '/images/gallery/screenshot-4.svg',
                'category' => 'screenshot',
                'order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($items as $item) {
            Gallery::create($item);
        }
    }
}
