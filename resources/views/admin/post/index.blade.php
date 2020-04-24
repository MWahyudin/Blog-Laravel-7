@extends('layout.master')
@section('title','Post')
@section('subtitle','Post')

@section('konten')
@if(Session::has('success'))
<div class="alert alert-success">{{ Session('success') }}</div>
<br>
@endif
@if(Session::has('success-update'))
<div class="alert alert-success">{{ Session('success-update') }}</div>
<br>
@endif

@if(Session::has('success-delete'))
<div class="alert alert-success">{{ Session('success-delete') }}</div>
<br>
@endif
<div class="row justify-content-left">
        <button class="btn btn-primary mb-4 mt-4"> <a href="{{ route('post.create') }}"
                style="color:white">Tambah post</a></button>
        <table class="table table-bordered table-sm text-center">
            <thead>
                <tr>
                    <th>No </th>
                    <th>Author</th>
                    <th>Nama Post</th>
                    <th>Kategori</th>
                    <th>Daftar Tag</th>
                    <th>Thumbnail</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach($post as $item => $hasil)
                    {{-- {{dd($post->firstitem()) }} --}}
                    <tr>
                        <td>{{ $item + $post->firstitem() }}</td>
                        <td>{{ $hasil->users->name }}</td>
                        {{-- {{dd($hasil->gambar)}} --}}
                       
                        <td>{{ $hasil->judul }}</td>
                        <td>{{ $hasil->kategori->name }} </td>
                        <td>
                            @foreach ($hasil->tags as $tag)
                               <span class="badge badge-info">{{ $tag->name}}</span>
                            @endforeach
                        </td>
                        <td><img src="{{ asset($hasil->gambar) }}" alt="" width="130" height="70"></td>
                        <td><form action="{{ route('post.destroy', $hasil->id) }}" method="POST">
                            @csrf 
                            @method('DELETE')
                            <a href="{{ route('post.edit', $hasil->id) }}" class="btn btn-primary"> Edit</a> | 
                            <button  class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')"> Delete</button>
                       </form> </td>
                    </tr>
                @endforeach
            </tbody>

        </table>

        <br>
        {{ $post->links() }}

</div>
@endsection