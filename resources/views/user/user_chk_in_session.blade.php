@extends('layout.app')

   @section('main-content')

   <main class="main-content" style="margin-top: 13%;background-color: #EEF5FF">

    <div class="container">
        <div class="row p-lg-3 mt-lg-5">
            <div class="col-lg-6 text-center">
                <h5> <a href="{{ url('user_chk_in/'.$id) }}">USER CHECK-IN</a> </h5>

            </div>
            <div class="col-lg-6 text-center">
                <h5> <a href="{{ url('user_chk_out/'.$id) }}">USER CHECK-OUT</a></h5>

            </div>
            <div class="col-lg-12 ">
                <hr>
            </div>
            <div class="col-lg-12 ">
                <div class="dropdown" style="float: right;">
                    <button style="border: none;background-color: white;" class="btn-lg dropdown-toggle" type="button" data-toggle="dropdown">Filter<i data-feather="more-vertical" style="color: blue"></i></button>
                    <ul class="dropdown-menu " style="width: 80%;margin-left: -64px;">
                        <li class="list-group-item">
                            <form method="POST" action="{{route('user_chk_in_week') }}" enctype="multipart/form-data" >
                                @csrf
                                <input type="hidden" name="user_id" value="{{$id}}">
                                <button class="btn btn-primary" type="submit" style="width:100%">Week</button>
                            </form>
                        </li>
                        <li class="list-group-item">
                            <form method="POST" action="{{route('user_chk_in_month') }}" enctype="multipart/form-data" >
                                @csrf
                                 <input type="hidden" name="user_id" value="{{$id}}">
                                <button class="btn btn-primary" type="submit" style="width:100%">Month</button>
                            </form>
                        </li>
                        <li class="list-group-item">
                            <form method="POST" action="{{route('user_chk_in_year') }}" enctype="multipart/form-data" >
                                @csrf
                                 <input type="hidden" name="user_id" value="{{$id}}">
                                <button class="btn btn-primary" type="submit" style="width:100%">Year</button>
                            </form>
                        </li>
                    </ul>
                </div>


            </div>
        </div>

        <div class="row p-lg-3">
            <div class="col-lg-12">
                <h5>User Total Checkin {{ $user_chk->count() }}</h5>
            </div>
        </div>
    </div>

        <div class=" container pl-lg-3 pr-lg-3">
            @foreach ($user_chk as $user_chk)


                <div class="row p-lg-5" style="background-color: #ffffff">

                    <div class="col-lg-2">
                        <img src="{{asset('public/userimage/'.$user_chk->user_image)}}" class="image-fluid rounded-circle mr-2 mt-1" alt="Shreyu" style="    width: 100%;">
                    </div>
                    <div class="col-lg-6">
                        <h5>{{ $user_chk->name }}</h5>
                        <p class="float-left pt-3">{{ date('H:i:s', strtotime($user_chk->check_in)) }}</p>
                        <p class="float-right pt-3">{{ date('d.F.Y', strtotime($user_chk->check_in)) }}</p>
                    </div>
                    <div class="col-lg-3">
                    </div>
                    <div class="col-lg-1 " style="margin-top: -3%;">
                        <div class="dropdown ">

                                <button style="border: none;background-color: white;" class=" dropdown-toggle" type="button" data-toggle="dropdown"><i data-feather="more-vertical" style="margin-top:28px; color: blue"></i></button>
                                <ul class="dropdown-menu " style="width: 80%;margin-left: -141px;margin-top: 13px;">
                                    <li class="list-group-item"><a href="{{ url('view_profile/'.$id) }}">View Profile</a></li>
                                    <!--<li class="list-group-item"><a href="#">Session History</a></li>-->
                                </ul>

                            </div>
                    </div>
                </div>
                <hr>
                @endforeach
        </div>






</main>

   @endsection
