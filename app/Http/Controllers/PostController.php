<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct(){

        $this->middleware(['auth']);
    }

    public function index(){

        $posts = Post::get();

        //dd($posts);

        return view('posts.index', [
            'posts' =>$posts
        ]);

    }

    public function store(Request $request){

        $this->validate($request, [
            'title' => 'required|max:255',
            'body' => 'required|min:10|max:1000',
        ]);


        if ($request->hasFile('image')) {

            $request->validate([
                'image' => 'nullable|image|max:1999|mimes:jpeg,bmp,png'
            ]);


            $name = $request->file('image')->store('posts', 'public');



            $request->user()->posts()->create([

                "title" => $request->get('title'),
                "image" => $name,
                "body"=> $request->get('body'),

            ]);
        }
        return redirect()->route('post')->with('status', 'Your post has posted!');
    }

}
