@extends('layout.master')
@section('title','User')
@section('subtitle','Daftar User')

@section('konten')
<div class="row justify-content-center">
    <div class="col-lg-8 mb-6">
        @if(Session::has('success'))
            <div class="alert alert-success">{{ Session('success') }}</div>
            <br>
        @endif
        <button class="btn btn-primary"> <a href="{{ route('user.create') }}"
                style="color:white">Tambah User</a></button>
        <br><br>
        <table class="table table-bordered table-sm text-center">
            <thead>
                <tr>
                    <th>No </th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach($users as $item => $hasil)
                    {{-- {{dd($tag->firstitem()) }} --}}
                    <tr>
                        <td>{{ $item + $users->firstitem() }}</td>
                        <td>{{ $hasil->name }}</td>
                        <td>{{ $hasil->email }}</td>
                        <td>{!! $hasil->type ? "<span class='badge badge-info'>Admin</span>": "<span class='badge badge-warning'>Penulis</span>" !!}</td>
                        <td><form action="{{ route('user.destroy', $hasil->id) }}" method="POST">
                            @csrf 
                            @method('DELETE')
                            <a href="{{ route('user.edit', $hasil->id) }}" class="btn btn-primary"> Edit</a> | 
                            <button  class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')"> Delete</button> |
                            <a href="{{ route('editpw', $hasil->id) }}" class="btn btn-info">Password</a>
                       </form> </td>
                    </tr>
                @endforeach
            </tbody>

        </table>

        <br>
        {{ $users->links() }}
    </div>
</div>

@endsection 