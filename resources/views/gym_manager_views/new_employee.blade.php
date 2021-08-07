@extends('gym_manager_layout.app')

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
                                <li class="nav-item" style="margin-left: 8%;">
                                    <a href="#two" data-toggle="tab" aria-expanded="true"
                                        class="nav-link">
                                        <span class="d-block d-sm-none"><small>EXCITING EMPLOYEE</small></span>
                                        <span class="d-none d-sm-block">EXCITING EMPLOYEE</span>
                                    </a>
                                </li>
                                
                            </ul>


                            <div class="tab-content p-3 text-muted">
                                <div class="tab-pane active" id="one">
                                    <form method="POST" action="{{ route('save_employee') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row p-lg-3" style="background-color:  #FFFFFF;margin: 24px;">
                                            <div class="col-lg-12 text-center">
                                                    <h3>Add Employee</h3>
                            
                            
                            
                                            <div class="col-lg-12 mt-lg-5">
                                                <label for=""> Name </label>
                                                <input id="name" type="text" placeholder="Name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name')}}" required autocomplete="name" autofocus>
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
                                                <button type="submit" name="" id="" class="btn btn-primary btn-lg" href="#" role="button" style="width: 100%">Add</button>
                                            </div>
                            
                                    </div>
                                    </form>

                                </div>
                                </div>

                                <!-- TAB 2 -->


                                <div class="tab-pane " id="two">

                                    @foreach ($user as $user)
                                    <div class="row p-lg-5  " style="margin:25px;background-color: #ffffff;">

                                        <div class="col-lg-2" style="margin-left: -8%;">
                                            <img src="{{asset('public/employee/'.$user->image)}}" class="avatar-lg rounded-circle mt-3" alt="Shreyu">
                                        </div>
                                        <div class="col-lg-7 ml-lg-5">
                                            <h5>{{ $user->name }}</h5>
                                            <img src="{{asset('public\assets\ZURVOS_ASSETS\ICONS\Locations.png')}}" class="img-fluid  mr-lg-2" alt="Shreyu"><span>{{ $user->email }}</span>

                                        </div>
                                           <div class="col-lg-1 " style="margin-top: -7%;margin-left: 13%;">
                                            <div class="dropdown ">
                        
                                                    <button style="border: none;background-color: transparent;" class=" dropdown-toggle" type="button" data-toggle="dropdown"><i data-feather="more-vertical" style="margin-top:28px; color: blue"></i></button>
                                                    <ul class="dropdown-menu " style="width: 80%;margin-left: -141px;margin-top: 13px;">
                                                        <li class="list-group-item"><a href="{{ route('view_user_profile', $user->id)}}">User Profile</a></li>
                                                        <li class="list-group-item"><a href="{{ route('delete_user_profile', $user->id)}}">Delete User</a></li> 
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

