@extends('influence.layout.app')

@section('main-content')
<!-- begin::main content -->
<main class="main-content" style="margin-top: 13%;background-color: #F1F7FC;">
  <div class="container">
    <div class="row" >
      <div class="col-lg-1"></div>
      <div class="col-lg-3 " style="margin-top: 5%">
        <a href="{{ route('transaction_sto') }}"><p>DEBETED</p></a>
      </div>
      <div class="col-lg-3 " style="margin-top: 5%">

        <a href="{{ route('credit_store') }}"><p>CREDITED</p></a>
    </div>
    <div class="col-lg-3" style="margin-top: 5%">
      <a href="{{ route('credit_store') }}"><p>WITH DRAW</p></a>

      </div>
      <div class="col-lg-1"></div>
    </div>
    <hr>
    @foreach ($product as $product)
    <div class="row" style="margin-top: 5%;background-color: #ffffff;">
            <div class="col-lg-6 " style="margin-top: 5%">
                    <p><a href="#">ID:#{{ $product->id }}</a></p>
            </div>
            <div class="col-lg-6 " style="text-align: right; margin-top: 2%">
                  <p>{{ date("Y-m-d", strtotime($product->created_at))}}</p>
            </div>
            <div class="col-lg-12" >
                <p>{{ $product->payment_method }}t</p>
            </div>
            <div class="col-lg-12 ">
              <div class="row " style="background-color: #F8FAFB; ">
                <div class="col-lg-6 mt-3" >
                   <strong><h5>Total</h5></strong>
                </div>
                <div class="col-lg-6 mt-3" style="text-align: right; ">
                   <strong><h5>${{ $product->deposit_amount }}</h5></strong>
                </div>
            </div>
          </div>


    </div>
    @endforeach
  </div>


</main>
@endsection
<!-- end::main content -->
