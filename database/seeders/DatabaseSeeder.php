<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            CounterSeeder::class,
            SkillSeeder::class,
            ServiceSeeder::class,
            BlogCategorySeeder::class,
            ProjectSeeder::class,
            BlogPostSeeder::class,
            GallerySeeder::class,
            SuccessStorySeeder::class,
        ]);
    }
}
