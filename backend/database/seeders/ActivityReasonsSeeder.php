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
                'photo' => 'storage/activities/Movies.png',
            ],
            [
                'name' => 'Praying',
                'photo' => 'storage/activities/praying.png',
            ],
            [
                'name' => 'Reading',
                'photo' => 'storage/activities/Reading.png',
            ],
            [
                'name' => 'Bicycle',
                'photo' => 'storage/activities/bicycle.png',
            ],
            [
                'name' => 'Cooking',
                'photo' => 'storage/activities/cooking.png',
            ],
            [
                'name' => 'Gym',
                'photo' => 'storage/activities/Gym.png',
            ],
            [
                'name' => 'Help Other',
                'photo' => 'storage/activities/Help-Other.png',
            ],
            [
                'name' => 'Meditate',
                'photo' => 'storage/activities/Meditate.png',
            ],
            [
                'name' => 'Music',
                'photo' => 'storage/activities/Music.png',
            ],
            [
                'name' => 'Save Money',
                'photo' => 'storage/activities/save-money.png',
            ],
            [
                'name' => 'Shopping',
                'photo' => 'storage/activities/shopping.png',
            ],
            [
                'name' => 'Study',
                'photo' => 'storage/activities/study.png',
            ],
            [
                'name' => 'Sweeping',
                'photo' => 'storage/activities/sweeping.png',
            ],
            [
                'name' => 'Swim',
                'photo' => 'storage/activities/swim.png',
            ],
            [
                'name' => 'Travel',
                'photo' => 'storage/activities/travel.png',
            ],
            [
                'name' => 'Work',
                'photo' => 'storage/activities/Work.png',
            ],
        ];

        foreach ($activities as $activity) {
            DB::table('activities')->insert($activity);
        }

        $reasons = [
            [
                'name' => 'Family',
                'photo' => 'storage/reasons/family.png',
            ],
            [
                'name' => 'Financial',
                'photo' => 'storage/reasons/financial.png',
            ],
            [
                'name' => 'Friends',
                'photo' => 'storage/reasons/friends.png',
            ],
            [
                'name' => 'Gift',
                'photo' => 'storage/reasons/gift.png',
            ],
            [
                'name' => 'Health',
                'photo' => 'storage/reasons/health.png',
            ],
            [
                'name' => 'Heart',
                'photo' => 'storage/reasons/heart.png',
            ],
            [
                'name' => 'Memories',
                'photo' => 'storage/reasons/Memories.png',
            ],
            [
                'name' => 'Societal Pressures',
                'photo' => 'storage/reasons/Societal Pressures.png',
            ],
        ];

        foreach ($reasons as $reason) {
            DB::table('reasons')->insert($reason);
        }

    }
}
