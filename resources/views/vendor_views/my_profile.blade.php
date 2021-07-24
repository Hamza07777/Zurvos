@extends('vendor_layout.app')

   @section('main-content')
   <!-- begin::main content -->
   <main class="main-content" style="margin-top: 11%;background-color: #ffffff;">

      <div class="container" style="padding: 0px;">

         <div class="row" style="background-color: #E6E6E6;height: 220px;">
            <div class="col-lg-12 text-center">
                <img src="{{asset('public/assets/images/users/avatar-7.png')}}" class="avatar-lg rounded-circle  mt-lg-5" alt="Shreyu" style="">

               {{-- <img src="{{asset('public\assets\ZURVOS_ASSETS\RAW_IMAGES\camera.png')}}" class=" rounded-circle" alt="Shreyu" width="5% " style="z-index: 2; margin-left: -5%; background-color: #ffffff;" /> --}}
                <h5>Hamza</h5>


            </div>
         </div>
         <form method="POST" action="{{ route('vendor_profile_update_save') }}" enctype="multipart/form-data">
           @csrf


               <div class="row p-5">
               
        
                   <div class="col-lg-12">
                       <h3><strong>Change Password</strong></h3>
                   </div>

                   <div class="col-lg-12 mt-5">
                    <div class="form-group">
                        <label for="full_name">Old Password</label>
                        <input id="password" type="password" class="form-control pr-lg-5 @error('password') is-invalid @enderror" name="old_password" placeholder="Enter your new password" required autocomplete="current-password" >
                        <i data-feather='eye-off' class='' style="position: absolute;margin-left: 90%;margin-top: -5%; "></i>
  
                        @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="form-group">
                         <label for="full_name">New Password</label>
                         <input id="password" type="password" class="form-control pr-lg-5 @error('password') is-invalid @enderror" name="password" placeholder="Enter your new password" required autocomplete="current-password" >
                         <i data-feather='eye-off' class='' style="position: absolute;margin-left: 90%;margin-top: -5%; "></i>

                         @error('password')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                             @enderror
                     </div>
                     <div class="form-group">
                        <label for="full_name">Confirmed Password</label>
                        <input id="password_confirmation" type="password" class="form-control pr-lg-5 @error('password_confirmation') is-invalid @enderror" placeholder="Confirm your new password" name="password_confirmation" required autocomplete="current-password">

                        <i data-feather='eye-off' class='' style="position: absolute;margin-left: 90%;margin-top: -5%; "></i>

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
                       <button type="submit" class="btn btn-primary btn-lg" style="width: 100%">SET A NEW PASSWORD</button>
                   </div>
               </div>
         </form>
      </div>

   </main>
   @endsection


