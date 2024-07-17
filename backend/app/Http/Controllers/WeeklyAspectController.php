<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserWeeklyScore;
use App\Models\UserWeeklyTip;
use App\Models\WeeklyAspect;
use App\Models\WeeklyTip;
use Illuminate\Http\Request;
use Carbon\Carbon;

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

        foreach ($data['scores'] as $score) {
            UserWeeklyScore::create([
                'user_id' => $user->id,
                'weekly_aspect_id' => $score['aspect_id'],
                'score' => $score['score'],
                'week' => $week,
                'year' => $year,
            ]);

            if ($score['score'] < 5) {
                $tips = WeeklyTip::where('weekly_aspect_id', $score['aspect_id'])->get();
                foreach ($tips as $tip) {
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

        if (!$userTip) {
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
        return response()->json(['is_entry_exists'=>$this->checkUserWeeklyEntry(auth()->user())]);
    }
}
