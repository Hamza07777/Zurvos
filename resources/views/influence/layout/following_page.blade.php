@extends('influence.layout.app')

@section('main-content')
<!-- begin::main content -->
<main class="main-content" style="margin-top: 13%;background-color: #fff;">

   <div class="container" style="padding: 0px 0px 20px 0px;">
    <?php  $coverimage=Auth::guard('influence')->user()->cover_image; ?>
    <img src="{{asset('storage/app/public/'.$coverimage)}}" class="image-fluid" alt="Shreyu" width="100%" height="200px">
    <div class="row">
       <div class="col-lg-12 text-center">
          <?php  $image=Auth::guard('influence')->user()->user_image; ?>
          <img src="{{asset('public/userimage/'.$image)}}" class=" rounded-circle" alt="Shreyu" width="15% " style="z-index: 1; margin-top: -9%;" />
          {{-- <img src="{{asset('public\assets\ZURVOS_ASSETS\RAW_IMAGES\camera.png')}}" class=" rounded-circle" alt="Shreyu" width="5% " style="z-index: 2; margin-left: -5%; background-color: #ffffff;" /> --}}
          <h5>{{ Auth::guard('influence')->user()->full_name }}</h5>
            <h5><a href="http://">${{ Auth::guard('influence')->user()->charges }}</a></h5>
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
      <hr>
      @foreach ($follow as $follow)
      <div class="row p-lg-5 ml-lg-5 ">
          <div class="col-lg-2">
              <img src="{{asset('public/userimage/'.$follow->influencer_following->user_image)}}" class="avatar-lg rounded-circle mt-3" alt="Shreyu">
          </div>
          <div class="col-lg-8 ml-lg-5">
              <h5>{{ $follow->influencer_following->full_name }}</h5>
              <img src="{{asset('public\assets\ZURVOS_ASSETS\ICONS\Locations.png')}}" class="img-fluid" alt="Shreyu">
              <span>{{ $follow->influencer_following->location }}</span><br>
               <form action="{{url('influence/unfolloww/'.$follow->id) }}" method="post">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-primary" style="background-color: #F2F7FC; color:black;">Unfollow</button>

              </form>


          </div>
      </div>
  @endforeach
   </div>

</main>

@endsection


<!-- end::main content -->
