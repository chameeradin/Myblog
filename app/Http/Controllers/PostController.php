<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct(){

        $this->middleware(['auth']);
    }

    public function index(User $user, Request $request){

        $posts = Post::latest()->with(['user', 'likes'])->paginate(10);



        return view('posts.index', [
            'posts' =>$posts
        ]);

    }



    public function create(){

        return view('posts.create');

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
        else{
            $request->user()->posts()->create([

                "title" => $request->get('title'),
                "body"=> $request->get('body'),

            ]);
        }


        return redirect()->route('post')->with('status', 'Your post has been posted!');
    }

    public function edit(Post $post){


        $this->authorize('edit', $post);

        return view('posts.edit', [
            'post' => $post,
        ]);

    }

    public function show(Post $post, Request $request){

        $comments = $post->comments;

        return view('posts.show', [
            'post' =>$post,
            'comments' =>$comments,

        ]);

    }

    public function update(Request $request, $id){

        $this->validate($request, [
            'title' => 'required|max:255',
            'body' => 'required|min:10|max:1000',
        ]);

        if ($request->hasFile('image')) {

            $request->validate([
                'image' => 'nullable|image|max:1999|mimes:jpeg,bmp,png'
            ]);



            $image = $request->file('image')->store('posts', 'public');

            $post = Post::find($id);
            $post->title = $request->title;
            Storage::delete($post->avatar);
            $post->image = $image;
            $post->body = $request->body;
            $post->save();


        }
        else{

            $post = Post::find($id);
            $post->title = $request->title;
            $post->body = $request->body;
            $post->save();
        }


        return redirect()->route('post')->with('status', 'Your post has been updated!');

    }

    public function destroy(Post $post){

        $this->authorize('delete', $post);

        Storage::delete($post->image);
        $post->delete();

        return redirect()->route('post')->with('alert', 'Your post has been deleted!');

    }


}
