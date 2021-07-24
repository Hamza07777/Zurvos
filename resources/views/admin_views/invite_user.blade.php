@extends('admin_layout.app')

@section('main-content')
<!-- begin::main content -->
<main class="main-content" style="margin-top: 13%;background-color:  #EEF5FF;">
    <div class="container">
        <form method="POST" action="{{ route('save_invite_user') }}" enctype="multipart/form-data">
            @csrf
            <div class="row p-lg-3" style="background-color:  #FFFFFF;margin: 24px;">

                <div class="col-lg-12">
                        <h3 class="text-center">Add New User</h3>

                </div>

                <div class="col-lg-12 mt-lg-5">
                    <label for="">User Name </label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="User Name">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="col-lg-12 mt-3">
                    <label for=""> Email Address</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="someone@gmail.com">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>

                <div class="col-lg-12 mt-lg-5 mb-lg-5">
                    <button type="submit" name="" id="" class="btn btn-primary btn-lg"  style="width: 100%">ADD USER</button>
                </div>

            </div>
        </form>
    </div>

</main>
@endsection

<!-- end::main content -->
