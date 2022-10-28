<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\comment;


class commentsController extends Controller
{
    public function index(){
        $allComments = comment::all();
        return view('posts.show', [
            'comments'=> $allComments,
        ]);
    }
    public function store($postId){
        $data = request() -> all();
        $post= Post::find($postId);
        $post -> comments() -> create(['content'=> $data['comment']]);
        return redirect() -> route('posts.show', $postId);
    }
}
