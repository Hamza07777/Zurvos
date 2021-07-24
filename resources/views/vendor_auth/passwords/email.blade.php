
<!DOCTYPE html>
<html>

@include('admin.layouts.header')

<body style="background-image: url('{{asset('public/assets/images/login.jpg')}}'); background-size: 100% 100%;">
    <!-- Login Form content start -->

    <!-- For responsiveness adding empty column -->
        <div class="row">
        <div class=" col-xs-2 col-sm-2 col-md-2 col-lg-2">
            
        </div>
    <!-- end -->

        <div class="card col-xs-4 col-sm-4 col-md-6 col-lg-3" style="width: 20rem; margin-top: 100px;  border-radius: 20px; background-color:  #eaeafa;">
            <div class="card-body">
                <h5 class="card-title text-center" style="margin-top: 50px; margin-bottom: 50px"><b>Reset Password</b></h5>
                  @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                     <form method="POST" action="{{route('influence.password.request') }}">
                        @csrf
                        <div class="form-group" style="margin-left: 20px;">
                            <label for="exampleInputEmail1">Email address</label>

                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                       
                   

                        <button type="submit" class="btn btn-primary" style="margin-left: 20px; margin-top: 20px; width:92%; margin-bottom: 40px;">Send Password Reset Link</button>

                    </form>
            </div>
        </div>
</div>
    <!-- Login Form content end -->
</body>
</html>





