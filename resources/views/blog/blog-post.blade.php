@extends('layouts-frontend.master')
@section('konten')
<img class="img-thumbnail img-responsive" src="{{ asset($posts->gambar) }}" alt="">
<br>
<br>	
<p>{!! $posts->content !!}</p>
@endsection
