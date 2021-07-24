@extends('admin_layout.app')

   @section('main-content')
   <!-- begin::main content -->
   <main class="main-content" style="margin-top: 11%;background-color: #ffffff;">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
      <div class="container" style="padding: 0px;">

         <div class="row" style="background-color: #E6E6E6;height: 220px;">
            <div class="col-lg-12 text-center">
            
            <img src="{{asset('public/userimage/'.$user->user_image)}}" class="image-fluid rounded-circle mr-2 mt-5" alt="Shreyu" style="width: 28%; ">
            <h3>{{ $user->name }}</h3>

            </div>
         </div>
            <div class="col-lg-12">
            <div class="row">
               
               <div class="col-lg-4 text-right">
                  <h4>   Posts: {{ $totalposts }}</h4>
               </div>
               <div class="col-lg-4 text-center">
                  <h4>  Followers:  {{ $totalfollower }}</h4>
               </div>
               <div class="col-lg-4 text-left">
                  <h4> Following: {{ $totalfollowing }}</h4>
               </div>
            </div>
         </div>
        <div class="row" style="padding: 36px;">
            <div class="col-lg-12">
            <h3>Email: {{ $user->email }}</h3>

            </div>
            <div class="col-lg-12">
            <h3>Phone Number: {{ $user->phone_number }}</h3>

            </div>
            <div class="col-lg-12">
            <h3>City: {{ $user->city }}</h3>

            </div>
            <div class="col-lg-12">
            <h3>T Shirt Size: {{ $user->t_shirt_size }}</h3>

            </div>
            <div class="col-lg-12">
            <h3>Gender: {{ $user->gender }}</h3>

            </div>
         </div>
      </div>

   </main>
   @endsection


