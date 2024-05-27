<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(MeditationsTableSeeder::class);
        $this->call(DepressionTestSeeder::class);
        $this->call(EmotionsSeeder::class);
        $this->call(ActivityReasonsSeeder::class);
        $this->call(PreferencesQuestionsSeeder::class);
        DB::table('admins')->insert(['email' => 'admin@soulsync.com', 'password' => Hash::make('password'), 'name' => 'admin']);
    }
}
