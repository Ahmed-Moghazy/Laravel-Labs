<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class postsController extends Controller
{
   
    public function index()
    {
        $allPosts = Post::paginate(25);
        return view('posts.index', [
          'posts' => $allPosts
        ]);
    }
    public function create()
    {
        $allUsers = User::all();
        return view('posts.create', [
            'users' => $allUsers
        ]);
    }

    public function show($postId)
    {
        $post = Post::find($postId);
        return  view('posts.show',[
            'post' => $post
        ]);
    }

    public function store()
    {
        $data = request() -> all();
        Post::create([
            'title' => $data['title'],
            'description' => $data['desc'],
            'user_id' => $data['posted-by'],
        ]);
       return redirect()->route('posts.index');
    }

    public function edit ($postId){
        $post = Post::find($postId);
        return view('posts.edit',[
            'post'=> $post
        ]);
    }

    public function update($postId)
    {
        $data = request() -> all();
        Post::find($postId)-> update([
            'title' => $data['title'],
            'description' => $data['desc'],
            'user_id' => $data['posted-by'],
        ]);
       return redirect()->route('posts.index');
    }

    public function destroy ($postId){
        Post::find($postId) -> delete();
        return redirect()->route('posts.index');
    }
}