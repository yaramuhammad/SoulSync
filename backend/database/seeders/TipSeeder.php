<?php

namespace Database\Seeders;

use App\Models\Tip;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tips = [
            [
                'tip' => 'Write a love letter or poem to your significant other.',
                'tag' => 'Home',
                'emotion_id' => 1,
                'description' => 'Express your feelings through heartfelt words and gestures.'
            ],
            [
                'tip' => 'Take a walk together in a scenic area.',
                'tag' => 'Home',
                'emotion_id' => 1,
                'description' => 'Enjoy nature and each other’s company in a peaceful setting.'
            ],
            [
                'tip' => 'Watch a romantic movie together.',
                'tag' => 'Home',
                'emotion_id' => 1,
                'description' => 'Cuddle up and enjoy a movie that evokes feelings of romance.'
            ],
            [
                'tip' => 'Reach out to a friend or therapist for support.',
                'tag' => 'Social',
                'emotion_id' => 2,
                'description' => 'Seek reassurance and guidance from someone you trust.'
            ],
            [
                'tip' => 'Engage in a relaxing hobby, like painting or gardening.',
                'tag' => null,
                'emotion_id' => 2,
                'description' => 'Channel your energy into a creative outlet to alleviate anxiety.'
            ],
            [
                'tip' => 'Cook or eat a healthy meal to nourish your body.',
                'tag' => 'Sport',
                'emotion_id' => 7,
                'description' => 'Focus on nutritious foods that make you feel good from the inside out.'
            ],
            [
                'tip' => 'Declutter and organize your surroundings to create a more pleasant environment.',
                'tag' => null,
                'emotion_id' => 7,
                'description' => 'Create a clean and harmonious space that promotes well-being.'
            ],
        ];

        foreach ($tips as $data) {
            $tip = new Tip();
            $tip->tip = $data['tip'];
            $tip->tag = $data['tag'];
            $tip->emotion_id = $data['emotion_id'];
            $tip->description = $data['description'];
            $tip->save();
        }
    }
}
