@extends('admin_layout.app')

@section('main-content')
<!-- begin::main content -->
<main class="main-content" style="margin-top: 13%;background-color:  #EEF5FF;">
    <div class="container">
        <form method="POST" action="{{ route('gym_location',$id) }}" enctype="multipart/form-data">
            @csrf
            <div class="row p-lg-3" style="background-color:  #FFFFFF;margin: 24px;">

                    <div class="col-lg-12 mt-3 text-center">
                        <h3>Location Details</h3>

                    </div>

                    <div class="col-lg-12 mt-3">
                        <label for=""> Zip Code</label>
                        <input id="zipcode" type="text" placeholder="50700" class="form-control @error('zipcode') is-invalid @enderror" name="zipcode" value="{{ old('zipcode')}}" required autocomplete="zipcode" autofocus>
                        @error('zipcode')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>

                    <div class="col-lg-12 mt-3">
                        <label for=""> Cost Per Session</label>
                        <input id="cost_per_day" type="text" placeholder="5" class="form-control @error('cost_per_day') is-invalid @enderror" name="cost_per_day" value="{{ old('cost_per_day')}}" required autocomplete="cost_per_day" autofocus>
                        @error('cost_per_day')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="col-lg-12 mt-3">
                        <label for="">Phone Number</label>
                        <input id="phoneno" type="text" placeholder="035522548555" class="form-control @error('phoneno') is-invalid @enderror" name="phoneno" value="{{ old('phoneno')}}" required autocomplete="phoneno" autofocus>
                        @error('phoneno')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="col-lg-12 mt-lg-5 mb-lg-5">
                        <button type="submit" name="" id="" class="btn btn-primary btn-lg"  role="button" style="width: 100%">Next</button>
                    </div>

        </div>
        </form>
    </div>

</main>
@endsection

<!-- end::main content -->
