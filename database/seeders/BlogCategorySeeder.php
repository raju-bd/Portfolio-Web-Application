<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use Illuminate\Database\Seeder;

class BlogCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Web Development', 'slug' => 'web-development'],
            ['name' => 'Laravel Tips', 'slug' => 'laravel-tips'],
            ['name' => 'JavaScript', 'slug' => 'javascript'],
            ['name' => 'UI/UX Design', 'slug' => 'uiux-design'],
            ['name' => 'DevOps', 'slug' => 'devops'],
            ['name' => 'Database', 'slug' => 'database'],
        ];

        foreach ($categories as $category) {
            BlogCategory::create(array_merge($category, ['is_active' => true]));
        }
    }
}
