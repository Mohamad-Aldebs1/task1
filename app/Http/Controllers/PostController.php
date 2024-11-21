<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('Posts.index' , compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->hasFile('image')){
            $img= $request->file('image')->getClientOriginalName()
                ."-".time().$request->file('image')->getClientOriginalExtension();
            $path=$request->file('image')->storeAs('posts' , $img ,'local');
        }
        Post::create([
            'title' => $request->title ,
            'description' => $request->description ,
            'image' => $img
        ]);
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if($request->hasFile('image')){
            $img= $request->file('image')->getClientOriginalName()
                ."-".time().$request->file('image')->getClientOriginalExtension();
            $path=$request->file('image')->storeAs('posts' , $img ,'local');
        }
        $post = Post::find($id);
        $post->update([
            'title' => $request->title ,
            'description' => $request->description ,
            'image' => $img
        ]);
    return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Post::destroy($id);
        return redirect()->route('posts.index');
    }
}
