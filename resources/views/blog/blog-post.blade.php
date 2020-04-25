@extends('layouts-frontend.master')
@section('konten')
<img class="img-thumbnail" src="{{ asset($posts->gambar) }}" alt="" >
	<h1 class="btn btn">{{ $posts->content}}</h1>
@endsection
