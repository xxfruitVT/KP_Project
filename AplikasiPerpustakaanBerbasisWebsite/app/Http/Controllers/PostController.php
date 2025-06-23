<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{

public function akademik()
{
    $posts = Post::where('kategori', 'akademik')->latest()->paginate(5);
    return view('tabs.profil.akademik', compact('posts'));
}
public function home()
{
    $akademikPosts = Post::where('kategori', 'akademik')->latest()->paginate(5);
    $kesiswaanPosts = Post::where('kategori', 'kesiswaan')->latest()->get();
    $sarprasPosts = Post::where('kategori', 'sarpras')->latest()->get();

    return view('layouts.app', compact('akademikPosts', 'kesiswaanPosts', 'sarprasPosts'));
}




public function showAkademik($slug)
{
    $post = Post::where('slug', $slug)->firstOrFail();
    return view('tabs.profil.showAkademik', compact('post'));
}


public function index()
{
    $akademikPosts = Post::where('kategori', 'akademik')->latest()->paginate(5);
    $kesiswaanPosts = Post::where('kategori', 'kesiswaan')->latest()->get();
    $sarprasPosts = Post::where('kategori', 'sarpras')->latest()->get();

    return view('layouts.app', compact('akademikPosts', 'kesiswaanPosts', 'sarprasPosts'));
}
public function kesiswaan()
{
    $posts = Post::where('kategori', 'kesiswaan')->latest()->paginate(5);
    return view('tabs.profil.kesiswaan', compact('posts'));
}

public function sarpras()
{
    $posts = Post::where('kategori', 'sarpras')->latest()->paginate(5);
    return view('tabs.profil.sarpras', compact('posts'));
}



}
