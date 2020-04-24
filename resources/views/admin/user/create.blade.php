@extends('layout.master')
@section('title','Buat daftar user')
@section('subtitle','Tambah user')

@section('konten')
<form action="{{ route('user.store') }}" method="POST" id="userForm">
    @csrf
    <div class="row justify-content-center">
        <div class="col-lg-8 mb-6">
            <div class='form-group'>
                <label for='name'>name</label>
                <input type='text' name='name' id='name' minlength="4" class='form-control mb-2' autocomplete="off">
            </div>
            <div class="form-group">
                <label for='email'>email</label>
                <input type='email' name='email' id='email' class='form-control mb-2' autocomplete="off">

            </div>
            <div class="form-group">
                <label for='typeuser'>Type User</label>
                <select name='type' id='type' class='form-control mb-2'>
                    <option selected="true" disabled="disable">--Pilih Type--</option>
                    <option value="1">Admin</option>
                    <option value="0">Penulis</option>
                </select>
            </div>
            <div class="form-group">
                <label for='password'>Password</label>
                <input type='password' name='password' id='password' class='form-control mb-2' autocomplete="new-password">

            </div>
            <div class="form-group">
                <label for='password2'>Confirm Password</label>
                <input type='password' name='password2' id='password2' class='form-control mb-2'>
                <div id="error"></div>

            </div>
            @if(count($errors)>0)
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger col-sm-3"> {{ $error }} </div>
                @endforeach
            @endif
            <div class='form-group'>

                <input class="btn btn-info" type="submit" value="Submit">
            </div>

        </div>
    </div>
</form>
@endsection

@section('script')
<script>
    $().ready(function () {
        $("#userForm").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 4
                },
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 5
                },
                password2: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                }
            },
            messages: {
                name: {
                    required: "<div class='alert alert-danger'>Masukan nama kamu</div>",
                    minlength: "<div class='alert alert-warning sm'>Nama lebih dari 4 huruf</div>"
                },
                password: {
                    required: "Masukan password",
                    minlength: "password harus lebih dari 5 huruf"
                },
                password2: {
                    required: "Masukan password",
                    minlength: "Password harus lebih dari 5 huruf",
                    equalTo: "Password tidak sama !"
                },
                email: "Masukan email format yang benar"
            }
        });

    })

</script>

@endsection
