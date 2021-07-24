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
                                        <span class="d-block d-sm-none"><small>MANAGE LIBRARY</small></span>
                                        <span class="d-none d-sm-block">MANAGE LIBRARY</span>
                                    </a>
                                </li>
                                <li class="nav-item" style="margin-left: 5%;">
                                    <a href="#two" data-toggle="tab" aria-expanded="true"
                                        class="nav-link">
                                        <span class="d-block d-sm-none"><small>ADD CATEGORY</small></span>
                                        <span class="d-none d-sm-block">ADD CATEGORY</span>
                                    </a>
                                </li>
                                <li class="nav-item" style="margin-left: 5%;">
                                    <a href="#three" data-toggle="tab" aria-expanded="true"
                                        class="nav-link">
                                        <span class="d-block d-sm-none"><small>EDIT PLAN</small></span>
                                        <span class="d-none d-sm-block">EDIT PLAN</span>
                                    </a>
                                </li>
                            </ul>


                            <div class="tab-content p-3 text-muted">
                                <div class="tab-pane active" id="one">
                                    <div class="col-lg-12" >
                                        <h4 class="text-center"><a href="#">Category</a></h4>
                                        <h2 class="text-center">Weight Loss</h2>
                                    </div>
                                    <div class="row p-lg-5  " style="margin:25px;background-color: #ffffff;">
                                        <div class="col-lg-3" style="margin-left: -8%;">
                                            <img src="{{asset('public/assets/images/users/avatar-7.png')}}" class="avatar-lg  mt-3" alt="Shreyu" style="height: 130px;    width: 158%;">
                                        </div>
                                        <div class="col-lg-5" style="margin-left: 20%;">
                                            <h5>Hamza</h5>
                                            <p class="mt-5">Price: <a href="#">$15.00</a></p>
                                            <p>Duration: <a href="#">10min</a></p>
                                        </div>
                                        <div class="col-lg-1 " style="margin-top: -3%;margin-left: 12%;">
                                            <div class="dropdown ">

                                                    <button style="border: none;background-color: white;" class=" dropdown-toggle" type="button" data-toggle="dropdown"><i data-feather="more-vertical" style="margin-top:28px; color: blue"></i></button>
                                                    <ul class="dropdown-menu " style="width: 80%;margin-left: -141px;margin-top: 13px;">
                                                        <li class="list-group-item"><a href="">View Profile</a></li>
                                                        <li class="list-group-item"><a href="">Session History</a></li>
                                                    </ul>

                                                </div>
                                        </div>
                                    </div>



                                    <div class="row p-lg-5  " style="margin:25px;background-color: #ffffff;">
                                        <div class="col-lg-3" style="margin-left: -8%;">
                                            <img src="{{asset('public/assets/images/users/avatar-7.png')}}" class="avatar-lg  mt-3" alt="Shreyu" style="height: 130px;    width: 158%;">
                                        </div>
                                        <div class="col-lg-5" style="margin-left: 20%;">
                                            <h5>Hamza</h5>
                                            <p class="mt-5">Price: <a href="#">$15.00</a></p>
                                            <p>Duration: <a href="#">10min</a></p>
                                        </div>
                                        <div class="col-lg-1 " style="margin-top: -3%;margin-left: 12%;">
                                            <div class="dropdown ">

                                                    <button style="border: none;background-color: white;" class=" dropdown-toggle" type="button" data-toggle="dropdown"><i data-feather="more-vertical" style="margin-top:28px; color: blue"></i></button>
                                                    <ul class="dropdown-menu " style="width: 80%;margin-left: -141px;margin-top: 13px;">
                                                        <li class="list-group-item"><a href="">View Profile</a></li>
                                                        <li class="list-group-item"><a href="">Session History</a></li>
                                                    </ul>

                                                </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- TAB 2 -->


                                <div class="tab-pane" id="two">

                                    <div class="row p-lg-5  " style="">
                                        <div class="col-md-6 float-left">Existing Category</div>
                                        <div class="col-md-6 "><button class="btn btn-primary float-right">Add New</button></div>
                                        <div class="col-md-12">
                                            <div id="accordion">
                                                <div class="card" style="background-color: transparent;">
                                                  <div class="card-header" id="headingOne" style="background-color: transparent;color:#D1D6D9;">
                                                    <h5 class="mb-0">
                                                        <i data-feather="chevron-right"></i><button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="color:#000000;">
                                                        Collapsible Group Item #1
                                                      </button>
                                                    </h5>
                                                  </div>

                                                  <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                                    <div class="card-body" style="padding-top: 0px;">
                                                        <ul  style="list-style: none;padding-left: 37px;">
                                                            <li class="mt-1" style="padding-bottom: 12px;border-bottom: 1px solid black;">Lorem ipsum dolor Lorem ipsum dolor</li>
                                                            <li class="mt-1" style="padding-bottom: 12px;border-bottom: 1px solid black;">Lorem ipsum dolor</li>
                                                            <li class="mt-1" style="padding-bottom: 12px;border-bottom: 1px solid black;">Lorem ipsum dolor Lorem ipsum dolor</li>
                                                            <li class="mt-1" style="padding-bottom: 12px;border-bottom: 1px solid black;">Lorem ipsum dolor</li>
                                                        </ul>
                                                    </div>
                                                  </div>
                                                </div>

                                              </div>
                                        </div>


                                    </div>
                                </div>


                                <div class="tab-pane" id="three">
                                    <div class="col-lg-12" >
                                        <h2 class="text-center"><a href="#">FUELED Plan</a></h2>
                                        <h4 class="text-center">Lorem ipsum dolor sit amet, consectetur.</h4>
                                    </div>
                                    <div class="row p-lg-5  " style="margin: 11% 17%;background-color: #ffffff;">
                                        <div class="col-lg-12" >
                                            <h3 class="text-center">1 to 3 Days Workout Plans</h3>
                                            <h4 class="text-center">$5.00</h4>
                                            <ul class="text-center" style="list-style: none;padding-left: 0px;">
                                                <li class="mt-3" style="padding-bottom: 12px;border-bottom: 1px solid black;"><i data-feather="check" class="mr-2"></i>Lorem ipsum dolor Lorem ipsum dolor</li>
                                                <li class="mt-3" style="padding-bottom: 12px;border-bottom: 1px solid black;"><i data-feather="check" class="mr-2"></i>Lorem ipsum dolor</li>
                                                <li class="mt-3" style="padding-bottom: 12px;border-bottom: 1px solid black;"><i data-feather="check" class="mr-2"></i>Lorem ipsum dolor Lorem ipsum dolor</li>
                                                <li class="mt-3" style="padding-bottom: 12px;border-bottom: 1px solid black;"><i data-feather="check" class="mr-2"></i>Lorem ipsum dolor</li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-12 mt-lg-5 mb-lg-5">
                                            <button type="button" name="" id="" class="btn btn-primary btn-lg" href="#" role="button" style="width: 100%">Edit</button>
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

