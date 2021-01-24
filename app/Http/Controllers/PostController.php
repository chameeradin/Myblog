<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
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
        $request->user()->posts()->create([

            "title" => $request->get('title'),
            "body"=> $request->get('body'),

        ]);

        return redirect()->route('post')->with('status', 'Your post has posted!');
    }

    public function edit(Post $post){

        dd($post);

        $this->authorize('edit', $post);

        return view('');

    }

    public function show(Post $post){
        return view('posts.show', [
            'post' =>$post,
        ]);
    }

    public function destroy(Post $post){

        $this->authorize('delete', $post);

        Storage::delete($post->image);
        $post->delete();

        return redirect()->route('post')->with('status', 'Your post has deleted!');

    }


}
