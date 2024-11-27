<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')
            ->take(10)
            ->get();
        return view('blog', compact('posts'));
    }

    public function view($id) {
        $post = Post::findOrFail($id);
        return view('post', compact('post'));
    }

    public function create() {
        return view('blog.create');
    }

    public function save(Request $request) {

        $request->validate([
            'title' => 'required|max:255|min:3',
            'body' => 'required'
        ]);

        $title = $request->title;
        $body = $request->body;

        $post = new Post();
        $post->title = $title;
        $post->body = $body;
        $post->save();

        return redirect()->route('blog');
    }
}
