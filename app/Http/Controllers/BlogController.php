<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
    public function index()
    {
        $tags = Tag::all();
        $latesh_posts = Post::orderBy('created_at', 'DESC')->take(4)->get();
        return view('blog.index', compact('latesh_posts','tags'));
    }
}