<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        $skills = [
            ['name' => 'Laravel', 'icon' => '🎯', 'proficiency' => 95, 'category' => 'backend'],
            ['name' => 'Vue.js', 'icon' => '⚡', 'proficiency' => 90, 'category' => 'frontend'],
            ['name' => 'PHP', 'icon' => '🐘', 'proficiency' => 95, 'category' => 'backend'],
            ['name' => 'JavaScript', 'icon' => '📜', 'proficiency' => 90, 'category' => 'frontend'],
            ['name' => 'MySQL', 'icon' => '🗄️', 'proficiency' => 92, 'category' => 'database'],
            ['name' => 'React', 'icon' => '⚛️', 'proficiency' => 85, 'category' => 'frontend'],
            ['name' => 'Docker', 'icon' => '🐳', 'proficiency' => 80, 'category' => 'tools'],
            ['name' => 'AWS', 'icon' => '☁️', 'proficiency' => 85, 'category' => 'tools'],
            ['name' => 'Git', 'icon' => '🔀', 'proficiency' => 95, 'category' => 'tools'],
            ['name' => 'REST API', 'icon' => '🔌', 'proficiency' => 92, 'category' => 'backend'],
        ];

        foreach ($skills as $skill) {
            Skill::create(array_merge($skill, ['is_active' => true]));
        }
    }
}
