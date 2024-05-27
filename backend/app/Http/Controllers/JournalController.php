<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JournalController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'journal' => 'required|string',
        ]);

        $entry = EntryController::updateOrCreateEntry();
        $entry->journal = $validatedData['journal'];
        $entry->save();

        return response()->json(['message' => 'Journal entry created successfully.'], 201);
    }
}
