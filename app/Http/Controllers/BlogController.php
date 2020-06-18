<?php

namespace App\Http\Controllers;

use App\Kategori;
use App\Post;
use App\Tag;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
   
    
    public function index(Post $post)
    {
        $tags = Tag::all();
        $kategori_widget  = Kategori::all();
        $olahraga = Post::where('kategori_id', 7)->get();
        $politik = Post::where('kategori_id', 8)->get();
        $teknologi = Post::where('kategori_id', 9)->get();
        $banner_or = $post::latest()->where('kategori_id', 7)->first();
        $banner_pl = $post::latest()->where('kategori_id', 8)->first();
        $banner_tk = $post::latest()->where('kategori_id', 9)->first();
   
        
        $latesh_posts = Post::orderBy('created_at', 'DESC')->take(4)->get();
        return view('blog.index', compact('banner_or','banner_pl','banner_tk','latesh_posts','tags','kategori_widget','olahraga','politik','teknologi'));
    }
    public function about()
    {
        
        $kategori_widget  = Kategori::all();
        $tags         = Tag::all();
        
       
        return view('blog.about', compact('kategori_widget','tags'));
    }
    public function profile()
    {
        
        $kategori_widget = Kategori::all();
        $tags         = Tag::all();
        
      
       
        return view('blog.profile', compact('kategori_widget','tags'));
    }
    public function kontak()
    {
        
        $kategori_widget  = Kategori::all();
        $tags         = Tag::all();
        
     
       
        return view('blog.kontak', compact('kategori_widget','tags'));
    }
    public function cari(request $request)
    {
        
        $kategori_widget = Kategori::all();
        $data            = Post::where('judul', $request->cari)->orwhere('judul','like','%'.$request->cari.'%')->paginate(5);
    //    Widget
    $tags         = Tag::all();
    $olahraga     = Post::latest()->where('kategori_id', 7)->get();
    $politik      = Post::where('kategori_id', 8)->get();
    $teknologi    = Post::where('kategori_id', 9)->get();
    $latesh_posts = Post::orderBy('created_at', 'DESC')->take(4)->get();
    // End widget
        
    
        // $posts = Post::where('slug',$kate)->paginate(5);
        return view('blog.blog-kategori', compact('latesh_posts','tags','kategori_widget','olahraga','politik','teknologi','data'));
    }

    
    // public function kategori($id)
    // {
    //     $tags = Tag::all();
    //     $kategori  = Kategori::all();
    //     $olahraga = Post::latest()->where('kategori_id', 7)->get();
    //     $politik = Post::where('kategori_id', 8)->get();
    //     $teknologi = Post::where('kategori_id', 9)->get();
        
    //     // // dd($kategori->count());
    //     // $posts = Post::where('kategori_id', $kategori)->count();
    //     // dd($posts);
        
    //     // $kategoriid  = Kategori::all();
    //     // $katecount = Post::where('kategori_id', $kategori_id)->count();
    //     $latesh_posts = Post::orderBy('created_at', 'DESC')->take(4)->get();
    //     $posts = Post::where('kategori_id',$id)->paginate(5);

    //     // dd($posts->kategori->name);
    //     return view('blog.kategori', compact('posts','latesh_posts','tags','kategori','olahraga','politik','teknologi'));
    // }
    public function kategori(Kategori $kategori)
    {
       
        $kategori_widget = Kategori::all();
        $data            = $kategori->posts()->paginate(5);
    //    Widget
    $tags         = Tag::all();
    $olahraga     = Post::latest()->where('kategori_id', 7)->get();
    $politik      = Post::where('kategori_id', 8)->get();
    $teknologi    = Post::where('kategori_id', 9)->get();
    $latesh_posts = Post::orderBy('created_at', 'DESC')->take(4)->get();
    // End widget
        
    
        // $posts = Post::where('slug',$kate)->paginate(5);
        return view('blog.blog-kategori', compact('latesh_posts','tags','kategori_widget','olahraga','politik','teknologi','data'));
    }

    public function bytag(Tag $tag)
    {
       
        $kategori_widget = Kategori::all();
        $data            = $tag->posts()->paginate(5);
       
    //    Widget
    $tags         = Tag::all();
    $olahraga     = Post::latest()->where('kategori_id', 7)->get();
    $politik      = Post::where('kategori_id', 8)->get();
    $teknologi    = Post::where('kategori_id', 9)->get();
    $latesh_posts = Post::orderBy('created_at', 'DESC')->take(4)->get();
    // End widget
        
    
        // $posts = Post::where('slug',$kate)->paginate(5);
        return view('blog.blog-kategori', compact('latesh_posts','tags','kategori_widget','olahraga','politik','teknologi','data'));
    }
    public function blogkategori(Post $posts)
    {
        $tags            = Tag::all();
        $kategori_widget = Kategori::all();
        $olahraga        = Post::latest()->where('kategori_id', 7)->get();
        $politik         = Post::where('kategori_id', 8)->get();
        $teknologi       = Post::where('kategori_id', 9)->get();
        $latesh_posts    = Post::orderBy('created_at', 'DESC')->take(4)->get();
        $data            = $posts->latest()->paginate(4);
        return view('blog.blog-kategori', compact('data','tags','kategori_widget','politik','teknologi','olahraga','latesh_posts'));
    }
    
    public function blogpost($slug)
    {
        $tags            = Tag::all();
        $kategori_widget = Kategori::all();
        $olahraga        = Post::latest()->where('kategori_id', 7)->get();
        $politik         = Post::where('kategori_id', 8)->get();
        $teknologi       = Post::where('kategori_id', 9)->get();
        $latesh_posts    = Post::orderBy('created_at', 'DESC')->take(4)->get();
        
         $posts = Post::where('slug', $slug)->first();
        //  dd($posts->content);
        return view('blog.blog-post', compact('posts','tags','kategori_widget','olahraga','politik','teknologi','latesh_posts'));
    }
}