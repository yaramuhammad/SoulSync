<?php

namespace Database\Seeders;

use App\Models\Tip;
use Illuminate\Database\Seeder;

class TipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tips = [
            // Love
            ['tip' => 'Write a love letter or poem to your significant other.', 'tag' => 'Home', 'emotion_id' => 1, 'description' => 'Express your feelings through heartfelt words and gestures.'],
            ['tip' => 'Take a walk together in a scenic area.', 'tag' => 'Home', 'emotion_id' => 1, 'description' => 'Enjoy nature and each other’s company in a peaceful setting.'],
            ['tip' => 'Watch a romantic movie together.', 'tag' => 'Home', 'emotion_id' => 1, 'description' => 'Cuddle up and enjoy a movie that evokes feelings of romance.'],
            ['tip' => 'Plan a surprise date night.', 'tag' => 'Money', 'emotion_id' => 1, 'description' => 'Create a memorable evening without breaking the bank.'],
            ['tip' => 'Read a romantic novel together.', 'tag' => 'Reading', 'emotion_id' => 1, 'description' => 'Share the joy of reading and discuss the story.'],
            ['tip' => 'Host a double date with friends.', 'tag' => 'Social', 'emotion_id' => 1, 'description' => 'Spend time with friends and strengthen your relationship.'],
            ['tip' => 'Engage in a fun sport or activity together.', 'tag' => 'Sport', 'emotion_id' => 1, 'description' => 'Build your connection through physical activity.'],
            ['tip' => 'Cook a meal together.', 'tag' => null, 'emotion_id' => 1, 'description' => 'Collaborate in the kitchen and enjoy a homemade meal.'],

            // Fear
            ['tip' => 'Reach out to a friend or therapist for support.', 'tag' => 'Social', 'emotion_id' => 2, 'description' => 'Seek reassurance and guidance from someone you trust.'],
            ['tip' => 'Create a financial plan to manage your expenses better.', 'tag' => 'Money', 'emotion_id' => 2, 'description' => 'Having a plan can help alleviate financial anxieties.'],
            ['tip' => 'Practice deep breathing exercises to calm your mind.', 'tag' => null, 'emotion_id' => 2, 'description' => 'Deep breathing can help reduce stress and fear.'],
            ['tip' => 'Engage in a relaxing hobby, like painting or gardening.', 'tag' => null, 'emotion_id' => 2, 'description' => 'Channel your energy into a creative outlet to alleviate anxiety.'],
            ['tip' => 'Read a book on overcoming fears.', 'tag' => 'Reading', 'emotion_id' => 2, 'description' => 'Gain insights and strategies to deal with fear.'],
            ['tip' => 'Join a support group or community.', 'tag' => 'Social', 'emotion_id' => 2, 'description' => 'Find strength in numbers and shared experiences.'],

            // Anger
            ['tip' => 'Engage in physical exercise to release pent-up energy.', 'tag' => 'Sport', 'emotion_id' => 3, 'description' => 'Physical activity can help you manage anger and frustration.'],
            ['tip' => 'Write down your feelings in a journal to process them.', 'tag' => 'Reading', 'emotion_id' => 3, 'description' => 'Journaling can be a healthy outlet for expressing anger.'],
            ['tip' => 'Practice mindfulness or meditation.', 'tag' => null, 'emotion_id' => 3, 'description' => 'Find calmness and clarity through meditation.'],
            ['tip' => 'Talk to someone you trust about your feelings.', 'tag' => 'Social', 'emotion_id' => 3, 'description' => 'Expressing your emotions can help release anger.'],
            ['tip' => 'Engage in a competitive sport.', 'tag' => 'Sport', 'emotion_id' => 3, 'description' => 'Use your energy in a healthy and constructive way.'],

            // Sadness
            ['tip' => 'Listen to calming music to soothe your emotions.', 'tag' => null, 'emotion_id' => 4, 'description' => 'Music can be a powerful tool to lift your spirits.'],
            ['tip' => 'Talk to a friend or family member about how you’re feeling.', 'tag' => 'Social', 'emotion_id' => 4, 'description' => 'Sharing your feelings with someone you trust can provide relief.'],
            ['tip' => 'Watch a comforting or uplifting movie.', 'tag' => 'Home', 'emotion_id' => 4, 'description' => 'Find solace in a story that brings comfort.'],
            ['tip' => 'Take a walk in nature.', 'tag' => 'Sport', 'emotion_id' => 4, 'description' => 'Nature can have a calming and uplifting effect.'],

            // Happiness
            ['tip' => 'Write down what you are grateful for each day.', 'tag' => 'Home', 'emotion_id' => 5, 'description' => 'Focusing on gratitude can improve your mood and overall outlook on life.'],
            ['tip' => 'Read a book that inspires and uplifts you.', 'tag' => 'Reading', 'emotion_id' => 5, 'description' => 'Books can be a great source of joy and inspiration.'],
            ['tip' => 'Spend some time with loved ones and share happy memories.', 'tag' => 'Social', 'emotion_id' => 5, 'description' => 'Reliving positive experiences can enhance your current mood.'],
            ['tip' => 'Dance to your favorite music.', 'tag' => 'Sport', 'emotion_id' => 5, 'description' => 'Dancing can be a fun and joyful way to express happiness.'],
            ['tip' => 'Create a vision board of your dreams and goals.', 'tag' => null, 'emotion_id' => 5, 'description' => 'Visualizing your dreams can boost your happiness and motivation.'],

            // Surprised
            ['tip' => 'Try a new sport or physical activity to surprise your body.', 'tag' => 'Sport', 'emotion_id' => 6, 'description' => 'Engaging in new activities can bring excitement and joy.'],
            ['tip' => 'Explore a new book genre to surprise your mind.', 'tag' => 'Reading', 'emotion_id' => 6, 'description' => 'Reading different genres can broaden your horizons and entertain you.'],
            ['tip' => 'Plan a spontaneous outing.', 'tag' => 'Social', 'emotion_id' => 6, 'description' => 'Break the routine and experience something new.'],
            ['tip' => 'Try a new recipe or cuisine.', 'tag' => 'Home', 'emotion_id' => 6, 'description' => 'Experimenting in the kitchen can be a delightful surprise.'],

            // Disgust
            ['tip' => 'Clean your living space to create a more comfortable environment.', 'tag' => 'Home', 'emotion_id' => 7, 'description' => 'A clean space can help you feel more at ease and less disgusted.'],
            ['tip' => 'Avoid negative social media content to protect your mental health.', 'tag' => 'Social', 'emotion_id' => 7, 'description' => 'Curating your social media feeds can reduce feelings of disgust and negativity.'],
            ['tip' => 'Cook or eat a healthy meal to nourish your body.', 'tag' => 'Sport', 'emotion_id' => 7, 'description' => 'Focus on nutritious foods that make you feel good from the inside out.'],
            ['tip' => 'Declutter and organize your surroundings to create a more pleasant environment.', 'tag' => null, 'emotion_id' => 7, 'description' => 'Create a clean and harmonious space that promotes well-being.'],
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
