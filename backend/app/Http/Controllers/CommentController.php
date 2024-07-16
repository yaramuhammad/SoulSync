<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Post;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $data = $request->validate([
            'body' => 'required',
        ]);

        $comment = new Comment([
            'body' => $data['body'],
            'user_id' => auth()->user()->id,
            'post_id'=> $post->id,
        ]);

        $comment->save();

        return response()->json(['success' => 'Comment created successfully.']);
    }

    public function update(Request $request, Comment $comment)
    {
        if($comment->user_id != auth()->user()->id){
            abort(403);
        }
        $data = $request->validate([
            'body' => 'required',
        ]);
        $comment->update($data);
        return response()->json(['success'=> 'Comment updated successfully']);
    }

    public function destroy(Comment $comment)
    {
        if($comment->user_id == auth()->user()->id) {
            $comment->delete();
            return response()->json(['success'=> 'Comment deleted successfully']);
        } else {
            return abort(403);
        }
    }
}
