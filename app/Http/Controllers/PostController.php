<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    public function show(){
        $posts = Post::all();
        return view('welcome', compact('posts'));
    }

    public function create(){
        $users = User::all();

        return view('createPost', compact('users'));
    }

    public function edit($id){
        $post = Post::findOrFail($id);

        $users = User::all();

        return view('editPost', compact('post', 'users'));
    }

    public function addPost(Request $request){
        $fileName = "";

        if($request->file('image')){
            $fileName = $request->user . '-' . $request->timestamp . $request->file('image')->getClientOriginalName();

            $request->file('image')->storeAs('public/image', $fileName);
        }
        
        Post::create([
            'username' => $request->username,
            'content' => $request->content,
            'likeCount' => $request->likeCount,
            'timestamp' => $request->timestamp,
            'image' => $fileName,
            'userId' => $request->username
        ]);

        return redirect(route('show'));
    }

    public function updatePost(Request $request, $id){
        $post = Post::findOrFail($id);

        $fileName = $post->image;

        if($request->file('image')){
            $fileName = $request->user . '-' . $request->timestamp . $request->file('image')->getClientOriginalName();

            $request->file('image')->storeAs('public/image', $fileName);
        }

        $post -> update([
            'username' => $request->username,
            'content' => $request->content,
            'likeCount' => $request->likeCount,
            'timestamp' => $request->timestamp,
            'image' => $fileName,
            'userId' => $request->username
        ]);

        return redirect(route('show'));
    }

    public function deletePost($id) {
        Post::destroy($id);
 
        return redirect(route('show'));
     }


    
}
