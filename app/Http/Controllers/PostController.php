<?php

namespace App\Http\Controllers;

use App\Post;
use App\Post_photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Mohamedathik\PhotoUpload\Upload;


class PostController extends Controller
{ 
    public function __construct()
    {
        $this->middleware('auth', [
                        'except' => [
                                'index'
                            ]
                        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = \App\Post::all();
        return view('welcome',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required'
        ]);

        $post = Post::create([
            'title' => request('title'),
            'body' => request('body'),
            'user_id' => auth()->id(),
        ]);
        
        $file = $request->image;
    
        $file_name = $file->getClientOriginalName();
    
        $location = "/images";
    
        $url_original = Upload::upload_original($file, $file_name, $location);
    
        $url_thumbnail = Upload::upload_thumbnail($file, $file_name, $location);
        
        Post_photo::create([
            'post_id' => $post->id,
            'main' => '1',
            'url_original' => $url_original,
            'url_thumbnail' => $url_thumbnail,
        ]);
       
        return redirect('blogpost/create')->with('alert-success', 'Successfully added new blog post');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        // One Method
        // $post = Post::find($id);
        // return view('detail', compact('post'));

        // Another Method
        $post = Post::findOrFail($id);
        return view('detail',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        return redirect('/')->with('alert-success', 'Successfully added new blog post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
    }
}
