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
           <img src="{{asset('public\assets\ZURVOS_ASSETS\RAW_IMAGES\camera.png')}}" class=" rounded-circle" alt="Shreyu" width="5% " style="z-index: 2; margin-left: -5%; background-color: #ffffff;" />
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
    </div>

 </main>
 @foreach ($influence as $influence)
        <main class="main-content" style="margin-top: 4%;background-color: #fff;">

        <div class="container" style="padding: 40px 10px 20px 10px;">
                <div class="row">
                    <div class="card" style="width: 100%;">

                        <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-2">
                                <img src="{{asset($influence->influencer_detail->user_image)}}" class="avatar-xs rounded-circle mr-2" alt="Shreyu" style="width: 3.5rem;height: 3rem; margin-top:16%; margin-left: 10px;">
                            </div>
                            <div class="col-lg-7">
                                <h5>{{ $influence->influencer_detail->full_name }}</h5>
                                <img src="{{asset('public\assets\ZURVOS_ASSETS\ICONS\Locations.png')}}" class="img-fluid" alt="Shreyu">
                                <span>{{  $influence->location}},{{  $influence->checkin }}</span>
                            </div>
                            <div class="col-lg-2">

                            </div>
                            <div class="col-lg-1">
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" style="background: none;
                                    color: black;
                                    border: none;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="{{asset('public\assets\ZURVOS_ASSETS\ICONS\Dot_menu.png')}}" class="image-fluid ml-3" alt="Shreyu" >
                                </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Add links</a>
                                    </div>
                                    </div>
                                </div>
                        </div>
                        </div>
                        <p style="margin-top:3%">{{ $influence->post_title  }}</p>
                        <img src="{{asset('public/postImages/'.$influence->post_image)}}" class="img-fluid" width="100%" alt="Shreyu" >
                        <div class="container-fluid">
                            <div class="row">
                            <div class="col-lg-4">
                                <div class="row" style="    border-right: 1px solid darkgray;
                                margin-top: 8%;">
                                <div class="col-lg-4">
                                    <img src="{{asset('public\assets\ZURVOS_ASSETS\ICONS\Like.png')}}" class="img-fluid" alt="Shreyu" style="margin-left: 62%;">
                                </div>
                                <div class="col-lg-8">
                                    <p>Likes<br>{{$influence->totallikes($influence->id)}}</p>
                                </div>
                                </div>
                            </div>
                                <div class="col-lg-4">
                                <div class="row"  style="    border-right: 1px solid darkgray;
                                margin-top: 8%;">
                                    <div class="col-lg-4">
                                        <img src="{{asset('public\assets\ZURVOS_ASSETS\ICONS\Comments.png')}}" class="img-fluid" alt="Shreyu" style="margin-left: 62%;">
                                    </div>
                                    <div class="col-lg-8">
                                        <p>Comments<br>{{$influence->totalcomments($influence->id)}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="row"  style=" margin-top: 8%;">
                                <div class="col-lg-4">
                                    <img src="{{asset('public\assets\ZURVOS_ASSETS\ICONS\Share.png')}}" class="img-fluid" alt="Shreyu" style="margin-left: 62%;">
                                </div>
                                <div class="col-lg-8">
                                    <p>Shares<br>{{$influence->totalshares($influence->id)}}</p>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>

                    </div>
                </div>

        </div>

     </main>
     @endforeach
@endsection


<!-- end::main content -->
