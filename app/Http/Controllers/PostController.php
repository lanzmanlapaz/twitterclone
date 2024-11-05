<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class PostController extends Controller
{
    public function index() {
        $posts = Post::with('user')->latest()->get();
        return view('home', compact('posts'));
    }

    public function show($id) {
        $post = Post::with('user')->findOrFail($id);
        return view('post.view', compact('post'));
    }

    public function store(Request $request) {
        $data = $request->validate([
            'content' => 'required',
        ]);
        $data['users_id'] = Auth::id();

        Post::create($data);
        return redirect(route('home'));
    }

    public function destroy(Post $post) {
        $post->delete();
        return redirect(route('home'));
    }    
}