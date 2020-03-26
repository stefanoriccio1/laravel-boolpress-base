<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $data = $request->all();

      $request->validate([
        'title' => 'required|max:100',
        'content' => 'required|max:200',
        'slug' => 'required',
        'author' => 'required',

      ]);

      $post = new Post;
      $post->fill($data);
      $save = $post->save();

      if($save == true){
        $post = Post::orderBy('id','desc')->first();
        return redirect()->route('posts.show', compact('post'));
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
      if(empty($post)){
        abort('404');
      }
      return view('posts.show', compact('post'));
  }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
      if(empty($post)){
        abort('404');
      }

      return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $post = Post::find($id);
      if(empty($post)){
        abort('404');
      }

      $data = $request->all();
      $request->validate([

        'title' => 'required|max:100',
        'content' => 'required|max:200',
        'slug' => 'required',
        'author' => 'required',
      ]);

      $updated = $post->update($data);
      if($updated == true){
        $post = Post::find($id);
        return redirect()->route('posts.show', compact('post'));
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
      $id = $post->id;
      $deleted = $post->delete();
      $data = [
        'id' => $id,
        'posts' => Post::all()
      ];
      return view('posts.index', $data);
    }
}
