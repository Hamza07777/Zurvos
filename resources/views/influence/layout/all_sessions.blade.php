@extends('influence.layout.app')

@section('main-content')
<!-- begin::main content -->
<main class="main-content" style="margin-top: 13%;background-color:  #EEF5FF;">

   <div class="container">
      <div class="row p-lg-3">
         <div class="col-lg-12">
            <h3>All Sessions</h3>
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
      <div class="row p-lg-3" style="background-color:  #FFFFFF;margin: 21px;">
        <div class="col-lg-1">
            <img src="{{asset('public\assets\images\users\avatar-7.png')}}" class="avatar-xs rounded-circle mr-2" alt="Shreyu" style="width: 2.5rem;height: 2rem; margin-top:57%">
         </div>
        <div class="col-lg-8">
            <h5>Catilyn Thompson</h5>
            <p><a href="http://">Cost - $3.50/Workout</a></p>
        </div>
        <div class="col-lg-3">
            Dec 19,2019
        </div>
        <div class="col-lg-12 " >
            <hr>
        </div>

        <div class="col-lg-6 " >
            <p>Time Spent</p>
        </div>
        <div class="col-lg-6 " style="text-align: right;">
            <p>2hr</p>
        </div>
        <div class="col-lg-6 " >
            <p>Cost</p>
        </div>
        <div class="col-lg-6 " style="text-align: right;">
            <p>$10.00</p>
        </div>
        <div class="col-lg-12 ">
          <div class="row " style="background-color: #F8FAFB; ">
            <div class="col-lg-6 mt-3" >
               <strong><h5>Total</h5></strong>
            </div>
            <div class="col-lg-6 mt-3" style="text-align: right; ">
               <strong><h5>$10.00</h5></strong>
            </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row p-lg-3" style="background-color:  #FFFFFF;margin: 9px;">
        <div class="col-lg-1">
            <img src="{{asset('public\assets\images\users\avatar-7.png')}}" class="avatar-xs rounded-circle mr-2" alt="Shreyu" style="width: 2.5rem;height: 2rem; margin-top:57%">
         </div>
        <div class="col-lg-8">
            <h5>Catilyn Thompson</h5>
            <p><a href="http://">Cost - $3.50/Workout</a></p>
        </div>
        <div class="col-lg-3">
            Dec 19,2019
        </div>
        <div class="col-lg-12 " >
            <hr>
        </div>

        <div class="col-lg-6 " >
            <p>Time Spent</p>
        </div>
        <div class="col-lg-6 " style="text-align: right;">
            <p>2hr</p>
        </div>
        <div class="col-lg-6 " >
            <p>Cost</p>
        </div>
        <div class="col-lg-6 " style="text-align: right;">
            <p>$10.00</p>
        </div>
        <div class="col-lg-12 ">
          <div class="row " style="background-color: #F8FAFB; ">
            <div class="col-lg-6 mt-3" >
               <strong><h5>Total</h5></strong>
            </div>
            <div class="col-lg-6 mt-3" style="text-align: right; ">
               <strong><h5>$10.00</h5></strong>
            </div>
        </div>
      </div>
   </div>

</main>
@endsection

<!-- end::main content -->
