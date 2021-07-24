@extends('influence.layout.app')

@section('main-content')
<!-- begin::main content -->
<main class="main-content" style="margin-top: 13%;background-color:  #EEF5FF;">
    <div class="container">
        <div class="row m-5">

        </div>
         <div class="row p-lg-3" style="background-color:  #FFFFFF;margin: 24px;">
            <div class="col-lg-12">
                    <h3>Select Payment Method</h3>

            <form method="POST" action="{{ action('InfluenceeController@add_payment_method_store') }}" enctype="multipart/form-data">
                @csrf
                <div class="col-lg-12">
                    <div class="row">

                        <div class="btn-group" data-toggle="buttons">


                                <div class="col-lg-6">
                                    <label class="btn btn-primary active" style="width: 150%; background-color:#fff; color:black;border:none">
                                        <input type="radio" name="method" id="" autocomplete="off" value="paypal" checked style="margin-right: 18px;"><strong>Paypal</strong>
                                    </label>
                                </div>
                                <div class="col-lg-6">
                                    <label class="btn btn-primary active" style="width: 150%; background-color:#fff; color:black;border:none">
                                        <input type="radio" name="method" id="" autocomplete="off" value="Visa"  style="margin-right: 18px;"> <strong>Visa</strong>
                                    </label>
                                </div>

                        </div>


                     </div>
                </div>
            <div class="col-lg-12 mt-lg-5">
                <label for=""> Card Number</label>
                <input class="form-control" type="text" name="card_number" placeholder="XXXXXXXXX">
            </div>
            <div class="col-lg-12 mt-3">
                <label for=""> CVV Code</label>
                <input class="form-control" type="text" name="cvv_code" placeholder="XXXXXXXXX">
            </div>
            <div class="col-lg-12 mt-3">
                <label for=""> Expire Date</label>
                <input id="datepicker" width="100%" placeholder="2/10/2019" style="padding: 9px"/ name="expire_date">
                    <script>
                        $('#datepicker').datepicker({
                            uiLibrary: 'bootstrap'
                        });
                    </script>

                    <span>
                        <img src="{{asset('public\assets\ZURVOS_ASSETS\ICONS\Calendar.png')}}" class="image-fluid" alt="Shreyu" style=" background: white;z-index: 1;position: relative;float: right;margin-right: 10px; margin-top: -32px; width: 3%;" >
                    </span>
            </div>
            <div class="col-lg-12 mt-lg-3">
                <label for=""> Card Holder Number</label>
                <input class="form-control" type="text" name="card_holder_number" placeholder="XXXXXXXXX">
            </div>
            <div class="col-lg-12 mt-lg-5 mb-lg-5">
                <button type="submit" name="" id="" class="btn btn-primary btn-lg" href="#" role="button" style="width: 100%">ADD PAYMENT DETAIL</button>
            </div>
         </div>
        </form>
    </div>

</main>
@endsection

<!-- end::main content -->
