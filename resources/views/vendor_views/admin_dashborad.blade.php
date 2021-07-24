@extends('admin_layout.app')

   @section('main-content')

   <main class="main-content" style="margin-top: 13%;background-color: #ffffff;">

    <div class="container">
     
       <div class="row ">
          <div class="col-lg-5 m-4" style="background-color: #EEF5FF;">
             <div class="row pt-4 pb-4">
                <div class="col-lg-4 ">
                   <img src="{{asset('public\assets\ZURVOS_ASSETS\IMAGES\WEB\Icon_1.png')}}" class="avatar-md rounded-circle mt-3" width="100%" alt="Shreyu" style="background:white; padding: 10px;" >  
                </div>
                <div class="col-lg-8">
                   <h3><strong>{{ $total_user }}</strong></h3>
                   <h5>Total Users</h5>
                </div>
             </div>
          </div>
          <div class="col-lg-5 m-4" style="background-color: #EEF5FF;">
             <div class="col-lg-12">
                <div class="row pt-4 pb-4">
                   <div class="col-lg-4">
                      <img src="{{asset('public\assets\ZURVOS_ASSETS\IMAGES\WEB\Icon_1.png')}}" class="avatar-md rounded-circle mt-3" width="100%" alt="Shreyu" style="background:white; padding: 10px;" >  
                   </div>
                   <div class="col-lg-8">
                      <h3><strong>{{ $total_gym }}</strong></h3>
                      <h5>Total Gyms </h5>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-lg-5 m-4" style="background-color: #EEF5FF;">
            <div class="col-lg-12">
               <div class="row pt-4 pb-4">
                  <div class="col-lg-4">
                     <img src="{{asset('public\assets\ZURVOS_ASSETS\IMAGES\WEB\Icon_7.png')}}" class="avatar-md rounded-circle mt-3" width="100%" alt="Shreyu" style="background:white; padding: 10px;" >  
                  </div>
                  <div class="col-lg-8">
                    <h3><strong>{{ $total_partner }}</strong></h3>
                    <h5>Total Affiliate Partner</h5>
                     
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-5 m-4" style="background-color: #EEF5FF;">
            <div class="col-lg-12">
               <div class="row pt-4 pb-4">
                  <div class="col-lg-4">
                     <img src="{{asset('public\assets\ZURVOS_ASSETS\IMAGES\WEB\Icon_7.png')}}" class="avatar-md rounded-circle mt-3" width="100%" alt="Shreyu" style="background:white; padding: 10px;" >  
                  </div>
                  <div class="col-lg-8">
                    <h3><strong>{{ $verfied_user  }}</strong></h3>
                     <h5>Total Verified Users </h5>
                  </div>
               </div>
            </div>
         </div>
  
       </div>
       <div class="row" style="margin-left: 0%;margin-right: 0%;margin-top:5%;padding-bottom: 5%;" >
        <h2>Total Register Users</h2>
       </div>
       @foreach ($user as $user)
       <div class="row" style="margin-left: 0%;margin-right: 0%;margin-top:5%;padding-bottom: 5%;" >

        <div class="col-lg-2 " style="background-color: white;">
            <img src="{{ asset('public/userimage'.$user->user_image)}}" class="avatar-xs rounded-circle mr-2" alt="Shreyu" style="width: 3.5rem;height: 4rem; margin-top:19%;margin-left: 35%;">
        </div>
        <div class="col-lg-9" style="background-color: white">
            <h5>{{ $user->name }}</h5>
            <img src="{{asset('public\assets\ZURVOS_ASSETS\ICONS\Locations.png')}}" class="img-fluid  mr-lg-2" alt="Shreyu"><span>{{ $user->city }}</span>

            <a href="#" > <p class="ml-lg-4">Date:{{ $user->created_at }}</p></a>
        </div>
        <div class="col-lg-1 " style="margin-top: -3%">
            <div class="dropdown ">

                    <button style="border: none;background-color: white;" class=" dropdown-toggle" type="button" data-toggle="dropdown"><i data-feather="more-vertical" style="margin-top:28px; color: blue"></i></button>
                    <ul class="dropdown-menu " style="width: 80%;margin-left: -97px;margin-top: 13px;">
                        <li class="list-group-item"><a href="{{ route('view_user_profile',$user->cust_id)  }}">View Profile</a></li>
                        <li class="list-group-item"><a href="{{ route('user_chk_in',$user->cust_id) }}">Session History</a></li>
                    </ul>

                </div>
        </div>
     </div>
       @endforeach
       

    </div>
 
 </main>
   @endsection
