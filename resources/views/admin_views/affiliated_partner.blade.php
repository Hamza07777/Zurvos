@extends('admin_layout.app')

@section('main-content')
<!-- begin::main content -->
<main class="main-content" style="margin-top: 13%;background-color: #ffffff;">

   <div class="container" style="background-color: #EEF5FF">
        <div class="row" >
            <div class="col-xl-12">

                       <ul class="nav nav-tabs">
                                <li class="nav-item" style="margin-left: 5%;">
                                    <a href="#one" data-toggle="tab" aria-expanded="false"
                                        class="nav-link active" >
                                        <span class="d-block d-sm-none"><small>NEW USERS REQUEST</small></span>
                                        <span class="d-none d-sm-block">NEW USERS REQUEST</span>
                                    </a>
                                </li>
                                <li class="nav-item" style="margin-left: 5%;">
                                    <a href="#two" data-toggle="tab" aria-expanded="true"
                                        class="nav-link">
                                        <span class="d-block d-sm-none"><small>EXISTING USERS</small></span>
                                        <span class="d-none d-sm-block">EXISTING USERS</span>
                                    </a>
                                </li>
                                <li class="nav-item" style="margin-left: 5%;">
                                    <a href="#three" data-toggle="tab" aria-expanded="true"
                                        class="nav-link">
                                        <span class="d-block d-sm-none"><small>ADD NEW USERS</small></span>
                                        <span class="d-none d-sm-block">ADD NEW USERS</span>
                                    </a>
                                </li>
                            </ul>


                            <div class="tab-content p-3 text-muted">
                                <div class="tab-pane active" id="one">
                                    @foreach ($new_user as $new_user)
                                        <div class="row p-lg-5  " style="margin:25px;background-color: #ffffff;">

                                            <div class="col-lg-2" style="margin-left: -8%;">
                                                <img src="{{ asset('public/userimage'.$new_user->user_image)}}" class="avatar-lg rounded-circle mt-3" alt="Shreyu">
                                            </div>
                                            <div class="col-lg-8 ml-lg-5">
                                                <h5>{{ $new_user->name }}</h5>
                                                <a>http://www.ZURVOS.com/{{ $new_user->affiliated_link }}</a>
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

                                <!-- TAB 2 -->


                                <div class="tab-pane" id="two">
                                    @foreach ($user as $user)
                                        <div class="row p-lg-5  " style="margin:25px;background-color: #ffffff;">

                                            <div class="col-lg-2" style="margin-left: -8%;">
                                                <img src="{{ asset('public/userimage'.$user->user_image)}}" class="avatar-lg rounded-circle mt-3" alt="Shreyu">
                                            </div>
                                            <div class="col-lg-8 ml-lg-5">
                                                <h5>{{ $user->name }}</h5>
                                                <a>http://www.ZURVOS.com/{{ $user->affiliated_link }}</a>
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


                                <div class="tab-pane" id="three">
                                    <form method="POST" action="" enctype="multipart/form-data">
                                        @csrf
                                    <div class="row " style="margin: 25px;">




                                            <div class="col-lg-12 mt-lg-5">
                                                <label for="">EMAIL ADDRESS </label>
                                                <input class="form-control" type="name" name="card_number" placeholder="">
                                            </div>
                                            <div class="col-lg-12 mt-lg-5 mb-lg-3">
                                                <button type="button" name="" id="" class="btn btn-primary btn-lg" href="#" role="button" style="width: 100%">GENERATE LINK</button>

                                            </div>


                                    </div>
                                </form>
                                </div>


                </div>
            </div>

            <!-- task details -->

        </div>
   </div>

</main>
@endsection

<!-- end::main content -->

