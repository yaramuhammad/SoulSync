<?php

namespace Database\Seeders;

use App\Models\WeeklyTip;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WeeklyTipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tips = [
            ['weekly_aspect_id' => 1, 'tip' => 'Spend more quality time with your family.'],
            ['weekly_aspect_id' => 2, 'tip' => 'Reach out to an old friend.'],
            ['weekly_aspect_id' => 3, 'tip' => 'Create a budget plan.'],
            ['weekly_aspect_id' => 4, 'tip' => 'Exercise regularly.'],
            ['weekly_aspect_id' => 5, 'tip' => 'Set career goals and work towards them.'],
            ['weekly_aspect_id' => 6, 'tip' => 'Read a new book on personal development.'],
            ['weekly_aspect_id' => 7, 'tip' => 'Find a hobby you enjoy.'],
            ['weekly_aspect_id' => 8, 'tip' => 'Declutter your living space.'],
            ['weekly_aspect_id' => 9, 'tip' => 'Meditate daily.'],
            ['weekly_aspect_id' => 10, 'tip' => 'Show appreciation to your partner.']
        ];

        foreach ($tips as $tip) {
            WeeklyTip::create($tip);
        }
    }
}
