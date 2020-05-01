<?php

namespace App\Http\Controllers;

use App\Kategori;
use App\Post;
use App\Tag;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
   
    
    public function index()
    {
        $tags = Tag::all();
        $kategori  = Kategori::all();
        $olahraga = Post::latest()->where('kategori_id', 7)->get();
        $politik = Post::where('kategori_id', 8)->get();
        $teknologi = Post::where('kategori_id', 9)->get();
        
        // // dd($kategori->count());
        // $posts = Post::where('kategori_id', $kategori)->count();
        // dd($posts);
        
        // $kategoriid  = Kategori::all();
        // $katecount = Post::where('kategori_id', $kategori_id)->count();
        $latesh_posts = Post::orderBy('created_at', 'DESC')->take(4)->get();
        return view('blog.index', compact('latesh_posts','tags','kategori','olahraga','politik','teknologi'));
    }
    public function kategori($id)
    {
        $tags = Tag::all();
        $kategori  = Kategori::all();
        $olahraga = Post::latest()->where('kategori_id', 7)->get();
        $politik = Post::where('kategori_id', 8)->get();
        $teknologi = Post::where('kategori_id', 9)->get();
        
        // // dd($kategori->count());
        // $posts = Post::where('kategori_id', $kategori)->count();
        // dd($posts);
        
        // $kategoriid  = Kategori::all();
        // $katecount = Post::where('kategori_id', $kategori_id)->count();
        $latesh_posts = Post::orderBy('created_at', 'DESC')->take(4)->get();
        $posts = Post::where('kategori_id',$id)->paginate(5);

        // dd($posts->kategori->name);
        return view('blog.kategori', compact('posts','latesh_posts','tags','kategori','olahraga','politik','teknologi'));
    }
    public function blogkategori(Post $posts)
    {
        $tags = Tag::all();
        $kategori  = Kategori::all();
        $olahraga = Post::latest()->where('kategori_id', 7)->get();
        $politik = Post::where('kategori_id', 8)->get();
        $teknologi = Post::where('kategori_id', 9)->get();
        $latesh_posts = Post::orderBy('created_at', 'DESC')->take(4)->get();
        $data = $posts->latest()->paginate(4);
        return view('blog.blog-kategori', compact('data','tags','kategori','politik','teknologi','olahraga','latesh_posts'));
    }
    
    public function blogpost($slug)
    {
        $tags = Tag::all();
        $kategori  = Kategori::all();
        $olahraga = Post::latest()->where('kategori_id', 7)->get();
        $politik = Post::where('kategori_id', 8)->get();
        $teknologi = Post::where('kategori_id', 9)->get();
        $latesh_posts = Post::orderBy('created_at', 'DESC')->take(4)->get();
        
         $posts = Post::where('slug', $slug)->first();
        //  dd($posts->content);
        return view('blog.blog-post', compact('posts','tags','kategori','olahraga','politik','teknologi','latesh_posts'));
    }
}