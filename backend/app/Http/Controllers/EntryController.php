<?php

namespace App\Http\Controllers;

use App\Http\Resources\EntryResource;
use App\Models\Emotion;
use App\Models\Entry;
use App\Models\SecondaryEmotion;
use App\Models\Tip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EntryController extends Controller
{
    public function index()
    {
        $entries = Auth::user()->entries()->with(['activities', 'reasons','primary_emotion', 'secondary_emotion'])->get();
        return EntryResource::collection($entries);
    }

    public function show()
    {
        $entry = Auth::user()->entries()->with(['activities', 'reasons','primary_emotion', 'secondary_emotion'])
            ->whereDate('created_at', today())->first();
        return new EntryResource($entry);
    }

    public static function updateOrCreateEntry()
    {
        $existingEntry = Entry::where('user_id', Auth::id())->whereDate('created_at', today())->first();

        if ($existingEntry) {
            return $existingEntry;
        } else {
            $newEntry = new Entry();
            $newEntry->user_id = Auth::id();
            $newEntry->save();
            return $newEntry;
        }
    }

    public static function addPrimaryEmotions(Emotion $emotion)
    {
        $entry = self::updateOrCreateEntry();
        $entry->primary_emotion_id = $emotion->id;
        $entry->secondary_emotion_id = null;
        $entry->save();
        return response()->json(['message'=>'Primary emotion saved successfully']);
    }

    public function addSecondaryEmotion(SecondaryEmotion $secondaryEmotion)
    {
        $entry = $this->updateOrCreateEntry();
        if (empty($entry->primary_emotion_id)) {
            return response()->json(['error' => 'Primary emotion must be set before adding a secondary emotion'], 422);
        }

        $primaryEmotion = Emotion::find($entry->primary_emotion_id);

        $validSecondaryEmotions = $primaryEmotion->secondaryEmotions;
        if (!$validSecondaryEmotions->contains($secondaryEmotion)) {
            return response()->json(['error' => 'Invalid secondary emotion for the selected primary emotion'], 422);
        }

        $entry->secondary_emotion_id = $secondaryEmotion->id;
        $entry->save();

        return response()->json(['message' => 'Secondary emotion saved successfully']);
    }

    public function addActivities(Request $request)
    {
        $entry = $this->updateOrCreateEntry();
        if (empty($entry->primary_emotion_id)) {
            return response()->json(['error' => 'Primary emotion must be set before adding activities'], 422);
        }
        $activityIds = $request->input('activity_ids');
        $entry->activities()->attach($activityIds);

        return response()->json(['message' => 'Activities added successfully']);
    }

    public function addReasons(Request $request)
    {
        $entry = $this->updateOrCreateEntry();
        if (empty($entry->activities()->count())) {
            return response()->json(['error' => 'Activities must be set before adding reasons'], 422);
        }
        $reasonIds = $request->input('reasons_ids');
        $entry->reasons()->attach($reasonIds);

        return response()->json(['message' => 'Reasons added successfully']);
    }

    public function addJournal(Request $request)
    {
        $validatedData = $request->validate([
            'journal' => 'required|string',
        ]);

        $entry = $this->updateOrCreateEntry();
        if (empty($entry->reasons()->count())) {
            return response()->json(['error' => 'Reasons must be set before adding a journal'], 422);
        }
        $entry->journal = $validatedData['journal'];
        $entry->save();

        return $this->generateTip();
    }

    private function generateTip()
    {
        $entry = $this->updateOrCreateEntry();
        if (empty($entry->primary_emotion_id)) {
            return response()->json(['error' => 'Journal must be set before generating tips'], 422);
        }

        $preferences = Auth::user()->preferences()->where('answer', true)->pluck('preferences_question_tag')->toArray();

        $tips = Tip::where('emotion_id', $entry->primary_emotion_id)
            ->where(function ($query) use ($preferences) {
                $query->whereIn('tag', $preferences)
                      ->orWhereNull('tag');
            })
            ->get();
        $tip = $tips->random();
        $entry->tip_id = $tip->id;
        $entry->save();
        return response()->json($tip);
    }
}
