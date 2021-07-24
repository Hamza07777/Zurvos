@extends('admin_layout.app')

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
                <img src="{{asset('public/productImages/'.$order->product_name->product_image)}}" class="image-fluid" alt="Shreyu" style="margin-left: 22%;">

             </div>

             

 




             
          <div class="col-lg-6" style="background-color: #ffffff;">
            <h5>{{ $order->product_name->product_name}}</h5>
            <p>price:${{ $order->product_name->product_price}}.00 USD</p>
            <p><a href="">Amount 1 units</a></p>
         </div>
         <div class="col-lg-1 " style="margin-top: -3%;">
            <div class="dropdown ">

                    <button style="border: none;background-color: white;" class=" dropdown-toggle" type="button" data-toggle="dropdown"><i data-feather="more-vertical" style="margin-top:28px; color: blue"></i></button>
                    <ul class="dropdown-menu " style="width: 80%;margin-left: -141px;margin-top: 13px;">
                        <li class="list-group-item"><a href="">View Details</a></li>
                        <li class="list-group-item"><a href="">Edit Product</a></li>
                        <li class="list-group-item"><a href="">Delete</a></li>
                    </ul>

                </div>
        </div>

      </div>

    </div>
         <div class="container">
            <div class="row"  style="padding-left:3%; padding-right:3%; margin-top:-3%">
               <div class="col-lg-12"  style="background-color: #ffffff; padding: 27px;">
                  <h3>Shipping Address</h3>
              <p>It is likely that users can create, read, update, or delete these resources.</br>
                Because of this common use case, Laravel resource </br>
                 routing assigns the typical create,</p>
               </div>
               <div class="col-lg-12" style="background-color: #ffffff; padding-left: 27px; padding-right: 27px;">
                  <hr>
                  <h5 style="float:left">Amount</h5>
                  <h5 style="float:right">1</h5>
               </div>
               <div class="col-lg-12" style="background-color: #ffffff; padding-left: 27px; padding-right: 27px;">
                  <h5 style="float:left">Cost</h5>
                  <h5 style="float:right">{{ $order->product_name->product_price}}</h5>
               </div>

               <div class="col-lg-12" style="background-color: #ffffff; padding-left: 27px; padding-right: 27px;">
                  <hr>
                  <h3 style="float:left"><strong>Total Cost</strong> </h3>
                  <h3 style="float:right">{{ $order->product_name->product_price}}</h3>
               </div>
               <div class="col-lg-12" style="padding-left: 27px; padding-right: 27px;margin-top: 10%;margin-bottom: 10%;">
                  <button class="btn btn-primary btn-lg" type="button" style=" width: 100%;">ORDER COMPLETE</button>
               </div>
             </div>
            </div>

</main>
@endsection

<!-- end::main content -->
