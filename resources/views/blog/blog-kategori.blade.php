@extends('layouts-frontend.master')
@section('title','Kategori')
@section('konten')
<style>

    p{
        max-width: 75ch;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>
<div class="col-md-8 hot-post-left">
@foreach ($data as $post)
<!-- post -->
<div class="post post-row">
    <a class="post-img" href="{{route('blogpost', $post->slug)}}"><img src="{{asset($post->gambar)}}" alt=""></a>
    <div class="post-body">
        <div class="post-category">
           <li>
            <a href="category.html">{{$post->kategori->name}}</a>
           </li>
        </div>
        <h3 class="post-title"><a href="blog-post.html">{{$post->judul}}</a></h3>
        <ul class="post-meta">
            <li><a href="author.html">{{$post->users->name}}</a></li>
            <li>{{$post->created_at}}</li>
        </ul>
        {{--  <p>{!! $post->content !!}</p>  --}}
    </div>
  
</div>
<!-- /post -->
@endforeach
{{$data->links()}}
</div>
@endsection