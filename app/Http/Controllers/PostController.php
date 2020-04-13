<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
   
    public function index()
    {
        $posts = Post::all();

        return view('posts.index')->with(['posts' => $posts]);
    }


    public function create()
    {
        
    }


    public function store(Request $request)
    {
        
    }

    

    public function show($id)
    {
        $post = Post::find($id);
        
        return view('posts.show')->with(['post' => $post]);
    }

    

    public function edit(Post $post)
    {
        
    }


    public function update(Request $request, Post $post)
    {
        
    }


    public function destroy(Post $post)
    {
        
    }
}
