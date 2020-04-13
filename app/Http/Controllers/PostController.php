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

    public function upload(Request $request,$id){

        $post = Post::findOrFail($id);

        if($request->hasFile('file')){
            $file = $request->file('file');
            $fileName = uniqid(). '.' .$file->getClientOriginalExtension();
            $path = $file->storeAs('public\images',$fileName);

            //check if path exist or not
            if($path){
                //add record image to database
                $post->images()->create([
                    'path' => $fileName,
                ]);

                // return response()->json([
                //     'upload_status' => 'success'
                // ],200);
            }else{
                return response()->json([
                    'upload_status' => 'failed'
                ],401);
            }
        }

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
