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
                                        <span class="d-block d-sm-none"><small>NEW USERS</small></span>
                                        <span class="d-none d-sm-block">NEW USERS</span>
                                    </a>
                                </li>
                                <li class="nav-item" style="margin-left: 5%;">
                                    <a href="#two" data-toggle="tab" aria-expanded="true"
                                        class="nav-link">
                                        <span class="d-block d-sm-none"><small>VERIFIED USERS</small></span>
                                        <span class="d-none d-sm-block">VERIFIED USERS</span>
                                    </a>
                                </li>
                                <li class="nav-item" style="margin-left: 5%;">
                                    <a href="#three" data-toggle="tab" aria-expanded="true"
                                        class="nav-link">
                                        <span class="d-block d-sm-none"><small>AFFILIATE PARTNER</small></span>
                                        <span class="d-none d-sm-block">AFFILIATE PARTNER</span>
                                    </a>
                                </li>
                            </ul>


                            <div class="tab-content p-3 text-muted">
                                <div class="tab-pane active" id="one">
                                    @foreach ($new_user as $new_user)
                                    <div class="row p-lg-5  " style="margin:25px;background-color: #ffffff;">

                                        <div class="col-lg-2" style="margin-left: -8%;">
                                            <img src="{{asset('public/userimage/'.$new_user->user_image)}}" class="avatar-lg rounded-circle mt-3" alt="Shreyu">
                                        </div>
                                        <div class="col-lg-7 ml-lg-5">
                                            <h5>{{ $new_user->name }}</h5>
                                            <img src="{{asset('public\assets\ZURVOS_ASSETS\ICONS\Locations.png')}}" class="img-fluid  mr-lg-2" alt="Shreyu"><span>{{ $new_user->city }}</span>

                                        </div>
                                          <div class="col-lg-1 " style="margin-top: -7%;margin-left: 13%;">
                                            <div class="dropdown ">
                        
                                                    <button style="border: none;background-color: transparent;" class=" dropdown-toggle" type="button" data-toggle="dropdown"><i data-feather="more-vertical" style="margin-top:28px; color: blue"></i></button>
                                                    <ul class="dropdown-menu " style="width: 80%;margin-left: -141px;margin-top: 13px;">
                                                        <li class="list-group-item"><a href="{{ route('view_user_profile', $new_user->cust_id)}}">User Profile</a></li>
                                                        <li class="list-group-item"><a href="{{ route('delete_user_profile', $new_user->cust_id)}}">Delete User</a></li> 
                                                        <li class="list-group-item"><a href="{{ route('user_chk_in', $new_user->cust_id)}}">Session History</a></li>
                                                    </ul>
                        
                                                </div>
                                        </div>
                                    </div>
                                    @endforeach


                                </div>

                                <!-- TAB 2 -->


                                <div class="tab-pane" id="two">

                                    @foreach ($user as $user)
                                    <div class="row p-lg-5  " style="margin:25px;background-color: #ffffff;">

                                        <div class="col-lg-2" style="margin-left: -8%;">
                                            <img src="{{asset('public/userimage/'.$user->user_image)}}" class="avatar-lg rounded-circle mt-3" alt="Shreyu">
                                        </div>
                                        <div class="col-lg-7 ml-lg-5">
                                            <h5>{{ $user->name }}</h5>
                                            <img src="{{asset('public\assets\ZURVOS_ASSETS\ICONS\Locations.png')}}" class="img-fluid  mr-lg-2" alt="Shreyu"><span>{{ $user->city }}</span>

                                        </div>
                                           <div class="col-lg-1 " style="margin-top: -7%;margin-left: 13%;">
                                            <div class="dropdown ">
                        
                                                    <button style="border: none;background-color: transparent;" class=" dropdown-toggle" type="button" data-toggle="dropdown"><i data-feather="more-vertical" style="margin-top:28px; color: blue"></i></button>
                                                    <ul class="dropdown-menu " style="width: 80%;margin-left: -141px;margin-top: 13px;">
                                                        <li class="list-group-item"><a href="{{ route('view_user_profile', $user->cust_id)}}">User Profile</a></li>
                                                        <li class="list-group-item"><a href="{{ route('delete_user_profile', $user->cust_id)}}">Delete User</a></li> 
                                                        <li class="list-group-item"><a href="{{ route('user_chk_in', $user->cust_id)}}">Session History</a></li>
                                                    </ul>
                        
                                                </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>


                                <div class="tab-pane" id="three">

                                    <div class="row p-lg-5  " style="margin:25px;background-color: #ffffff;">

                                        <div class="col-lg-2" style="margin-left: -8%;">
                                            <img src="{{asset('public/assets/images/users/avatar-7.png')}}" class="avatar-lg rounded-circle mt-3" alt="Shreyu">
                                        </div>
                                        <div class="col-lg-8 ml-lg-5">
                                            <h5>Hamza</h5>
                                            <a>http://www.ZURVOS.com/p065846</a>

                                        </div>
                                    </div>
                                </div>


                </div>
            </div>

            <!-- task details -->

        </div>
   </div>

</main>
@endsection

<!-- end::main content -->

