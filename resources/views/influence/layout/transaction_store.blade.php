@extends('influence.layout.app')

@section('main-content')
<!-- begin::main content -->
<main class="main-content" style="margin-top: 13%;background-color: #F1F7FC;">
  <div class="container">
    <div class="row" >
      <div class="col-lg-1"></div>
      <div class="col-lg-3 " style="margin-top: 5%">
        <a href="{{ route('transaction_sto') }}"><p>DEBITED</p></a>
      </div>
      <div class="col-lg-3 " style="margin-top: 5%">

        <a href="{{ route('credit_store') }}"><p>CREDITED</p></a>
    </div>
    <div class="col-lg-3" style="margin-top: 5%">
      <a href="{{ route('credit_store') }}"><p>WITHDRAW</p></a>
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
                <p>{{ $product->product->product_name }}|1</p>
            </div>
            <div class="col-lg-12" >
                <p><a href="#">Cost: ${{ $product->product->product_price }}</a></p>
            </div>
              <hr>
            <div class="col-lg-6 " >
                <p>Cost</p>
            </div>
            <div class="col-lg-6 " style="text-align: right;">
                <p>${{ $product->product->product_price }}</p>
            </div>
            <div class="col-lg-12 ">
              <div class="row " style="background-color: #F8FAFB; ">
                <div class="col-lg-6 mt-3" >
                   <strong><h5>Total</h5></strong>
                </div>
                <div class="col-lg-6 mt-3" style="text-align: right; ">
                   <strong><h5>${{ $product->product->product_price }}</h5></strong>
                </div>
            </div>
          </div>

    </div>
    @endforeach
  </div>


</main>
@endsection
<!-- end::main content -->
