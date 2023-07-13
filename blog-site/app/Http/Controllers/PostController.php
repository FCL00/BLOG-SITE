<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function showCreateForm()
    {
        return view('create-post');
    }

    
    public function viewSinglePost(Post $post)
    {
       
        return view('post', ['post' => $post]);
    }

    public function storeNewPost(Request $request)
    {
        $incomingFields = $request->validate(
            [
                'title' => 'required',
                'body' => 'required'
            ]
        );
        
        //remove any malicous html tags inside the form 
        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        //get the user id from session
        $incomingFields['user_id'] = auth()->id();

        $newPost = Post::create($incomingFields);

        return redirect("/post/{$newPost->id}")->with('success', 'Post is successfully created');
    }

}