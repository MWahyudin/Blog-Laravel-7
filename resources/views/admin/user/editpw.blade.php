@extends('layout.master')
@section('title', 'Edit user')
@section('subtitle', 'Edit user')
@section('konten')



<form action="{{ route('gantipw', $user->id) }}" method="POST" id="editpwForm">
    @csrf
    @method('PUT')
    <div class="row justify-content-center">
        <div class="col-lg-8 mb-6">

          @if (auth()->user()->type == 0)
          <div class="form-group">
            <label for='passwordlama'>Password lama</label>
            <input type='text' name='passwordlama' id='passwordlama' class='form-control mb-2'>
        </div>
          @endif
            <div class="form-group">
                <label for='passwordbaru'>Password baru</label>
                <input type='text' name='passwordbaru' id='passwordbaru' class='form-control mb-2'>
            </div>
            <div class="form-group">
                <label for='passwordconfirm'>Confirm password</label>
                <input type='text' name='passwordconfirm' id='passwordconfirm' class='form-control mb-2'>
            </div>

            @if(count($errors)>0)
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger col-sm-3"> {{ $error }} </div>
                @endforeach
            @endif
            <div class='form-group'>

                <input class="btn btn-info" type="submit" value="Ganti password">
            </div>
        </div>


    </div>
</form>
@endsection

@section('script')
<script>
    $().ready(function () {
        $("#editpwForm").validate({
            rules: {
                passwordlama: {
                    required: true,
                    minlength: 4
                },
                passwordbaru: {
                    required: true,
                    minlength: 4
                },
                passwordconfirm: {
                    required: true,
                    minlength: 4,
                    equalTo: "#passwordbaru"
                },
            },
            messages: {
                passwordlama: {
                    required: "<div class='alert alert-danger'>Masukan password lama</div>",
                    minlength: "<div class='alert alert-warning sm'>Password lebih dari 4 huruf</div>"
                },
                passwordbaru: {
                    required: "<div class='alert alert-danger'>Masukan Password kamu</div>",
                    minlength: "<div class='alert alert-warning sm'>Password lebih dari 4 huruf</div>"
                },
                passwordconfirm: {
                    required: "<div class='alert alert-danger'>Confirm password</div>",
                    minlength: "<div class='alert alert-warning sm'>Password lebih dari 4 huruf</div>",
                    equalTo: "Password tidak sama !"
                },
            }
        });

    })

</script>

@endsection
