@extends('layout.master')
@section('title','Edit Post')
@section('subtitle','Edit Post')


@section('konten')
<form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @if(count($errors)>0)
        @foreach($errors->all() as $error)
            <div class="alert alert-danger col-sm-3"> {{ $error }} </div>
        @endforeach
    @endif
    <div class="row justify-content-center">
        <div class="col-lg-8 mb-6">
            <div class='form-group'>
                <label for='Judul'>Judul</label>
                <input type='text' name='judul' id='judul' class='form-control mb-2' value="{{ $post->judul }}">
            </div>
            <div class='form-group'>
                <label for='kategori_id'>Kategori</label>
                <select class='form-control mb-2' name="kategori_id">
                    <option selected="true" disabled="disable">--Pilih Kategori--</option>
                    @foreach($kategori as $item)
                        <option value="{{ $item->id }}"
                            @if ($item->id == $post->kategori_id)
                                selected
                            @endif
                            >{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class='form-group'>
                <label for='tag'>Pilih Tags</label>
                <select class='form-control select2 mb-2' multiple="" name="tags[]">
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}"
                            @foreach ($post->tags as $value)
                                @if($tag->id == $value->id)
                                selected
                                @endif
                            @endforeach
                            >{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class='form-group'>
                <label for='content'>Konten</label>
                <textarea name='content' class='form-control mb-2'>
                    {{ $post->content }}
                </textarea>
            </div>
            <div class='form-group'>
                <label for='gambar'>Thumbnail</label><br>
                <img src="{{ asset('/').$post->gambar }}" alt="" height="130" width="350"
                    class="img mb-4">
                <input type='file' name='gambar' class='form-control mb-2'>
            </div>
            <div class='form-group'>

                <button class="btn btn-primary btn-block">Edit</button>
            </div>

        </div>
    </div>
</form>

@endsection
