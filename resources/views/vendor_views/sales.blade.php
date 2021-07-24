@extends('vendor_layout.app')

@section('main-content')
<!-- begin::main content -->
<main class="main-content" style="margin-top: 13%;background-color: #ffffff;">

   <div class="container" style="background-color: #EEF5FF">
        <div class="row" >
            <div class="col-xl-12">

                <div class="row p-lg-3 m-lg-1" style="margin-top: 2%;background-color: #ffffff">
                    <div class="col-xl-12">
                        <h3>New Sales</h3>
                        <small>Updated every several minutes</small>
                    </div>
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">Date</th>
                          <th scope="col">Buyer Address</th>
                          <th scope="col">Product Name</th>
                          <th scope="col">Price</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($order as $order)
                        <tr>
                          <th scope="row">{{ $order->created_at->format('Y-m-d') }}</th>
                          <td>{{ $order->user_name->name."  ".$order->user_name->email  }}<br>{{ $order->address."  ".$order->user_name->phone_number   }} </td>
                          <td>{{ $order->product_name->product_name }}</td>
                          <td>{{ $order->product_name->product_price}}.00 USD</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>



            </div>

            <!-- task details -->

        </div>
   </div>

</main>
@endsection
