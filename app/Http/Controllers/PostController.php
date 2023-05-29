<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->check()) {
            $wishlistCount = Wishlist::where('user_id', auth()->user()->id)->count();
        } else {
            $wishlistCount = "";
        }
        return view('posts.index',[
            'wishlistCount' => $wishlistCount,
            "posts"=> Post::latest()->filter(request(['searchPost']))->paginate(3)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->check()) {
            $wishlistCount = Wishlist::where('user_id', auth()->user()->id)->count();
        } else {
            $wishlistCount = "";
        }
        return view('posts.create', [
            'wishlistCount' =>$wishlistCount,
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'image' => 'image|file|max:1024',
            'url' => 'max:255',
            'body' => 'required',
        ]);
        
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }
        
        // Mengambil hanya ID video dari URL YouTube
        if ($request->url) {
            $url = $request->url;
            $videoId = null;
            
            // Memeriksa pola URL YouTube yang valid
            if (preg_match('/^https?:\/\/(?:www\.)?youtube\.com\/watch\?(?=.*v=([a-zA-Z0-9_-]+))(?:\S+)?$/', $url, $matches)) {
                $videoId = $matches[1]; // Mengambil ID video dari URL
            } elseif (preg_match('/^https?:\/\/(?:www\.)?youtu\.be\/([a-zA-Z0-9_-]+)(?:\S+)?$/', $url, $matches)) {
                $videoId = $matches[1]; // Mengambil ID video dari URL singkat youtu.be
            }
        
            $validatedData['url'] = $videoId;
        }
        
        $validatedData['user_id'] = auth()->user()->id;
        
        Post::create($validatedData);
        
        return redirect('/posts')->with('berhasil', 'Post has been successfully created!');
        
    
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        if (auth()->check()) {
            $wishlistCount = Wishlist::where('user_id', auth()->user()->id)->count();
        } else {
            $wishlistCount = "";
        }
        $post = Post::find($id);
        $user = User::find($id);
        return view('posts.show',[
            "post"=>$post,
            'user'=>$user,
            'wishlistCount' =>$wishlistCount,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if (auth()->check()) {
            $wishlistCount = Wishlist::where('user_id', auth()->user()->id)->count();
        } else {
            $wishlistCount = "";
        }
        $post = Post::find($id);
        return view('posts.edit',[
            "post"=>$post,
            'wishlistCount' =>$wishlistCount,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'title' =>'required|max:255',
            'image'=>'image|file|max:1024',
            'url' => 'max:255',
            'body' => 'required',
        ];
        $validatedData = $request->validate($rules);
        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
        }
        // Mengambil hanya ID video dari URL YouTube
        if ($request->url) {
            $url = $request->url;
            $videoId = null;
            
            // Memeriksa pola URL YouTube yang valid
            if (preg_match('/^https?:\/\/(?:www\.)?youtube\.com\/watch\?(?=.*v=([a-zA-Z0-9_-]+))(?:\S+)?$/', $url, $matches)) {
                $videoId = $matches[1]; // Mengambil ID video dari URL
            } elseif (preg_match('/^https?:\/\/(?:www\.)?youtu\.be\/([a-zA-Z0-9_-]+)(?:\S+)?$/', $url, $matches)) {
                $videoId = $matches[1]; // Mengambil ID video dari URL singkat youtu.be
            }
        
            $validatedData['url'] = $videoId;
        }
        $validatedData['user_id'] = auth()->user()->id;
        Post::where('id', $id)
        ->update($validatedData);

        return redirect('/posts')->with('berhasil', 'Post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        if ($post->image) {
            Storage::delete($post->image);
        }
        Post::destroy($post->id);
        return redirect('/posts')->with('berhasil', 'Post has been removed!');
    }
}
