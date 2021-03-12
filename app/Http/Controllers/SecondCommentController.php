<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\SecondComment;

class SecondCommentController extends Controller
{
    public function __construct(){

        $this->middleware(['auth']);
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Comment $comment, Request $request)

    {

        $this->validate($request, [

            'secondComment' => 'required|max:200',
        ]);

        $request->user()->secondComments()->create([
            'post_id' => $comment->post_id,
            'comment_id' => $comment->id,
            "secondComment"=> $request->get('secondComment'),

        ]);

        return back()->with('status', 'Your reply has been posted!');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SecondComment  $secondComment
     * @return \Illuminate\Http\Response
     */
    public function edit(SecondComment $secondComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SecondComment  $secondComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SecondComment $secondComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SecondComment  $secondComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(SecondComment $secondComment)
    {
        $this->authorize('delete', $secondComment);

        $secondComment->delete();

        return redirect()->route('posts.show', $secondComment->post_id)->with('alert', 'Your reply has been deleted!');

    }
}
