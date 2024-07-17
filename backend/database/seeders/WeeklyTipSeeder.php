<?php

namespace Database\Seeders;

use App\Models\WeeklyTip;
use Illuminate\Database\Seeder;

class WeeklyTipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tips = [
            // Aspect 1: Family
            [
                ['weekly_aspect_id' => 1, 'tag' => 'Home', 'tip' => 'Spend more quality time with your family.'],
                ['weekly_aspect_id' => 1, 'tag' => 'Money', 'tip' => 'Plan a family budget meeting.'],
                ['weekly_aspect_id' => 1, 'tag' => 'Reading', 'tip' => 'Read a storybook with your children.'],
                ['weekly_aspect_id' => 1, 'tag' => 'Social', 'tip' => 'Host a family game night.'],
                ['weekly_aspect_id' => 1, 'tag' => 'Sport', 'tip' => 'Play sports or exercise together as a family.'],
            ],

            // Aspect 2: Friends
            [
                ['weekly_aspect_id' => 2, 'tag' => 'Home', 'tip' => 'Invite friends over for a meal at home.'],
                ['weekly_aspect_id' => 2, 'tag' => 'Money', 'tip' => 'Plan a budget-friendly outing with friends.'],
                ['weekly_aspect_id' => 2, 'tag' => 'Reading', 'tip' => 'Discuss a book with your friends.'],
                ['weekly_aspect_id' => 2, 'tag' => 'Social', 'tip' => 'Organize a virtual hangout with friends.'],
                ['weekly_aspect_id' => 2, 'tag' => 'Sport', 'tip' => 'Play a team sport with friends.'],
            ],

            // Aspect 3: Money
            [
                ['weekly_aspect_id' => 3, 'tag' => 'Home', 'tip' => 'Review household expenses and find savings.'],
                ['weekly_aspect_id' => 3, 'tag' => 'Money', 'tip' => 'Research investment options for savings.'],
                ['weekly_aspect_id' => 3, 'tag' => 'Reading', 'tip' => 'Read a financial planning book.'],
                ['weekly_aspect_id' => 3, 'tag' => 'Social', 'tip' => 'Discuss financial goals with a friend or partner.'],
                ['weekly_aspect_id' => 3, 'tag' => 'Sport', 'tip' => 'Explore budget-friendly fitness activities.'],
            ],

            // Aspect 4: Health
            [
                ['weekly_aspect_id' => 4, 'tag' => 'Home', 'tip' => 'Create a healthy meal plan for the week.'],
                ['weekly_aspect_id' => 4, 'tag' => 'Money', 'tip' => 'Invest in health and fitness equipment for home.'],
                ['weekly_aspect_id' => 4, 'tag' => 'Reading', 'tip' => 'Read about new health trends or nutrition tips.'],
                ['weekly_aspect_id' => 4, 'tag' => 'Social', 'tip' => 'Join a fitness class or group activity.'],
                ['weekly_aspect_id' => 4, 'tag' => 'Sport', 'tip' => 'Try a new outdoor activity like hiking or biking.'],
            ],

            // Aspect 5: Career
            [
                ['weekly_aspect_id' => 5, 'tag' => 'Home', 'tip' => 'Create a dedicated workspace at home.'],
                ['weekly_aspect_id' => 5, 'tag' => 'Money', 'tip' => 'Invest in professional development courses.'],
                ['weekly_aspect_id' => 5, 'tag' => 'Reading', 'tip' => 'Read industry-related books or articles.'],
                ['weekly_aspect_id' => 5, 'tag' => 'Social', 'tip' => 'Network with professionals in your field.'],
                ['weekly_aspect_id' => 5, 'tag' => 'Sport', 'tip' => 'Take breaks to stretch and move during work hours.'],
            ],

            // Aspect 6: Personal Growth
            [
                ['weekly_aspect_id' => 6, 'tag' => 'Home', 'tip' => 'Practice daily journaling for personal reflection.'],
                ['weekly_aspect_id' => 6, 'tag' => 'Money', 'tip' => 'Set financial goals aligned with personal values.'],
                ['weekly_aspect_id' => 6, 'tag' => 'Reading', 'tip' => 'Read self-help books for personal development.'],
                ['weekly_aspect_id' => 6, 'tag' => 'Social', 'tip' => 'Attend personal growth workshops or seminars.'],
                ['weekly_aspect_id' => 6, 'tag' => 'Sport', 'tip' => 'Engage in activities that challenge your comfort zone.'],
            ],

            // Aspect 7: Fun
            [
                ['weekly_aspect_id' => 7, 'tag' => 'Home', 'tip' => 'Plan a themed movie night at home.'],
                ['weekly_aspect_id' => 7, 'tag' => 'Money', 'tip' => 'Explore free or low-cost local entertainment options.'],
                ['weekly_aspect_id' => 7, 'tag' => 'Reading', 'tip' => 'Read fiction or humorous books for relaxation.'],
                ['weekly_aspect_id' => 7, 'tag' => 'Social', 'tip' => 'Organize a fun outing with friends or family.'],
                ['weekly_aspect_id' => 7, 'tag' => 'Sport', 'tip' => 'Play recreational sports or games with others.'],
            ],

            // Aspect 8: Physical Environment
            [
                ['weekly_aspect_id' => 8, 'tag' => 'Home', 'tip' => 'Declutter and organize one room or area in your home.'],
                ['weekly_aspect_id' => 8, 'tag' => 'Money', 'tip' => 'Invest in eco-friendly home products or upgrades.'],
                ['weekly_aspect_id' => 8, 'tag' => 'Reading', 'tip' => 'Read about minimalist living or sustainable practices.'],
                ['weekly_aspect_id' => 8, 'tag' => 'Social', 'tip' => 'Host an eco-friendly gathering or swap party.'],
                ['weekly_aspect_id' => 8, 'tag' => 'Sport', 'tip' => 'Explore outdoor activities in natural environments.'],
            ],

            // Aspect 9: Spirituality
            [
                ['weekly_aspect_id' => 9, 'tag' => 'Home', 'tip' => 'Create a sacred space for meditation or prayer at home.'],
                ['weekly_aspect_id' => 9, 'tag' => 'Money', 'tip' => 'Donate to a cause or charity that aligns with your values.'],
                ['weekly_aspect_id' => 9, 'tag' => 'Reading', 'tip' => 'Read spiritual texts or philosophy books.'],
                ['weekly_aspect_id' => 9, 'tag' => 'Social', 'tip' => 'Attend a religious or spiritual community gathering.'],
                ['weekly_aspect_id' => 9, 'tag' => 'Sport', 'tip' => 'Practice yoga or tai chi for spiritual connection and physical health.'],
            ],

            // Aspect 10: Love
            [
                ['weekly_aspect_id' => 10, 'tag' => 'Home', 'tip' => 'Create a romantic atmosphere at home for your partner.'],
                ['weekly_aspect_id' => 10, 'tag' => 'Money', 'tip' => 'Plan a budget-friendly date night or surprise for your partner.'],
                ['weekly_aspect_id' => 10, 'tag' => 'Reading', 'tip' => 'Read books or articles on relationships and communication.'],
                ['weekly_aspect_id' => 10, 'tag' => 'Social', 'tip' => 'Share your feelings and express gratitude to your partner.'],
                ['weekly_aspect_id' => 10, 'tag' => 'Sport', 'tip' => 'Engage in physical activities together to strengthen your bond.'],
            ],
        ];

        foreach ($tips as $aspectTips) {
            foreach ($aspectTips as $tip) {
                WeeklyTip::create($tip);
            }
        }
    }
}
