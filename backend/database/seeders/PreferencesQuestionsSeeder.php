<?php

namespace Database\Seeders;

use App\Models\PreferencesQuestion;
use Illuminate\Database\Seeder;

class PreferencesQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [
            ['question' => 'Do you like doing sports or physical activities?', 'tag' => 'Sport'],
            ['question' => 'Do you like Reading or educational activities?', 'tag' => 'Reading'],
            ['question' => 'Are you financially stable to spend money on mental health activities?', 'tag' => 'Money'],
            ['question' => 'Do you usually spend a lot of time at home?', 'tag' => 'Home'],
            ['question' => 'Do you like to socialize with other people?', 'tag' => 'Social'],
        ];

        // Insert the questions into the database
        foreach ($questions as $question) {
            PreferencesQuestion::create($question);
        }
    }
}
