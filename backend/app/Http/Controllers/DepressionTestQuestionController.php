<?php

namespace App\Http\Controllers;

use App\Models\DepressionTestQuestion;
use App\Models\DepressionTestResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepressionTestQuestionController extends Controller
{
    public function index()
    {
        return DepressionTestQuestion::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'answers' => 'required|array|size:25',
            'answers.*' => 'integer|min:0|max:4',
        ]);

        $answers = $request->input('answers');

        $result = $this->evaluateBurnsDepressionScore($answers);

        $depressionResult = new DepressionTestResult();
        $depressionResult->user_id = Auth::id();
        $depressionResult->total_score = $result['total_score'];
        $depressionResult->level_of_depression = $result['level_of_depression'];
        $depressionResult->save();

        return response()->json($result);
    }

    private function evaluateBurnsDepressionScore($answers)
    {
        // Calculate the total score
        $totalScore = array_sum($answers);

        // Determine the level of depression based on the total score
        if ($totalScore >= 0 && $totalScore <= 5) {
            $levelOfDepression = 'no depression';
        } elseif ($totalScore >= 6 && $totalScore <= 10) {
            $levelOfDepression = 'normal but unhappy';
        } elseif ($totalScore >= 11 && $totalScore <= 25) {
            $levelOfDepression = 'mild depression';
        } elseif ($totalScore >= 26 && $totalScore <= 50) {
            $levelOfDepression = 'moderate depression';
        } elseif ($totalScore >= 51 && $totalScore <= 75) {
            $levelOfDepression = 'severe depression';
        } elseif ($totalScore >= 76 && $totalScore <= 100) {
            $levelOfDepression = 'extreme depression';
        } else {
            $levelOfDepression = 'Invalid score';
        }

        return [
            'total_score' => $totalScore,
            'level_of_depression' => $levelOfDepression,
        ];
    }
}
