<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function actuallyUpdate(Post $post, Request $request) {
        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);

        $post->update($incomingFields);

        return back()->with('success', 'Post successfully updated.');
    }
    
    public function showEditForm(Post $post)
    {
        return view('edit-post', ['post' => $post]);
    }

    //
    public function delete(Post $post)
    {
        //check if the user can delete or not the post
        $post->delete();
        return redirect('/profile/' . auth()->user()->username)->with('success', 'Post is successfully deleted');
    }

    public function showCreateForm()
    {
        return view('create-post');
    }

    
    public function viewSinglePost(Post $post) //type hinting
    {
        $post['body'] = Str::markdown($post->body);
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

        //in newPost object look for id
        return redirect("/post/{$newPost->id}")->with('success', 'Post is successfully created');
    }

}
