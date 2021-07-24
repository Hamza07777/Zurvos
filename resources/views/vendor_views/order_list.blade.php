@extends('vendor_layout.app')

@section('main-content')
<!-- begin::main content -->
<main class="main-content" style="margin-top: 13%;background-color: #ffffff;">

   <div class="container" style="background-color: #EEF5FF">
        <div class="row" >
            <div class="col-xl-12">

                       <ul class="nav nav-tabs" style="padding-left: 3%;">
                                <li class="nav-item" >
                                    <a href="#one" data-toggle="tab" aria-expanded="false"
                                        class="nav-link active" >
                                        <span class="d-block d-sm-none"><small>All Orders</small></span>
                                        <span class="d-none d-sm-block">All Orders</span>
                                    </a>
                                </li>
                                <li class="nav-item" >
                                    <a href="#two" data-toggle="tab" aria-expanded="true"
                                        class="nav-link">
                                        <span class="d-block d-sm-none"><small>New Orders</small></span>
                                        <span class="d-none d-sm-block">New Orders</span>
                                    </a>
                                </li>
                                <li class="nav-item" >
                                    <a href="#third" data-toggle="tab" aria-expanded="true"
                                        class="nav-link">
                                        <span class="d-block d-sm-none"><small>Pending Orders</small></span>
                                        <span class="d-none d-sm-block">Pending Orders</span>
                                    </a>
                                </li>
                                <li class="nav-item" >
                                    <a href="#four" data-toggle="tab" aria-expanded="true"
                                        class="nav-link">
                                        <span class="d-block d-sm-none"><small>Completed Orders</small></span>
                                        <span class="d-none d-sm-block">Completed Orders</span>
                                    </a>
                                </li>

                            </ul>





                            <div class="tab-content p-3 text-muted">
                                <div class="tab-pane active" id="one">

                                    <div class="row p-lg-3 m-lg-1" style="margin-top: 2%;background-color: #ffffff">
                                    
                                        <table class="table">
                                          <thead>
                                            <tr>
                                              <th scope="col">Date</th>
                                              <th scope="col">Buyer</th>
                                              <th scope="col">Order Status</th>
                                              <th scope="col">Price</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            @foreach ($order as $order)
                                            <tr>
                                              <th scope="row">{{ $order->created_at->format('Y-m-d') }}</th>
                                              <td>{{ $order->user_name->name."  ".$order->user_name->email  }}<br>{{ $order->address."  ".$order->user_name->phone_number   }} </td> 
                                              <td>{{ $order->status }}</td>
                                              <td>{{ $order->product_name->product_price}}.00 USD</td>
                                            </tr>
                                            @endforeach
                                          </tbody>
                                        </table>
                                    </div>

                                </div>
                            
                                <!-- TAB 2 -->


                                <div class="tab-pane" id="two">

                                    <div class="row p-lg-3 m-lg-1" style="margin-top: 2%;background-color: #ffffff">

                                    <table class="table">
                                        <thead>
                                          <tr>
                                            <th scope="col">Date</th>
                                            <th scope="col">Buyer</th>
                                            <th scope="col">Order Status</th>
                                            <th scope="col">Price</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($new_order as $new_order)
                                            <tr>
                                              <th scope="row">{{ $new_order->created_at->format('Y-m-d') }}</th>
                                              <td>{{ $new_order->user_name->name."  ".$new_order->user_name->email  }}<br>{{ $new_order->address."  ".$new_order->user_name->phone_number   }} </td> 
                                              <td>{{ $new_order->status }}</td>
                                              <td>{{ $new_order->product_name->product_price}}.00 USD</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                      </table>
                                    </div> 
                                </div>


                                <div class="tab-pane" id="third">

                                    <div class="row p-lg-3 m-lg-1" style="margin-top: 2%;background-color: #ffffff">

                                    <table class="table">
                                        <thead>
                                          <tr>
                                            <th scope="col">Date</th>
                                            <th scope="col">Buyer</th>
                                            <th scope="col">Order Status</th>
                                            <th scope="col">Price</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          @foreach ($pending_order as $pending_order)
                                          <tr>
                                            <th scope="row">{{ $pending_order->created_at->format('Y-m-d') }}</th>
                                            <td>{{ $pending_order->user_name->name."  ".$pending_order->user_name->email  }}<br>{{ $pending_order->address."  ".$pending_order->user_name->phone_number   }} </td> 
                                            <td>{{ $pending_order->status }}</td>
                                            <td>{{ $pending_order->product_name->product_price}}.00 USD</td>
                                          </tr>
                                          @endforeach
                                        </tbody>
                                      </table>
                                    </div> 
                                </div>

                                <div class="tab-pane" id="four">
                                    <div class="row p-lg-3 m-lg-1" style="margin-top: 2%;background-color: #ffffff">

                                    <table class="table">
                                        <thead>
                                          <tr>
                                            <th scope="col">Date</th>
                                            <th scope="col">Buyer</th>
                                            <th scope="col">Order Status</th>
                                            <th scope="col">Price</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          @foreach ($completed_order as $completed_order)
                                          <tr>
                                            <th scope="row">{{ $completed_order->created_at->format('Y-m-d') }}</th>
                                            <td>{{ $completed_order->user_name->name."  ".$completed_order->user_name->email  }}<br>{{ $completed_order->address."  ".$completed_order->user_name->phone_number   }} </td> 
                                            <td>{{ $completed_order->status }}</td>
                                            <td>{{ $completed_order->product_name->product_price}}.00 USD</td>
                                          </tr>
                                          @endforeach
                                        </tbody>
                                      </table>
                                    </div> 
                                </div>

                            </div>


                
            </div>

            <!-- task details -->

        </div>
   </div>

</main>
@endsection
