@extends('influence.layout.app')

@section('main-content')
<!-- begin::main content -->
<main class="main-content" style="margin-top: 13%;background-color: #ffffff;">

   <div class="container" style="background-color: #ffffff;">
      <div class="row p-lg-3">
         <div class="col-lg-12">
            <h3>My Orders List</h3>
         </div>
      </div>

      <div class="row p-lg-3" style="margin-top: 2%;background-color:  #ffffff;">
            <div class="col-lg-4"  style="background-color: #ffffff;">
                <img src="{{asset('public/productImages/'.$order->product->product_image)}}" class="image-fluid" alt="Shreyu" width="100%" height="100%">

             </div>
          <div class="col-lg-6" style="background-color: #ffffff;">
            <h5>{{ $order->product->product_name }}</h5>
            <p><a href="">price:${{ $order->product->product_price }}</a></p>
            <p><a href="">Amount 1 units</a></p>
         </div>
         <div class="col-lg-2" style="background-color: #ffffff;">
            <form action="{{action('InfluenceeController@destroy',$order->id)}}" method="POST" style="float: right ;margin-right: -7%;">
                @csrf
                @method('DELETE')

                <button type="submit" style="border: none;color: red; background-color: #F9F9F9;"><i class="fa fa-trash " style="font-size: 16px;"></i>Cancel x</button>
            </form>

         </div>

      </div>

    </div>
         <div class="container">
            <div class="row"  style="padding-left:3%; padding-right:3%; margin-top:-3%">
               <div class="col-lg-12"  style="background-color: #ffffff; padding: 27px;">
                  <h3>Shipping Address</h3>
              <p>{{ $order->address }}</p>
               </div>
               <div class="col-lg-12" style="background-color: #ffffff; padding-left: 27px; padding-right: 27px;">
                  <hr>
                  <h5 style="float:left">Amount</h5>
                  <h5 style="float:right">1</h5>
               </div>
               <div class="col-lg-12" style="background-color: #ffffff; padding-left: 27px; padding-right: 27px;">
                  <h5 style="float:left">Cost</h5>
                  <h5 style="float:right">${{ $order->product->product_price }}</h5>
               </div>

               <div class="col-lg-12" style="background-color: #ffffff; padding-left: 27px; padding-right: 27px;">
                  <hr>
                  <h3 style="float:left"><strong>Total Cost</strong> </h3>
                  <h3 style="float:right">${{ $order->product->product_price }}</h3>
               </div>
               <div class="col-lg-12" style="padding-left: 27px; padding-right: 27px;margin-top: 10%;margin-bottom: 10%;">
                  <button class="btn btn-primary btn-lg" type="button" style=" width: 100%;">Pay now</button>
               </div>
             </div>
            </div>

</main>
@endsection

<!-- end::main content -->
