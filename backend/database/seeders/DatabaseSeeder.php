<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Post;

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
        $this->call(TipSeeder::class);
        $this->call(WeeklyAspectSeeder::class);
        $this->call(WeeklyTipSeeder::class);
        DB::table('admins')->insert(['email' => 'admin@soulsync.com', 'password' => Hash::make('password'), 'name' => 'admin']);
        User::factory()->count(10)->create();
        
        Post::factory()
        ->count(100)
        ->create()
        ->each(function ($post) {
            $users = User::all()->random(rand(1, 10))->pluck('id');
            foreach ($users as $user_id) {
                $post->likes()->create(['user_id' => $user_id]);
            }
        });
        Comment::factory()->count(500)->create();
    }
}
