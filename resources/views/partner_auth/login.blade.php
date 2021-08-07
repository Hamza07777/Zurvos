
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
                <h5 class="card-title text-center" style="margin-top: 50px; margin-bottom: 50px"><b>Login</b></h5>
                     <form method="POST" action="{{route('partner.login') }}">
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

                        <div class="form-group" style="margin-left: 20px;">
                            <div class="row">
                            <div class="col-xs-3 col-sm-7 col-md-7 col-lg-7"><label for="exampleInputPassword1">Password</label> </div>
                            <div>



                            </div>
                            </div>
                           <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-check" style="margin-left: 20px;">

                                       {{-- <small class="col-xs-9 col-sm-5 col-md-5 col-lg-5"><a href="{{ route('influence.password.reset') }}"><b>Forget Password </b></a></small> --}}


                                        <small class="col-xs-9 col-sm-5 col-md-5 col-lg-5"><a href="{{ route('vendor.register') }}"><b>Register Now </b></a></small></br>
                                        <!--<input class="form-check-input ml-3" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>-->

                                        <!--<label class="form-check-label  ml-5" for="remember">-->
                                        <!--    {{ __('Remember Me') }}-->
                                        <!--</label>-->
                        </div>

                        <button type="submit" class="btn btn-primary" style="margin-left: 20px; margin-top: 20px; width:92%; margin-bottom: 40px;">Login</button>

                    </form>
            </div>
        </div>
</div>
    <!-- Login Form content end -->
</body>
</html>
