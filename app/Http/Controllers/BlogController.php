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
    public function index(Request $request)
    {
        if($request->search){
            $allPost = Post::where('title', 'LIKE', '%' . $request->search . '%')->latest()->paginate(1);
        }else{
            $allPost = Post::latest()->paginate(1);
        }
        return view('blog.index', ['allPosts' => $allPost]);
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->with('user')->firstOrFail();
        return view('blog.single', compact('post'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog.create');
    }

    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }
 

    public function single()
    {
        // return view('blog.single');
    }


    public function edit(Post $post)
    {
        if(auth()->check()&&auth()->user()->id!==$post->user->id){
            abort(403);
        }
        $currentId=$post->id;
        $editPost = Post::where('id', $currentId)->with('user')->firstOrFail();
        return view('blog.edit', compact('editPost'));
    }

    public function about()
    {
        return view('blog.single');
    }


    public function update(Request $request,Post $post)
    {
        if(auth()->check()&&auth()->user()->id!==$post->user->id){
            abort(403);
        }
        $request->validate([
            'title' => 'required|string',
            'image' => 'required|image',
            'body' => 'required'
        ]);

        $title = $request->input('title');
        $PostId = $post->id;
        $body = $request->input('body');
        $slug = str::slug($title, '-') . '-' . $PostId;
        $userId = Auth::user()->id;
        $imagePath = 'storage/' . $request->file('image')->store('blog/post/images', 'public');
        $post->title = $title;
        $post->slug = $slug;
        $post->image_path = $imagePath;
        $post->body = $body;
        $post->save();

        return redirect()->back()->with('status', 'Post edited Successfully');
   
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

        $title = $request->input('title');
        $latestPostId = (Post::latest()->first()->id ?? 0) + 1;
        $body = $request->input('body');
        $slug = str::slug($title, '-') . '-' . $latestPostId;
        $userId = Auth::user()->id;
        $imagePath = 'storage/' . $request->file('image')->store('blog/post/images', 'public');
        $post = new Post;
        $post->title = $title;
        $post->slug = $slug;
        $post->user_id = $userId;
        $post->image_path = $imagePath;
        $post->body = $body;
        $post->save();

        return redirect()->back()->with('status', 'Post Saved Successfully');

    }


    public function myblog(){
        $allPost = Post::latest()->get();
        return view('blog.myblog', ['allPosts' => $allPost]);
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


    /**
     * Update the specified resource in storage.
     */

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('blog.index')->with('status', 'Post deleted Successfully');
    }
}
