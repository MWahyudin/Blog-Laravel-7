@extends('layout.master')
@section('title', 'Edit user')
@section('subtitle', 'Edit user')
@section('konten')



<form action="{{ route('user.update', $user->id)}}" method="POST" id="editForm">
    @csrf
    @method('PUT')
    <div class="row justify-content-center">
        <div class="col-lg-8 mb-6">
           
               <div class="form-group">
                <label for='name'>name</label>
                <input type='text' name='name' id='name' class='form-control mb-2' value="{{ $user->name}}">
               </div>
               <div class="form-group">
                    <label for='email'>email</label>
                <input type='text' name='email' id='email' class='form-control mb-2' value="{{ $user->email}}" readonly>
               </div>
                <div class="form-group">
                    <label for='typeuser'>Type User</label>
                    <select name='type' id='type' class='form-control mb-2'>
                        <option selected="true" disabled="disable">--Pilih Type--</option>
                        <option value="1" holder
                        @if ($user->type == 1)
                         selected   
                        @endif
                        >Admin</option>
                        <option value="0" holder
                        @if ($user->type == 0)
                            selected
                        @endif
                        >Penulis</option>
                    </select>
                </div>
                @if(count($errors)>0)
                    @foreach($errors->all() as $error)
                    <div class="alert alert-danger col-sm-3"> {{ $error }} </div>
                    @endforeach
                @endif
                <div class='form-group'>

                    <input class="btn btn-info" type="submit" value="Edit user">
                </div>
            </div>

        
    </div>
</form>
@endsection

@section('script')
<script>
    $().ready(function () {
        $("#editForm").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 4
                },
            },
            messages: {
                name: {
                    required: "<div class='alert alert-danger'>Masukan nama kamu</div>",
                    minlength: "<div class='alert alert-warning sm'>Nama lebih dari 4 huruf</div>"
                },
            }
        });

    })

</script>

@endsection
