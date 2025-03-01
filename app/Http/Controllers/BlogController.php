<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\str;  
use App\Models\Post;



class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allPost=Post::all();
      return view('blog.index',['allPosts'=>$allPost]);
    }

    public function show()
    {
      return view('blog.single');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog.create');
    }

    

    public function single()
    {
        return view('blog.single');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',  
            'image' => 'required|image', 
            'body' => 'required'    
        ]);

        $title=$request->input('title');
        $body=$request->input('body');
        $slug=str::slug($title,'-');
        $userId=Auth::user()->id; 
        $imagePath='storage/'.$request->file('image')->store('blog/post/images','public');
        $post=new Post;
        $post->title= $title;
        $post->slug= $slug;
        $post->user_id= $userId;
        $post->image_path= $imagePath;
        $post->body= $body;
        $post->save();

        return redirect()->back()->with('status','Post Saved Successfully');

    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
