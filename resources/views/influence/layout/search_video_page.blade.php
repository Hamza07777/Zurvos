@extends('influence.layout.app')

@section('main-content')
<!-- begin::main content -->
<main class="main-content" style="margin-top: 13%;background-color: #ffffff;">

    <div class="container">
        <div class="row" >
          <div class="col-lg-4 " style="margin-top: 5%">
              <h5>Fitness Videos</h5>
          </div>
        </div>
        <div class="row">
            <div class="col-lg-12 mb-4" style="margin-top: 5%">
              <form action="{{route('search_video_page') }}" method="post">
                @csrf
                <div class="input-group md-form form-sm form-2 pl-0" style="border: 1px solid;border-radius: 4px;">
                  <div class="input-group-append">
                    <span class="input-group-text  lighten-3" id="basic-text1" style="border-left: 1px solid;border-right: 0px;border-radius: 4px;background-color:white"> <i data-feather="search" style="margin-top:-3px;"></i></span>
                  </div>
                  <input class="form-control my-0 py-1 amber-border" type="text" name="video_keyword" placeholder="Search by name" aria-label="Search" style="border:none">
                </div>
              </form>
            </div>
        </div>
 
        <div class="row" style="margin-top: 5%">
          @if(@isset($tutorials))
              @foreach ( $tutorials as $tutorials)
              <div class="col-lg-6">
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="{{asset('public/TutorialVideo/'.$tutorials->course_videos)}}" allowfullscreen title="$tutorials->course_name"></iframe>
                </div>
              </div>
              @endforeach
          @endif    
        </div>
    </div>

</main>
@endsection
<!-- end::main content -->
