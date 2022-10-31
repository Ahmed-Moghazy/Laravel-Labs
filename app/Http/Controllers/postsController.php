<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Str;
use App\Jobs\PruneOldPostsJob;

class postsController extends Controller
{
   
    public function index(){
    PruneOldPostsJob::dispatch();
        $allPosts = Post::with('User')->paginate(10);
        return view('posts.index', 
        [
          'posts' => $allPosts
        ]);
    }
    public function show($postId){
       $post = Post::find($postId);
        return  view('posts.show',[
            'post' => $post
        ]);
    }
    public function create(){
        $allUsers= User::all();
        return view('posts.create',[
            'users' => $allUsers
        ]);
    }
    public function store(PostRequest $request){
        $data = request()->all();
        Post::create([
            'title' => $data['title'],
            'description' =>$data['description'],
            'user_id' => $data['posted-by'],
            'slug' => str::slug($data['title'])
        ]);
       return redirect()->route('posts.index');
    }
    public function edit($postId ) {
        $post = Post::find($postId);
        return view('posts.edit',[
            'post' => $post
        ]);
    }
    public function update(PostRequest $request,  $postId) {
        $data = request()->all();

        Post::find($postId)->update(['title'=>$data['title'],'description' =>$data['description'],'slug' => str::slug($data['title'])]);
        return redirect()->route('posts.index');
    }
    public function destroy($postId) {
     
        Post::find($postId)->delete();
        return redirect()->route('posts.index');
    }
}