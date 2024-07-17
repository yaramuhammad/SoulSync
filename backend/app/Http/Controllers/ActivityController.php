<?php

namespace App\Http\Controllers;

use App\Models\Activity;

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
