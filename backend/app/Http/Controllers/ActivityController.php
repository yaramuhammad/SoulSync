<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = Activity::all();

        foreach ($activities as $activity) {
            $activity->photo = url($activity->photo);
        }

        return response()->json($activities);
    }
}
