<?php

namespace App\Http\Controllers;

use App\Http\Resources\EntryResource;
use App\Models\Emotion;
use App\Models\Entry;
use App\Models\SecondaryEmotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function addActivities(Request $request)
    {
        $entry = $this->updateOrCreateEntry();
        $activityIds = $request->input('activity_ids');
        $entry->activities()->attach($activityIds);

        return response()->json(['message' => 'Activities added successfully']);
    }

    public function addReasons(Request $request)
    {
        $entry = $this->updateOrCreateEntry();
        $reasonIds = $request->input('reasons_ids');
        $entry->reasons()->attach($reasonIds);

        return response()->json(['message' => 'Reasons added successfully']);
    }

    public static function addPrimaryEmotions(Emotion $emotion)
    {
        $entry = self::updateOrCreateEntry();
        $entry->primary_emotion_id = $emotion->id;
        $entry->save();
        return response()->json(['message'=>'emotion saved successfully'], );
    }

    public function addSecondaryEmotion(SecondaryEmotion $secondaryEmotion)
    {
        $entry = $this->updateOrCreateEntry();
        $entry->secondary_emotion_id = $secondaryEmotion->id;
        $entry->save();

        return response()->json(['message' => 'Emotion saved successfully']);
    }


}
