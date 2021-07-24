@extends('layout.app')

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
                
                <img src="{{asset('public/gymimage/'.Auth::guard('gym')->user()->gym_image)}}" class=" rounded-circle" alt="Shreyu" width="15% " style="z-index: 1; margin-top: 9%;" />  
               {{-- <img src="{{asset('public\assets\ZURVOS_ASSETS\RAW_IMAGES\camera.png')}}" class=" rounded-circle" alt="Shreyu" width="5% " style="z-index: 2; margin-left: -5%; background-color: #ffffff;" /> --}}
                <h5>{{ Auth::guard('gym')->user()->full_name }}</h5>  
           

            </div>
         </div>
         <form method="POST" action="{{route('account_setting_update_profile') }}" enctype="multipart/form-data">
           @csrf

         
               <div class="row p-3">
                   <div class="col-lg-12">
                       <h3><strong>Set a new password</strong></h3>
                   </div>
                   <div class="col-lg-12">

                   <hr>
                   </div>
                   <div class="col-lg-12">
                       <div class="form-group">
                            <label for="full_name">Old Password</label>
                            <input type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" id="" aria-describedby="helpId" placeholder="Enter your old password" required style="border: #ffffff;border-bottom:1px solid darkgrey;border-radius:0px" value="">
                            @error('old_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                   </div>


                   <div class="col-lg-12 mt-5">
                    <div class="form-group">
                         <label for="full_name">New Password</label>
                         <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter your new password" required autocomplete="current-password" style="border: #ffffff;border-bottom:1px solid darkgrey;border-radius:0px">
                         @error('password')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                             @enderror
                     </div>

                </div>



                <div class="col-lg-12 mt-5">
                    <div class="form-group">
                         <label for="full_name">Confirmed Password</label>
                         <input id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Confirm your new password" name="password_confirmation" required autocomplete="current-password" style="border: #ffffff;border-bottom:1px solid darkgrey;border-radius:0px">

                         @error('password_confirmation')
                             <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                         @enderror
                     </div>

                </div>
               </div>

               <div class="row p-3">
                   <div class="col-lg-12">
                       <button type="submit" class="btn btn-primary btn-lg" style="width: 100%">UPDATE</button>
                   </div>
               </div>
         </form>
      </div>

   </main>
   @endsection


