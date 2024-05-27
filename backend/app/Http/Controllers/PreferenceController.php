<?php

namespace App\Http\Controllers;

use App\Models\Preference;
use App\Models\PreferencesQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PreferenceController extends Controller
{
    public function showQuestions()
    {
        return PreferencesQuestion::all();
    }

    public function storeAnswers(Request $request)
    {
        $user = Auth::user();

        foreach ($request->input('answers') as $tag => $answer) {
            Preference::updateOrCreate(
                ['user_id' => $user->id, 'preferences_question_tag' => $tag],
                ['answer' => $answer]
            );
        }

        return response()->json(['success'=> 'Preferences saved successfully.']);
    }

    public function getAnswers()
    {
        $user = Auth::user();
        return $user->preferences()->get(['preferences_question_tag','answer']);
    }
}
