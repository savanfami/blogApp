<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\str;
use App\Models\Post;
use App\Models\categories;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;




class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->search){
            $allPost = Post::where('title', 'LIKE', '%' . $request->search . '%')->latest()->paginate(1);
        }else if($request->category){
            $allPost=categories::where('name',$request->category)->firstOrFail()->posts()->paginate(2)->withQueryString();
        }else{
            $allPost = Post::latest()->paginate(4);
        }
      
        
        $allcategory=categories::all();
        return view('blog.index', ['allPosts' => $allPost,'allcategory'=>$allcategory]);
    }


    public function show($slug)
    {
        $post = Post::where('slug', $slug)->with('user')->firstOrFail();
        $Category=$post->category();
        return view('blog.single', compact('post'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      $cat= categories::all();
        return view('blog.create',compact('cat'));
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
        $imagePath = $this->uploadToUploadcare($request->file('image'));
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
            'body' => 'required',
            'categories_id'=>'required'
        ]);

        $title = $request->input('title');
        $categories_id=$request->input('categories_id');
        if(Post::latest()==null){
            $latestPostId=1;
        }else{
            $latestPostId = (Post::latest()->first()->id ?? 0) + 1;

        }
        $body = $request->input('body');
        $slug = str::slug($title, '-') . '-' . $latestPostId;
        $userId = Auth::user()->id;
        // $imagePath = 'storage/' . $request->file('image')->store('blog/post/images', 'public');
        // $imagePath = Cloudinary::uploadFile($request->file('image')->getRealPath())->getSecurePath();
        $imagePath = $this->uploadToUploadcare($request->file('image'));
        // dd($imagePath);
        // return dd($imagePath)
        $post = new Post;
        $post->title = $title;
        $post->slug = $slug;
        $post->categories_id=$categories_id;
        $post->user_id = $userId;
        $post->image_path = $imagePath;
        $post->body = $body;
        $post->save();

        return redirect()->back()->with('status', 'Post Saved Successfully');

    }



    public function uploadToUploadcare($image)
    {
        $apiKey = 'f982f4cfc786204332a2';
        $uploadUrl = 'https://upload.uploadcare.com/base/';
        
        $postData = [
            'UPLOADCARE_PUB_KEY' => $apiKey,
            'UPLOADCARE_STORE' => 'auto',
            'file' => curl_file_create($image->getRealPath(), $image->getMimeType(), $image->getClientOriginalName()),
        ];
    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $uploadUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
        $response = curl_exec($ch);
        curl_close($ch);
    
        $responseData = json_decode($response, true);
    
        return isset($responseData['file']) ? 'https://ucarecdn.com/' . $responseData['file'] . '/' : '';
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
