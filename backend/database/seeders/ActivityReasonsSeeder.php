<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActivityReasonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $activities = [
            [
                'name' => 'Movies',
                'photo' => 'activities/Movies.png',
            ],
            [
                'name' => 'Praying',
                'photo' => 'activities/praying.png',
            ],
            [
                'name' => 'Reading',
                'photo' => 'activities/Reading.png',
            ],
            [
                'name' => 'Bicycle',
                'photo' => 'activities/bicycle.png',
            ],
            [
                'name' => 'Cooking',
                'photo' => 'activities/cooking.png',
            ],
            [
                'name' => 'Gym',
                'photo' => 'activities/Gym.png',
            ],
            [
                'name' => 'Help Other',
                'photo' => 'activities/Help-Other.png',
            ],
            [
                'name' => 'Meditate',
                'photo' => 'activities/Meditate.png',
            ],
            [
                'name' => 'Music',
                'photo' => 'activities/Music.png',
            ],
            [
                'name' => 'Save Money',
                'photo' => 'activities/save-money.png',
            ],
            [
                'name' => 'Shopping',
                'photo' => 'activities/shopping.png',
            ],
            [
                'name' => 'Study',
                'photo' => 'activities/study.png',
            ],
            [
                'name' => 'Sweeping',
                'photo' => 'activities/sweeping.png',
            ],
            [
                'name' => 'Swim',
                'photo' => 'activities/swim.png',
            ],
            [
                'name' => 'Travel',
                'photo' => 'activities/travel.png',
            ],
            [
                'name' => 'Work',
                'photo' => 'activities/Work.png',
            ],
        ];

        foreach ($activities as $activity) {
            DB::table('activities')->insert($activity);
        }

        $reasons = [
            [
                'name' => 'Family',
                'photo' => 'reasons/family.png',
            ],
            [
                'name' => 'Financial',
                'photo' => 'reasons/financial.png',
            ],
            [
                'name' => 'Friends',
                'photo' => 'reasons/friends.png',
            ],
            [
                'name' => 'Gift',
                'photo' => 'reasons/gift.png',
            ],
            [
                'name' => 'Health',
                'photo' => 'reasons/health.png',
            ],
            [
                'name' => 'Heart',
                'photo' => 'reasons/heart.png',
            ],
            [
                'name' => 'Memories',
                'photo' => 'reasons/Memories.png',
            ],
            [
                'name' => 'Societal Pressures',
                'photo' => 'reasons/Societal Pressures.png',
            ],
        ];

        foreach ($reasons as $reason) {
            DB::table('reasons')->insert($reason);
        }

    }
}
