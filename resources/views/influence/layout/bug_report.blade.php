@extends('influence.layout.app')

@section('main-content')
<!-- begin::main content -->
<main class="main-content" style="margin-top: 13%;background-color:  #EEF5FF;">
    <div class="container">
        <div class="row m-5">

        </div>
      <div class="row p-lg-3" style="background-color:  #FFFFFF;margin: 24px;">
            <div class="col-lg-12">
                    <h3>Bug Report</h3>
            </div>
        <div class="col-lg-12">
            <form method="POST" action="{{ action('InfluenceeController@bug_report_store') }}" enctype="multipart/form-data">
                @csrf

            <div class="col-lg-12 mt-lg-5">
                <label for=""> Email Address</label>
                <input class="form-control" type="email" name="" placeholder="someone@gmail.com">
            </div>
            <div class="col-lg-12 mt-lg-3">

                <div class="form-group">
                    <label for=""> Whats went wrong?</label>
                    <textarea id="my-textarea" class="form-control" name="report_message" rows="3">Message...</textarea>
                </div>
                <p>Character limit 30</p>
            </div>
            {{--  <div class="col-lg-3 " style="background-color: #EEF5FF;padding: 27px; width: 15%; float:left;height:78px" >

            </div>
            <div class="col-lg-3 " style="background-color: #EEF5FF;padding: 27px; width: 15%; float: left; margin-left:20px" >
                <img src="{{'public\assets\ZURVOS_ASSETS\ICONS\Play-2.png'}}" class="avatar-xs rounded-circle mr-2" alt="Shreyu" >
            </div>  --}}
            <div class="col-lg-12 mt-lg-5" >
                <a name="" id="" class="btn btn-primary btn-lg" href="#" role="button" style="width: 100%;background-color: #EEF5FF;color:black ;border:none;margin-top: 7%;">TAKE A SCREEN RECORDING</a>
            </div>
            <div class="col-lg-12 mt-lg-1 " >
                <a name="" id="" class="btn btn-primary btn-lg" href="#" role="button" style="width: 100%;background-color: #EEF5FF;color:black;border:none">TAKE A SCREENSHOT</a>
            </div>
            <div class="col-lg-12 mt-lg-1 " >
                <input id="image" class="p-0" required name="image" type="file" accept="image/jpeg, image/png, application/pdf" required style=" border: none;padding-bottom: 10%; margin-left: 37%;"/>

            </div>
            <div class="col-lg-12 mt-lg-5 mb-lg-5" >
                <button type="submit" name="" id="" class="btn btn-primary btn-lg" href="#" role="button" style="width: 100%;">Send</button>
            </div>
         </div>
      </div>
   </div>

</main>
@endsection

<!-- end::main content -->
