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
                                        <span class="d-block d-sm-none"><small>NEW VENDORS</small></span>
                                        <span class="d-none d-sm-block">NEW VENDORS</span>
                                    </a>
                                </li>
                                <li class="nav-item" style="margin-left: 5%;">
                                    <a href="#two" data-toggle="tab" aria-expanded="true"
                                        class="nav-link">
                                        <span class="d-block d-sm-none"><small>EXISTING VENDORS</small></span>
                                        <span class="d-none d-sm-block">EXISTING VENDORS</span>
                                    </a>
                                </li>
                                <li class="nav-item" style="margin-left: 5%;">
                                    <a href="#three" data-toggle="tab" aria-expanded="true"
                                        class="nav-link">
                                        <span class="d-block d-sm-none"><small>ADD NEW ACCOUNT</small></span>
                                        <span class="d-none d-sm-block">ADD NEW ACCOUNT</span>
                                    </a>
                                </li>
                            </ul>


                            <div class="tab-content p-3 text-muted">
                                <div class="tab-pane active" id="one">

                                    @foreach ($new_vendors as $new_vendors)
                                    <div class="row p-lg-5  " style="margin:25px;background-color: #ffffff;">

                                        <div class="col-lg-2" style="margin-left: -8%;">
                                            <img src="{{asset('public/assets/images/users/avatar-7.png')}}" class="avatar-lg rounded-circle mt-3" alt="Shreyu">
                                        </div>
                                        <div class="col-lg-8 ml-lg-5">
                                            <h5>{{ $new_vendors->store_name }}</h5>
                                            <img src="{{asset('public\assets\ZURVOS_ASSETS\ICONS\Locations.png')}}" class="img-fluid " alt="Shreyu"><span class="ml-3">{{ $new_vendors->address }}</span> <br>
                                            <img src="{{asset('public\assets\ZURVOS_ASSETS\ICONS\Email.png')}}" class="img-fluid "  style="width: 6%;"alt="Shreyu"><span class="ml-2">{{ $new_vendors->email }}</span>

                                        </div>
                                        <div class="col-lg-1 " style="margin-top: -3%;">
                                            <div class="dropdown ">

                                                    <button style="border: none;background-color: white;" class=" dropdown-toggle" type="button" data-toggle="dropdown"><i data-feather="more-vertical" style="margin-top:28px; color: blue"></i></button>
                                                    <ul class="dropdown-menu " style="width: 80%;margin-left: -141px;margin-top: 13px;">
                                                        <li class="list-group-item"><a href="">Edit Profile</a></li>
                                                        <li class="list-group-item"><a href="">View Transactions</a></li>
                                                        <li class="list-group-item"><a href="">All Session</a></li>
                                                        <li class="list-group-item"><a href="">Delete</a></li>
                                                    </ul>

                                                </div>
                                        </div>
                                    </div>
                                    @endforeach
                                 

                                </div>

                                <!-- TAB 2 -->


                                <div class="tab-pane" id="two">

                                    @foreach ($exictng_vendors as $exictng_vendors)
                                    <div class="row p-lg-5  " style="margin:25px;background-color: #ffffff;">

                                        <div class="col-lg-2" style="margin-left: -8%;">
                                            <img src="{{asset('public/assets/images/users/avatar-7.png')}}" class="avatar-lg rounded-circle mt-3" alt="Shreyu">
                                        </div>
                                        <div class="col-lg-8 ml-lg-5">
                                            <h5>{{ $exictng_vendors->store_name }}</h5>
                                            <img src="{{asset('public\assets\ZURVOS_ASSETS\ICONS\Locations.png')}}" class="img-fluid " alt="Shreyu"><span class="ml-3">{{ $exictng_vendors->address }}</span> <br>
                                            <img src="{{asset('public\assets\ZURVOS_ASSETS\ICONS\Email.png')}}" class="img-fluid "  style="width: 6%;"alt="Shreyu"><span class="ml-2">{{ $exictng_vendors->email }}</span>

                                        </div>
                                        <div class="col-lg-1 " style="margin-top: -3%;">
                                            <div class="dropdown ">

                                                    <button style="border: none;background-color: white;" class=" dropdown-toggle" type="button" data-toggle="dropdown"><i data-feather="more-vertical" style="margin-top:28px; color: blue"></i></button>
                                                    <ul class="dropdown-menu " style="width: 80%;margin-left: -141px;margin-top: 13px;">
                                                        <li class="list-group-item"><a href="">Edit Profile</a></li>
                                                        <li class="list-group-item"><a href="">View Transactions</a></li>
                                                        <li class="list-group-item"><a href="">All Session</a></li>
                                                        <li class="list-group-item"><a href="">Delete</a></li>
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

