@extends('influence.layout.app')

@section('main-content')
<!-- begin::main content -->
<main class="main-content" style="margin-top: 13%;background-color: #EEF5FF">

   <div class="container">
      <div class="row p-lg-3">
         <div class="col-lg-12">
            <h3>My Orders List</h3>
         </div>
      </div>
      @foreach ($order as $order)


            <div class="row p-lg-3" style="margin-top: 2%;background-color: #EEF5FF">

                <div class="col-lg-4">

                    <img src="{{asset('public/productImages/'.$order->product->product_image)}}" class="image-fluid" alt="Shreyu" width="100%" height="100%">

                    </div>
                <div class="col-lg-6" style="">
                    <h5>{{ $order->product->product_name }}</h5>
                    <p><a href="">price:${{ $order->product->product_price }}</a></p>
                    <p><a href="{{ url('influence/my_orders_detail/'.$order->id) }}">View detail</a></p>
                </div>
                <div class="col-lg-2" style="">
                    {{ $order->status }}
                </div>
            </div>

        @endforeach
   </div>



</main>
@endsection

<!-- end::main content -->
