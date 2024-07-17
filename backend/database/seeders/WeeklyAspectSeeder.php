<?php

namespace Database\Seeders;

use App\Models\WeeklyAspect;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WeeklyAspectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $aspects = [
            ['name' => 'Family'],
            ['name' => 'Friends'],
            ['name' => 'Money'],
            ['name' => 'Health'],
            ['name' => 'Career'],
            ['name' => 'Personal Growth'],
            ['name' => 'Fun'],
            ['name' => 'Physical Environment'],
            ['name' => 'Spirituality'],
            ['name' => 'Love']
        ];

        foreach ($aspects as $aspect) {
            WeeklyAspect::create($aspect);
        }
    }
}
