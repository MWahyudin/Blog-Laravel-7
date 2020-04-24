@extends('layout.master')
@section('title','tag')
@section('subtitle','Daftar tag')

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

        <button class="btn btn-primary"> <a href="{{ route('tag.create') }}"
                style="color:white">Tambah tag</a></button>
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

                @foreach($tag as $item => $hasil)
                    {{-- {{dd($tag->firstitem()) }} --}}
                    <tr>
                        <td>{{ $item + $tag->firstitem() }}</td>
                        <td>{{ $hasil->name }}</td>
                        <td><form action="{{ route('tag.destroy', $hasil->id) }}" method="POST">
                            @csrf 
                            @method('DELETE')
                            <a href="{{ route('tag.edit', $hasil->id) }}" class="btn btn-success"> Edit</a> | 
                            <button  class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')"> Delete</button>
                       </form> </td>
                    </tr>
                @endforeach
            </tbody>

        </table>

        <br>
        {{ $tag->links() }}
    </div>
</div>

@endsection