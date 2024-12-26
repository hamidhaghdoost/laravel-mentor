<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')
            ->take(10)
            ->get();
        return view('blog.index', compact('posts'));
    }

    public function view($id)
    {
        $post = Post::findOrFail($id);
        return view('blog.view', compact('post'));
    }

    public function create()
    {
        $data['categories'] = Category::all();
        $data['tags'] = Tag::all();
        return view('blog.create', $data);
    }

    public function save(Request $request)
    {

        $request->validate([
            'title' => 'required|max:255|min:3',
            'body' => 'required',
            'category' => 'required|exists:categories,id',
            'tags' => 'array',
            'tags.*' => 'integer|exists:tags,id'
        ]);

        $title = $request->title;
        $body = $request->body;
        $category_id = $request->category;

        $post = new Post();
        $post->title = $title;
        $post->body = $body;
        $post->category_id = $category_id;
        $post->save();

        $post->tags()->attach($request->tags);

        return redirect()->route('blog')
            ->with('message', 'Post created successfully');
    }

    public function delete($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('blog')
            ->with('message', 'Post deleted successfully');
    }

    public function edit($id)
    {
        $data['post'] = Post::findOrFail($id);
        $data['categories'] = Category::all();
        $data['tags'] = Tag::all();
        $data['tag_ids'] = $data['post']->tags->pluck('id')->toArray();

        return view('blog.edit', $data);
    }

    public function update($id, Request $request) {
        $post = Post::findOrFail($id); // select * from posts where id = $id

        $request->validate([
            'title' => 'required|max:255|min:3',
            'body' => 'required',
            'category' => 'required|exists:categories,id',
            'tags' => 'array',
            'tags.*' => 'integer|exists:tags,id'
        ]);

        $post->title = $request->title;
        $post->body = $request->body;
        $post->category_id = $request->category;
        $post->tags()->sync($request->tags);
        $post->save();

        return redirect()->route('blog')
            ->with('message', 'Post updated successfully');
    }


    public function detachTag(Post $post, Tag $tag) {
        $post->tags()->detach([$tag->id]);
        return redirect()->back()
            ->with('message', 'Tag detached successfully');
    }
}
