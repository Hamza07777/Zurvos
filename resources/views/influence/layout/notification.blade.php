@extends('influence.layout.app')

@section('main-content')
<!-- begin::main content -->
<main class="main-content" style="margin-top: 13%;background-color:white;">

    <div class="container">
      <div class="row">
        <div class="col-md-2">
          <h4>Notifications</h4>
        </div>
        <div class="col-md-8"></div>
        <div class="col-md-2 " style="margin-top: 2%;"><a href="{{route('notification_page')}}">See all</a> </div>
      </div>
      <div class="row">
        <div class="col-md-2 " style="margin-top: 2%;"><a href="{{route('notification_page_today')}}">Today</a> </div>
        <div class="col-md-2 " style="margin-top: 2%;"><a href="{{route('notification_page_yesterday')}}">Yesterday</a> </div> 

      </div>
      <hr>
      @foreach ($post as $post)

            <div class="row">
                <div class="col-md-2 ">
                    <?php  $image=Auth::guard('influence')->user()->user_image; ?>

                    <img src=" {{asset('public/userimage/'.$image)}}"  class="avatar-xs rounded-circle mr-2" alt="Shreyu" style="width: 3.5rem;height: 3rem; z-index:1; ">
                <img src="  {{$post->user_noti_customer->user_image}}" class="avatar-xs rounded-circle mr-2" alt="Shreyu" style="width: 3.5rem;height: 3rem; z-index:2; margin-top: -66%; margin-left: 19%;">

                </div>
                <div class="col-md-8" style="margin-top: 14px;"><p>{{ $post->message }} ( {{ date("d-m-y", strtotime($post->created_at))}}) </p> </div>
                <div class="col-md-2" >
                <img src="{{asset('public/postImages/'.$post->user_noti_post->post_image)}}" class="avatar-xs mr-2" alt="Shreyu" style="width: 3.5rem;height: 3rem; margin-top: 0%;">
                </div>

            </div>
      @endforeach
    </div>

</main>
@endsection
<!-- end::main content -->
