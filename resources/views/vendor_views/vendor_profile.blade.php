@extends('vendor_layout.app')

@section('main-content')
<!-- begin::main content -->
<main class="main-content" style="margin-top: 13%;background-color: #ffffff;">

   <div class="container" style="background-color: #EEF5FF">

    <div class="row" >
        <div class="col-lg-3" >

            @if (!empty(Auth::guard('vendor')->user()->image))
            <img src=" {{asset('public/vendorImage/'.Auth::guard('vendor')->user()->image)}}" class="avatar-lg rounded-circle mt-3" alt="Shreyu" style="float: right;">

        @else
        <img src=" {{asset('public/assets/images/users/avatar-7.png')}}" class="avatar-lg rounded-circle mt-3" alt="Shreyu" style="float: right;">

        
        @endif 

        </div>
  
        <div class="col-lg-5">
            <p>{{ $vendor->store_name }}</p>
            <p>{{ $vendor->email  }}</p>
            <p>{{ $vendor->address."  ".$vendor->phone }}</p>
        </div>
        <div class="col-lg-4" >
                <button class="btn btn-primary btn-lg  mt-lg-4">Edit</button>
        </div>
    </div>
    <div class="row m-lg-2" >
        <div class="col-xl-6">
            <h6>YOUR BANNER DEAL</h6>
        </div>
        <div class="col-xl-6">
            <button class="btn btn-primary float-right">Add New Deal</button>
        </div>
        <div class="col-xl-12">
            <img src="{{asset('public/assets/ZURVOS_ASSETS/ZURVOS_ASSETS/IMAGES/WEB/Store_banner.png')}}" class="image-fluid" width="100%" height="160px" alt="Shreyu" >
            <div class="row" style="position: absolute;margin-top: -22%;">
                <div class="col-lg-6">
                    <h5>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis possimus quae neque 
                    </h5>
                </div>
                <div class="col-lg-6">
                    <h2 class="text-center mt-4">
                       $ 500.00
                    </h2>
                </div>
            </div>
        </div>


    </div>
        <div class="row" >
            <div class="col-xl-12">

                <ul class="nav nav-tabs" style="padding-left: 20%;">
                    <li class="nav-item">
                        <a href="#one" data-toggle="tab" aria-expanded="false"
                            class="nav-link active">
                            <span class="d-block d-sm-none"><small>FITNESS PRODUCT</small></span>
                            <span class="d-none d-sm-block">FITNESS PRODUCT</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#two" data-toggle="tab" aria-expanded="true"
                            class="nav-link">
                            <span class="d-block d-sm-none"><small>FUELED PRODUCTS</small></span>
                            <span class="d-none d-sm-block">FUELED PRODUCTS</span>
                        </a>
                    </li>

                </ul>

                <div class="tab-content p-3 text-muted">
                    <div class="tab-pane active" id="one">
                @foreach($fitnessproducts as $product)
                          {{-- <div class="dropdown align-self-center float-right"> --}}
                    {{-- <a href="#" class="dropdown-toggle arrow-none text-muted" data-toggle="dropdown" --}}
                        {{-- aria-expanded="false"> --}}
                        {{-- <i class="uil uil-ellipsis-v"></i> --}}
                    {{-- </a> --}}

                {{-- </div> --}}
        @if($product->product_image==Null)

            <div class="media border-top pt-3">
                <img src="{{asset('public/assets/images/users/avatar-9.jpg')}}" class="mr-3 rounded-circle image-fluid" width="136px" height="126px" />
        @else
     <div class="media border-top pt-3">
                <img src="{{asset('public/productImages/'.$product->product_image)}}" class="mr-3 rounded-circle image-fluid"  width="136px" height="126px"/>
           @endif
                <div class="media-body">

                    <h6 class="mt-1 mb-0 font-size-15" style="padding-top: 15px; margin: 7px;"><strong>{{$product->product_name}}</strong></h6>

                   <i  style="margin: 2px; height: 17px;"></i>
                    <span style="align-content: center;" class="text-muted">{{$product->product_description}}</span>

                    <span style="align-content: center;" class="text-muted">Price {{$product->product_price}}</span>
                <br>
              
                </div>

            </div>


            @endforeach

                    </div>

                    <!-- TAB 2 -->


                    <div class="tab-pane" id="two">

                    @foreach($zurvosproducts as $product)
                          {{-- <div class="dropdown align-self-center float-right"> --}}
                    {{-- <a href="#" class="dropdown-toggle arrow-none text-muted" data-toggle="dropdown" --}}
                        {{-- aria-expanded="false"> --}}
                        {{-- <i class="uil uil-ellipsis-v"></i> --}}
                    {{-- </a> --}}

                {{-- </div> --}}


          @if($product->product_image==Null)

            <div class="media border-top pt-3">
                <img src="{{asset('public/assets/images/users/avatar-9.jpg')}}" class="mr-3 rounded-circle image-fluid"  width="136px" height="126px">
                @else
                <div class="media border-top pt-3">
                           <img src="{{asset('public/productImages/'.$product->product_image)}}" class="mr-3 rounded-circle image-fluid" width="136px" height="126px" />

                @endif

                <div class="media-body">

                    <h6 class="mt-1 mb-0 font-size-15" style="padding-top: 15px; margin: 7px;"><strong>{{$product->product_name}}</strong></h6>

                   <i  style="margin: 2px; height: 17px;"></i>
                    <span style="align-content: center;" class="text-muted">{{$product->product_description}}</span>
                    <span style="align-content: center;" class="text-muted">Price {{$product->product_price}}</span>
                <br>
                   
                </div>

            </div>

            @endforeach

                    </div>

                </div>
                    <!-- end row -->
                </div>
            
                          
          

            <!-- task details -->

        </div>
   </div>

</main>
@endsection

<!-- end::main content -->

