<?php

namespace App\Http\Controllers;

use App\Models\Meditation;

class MeditationController extends Controller
{
    public function index()
    {

        $meditations = Meditation::all();

        foreach ($meditations as $meditation) {
            $meditation->image = url($meditation->image);
        }

        return response()->json($meditations);

    }
}
