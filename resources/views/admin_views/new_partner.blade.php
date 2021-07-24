@extends('admin_layout.app')

@section('main-content')
<!-- begin::main content -->
<main class="main-content" style="margin-top: 13%;background-color: #ffffff;">

   <div class="container" style="background-color: #EEF5FF">
        <div class="row" >
            <div class="col-xl-12">

                       <ul class="nav nav-tabs" style="margin-left: 6%;">
                                <li class="nav-item" style="margin-left: 5%;">
                                    <a href="#one" data-toggle="tab" aria-expanded="false"
                                        class="nav-link active" >
                                        <span class="d-block d-sm-none"><small>ADD NEW USERS</small></span>
                                        <span class="d-none d-sm-block">ADD NEW USERS</span>
                                    </a>
                                </li>
                                <li class="nav-item" style="margin-left: 28%;">
                                    <a href="#two" data-toggle="tab" aria-expanded="true"
                                        class="nav-link">
                                        <span class="d-block d-sm-none"><small>EXISTING USERS</small></span>
                                        <span class="d-none d-sm-block">EXISTING USERS</span>
                                    </a>
                                </li>

                            </ul>


                            <div class="tab-content p-3 text-muted">
                                <div class="tab-pane active" id="one">
                                    <form method="POST" action="{{route('save_partner') }}" enctype="multipart/form-data">
                                        @csrf
                                    <div class="row p-lg-5  " style="margin:25px;background-color: #ffffff;">
                                        <div class="col-lg-12 mt-lg-1">
                                            <h2 class="text-center">Add New Partner </h2>
                                        </div>
                                        <div class="col-lg-12 mt-lg-4">
                                            <label for="">User Name </label>
                                            <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Username">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                             @enderror

                                        </div>
                                        <div class="col-lg-12 mt-3">
                                            <label for=""> Email Address</label>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter email">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-12 mt-3">
                                            <label for="">Address</label>
                                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus placeholder="Address">
                                            @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                             @enderror
                                        </div>
                                        <div class="col-lg-12 mt-3">
                                            <label for=""> Password</label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-12 mt-3">
                                            <label for="">Confirm Password</label>
                                            <input id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="current-password">

                                            @error('password_confirmation')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-12 mt-3">
                                            <label for="">Partner Image</label>
                                            <input id="image" class="p-0 form-control @error('image') is-invalid @enderror" required name="image" type="file" accept="image/jpeg, image/png, application/pdf" value="{{ old('image') }}" required style=" border: none;padding-bottom: 10%;"/>
                                            @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-12 mt-lg-5 mb-lg-5">
                                            <button type="submit" name="" id="" class="btn btn-primary btn-lg" style="width: 100%">CREATE ACCOUNT</button>
                                        </div>
                                    </div>
                                </form>
                                </div>

                                <!-- TAB 2 -->


                                <div class="tab-pane" id="two">
                                    @foreach ($partner as $partner)

                                    <div class="row p-lg-5  " style="margin:25px;background-color: #ffffff;">

                                        <div class="col-lg-2" style="margin-left: -8%;">

                                            @if (!empty( $partner->image ))
                                            <img src="{{asset('public/Partner_image/'.$partner->image)}}" class="avatar-lg rounded-circle mt-3" alt="Shreyu">
 
                                            @else
                                            <img src="{{asset('public/assets/images/users/avatar-7.png')}}" class="avatar-lg rounded-circle mt-3" alt="Shreyu">

                                            @endif
                                        </div>
                                        <div class="col-lg-8 ml-lg-5">
                                            <h5>{{ $partner->name }}</h5>
                                            <img src="{{asset('public\assets\ZURVOS_ASSETS\ICONS\Locations.png')}}" class="img-fluid  mr-lg-2" alt="Shreyu"><span>{{ $partner->address }}</span>

                                        </div>
                                        <div class="col-lg-1 " style="margin-top: -3%;">
                                            <div class="dropdown ">

                                                    <button style="border: none;background-color: white;" class=" dropdown-toggle" type="button" data-toggle="dropdown"><i data-feather="more-vertical" style="margin-top:28px; color: blue"></i></button>
                                                    <ul class="dropdown-menu " style="width: 80%;margin-left: -141px;margin-top: 13px;">
                                                        <li class="list-group-item"><a href="">View Profile</a></li>
                                                        <li class="list-group-item"><a href="">Session History</a></li>
                                                    </ul>

                                                </div>
                                        </div>
                                    </div>

                                    @endforeach


                                </div>



                </div>
            </div>

            <!-- task details -->

        </div>
   </div>

</main>
@endsection

<!-- end::main content -->

