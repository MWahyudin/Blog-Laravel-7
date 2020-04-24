@extends('layout.master')
@section('title','Kategori')
@section('subtitle','Daftar Kategori')

@section('konten')
<div class="row justify-content-center">
    <div class="col-lg-8 mb-6">
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

        <button class="btn btn-primary"> <a href="{{ route('kategori.create') }}"
                style="color:white">Tambah Kategori</a></button>
        <br><br>
        <table class="table table-bordered table-sm text-center">
            <thead>
                <tr>
                    <th>No </th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach($kategori as $item => $hasil)
                    {{-- {{dd($kategori->firstitem()) }} --}}
                    <tr>
                        <td>{{ $item + $kategori->firstitem() }}</td>
                        <td>{{ $hasil->name }}</td>
                        <td><form action="{{ route('kategori.destroy', $hasil->id) }}" method="POST">
                            @csrf 
                            @method('DELETE')
                            <a href="{{ route('kategori.edit', $hasil->id) }}" class="btn btn-success"> Edit</a> | 
                            <button  class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')"> Delete</button>
                       </form> </td>
                    </tr>
                @endforeach
            </tbody>

        </table>

        <br>
        {{ $kategori->links() }}
    </div>
</div>

@endsection