<?php

namespace App\Http\Controllers;

use App\Models\Meditation;
use Illuminate\Http\Request;

class MeditationController extends Controller
{
    public function index()
    {

        $meditations = Meditation::all();

        // Modify the image paths to be full URLs
        foreach ($meditations as $meditation) {
            $meditation->image = url($meditation->image);
        }

        return response()->json($meditations);

    }
}
