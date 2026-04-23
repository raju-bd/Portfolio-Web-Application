<?php

namespace Database\Seeders;

use App\Models\Counter;
use Illuminate\Database\Seeder;

class CounterSeeder extends Seeder
{
    public function run(): void
    {
        $counters = [
            ['type' => 'companies', 'label' => 'Companies', 'count' => 15, 'icon' => '🏢'],
            ['type' => 'modules', 'label' => 'Modules', 'count' => 87, 'icon' => '⚙️'],
            ['type' => 'domains', 'label' => 'Domains', 'count' => 23, 'icon' => '🌐'],
            ['type' => 'projects', 'label' => 'Projects', 'count' => 45, 'icon' => '📁'],
            ['type' => 'clients', 'label' => 'Clients', 'count' => 30, 'icon' => '👥'],
        ];

        foreach ($counters as $counter) {
            Counter::updateOrCreate(['type' => $counter['type']], $counter);
        }
    }
}
