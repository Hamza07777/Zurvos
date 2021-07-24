@extends('admin_layout.app')

@section('main-content')
<!-- begin::main content -->
<main class="main-content" style="margin-top: 13%;background-color: #EEF5FF">

   <div class="container">
            <div class="row p-lg-3">
                <div class="col-lg-12">
                    <h3>Bug Reports</h3>
                </div>
            </div>


            @foreach ($bug as $bug)
            <div class="row p-lg-3 m-lg-5" style="margin-top: 2%;background-color: #ffffff">

                <div class="col-lg-2" >
                    <img src="{{asset('public/userimage/'.$bug->user_image)}}" class="avatar-lg rounded-circle mt-3" alt="Shreyu">
                </div>
                <div class="col-lg-6 ml-lg-5">
                    <h5>{{$bug->name }}</h5>
                    <img src="{{asset('public\assets\ZURVOS_ASSETS\ICONS\Locations.png')}}" class="img-fluid " alt="Shreyu"><span class="ml-3">{{$bug->city }}</span> <br>
                    <img src="{{asset('public\assets\ZURVOS_ASSETS\ICONS\Email.png')}}" class="img-fluid "  style="width: 6%;"alt="Shreyu"><span class="ml-2">{{$bug->email }}</span>

                </div>  
                <div class="col-lg-1 " style=" margin-left: 50px;">
                    <a href="{{ url('admin_delete_bug_reports/'.$bug->id) }}" style="background-color: transparent;color: black;border: none;">Delete</a>


                </div>
                <div class="col-lg-12 mt-4" >
                    <p>{{ $bug->report_message }}</p>
                </div>
                <div class="col-lg-3 mt-4" >
                    <img src="{{asset('public\assets\ZURVOS_ASSETS\ZURVOS_ASSETS\RAW_IMAGES\unnamed.jpg')}}" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">

                </div>
                <div class="col-lg-3 mt-4" >
                    <img src="{{asset('public\assets\ZURVOS_ASSETS\ZURVOS_ASSETS\RAW_IMAGES\unnamed.jpg')}}" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">

                </div>
                <div class="col-lg-3 mt-4" >
                    <img src="{{asset('public\assets\ZURVOS_ASSETS\ZURVOS_ASSETS\RAW_IMAGES\unnamed.jpg')}}" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">

                </div>
            </div>
                
            @endforeach
            

   </div>



</main>
@endsection

<!-- end::main content -->
