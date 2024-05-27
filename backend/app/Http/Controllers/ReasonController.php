<?php

namespace App\Http\Controllers;

use App\Models\Reason;
use Illuminate\Http\Request;

class ReasonController extends Controller
{
    public function index()
    {
        $reasons = Reason::all();

        foreach ($reasons as $reason) {
            $reason->photo = url($reason->photo);
        }

        return response()->json($reasons);
    }
}
