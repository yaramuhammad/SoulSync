<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->with(['comments', 'likes.user'])->get();

        $result = $posts->map(function ($post) {
            return [
                'id' => $post->id,
                'created_at' => $post->created_at,
                'updated_at' => $post->updated_at,
                'body' => $post->body,
                'user_id' => $post->user_id,
                'imagePath' => $post->imagePath,
                'likes' => $post->likes->map(function ($like) {
                    return [
                        'id' => $like->id,
                        'user_name' => $like->user->name,
                    ];
                }),
                'comments' => $post->comments,
            ];
        });

        return response()->json($result);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'body' => 'required',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if (array_key_exists('image', $data)) {

            $imagePath = $request->file('image')->store('posts', 'public');
        }

        $post = new Post([
            'body' => $data['body'],
            'user_id' => auth()->user()->id,
            'imagePath' => $imagePath ?? '',
        ]);

        $post->save();

        return response()->json(['success' => 'Post created successfully.']);
    }

    public function update(Request $request, post $post)
    {
        if ($post->user_id != auth()->user()->id) {
            abort(403);
        }
        $data = $request->validate([
            'body' => 'required',
        ]);
        $post->update($data);

        return response()->json(['success' => 'Post updated successfully']);
    }

    public function destroy(Post $post)
    {
        if ($post->user_id == auth()->user()->id) {
            $post->delete();

            return response()->json(['success' => 'Post deleted successfully']);
        } else {
            return abort(403);
        }
    }
}
