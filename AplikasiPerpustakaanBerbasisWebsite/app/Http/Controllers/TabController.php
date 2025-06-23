<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class TabController extends Controller
{
    public function index()
    {
        $posts = Post::where('kategori', 'akademik')->latest()->paginate(5);
        return view('layouts.app', compact('posts'));
    }
}
