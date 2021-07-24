@extends('admin.layouts.lock_head_foot')
@section('bodycontent')
        <div class="form-box" id="login-box">
            <div class="header"> Reset Password</div>
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/customer/password/reset') }}">
                @csrf
                <div class="body bg-gray">
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                        
                            <input id="email" type="email" class="form-control" name="email" placeholder="Enter Email" required autofocus>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <input id="password" type="password" placeholder="Enter Password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                    </div>

                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required>

                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif
                    </div>
                </div>
                <div class="footer">                                                               
                    <button type="submit" class="btn bg-olive btn-block">Reset Password</button>  
                    
            </form>
@endsection