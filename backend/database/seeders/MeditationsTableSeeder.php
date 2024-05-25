<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MeditationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $meditations = [
            [
                'name' => 'Affirmation For Manifestation',
                'image' => 'storage/meditation/meditation1.png',
                'url' => '1buvmZ3wdzJ2I7mqd1ifNs',
                'duration' => '00:08:48',
            ],
            [
                'name' => 'Breathing into the Body',
                'image' => 'storage/meditation/meditation2.png',
                'url' => '6kk91yMWvSOGnlS9T1T5nU',
                'duration' => '00:04:24',
            ],
            [
                'name' => 'Mind Freedom Meditation',
                'image' => 'storage/meditation/meditation3.png',
                'url' => '3TN6sMspsyPFZclSbbCJuz',
                'duration' => '00:04:39',
            ],
            [
                'name' => 'Zen Meditation',
                'image' => 'storage/meditation/meditation4.png',
                'url' => '2JtwMICkM36sP0JIEH29em',
                'duration' => '00:05:03',
            ],
            [
                'name' => 'Grounded Meditation',
                'image' => 'storage/meditation/meditation5.png',
                'url' => '7J6goi1udgaBa1nVAoeCoH',
                'duration' => '00:06:04',
            ],
        ];

        DB::table('meditations')->insert($meditations);
    }
}
