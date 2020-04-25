<?php

namespace App\Http\Controllers;


use App\Kategori;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $postCount = Post::count();
        $kategoriCount = Kategori::count();
        $tagCount = Tag::count();

        return view('.admin.home', compact('postCount', 'kategoriCount', 'tagCount'));
    }
}