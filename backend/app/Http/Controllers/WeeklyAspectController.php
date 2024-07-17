<?php

namespace App\Http\Controllers;

use App\Models\Preference;
use App\Models\User;
use App\Models\UserWeeklyScore;
use App\Models\UserWeeklyTip;
use App\Models\WeeklyAspect;
use App\Models\WeeklyTip;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WeeklyAspectController extends Controller
{
    public function index()
    {
        return WeeklyAspect::all();
    }

    public function store(Request $request)
    {
        $user = $request->user();

        $data = $request->validate([
            'scores' => 'required|array|min:10',
            'scores.*.aspect_id' => 'required|exists:weekly_aspects,id',
            'scores.*.score' => 'required|integer|min:1|max:10',
        ]);

        $now = Carbon::now();
        $year = $now->year;
        $week = $now->weekOfYear;

        if ($this->checkUserWeeklyEntry($user)) {
            return response()->json(['error' => 'Scores for this week have already been submitted'], 400);
        }

        $userPreferences = DB::table('preferences')
            ->where(['user_id' => $user->id, 'answer' => 1])
            ->pluck('preferences_question_tag')
            ->toArray();

        // Track which aspects have already received a tip
        $aspectsWithTip = [];

        foreach ($data['scores'] as $score) {
            UserWeeklyScore::create([
                'user_id' => $user->id,
                'weekly_aspect_id' => $score['aspect_id'],
                'score' => $score['score'],
                'week' => $week,
                'year' => $year,
            ]);

            if ($score['score'] < 5) {
                // Retrieve a single tip for each aspect that matches the 'Home' tag
                $tip = WeeklyTip::where('weekly_aspect_id', $score['aspect_id'])
                    ->whereIn('tag', $userPreferences)
                    ->whereNotIn('weekly_aspect_id', $aspectsWithTip)
                    ->whereIn('tag', $userPreferences)
                    ->inRandomOrder()
                    ->first();

                if ($tip) {
                    // Track this aspect so we don't fetch another tip for it
                    $aspectsWithTip[] = $score['aspect_id'];

                    UserWeeklyTip::create([
                        'user_id' => $user->id,
                        'weekly_tip_id' => $tip->id,
                        'week' => $week,
                        'year' => $year,
                    ]);
                }
            }
        }

        return response()->json(['message' => 'Scores submitted successfully']);
    }

    public function currentWeekTips(Request $request)
    {
        $user = $request->user();

        $now = Carbon::now();
        $year = $now->year;
        $week = $now->weekOfYear;

        $tips = UserWeeklyTip::where('user_id', $user->id)
            ->where('week', $week)
            ->where('year', $year)
            ->with('weekly_tip')
            ->get();

        return response()->json($tips);
    }

    public function markTipAsDone(Request $request, $tipId)
    {
        $user = $request->user();

        $userTip = UserWeeklyTip::where('user_id', $user->id)
            ->where('id', $tipId)
            ->first();

        if (! $userTip) {
            return response()->json(['error' => 'User tip not found'], 404);
        }

        $userTip->done = true;
        $userTip->save();

        return response()->json(['message' => 'Tip marked as done']);
    }

    private function checkUserWeeklyEntry($user)
    {
        $now = Carbon::now();
        $year = $now->year;
        $week = $now->weekOfYear;

        $existingScores = UserWeeklyScore::where('user_id', $user->id)
            ->where('week', $week)
            ->where('year', $year)
            ->exists();

        if ($existingScores) {
            return true;
        }

        return false;
    }

    public function returnkUserWeeklyEntry()
    {
        return response()->json(['is_entry_exists' => $this->checkUserWeeklyEntry(auth()->user())]);
    }

    public function getCustomizedTips(Request $request)
    {
        $user = $request->user();

        // Retrieve user preferences where answer is 1 and get the tags
        $userPreferences = Preference::where(['user_id' => $user->id, 'answer' => 1])
            ->pluck('preferences_question_tag')
            ->toArray();

        // Retrieve weekly tips that match the user preferences
        $tips = WeeklyTip::whereIn('weekly_aspect_id', function ($query) use ($userPreferences) {
            $query->select('id')
                ->from('weekly_aspects')
                ->whereIn('tag', $userPreferences);
        })->get();

        // Return the tips as JSON response
        return response()->json($tips);
    }
}
