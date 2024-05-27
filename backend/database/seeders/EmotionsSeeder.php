<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmotionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $emotions = [
            'Love' => [
                'Trusted' => 'Feeling secure and confident in someone or something.',
                'passionate' => 'Feeling intense emotions or enthusiasm towards something.',
                'Affectionate' => 'Feeling fondness or tenderness towards someone.',
                'Gentle' => 'Feeling kind, mild, or soft in temperament.',
                'Accepted' => 'Feeling welcomed or recognized by others.',
                'valued' => 'Feeling appreciated or esteemed by others.',
            ],
            'Fear' => [
                'Embarrassed' => 'Feeling self-conscious or ashamed in front of others.',
                'Vulnerable' => 'Feeling exposed or susceptible to harm or danger.',
                'Rejected' => 'Feeling unwanted or excluded by others.',
                'insecure' => 'Feeling uncertain or lacking confidence in oneself.',
                'worried' => 'Feeling anxious or troubled about something.',
                'Excluded' => 'Feeling left out or isolated from a group.',
            ],
            'Anger' => [
                'threatened' => 'Feeling endangered or at risk of harm.',
                'mad' => 'Feeling strong displeasure or frustration.',
                'offended' => 'Feeling resentful or irritated by someone\'s actions or words.',
                'frustrated' => 'Feeling blocked or thwarted in achieving a goal.',
                'annoyed' => 'Feeling mildly irritated or bothered by something.',
                'aggressive' => 'Feeling inclined to attack or confront others.',
            ],
            'Sadness' => [
                'hurt' => 'Feeling emotional pain or distress.',
                'guilty' => 'Feeling responsible or remorseful for a wrongdoing.',
                'lonely' => 'Feeling isolated or disconnected from others.',
                'uninterested' => 'Feeling indifferent or apathetic towards something.',
                'inadequate' => 'Feeling insufficient or not up to standard.',
                'despair' => 'Feeling hopeless or without hope for the future.',
            ],
            'Happiness' => [
                'confident' => 'Feeling self-assured or sure of oneself.',
                'grateful' => 'Feeling thankful or appreciative of something or someone.',
                'peaceful' => 'Feeling calm or serene.',
                'excited' => 'Feeling eager, enthusiastic, or thrilled about something.',
                'playful' => 'Feeling light-hearted or inclined to have fun.',
                'proud' => 'Feeling a sense of accomplishment or satisfaction.',
            ],
            'Surprised' => [
                'startled' => 'Feeling suddenly shocked or alarmed by something unexpected.',
                'overwhelmed' => 'Feeling emotionally or mentally burdened by something.',
                'confused' => 'Feeling uncertain or unclear about something.',
                'amazed' => 'Feeling astonished or filled with wonder.',
                'shocked' => 'Feeling intensely surprised or appalled by something.',
                'perplexed' => 'Feeling puzzled or confused by something.',
            ],
            'Disgust' => [
                'Averse' => 'Feeling strong dislike or revulsion towards something.',
                'Disappointed' => 'Feeling let down or disillusioned by something.',
                'Bitter' => 'Feeling resentful or cynical about something.',
                'shameful' => 'Feeling embarrassed or guilty for something done wrong.',
                'Resentful' => 'Feeling bitter or indignant towards someone or something.',
                'disapproving' => 'Feeling disapproving or critical of someone\'s actions or behavior.',
            ]
        ];


        foreach ($emotions as $primary => $children) {
            // Insert primary emotion
            $primaryId = DB::table('emotions')->insertGetId([
                'name' => $primary,
                'photo' => 'storage/Emotion/' . $primary . '.png',
            ]);

            // Insert child emotions with descriptions
            foreach ($children as $child => $description) {
                $childId = DB::table('secondary_emotions')->insertGetId([
                    'name' => $child,
                    'photo' => 'storage/Emotion/' . $child . '.png',
                    'parent_id' => $primaryId,
                    'description' => $description,
                ]);
            }
        }
    }
}
