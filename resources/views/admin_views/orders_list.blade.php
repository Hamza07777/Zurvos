@extends('admin_layout.app')

@section('main-content')
<!-- begin::main content -->
<main class="main-content" style="margin-top: 13%;background-color: #EEF5FF">

   <div class="container">
      <div class="row p-lg-3">
         <div class="col-lg-12">
            <h3>My Orders Lists</h3>
         </div>
      </div>


            @foreach ($order as $order)
                
            <div class="row p-lg-3" style="margin-top: 2%;background-color: #EEF5FF">

                <div class="col-lg-4">

                    <img src="{{asset('public/productImages/'.$order->product_name->product_image)}}" class="image-fluid" alt="Shreyu" style="margin-left: 22%;width: 136px;">

                    </div>
                <div class="col-lg-6" style="">
                    <h5>{{ $order->product_name->product_name}}</h5>
                    <p>price:${{ $order->product_name->product_price}}.00 USD</p>
                    <p><a href="{{ route('admin_orders_detail',$order->id) }}">View detail</a></p>
                </div>
                <div class="col-lg-1 " style="margin-top: -3%;">
                    <div class="dropdown ">

                            <button style="border: none;background-color: transparent;" class=" dropdown-toggle" type="button" data-toggle="dropdown"><i data-feather="more-vertical" style="margin-top:28px; color: blue"></i></button>
                            <ul class="dropdown-menu " style="width: 80%;margin-left: -141px;margin-top: 13px;">
                                <li class="list-group-item"><a href="">View Profile</a></li>
                                <li class="list-group-item"><a href="">Session History</a></li>
                            </ul>

                        </div>
                </div>
            </div>

            @endforeach
          

   </div>



</main>
@endsection

<!-- end::main content -->
