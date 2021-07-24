@extends('influence.layout.app')

@section('main-content')
<!-- begin::main content -->
<main class="main-content" style="margin-top: 13%;background-color: #ffffff;">

    <div class="container">
        <div class="row" >
          <div class="col-lg-4 " style="margin-top: 5%">
              <h5>workout Videos</h5>
          </div>
          <div class="col-lg-4">
            
          </div>
   
        </div>
 
        <div class="row" style="margin-top: 5%">
          @foreach ( $workout as $workout)
            
            
              <div class="col-lg-6">
                <h3> {{$workout->libs->video_title  }}</h3>
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="{{asset('/public/TutorialVideo/'.$workout->libs->video_name)}}" allowfullscreen title="$tutorials->course_name"></iframe>
                </div>
              </div>
          @endforeach
         
  
        </div>
    </div>

</main>
@endsection
<!-- end::main content -->