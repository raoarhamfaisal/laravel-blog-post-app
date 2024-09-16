<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function delete(Post $post)
    {
        if (auth()->user()->cannot('delete', $post)) {
            return 'You are not allowed to delete this post';
        }

        $post->delete();
        return redirect('/profile/' . auth()->user()->username)->with('success', 'Post deleted successfully');
    }
    public function viewSinglePost(Post $post)
    {
        $post['body'] = Str::markdown($post->body);
        return view('single-post', ['post' => $post]);
    }
    public function showCreatePost()
    {
        return view('create-post');
    }
    public function storeCreatePost(Request $request)
    {
        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);
        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        $incomingFields['user_id'] = auth()->id();

        $post = Post::create($incomingFields);
        return redirect("/post/{$post->id}")->with('success', 'Post created successfully');
    }
}
