@extends('admin_layout.app')

@section('main-content')
<!-- begin::main content -->
<main class="main-content" style="margin-top: 13%;background-color:  #EEF5FF;">
    <div class="container">
        <form method="POST" action="{{ route('save_gym') }}" enctype="multipart/form-data">
            @csrf
            <div class="row p-lg-3" style="background-color:  #FFFFFF;margin: 24px;">
                <div class="col-lg-12 text-center">
                        <h3>Add New Gym</h3>



                <div class="col-lg-12 mt-lg-5">
                    <label for="">Gym Name </label>
                    <input id="name" type="text" placeholder="Category Name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name')}}" required autocomplete="name" autofocus>
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

                <div class="col-lg-12 mt-3">
                    <label for=""> Password</label>
                    <input id="password" type="password" placeholder="*********" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="col-lg-12 mt-3">
                    <label for="">Confirm Password</label>
                    <input id="password-confirm" type="password" placeholder="*********"  class="form-control" name="password_confirmation" required autocomplete="new-password">

                </div>
                <div class="col-lg-12 mt-3">
                    <label for=""> Upload Image</label>
                    <input  class="form-control @error('gymname') is-invalid @enderror" type="file" style="border: none;height: 45px;"  name="gymname" accept=" image/* " value="" required >
                    @error('gymname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="col-lg-12 mt-lg-5 mb-lg-5">
                    <button type="submit" name="" id="" class="btn btn-primary btn-lg" href="#" role="button" style="width: 100%">Next</button>
                </div>

        </div>
        </form>
    </div>

</main>
@endsection

<!-- end::main content -->
