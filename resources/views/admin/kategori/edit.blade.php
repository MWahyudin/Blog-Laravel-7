@extends('layout.master')
@section('title', 'Edit Kategori')
@section('subtitle', 'Edit Kategori')
@section('konten')



<form action="{{ route('kategori.update', $kategori->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="row justify-content-center">
        <div class="col-lg-8 mb-6">
            <div class='form-group'>
                <label for='name'>name</label>
                <input type='text' name='name' id='name' class='form-control mb-2' value="{{ $kategori->name}}">
                @if(count($errors)>0)
                    @foreach($errors->all() as $error)
                      <div class="alert alert-danger col-sm-3"> {{ $error }} </div>
                    @endforeach
                @endif
            </div>
            <div class='form-group'>

                <button class="btn btn-primary btn-block">Update Kategori</button>
            </div>

        </div>
    </div>
</form>


@endsection
