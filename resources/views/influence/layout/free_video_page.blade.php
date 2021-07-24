@extends('influence.layout.app')

@section('main-content')
<!-- begin::main content -->
<main class="main-content" style="margin-top: 13%;background-color: #ffffff;">

    <div class="container">
        <div class="row" >
          <div class="col-lg-4 " style="margin-top: 5%">
              <h5>Fitness Videos</h5>
          </div>
          <div class="col-lg-4">
            
          </div>
            <div class="col-lg-4 mb-4" style="margin-top: 5%">

                <div class="input-group md-form form-sm form-2 pl-0">
                  <a href="{{ route('search_video_page_load') }}">Search Video</a>
                  {{--  <input class="form-control my-0 py-1 amber-border" type="text" placeholder="Search by name" aria-label="Search" style="border:none">  --}}
                  {{--  <div class="input-group-append">
                    <span class="input-group-text  lighten-3" id="basic-text1" style="border-radius:0px;border:none;background-color:white"> <i data-feather="search" style="margin-top:-3px;"></i></span>
                  </div>  --}}
                </div>
            </div> 
        </div>
        <div class="row">
            
          <div class="col-lg-8">
            <nav class="nav nav-pills flex-column flex-sm-row" style="background: #ffffff">
              <a class="flex-sm-fill text-sm-center nav-link active" href="{{route('free_video_page')}}">Free Videos</a>
              <a class="flex-sm-fill text-sm-center nav-link" href="{{route('paid_video_page')}}">Paid Videos</a>
            </nav>
          </div>
        </div>
        <div class="row" style="margin-top: 5%">
          @foreach ( $tutorials as $tutorials)
          <div class="col-lg-6">
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="{{asset('/public/TutorialVideo/'.$tutorials->course_videos)}}" allowfullscreen autoplay="0" title="$tutorials->course_name"></iframe>
            </div>
          </div>
          @endforeach
         
  
        </div>
    </div>

</main>
@endsection
<!-- end::main content -->