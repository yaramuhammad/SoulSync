<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepressionTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [
            ['question' => 'Feeling sad or down in the dumps'],
            ['question' => 'Feeling unhappy or blue'],
            ['question' => 'Crying spells or tearfulness'],
            ['question' => 'Feeling discouraged'],
            ['question' => 'Feeling hopeless'],
            ['question' => 'Low self-esteem'],
            ['question' => 'Feeling worthless or inadequate'],
            ['question' => 'Guilt or shame'],
            ['question' => 'Criticizing yourself or blaming yourself'],
            ['question' => 'Difficulty making decisions'],
            ['question' => 'Loss of interest in family, friends or colleagues'],
            ['question' => 'Loneliness'],
            ['question' => 'Spending less time with family or friends'],
            ['question' => 'Loss of motivation'],
            ['question' => 'Loss of interest in work or other activities'],
            ['question' => 'Avoiding work or other activities'],
            ['question' => 'Loss of pleasure or satisfaction in life'],
            ['question' => 'Feeling tired'],
            ['question' => 'Difficulty sleeping or sleeping too much'],
            ['question' => 'Decreased or increased appetite'],
            ['question' => 'Loss of interest in sex'],
            ['question' => 'Worrying about your health'],
            ['question' => 'Do you have any suicidal thoughts?'],
            ['question' => 'Would you like to end your life?'],
            ['question' => 'Do you have a plan for harming yourself?'],
        ];

        foreach ($questions as $question) {
            DB::table('depression_test_questions')->insert([
                'question' => $question['question'],
            ]);
        }
    }
}
