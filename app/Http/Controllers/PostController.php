<?php

namespace App\Http\Controllers;

use App\Kategori;
use App\Post;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // dd($kategori);
        

        if(auth()->user()->type == 1){
            $post = Post::orderBy('id', 'DESC')->paginate(5);
        }
        else{
           $post = Post::where('user_id', '=' , auth()->user()->id)->paginate(5);
        }
        
        return view('admin.post.index', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tags = Tag::all();
        $kategori = Kategori::all();
        return view('admin.post.create', compact('kategori', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //validate data
        $data = $request->validate([
            'judul'       => 'required|min:5',
            'kategori_id' => 'exists:kategori,id',
            'content'     => 'required|min:8',
            'gambar'      => 'required|file|image|mimes:jpeg,png,jpg,gif'
        ]);


        //rename gambar
        $gambar = $request->gambar;
        $new_gambar = time() . $gambar->getClientOriginalName();

        // insert 2
        $post = Post::create(array_merge($data, [
            'gambar' => 'public/uploads/posts/' . $new_gambar,
            'slug' => Str::slug($request->judul),
            'user_id' => Auth::id()
        ]));

        $post->tags()->attach($request->tags);

        $gambar->move('public/uploads/posts', $new_gambar);


        //Redirect after succes
        return redirect()->route('post.index')->with('success', 'Postingan anda Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::findorfail($id);

        // dd($post->id);
        // $kid = Kategori::all();
        // dd($kategori->name);
        $tags = Tag::all();
        $kategori = Kategori::all();
        // dd($tags);
        // $post     = Post::findorfail($id);
        return view('admin.post.edit', compact('post', 'tags', 'kategori'));
        // // , compact('post','kategori','kid'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = $request->validate([
            'judul'       => 'required|min:5',
            'kategori_id' => 'exists:kategori,id',
            'content'     => 'required|min:8',
        ]);
        $path = 'public/uploads/posts/';

        // insert 2
        if ($request->hasFile('gambar')) {
            $gambar = $request->gambar;
            $new_gambar = time() . $gambar->getClientOriginalName();
            $post = Post::find($id);
            $post->update(array_merge($data, [
                'gambar' => $path . $new_gambar,
                'slug'   => Str::slug($request->judul)
            ]));
            
            $post->tags()->sync($request->tags);

            $gambar->move($path, $new_gambar);
        } else {
            $post = Post::find($id);
            $post->update(array_merge($data, [
                'slug' => Str::slug($request->judul)
            ]));
            // $post = Post::find($id); $post->tags()-sync();
            $post->tags()->sync($request->tags);
        }




        //Redirect after succes
        return redirect()->route('post.index')->with('success-update', 'Postingan anda Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::findorfail($id);
        $post->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus sementara, silahkan cek trashed post');
    }

    public function showdeletes()
    {
        $post = Post::onlyTrashed()->paginate(5);
        return view('admin.post.showdelete', compact('post'));
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->restore();

        
        return redirect()->back()->with('success', 'Postingan anda Berhasil direstore');
    }

    public function kill($id)
    {
        //
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->forceDelete();

        return redirect()->back()->with('success', 'Postingan berhasil dihapus permanen');
    }
}