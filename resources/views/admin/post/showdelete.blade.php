@extends('layout.master')
@section('title','Post trash')
@section('subtitle','Post Trashed')

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
        <table class="table table-bordered table-sm text-center">
            <thead>
                <tr>
                    <th>No </th>
                    <th>Thumbnail</th>
                    <th>Nama Post</th>
                    <th>Kategori</th>
                    <th>Daftar Tag</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach($post as $item => $hasil)
                    {{-- {{dd($post->firstitem()) }} --}}
                    <tr>
                        <td>{{ $item + $post->firstitem() }}</td>
                        {{-- {{dd($hasil->gambar)}} --}}
                        <td><img src="{{ asset($hasil->gambar) }}" alt="" width="130" height="70"></td>
                        <td>{{ $hasil->judul }}</td>
                        <td>{{ $hasil->kategori->name }} </td>
                        <td>
                            @foreach ($hasil->tags as $tag)
                               <span class="badge badge-info">{{ $tag->name}}</span>
                            @endforeach
                        </td>
                        <td><form action="{{ route('forcedelete', $hasil->id)}}" method="POST">
                            @csrf 
                            @method('DELETE')
                            <a href="{{ route('restore', $hasil->id)}}" class="btn btn-info">Restore</a> | 
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