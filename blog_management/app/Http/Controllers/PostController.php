<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
class PostController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'comment' => 'required|string|max:255',
        ]);

        $post->comments()->create([
            'comment' => $request->comment,
        ]);

        return redirect()->route('comments.show', $post)->with('success', 'Bình luận đã được thêm thành công!');
    }
}
