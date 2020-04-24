@extends('layout.master')
@section('title','Buat daftar post')
@section('subtitle','Tambah post')

@section('konten')
<form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(count($errors)>0)
        @foreach($errors->all() as $error)
            <div class="alert alert-danger col-sm-3"> {{ $error }} </div>
        @endforeach
    @endif
    <div class="row justify-content-center">
        <div class="col-lg-8 mb-6">
            <div class='form-group'>
                <label for='Judul'>Judul</label>
                <input type='text' name='judul' id='judul' class='form-control mb-2'>
            </div>
            <div class='form-group'>
                <label for='kategori_id'>Kategori</label>
                <select class='form-control mb-2' name="kategori_id">
                    <option selected="true" disabled="disable">--Pilih Kategori--</option>
                    @foreach($kategori as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class='form-group'>
                <label for='tag'>Pilih Tags</label>
                <select class='form-control select2 mb-2' multiple="" name="tags[]">
                    @foreach($tags as $tag)
<option value="{{$tag->id}}">{{ $tag->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class='form-group'>
                <label for='content'>Konten</label>
                <textarea name='content' class='form-control mb-2'>

                </textarea>
            </div>
            <div class='form-group'>
                <label for='gambar'>Thumbnail</label>
                <input type='file' name='gambar' class='form-control mb-2'>
            </div>
            <div class='form-group'>

                <button class="btn btn-primary btn-block">Tambah post</button>
            </div>

        </div>
    </div>
</form>

@endsection
