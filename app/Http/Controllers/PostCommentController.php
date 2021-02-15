<?php

namespace App\Http\Controllers;
use App\Model\User;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class PostCommentController extends Controller
{

    public function __construct(){

        $this->middleware(['auth']);
    }

    public function store(Post $post, Request $request)

    {

        $this->validate($request, [

            'comment' => 'required|max:200',
        ]);

        $request->user()->comments()->create([
            'post_id' => $post->id,
            "comment"=> $request->get('comment'),

        ]);

        return back()->with('status', 'Your comment has been posted!');
    }


    public function edit(Comment $comment)
    {

        $this->authorize('edit', $comment);

        return view('comments.edit', [
            'comment' => $comment,
        ]);
    }

    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'comment' => 'required|max:200',
        ]);


        $comment = Comment::find($id);
        $comment->comment = $request->comment;
        $comment->save();



        return redirect()->route('posts.show', $comment->post_id)->with('status', 'Your comment has been updated!');
    }


    public function destroy(Comment $comment){

        $this->authorize('delete', $comment);

        $comment->delete();

        return redirect()->route('posts.show', $comment->post_id)->with('alert', 'Your comment has been deleted!');

    }

}
