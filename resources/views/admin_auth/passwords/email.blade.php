@extends('admin.layouts.lock_head_foot')
@section('bodycontent')
        <div class="form-box" id="login-box">
            <div class="header">Password Reset Form</div>
            <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
            </div>
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/customer/password/email') }}">
                @csrf
                <div class="body bg-gray">
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input id="email" type="email" class="form-control" name="email" placeholder="Enter Email" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                
                        </div>  
                </div>
                <div class="footer">                                                               
                    <button type="submit" class="btn bg-olive btn-block">Send Password Reset Link</button>  
                </div>
            </form>
@endsection