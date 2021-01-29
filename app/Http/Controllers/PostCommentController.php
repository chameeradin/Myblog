<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class PostCommentController extends Controller
{

    /* public function index(Post $post, Request $request){

        $comments = Comment::latest()->with(['post', 'comments']);


        return back('posts.show', [
            'comments' =>$comments,
            'posts' => $posts,


        ]);



    } */

    public function store(Post $post, Request $request)

    {

        $this->validate($request, [

            'comment' => 'required|max:200',
        ]);

        $request->user()->comments()->create([
            'post_id' => $post->id,
            "comment"=> $request->get('comment'),

        ]);

        return back()->with('status', 'Your comment has posted!');
    }


}
