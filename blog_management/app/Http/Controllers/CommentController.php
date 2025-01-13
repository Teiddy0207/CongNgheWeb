<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
class CommentController extends Controller
{

    // public function index()
    // {
    //  //   $comments = Comment::with('post')->get();
    //    $comments = Comment::with('post')->paginate(5);
    //     return view('comments.index', compact('comments'));
    // }

    public function index()
    {
     //   $comments = Comment::with('post')->get();
       $posts = Post::with('comments')->paginate(5);
        return view('comments.index', compact('posts'));
    }

    public function create()
    {
        $posts = Post::all();
        return view('comments.create', compact('posts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Post::create($request->all());

        return redirect()->route('comments.index')->with('success', 'Bài viết đã được thêm thành công!');
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        $comment = Comment::all();
        return view('comments.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('comments.edit', compact('post'));
    }

    public function update (Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ],[
            'title.string' => 'tiêu đề phải là 1 chuỗi'
        ]);

        $post = Post::findOrFail($id);
        $post->update($request -> all());
        return redirect()->route('comments.index')->with('successEdit', 'Sản phẩm đã được cập nhật thành công.');


    }

    public function destroy($id)
    {
        $product = Post::findOrFail($id);
        $product->delete();

        return redirect()->route('comments.index')->with('successDelete', 'van de co ma: ' . $product->id . 'da duoc xoa thanh cong!');
    }

}
