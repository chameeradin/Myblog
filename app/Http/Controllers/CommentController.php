<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function __construct(){

        $this->middleware(['auth']);
    }

    public function index(Request $request)
    {
        //
    }

    public function create(Post $post)
    {

        return view('comments.create', [
            'post' =>$post,
        ]);
    }


    public function store(Request $request)

    {

        $this->validate($request, [

            'comment' => 'required|max:200',
        ]);

        $request->user()->comments()->create([


            "comment"=> $request->get('comment'),

        ]);

        return redirect()->route('posts.show')->with('status', 'Your comment has posted!');
    }


    public function show(Comment $comment)
    {
        //
    }


    public function edit(Comment $comment)
    {
        //
    }


    public function update(Request $request, Comment $comment)
    {
        //
    }


    public function destroy(Comment $comment)
    {
        //
    }
}
