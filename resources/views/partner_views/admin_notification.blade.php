@extends('partner_layout.app')

   @section('main-content')
   
   <main class="main-content" style="margin-top: 13%;background-color:white;">

    <div class="container">
      <div class="row">
        <div class="col-md-2">
          <h4>Notifications</h4>
        </div>
        <div class="col-md-8"></div>
        <div class="col-md-2 " style="margin-top: 2%;"><a href="#">See all</a> </div>
      </div>
      <div class="row">
        <div class="col-md-2 " style="margin-top: 2%;"><a href="#">Today</a> </div>
        <div class="col-md-2 " style="margin-top: 2%;"><a href="#">Yesterday</a> </div>

      </div>
      <hr>
   

            <div class="row">
                <div class="col-md-2 ">
              

                    <img src=" {{asset('public/assets/images/users/avatar-7.png')}}"  class="avatar-xs rounded-circle mr-2" alt="Shreyu" style="width: 3.5rem;height: 3rem; z-index:1; ">
                <img src="  {{asset('public/assets/images/users/avatar-7.png')}}" class="avatar-xs rounded-circle mr-2" alt="Shreyu" style="width: 3.5rem;height: 3rem; z-index:2; margin-top: -66%; margin-left: 19%;">

                </div>
                <div class="col-md-8" style="margin-top: 14px;"><p>Notification 23min </p> </div>
                <div class="col-md-2" >
                <img src="{{asset('public/assets/images/users/avatar-7.png')}}" class="avatar-xs mr-2" alt="Shreyu" style="width: 3.5rem;height: 3rem; margin-top: 0%;">
                </div>

            </div>
      
    </div>

</main>

   @endsection