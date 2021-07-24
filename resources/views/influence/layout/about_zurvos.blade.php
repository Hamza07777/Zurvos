@extends('influence.layout.app')

@section('main-content')
<!-- begin::main content -->
<main class="main-content" style="margin-top: 13%;background-color: #ffffff;">

    <div class="row" style="padding: 39px;">
        <div class="col-lg-12">
            <h3><strong>About Fueled</strong></h3>
        </div>
        <div class="col-lg-12">
            <p>{{ $about->text }}</p>
        </div>
    
        
   </div>
   <div class="row" style="padding: 39px;">
    <img src="{{asset('public/aboutimage/'.$about->about_image)}}" class="image-fluid" alt="Shreyu" width="100%" height="100%">

    </div>
    <div class="row" style="padding: 39px;">
        <div class="col-lg-12">
            <h3><strong>Address</strong></h3>
        </div>
        <div class="col-lg-12">
            <p> {{ $about->address }}</p>
        </div>
        
        
              
    </div>
</main>
@endsection

<!-- end::main content -->