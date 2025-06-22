<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(6);
        return view('profil.akademik', compact('posts'));  // ganti path-nya
    }
    
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('profil.showAkademik', compact('post'));
    }
    
    
}

