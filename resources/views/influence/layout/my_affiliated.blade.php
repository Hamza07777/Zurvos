@extends('influence.layout.app')

@section('main-content')
<!-- begin::main content -->
<main class="main-content" style="margin-top: 13%;background-color: #ffffff;">

   <div class="container">
      <div class="row p-lg-3">
         <div class="col-lg-12">
            <h3>Affiliate user statistics</h3>
            <div class="row">
               <div class="col-lg-5">
                  <input id="datepicker" width="270" style="padding: 9px"/>
                  <script>
                      $('#datepicker').datepicker({
                          uiLibrary: 'bootstrap'
                      });
                  </script>
                 
                  <span>
                      <img src="{{asset('public\assets\ZURVOS_ASSETS\ICONS\Calendar.png')}}" class="image-fluid" alt="Shreyu" style=" background: white;z-index: 1;position: relative;float: right;margin-right: -27px; margin-top: -32px; width: 9%;" >
                  </span>
              </div>

              <div class="col-lg-6 ml-5">
                  <input id="datepicker1" width="270" style="padding: 9px"/>
                  <span>
                      <img src="{{asset('public\assets\ZURVOS_ASSETS\ICONS\Calendar.png')}}" class="image-fluid" alt="Shreyu" style=" background: white;z-index: 1;position: relative;float: right;margin-right: 21px;margin-top: -34px;width: 8%;
                  }" >
                  </span>
                  <script>
                      $('#datepicker1').datepicker({
                          uiLibrary: 'bootstrap'
                      });
                  </script>
              </div>
           </div>
         </div>
      </div>
      <div class="row ">
         <div class="col-lg-5 m-4" style="background-color: #EEF5FF;">
            <div class="row pt-4 pb-4">
               <div class="col-lg-4 ">
                  <img src="{{asset('public\assets\ZURVOS_ASSETS\IMAGES\WEB\Icon_4.png')}}" class="avatar-md rounded-circle mt-3" width="100%" alt="Shreyu" style="background:white" >  
               </div>
               <div class="col-lg-8">
                  <h3><strong>{{ $influencer }}</strong></h3>
                  <h5>People signed up through affiliated links</h5>
               </div>
            </div>
         </div>
         <div class="col-lg-5 m-4" style="background-color: #EEF5FF;">
            <div class="col-lg-12">
               <div class="row pt-4 pb-4">
                  <div class="col-lg-4">
                     <img src="{{asset('public\assets\ZURVOS_ASSETS\IMAGES\WEB\Icon_7.png')}}" class="avatar-md rounded-circle mt-3" width="100%" alt="Shreyu" style="background:white" >  
                  </div>
                  <div class="col-lg-8">
                     <h3><strong>${{ Auth::guard('influence')->user()->	charges }}</strong></h3>
                     <h5>Total Earned </h5>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <canvas id="myChart" style="max-width: 500px;"></canvas>
   </div>

</main>
@endsection

<!-- end::main content -->