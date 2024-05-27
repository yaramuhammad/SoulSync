<?php

namespace App\Http\Controllers;

use App\Models\Emotion;
use App\Models\SecondaryEmotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SecondaryEmotionsController extends Controller
{
    public function index(Emotion $emotion)
    {
        EntryController::addPrimaryEmotions($emotion);
        $emotions = SecondaryEmotion::where('parent_id',$emotion->id)->get(['name', 'photo', 'description']);

        foreach ($emotions as $e) {
            $e->photo = url($e->photo);
        }

        return response()->json($emotions);
    }
}
