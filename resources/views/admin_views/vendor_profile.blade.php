@extends('admin_layout.app')

@section('main-content')
<!-- begin::main content -->
<main class="main-content" style="margin-top: 13%;background-color: #ffffff;">

   <div class="container" style="background-color: #EEF5FF">

    <div class="row" >
        <div class="col-lg-3" >
            <img src="{{asset('public/assets/images/users/avatar-7.png')}}" class="avatar-lg rounded-circle mt-3" alt="Shreyu" style="float: right;" >
        </div>
        <div class="col-lg-4" >
            <h5>Hamza</h5>
            <p >Price: <a href="#">$15.00</a></p>
            <p>Duration: <a href="#">10min</a></p>
            <button class="btn btn-primary" style="width: 26%;"> Edit</button>
        </div>
        <div class="col-lg-5">
            <p>Grant Marshal</p>
            <p>Marshal@yahoo.com</p>
            <p>25 bIll satree  +(0235) 23564565</p>
        </div>
    </div>
    <div class="row m-lg-2" >
        <div class="col-xl-12">
            <h6>BANNER DEAL</h6>
        </div>
        <div class="col-xl-12">
            <img src="{{asset('public/assets/ZURVOS_ASSETS/ZURVOS_ASSETS/IMAGES/WEB/Store_banner.png')}}" class="image-fluid" width="100%" height="160px" alt="Shreyu" >
            <div class="row" style="position: absolute;margin-top: -22%;">
                <div class="col-lg-6">
                    <h5>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis possimus quae neque 
                    </h5>
                </div>
                <div class="col-lg-6">
                    <h2 class="text-center mt-4">
                       $ 500.00
                    </h2>
                </div>
            </div>
        </div>


    </div>
        <div class="row" >
            <div class="col-xl-12">

                       <ul class="nav nav-tabs" style="margin-left: 6%;">
                                <li class="nav-item" >
                                    <a href="#one" data-toggle="tab" aria-expanded="false"
                                        class="nav-link active" >
                                        <span class="d-block d-sm-none"><small>PRODUCTS</small></span>
                                        <span class="d-none d-sm-block">PRODUCTS</span>
                                    </a>
                                </li>
                                <li class="nav-item" >
                                    <a href="#two" data-toggle="tab" aria-expanded="true"
                                        class="nav-link">
                                        <span class="d-block d-sm-none"><small>ALL ORDERS</small></span>
                                        <span class="d-none d-sm-block">ALL ORDERS</span>
                                    </a>
                                </li>
                                <li class="nav-item" >
                                    <a href="#three" data-toggle="tab" aria-expanded="true"
                                        class="nav-link">
                                        <span class="d-block d-sm-none"><small>TRANSACTIONS</small></span>
                                        <span class="d-none d-sm-block">TRANSACTIONS</span>
                                    </a>
                                </li>
                                <li class="nav-item" >
                                    <a href="#four" data-toggle="tab" aria-expanded="true"
                                        class="nav-link">
                                        <span class="d-block d-sm-none"><small>FINIANCE REPORT</small></span>
                                        <span class="d-none d-sm-block">FINIANCE REPORT</span>
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
                                                        <li class="list-group-item"><a href="">Edit Profile</a></li>
                                                        <li class="list-group-item"><a href="">View Transactions</a></li>
                                                        <li class="list-group-item"><a href="">All Session</a></li>
                                                        <li class="list-group-item"><a href="">Delete</a></li>
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
                                                        <li class="list-group-item"><a href="">Edit Profile</a></li>
                                                        <li class="list-group-item"><a href="">View Transactions</a></li>
                                                        <li class="list-group-item"><a href="">All Session</a></li>
                                                        <li class="list-group-item"><a href="">Delete</a></li>
                                                    </ul>

                                                </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- TAB 2 -->


                                <div class="tab-pane" id="two">

                                 
                                </div>


                                <div class="tab-pane" id="three">
                                  
                                   
                                </div>

                                <div class="tab-pane" id="four">
                                  
                                   
                                </div>


                </div>
            </div>

            <!-- task details -->

        </div>
   </div>

</main>
@endsection

<!-- end::main content -->

