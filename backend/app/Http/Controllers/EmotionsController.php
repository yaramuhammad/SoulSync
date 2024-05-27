<?php

namespace App\Http\Controllers;

use App\Models\Emotion;
use Illuminate\Support\Facades\Validator;

class EmotionsController extends Controller
{
    public function index()
    {
        $emotions = Emotion::get(['id','name', 'photo' ]);

        foreach ($emotions as $emotion) {
            $emotion->photo = url($emotion->photo);
        }

        return response()->json($emotions);

    }



}
