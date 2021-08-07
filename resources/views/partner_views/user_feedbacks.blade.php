@extends('partner_layout.app')

@section('main-content')
<!-- begin::main content -->
<main class="main-content" style="margin-top: 13%;background-color: #EEF5FF">

   <div class="container">
      <div class="row p-lg-3">
         <div class="col-lg-12">
            <h3>User Feedback</h3>
         </div>
      </div>


      @foreach ($feedback as $feedback)
          
     
            <div class="row p-lg-3 m-lg-5" style="margin-top: 2%;background-color: #ffffff">

                <div class="col-lg-2" >
                    <img src="{{asset('public/userimage/'.$feedback->user_image)}}" class="avatar-lg rounded-circle mt-3" alt="Shreyu">
                </div>
                <div class="col-lg-6 ml-lg-5">
                    <h5>{{$feedback->name }}</h5>
                    <img src="{{asset('public\assets\ZURVOS_ASSETS\ICONS\Locations.png')}}" class="img-fluid " alt="Shreyu"><span class="ml-3">{{$feedback->city }}</span> <br>
                    <img src="{{asset('public\assets\ZURVOS_ASSETS\ICONS\Email.png')}}" class="img-fluid "  style="width: 6%;"alt="Shreyu"><span class="ml-2">{{$feedback->email }}</span>

                </div>
                <div class="col-lg-1 " style=" margin-left: 50px;">
                    <a href="{{ url('admin_delete_feedbacks/'.$feedback->id) }}" style="background-color: transparent;color: black;border: none;">Delete</a>


                </div>
                <div class="col-lg-12 mt-4" >
                    <h3><strong>"{{$feedback->feedback }}"</strong></h3>
                    <p> {{$feedback->improvement }} </p>
                </div>
               
            </div>

            @endforeach
            
   </div>



</main>
@endsection

<!-- end::main content -->
