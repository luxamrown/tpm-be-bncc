<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show(){
        $posts = Post::all();
        return view('welcome', compact('posts'));
        // compact -> passing data
    }

    public function create(){
        return view('createPost');
    }

    public function addPost(Request $request){
        Post::create([
            'user' => $request->user,
            'content' => $request->content,
            'likeCount' => $request->likeCount,
            'timestamp' => $request->timestamp
        ]);

        //nama atribut => $request->name dari input form
        return redirect(route('show'));
    }
}
