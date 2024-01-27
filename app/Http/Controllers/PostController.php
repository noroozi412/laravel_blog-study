<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;   
use Auth;   

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('CheckRole')->only('store');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts=Post::all();
        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->text = $request->text;
        $post->user_id = Auth::user()->id;
        $post->save();
        return redirect('/posts');
     }
    public function show(string $id)
    {
       $post= Post::find($id);
       return view( 'posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post= Post::find($id);
        return view( 'posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post= Post::find($id);
        $post->title = $request->title;
        $post->text = $request->text;
        $post->save();
        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post=Post::find($id);
        $post->delete();
        return redirect('/posts');

    }
}
