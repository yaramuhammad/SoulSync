<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    public function getProfile()
    {
        $user = auth()->user();

        return $user;
    }

    public function updateProfile(ProfileUpdateRequest $request)
    {
        $user = \auth()->user();
        $validatedData = $request->validated();
        foreach ($validatedData as $key => $value) {
            $user->$key = $value;
        }

        $user->save();

        return response()->json(['success' => 'Profile updated successfully.']);
    }
}
