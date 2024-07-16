<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use App\Models\Post;

class LikeController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $like = new Like([
            'user_id' => auth()->user()->id,
            'post_id' => $post->id,
        ]);

        $like->save();

        return response()->json(['success' => 'Like created successfully.']);
    }

    public function destroy(Like $like)
    {
        if ($like->user_id != auth()->user()->id) {
            return abort(403);
        }
        $like->delete();
        return response()->json(['success' => 'Like deleted successfully']);
    }
}
