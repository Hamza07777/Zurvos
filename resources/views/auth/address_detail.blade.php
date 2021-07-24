

<!DOCTYPE html>
<html>

@include('admin.layouts.header')

<body style="background-image: url('{{asset('assets/ZURVOS_ASSETS/IMAGES/WEB/Sign_up3.png')}}'); background-size: 100% 100%;">
    <!-- Login Form content start -->

    <!-- For responsiveness adding empty column -->
        <div class="row">
        <div class=" col-xs-2 col-sm-2 col-md-2 col-lg-2">

        </div>
    <!-- end -->

        <div class="card col-xs-4 col-sm-4 col-md-6 col-lg-3" style="width: 20rem; margin-top: 100px;  border-radius: 20px; background-color:  #eaeafa;">
            <div class="card-body">
                <h5 class="card-title text-center" style="margin-top: 50px; margin-bottom: 50px"><b>Address Details</b></h5>
                     <form method="POST" action="{{route('address_detail') }}">
                        @csrf

                        <div class="form-group" style="margin-left: 20px;">
                            <label for="zipcode">Zip Code</label>

                            <input id="zipcode" type="text" class="form-control @error('zipcode') is-invalid @enderror" name="zipcode" value="{{ old('zipcode') }}"  autocomplete="zipcode" autofocus placeholder="26563">

                                @error('zipcode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group" style="margin-left: 20px;">
                            <label for="tshirtsize">T-Shirt Size</label>

                            <input id="tshirtsize" type="text" class="form-control @error('tshirtsize') is-invalid @enderror" name="tshirtsize" value="{{ old('tshirtsize') }}"  autocomplete="tshirtsize" autofocus placeholder="XL(18-20)">

                                @error('tshirtsize')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group" style="margin-left: 20px;">
                            <label for="phonenumber">Phone Number</label>

                            <input id="phonenumber" type="text" class="form-control @error('phonenumber') is-invalid @enderror" name="phonenumber" value="{{ old('phonenumber') }}"  autocomplete="phonenumber" autofocus placeholder="568-7894-256">

                                @error('phonenumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <button type="submit" class="btn btn-primary" style="margin-left: 20px; margin-top: 20px; width:92%;">Register</button>

                    </form>
            </div>
        </div>
</div>
    <!-- Login Form content end -->
</body>
</html>
