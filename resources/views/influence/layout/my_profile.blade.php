@extends('influence.layout.app')

@section('main-content')
<!-- begin::main content -->
<main class="main-content" style="margin-top: 13%;background-color: #fff;">

   <div class="container" style="padding: 0px 0px 20px 0px;">
      <?php  $coverimage=Auth::guard('influence')->user()->cover_image; ?>
    <img src="{{asset('public/userimage/'.$coverimage)}}" class="image-fluid" alt="Shreyu" width="100%" height="200px">
    <div class="row">
       <div class="col-lg-12 text-center">
         
          @if (!empty(Auth::guard('influence')->user()->user_image))
          <img src=" {{asset('public/userimage/'.Auth::guard('influence')->user()->user_image)}}" class=" rounded-circle" alt="Shreyu" width="15% " style="z-index: 1; margin-top: -5%;    height: 73px;">

      @else
      <img src=" {{asset('public/assets/images/users/avatar-7.png')}}" class=" rounded-circle" alt="Shreyu" width="15% " style="z-index: 1; margin-top: -5%;    height: 73px;">

      
      @endif 
          
          
          {{-- <img src="{{asset('public\assets\ZURVOS_ASSETS\RAW_IMAGES\camera.png')}}" class=" rounded-circle" alt="Shreyu" width="5% " style="z-index: 2; margin-left: -5%; background-color: #ffffff;" /> --}}
          <h5>{{ Auth::guard('influence')->user()->name }}</h5>
            {{-- <h5><a href="http://">${{ Auth::guard('influence')->user()->charges }}</a></h5> --}}
         </div>
         <div class="col-lg-12">
            <div class="row">
               <?php  $id=Auth::guard('influence')->user()->id; ?>
               <div class="col-lg-4 text-right">
                  <a href="{{ route('posts_page') }}">{{ Auth::guard('influence')->user()->totalposts($id) }}<span> Posts</span></a>
               </div>
               <div class="col-lg-4 text-center">
                  <a href="{{ route('followers_page') }}">{{ Auth::guard('influence')->user()->totalfollow($id) }}<span> Followers</span></a>
               </div>
               <div class="col-lg-4 text-left">
                  <a href="{{ route('following_page') }}">{{ Auth::guard('influence')->user()->totalfollower($id) }}<span> Following</span></a>
               </div>
            </div>
         </div>
      </div>
   </div>

</main>
<main class="main-content" style="margin-top: 4%;background-color: #fff;">

   <div class="container" style="padding: 40px 10px 20px 10px;">
         <div class="row">
            <div class="col-lg-12">
                  <h3>Bio</h3>
                  <p>{{ Auth::guard('influence')->user()->bio }}</p>
               </div>
            <div class="col-lg-12 mt-5">
               <h3>Gallery</h3>
               <div class="row mt-5 no-gutters">
                  @foreach ($post as $post)
                  <div class="col-lg-3 ">
                     <img src="{{asset('public/postImages/'.$post->post_image)}}" class="image-fluid" alt="Shreyu" width="100%" >
                  </div>
                  @endforeach


               </div>
         </div>
         </div>
   </div>

</main>
@endsection


<!-- end::main content -->
