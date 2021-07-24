@extends('influence.layout.app')

@section('main-content')
<!-- begin::main content -->
<main class="main-content" style="margin-top: 13%;background-color: #ffffff;">

    <div class="container">
        <div class="row" >
          <div class="col-lg-4 " style="margin-top: 5%">
              <h5>Fitness Products</h5>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-8">
            <nav class="nav nav-pills flex-column flex-sm-row" style="background: #ffffff">
              <a class="flex-sm-fill text-sm-center nav-link " href="{{route('fitness_produsts_page')}}">FITNESS PRODUCTS</a>
              <a class="flex-sm-fill text-sm-center nav-link active" href="{{route('zavour_store')}}">FUELED PRODUCTS</a>
            </nav>
          </div>
        </div>

          @foreach($zurvosproducts as $product)
                <div class="row" style="margin-top: 8%;">
                    <div class="col-lg-3 ml-lg-5">
                      @if($product->product_image==Null)
                      <img src="{{asset('public/assets/images/users/avatar-9.jpg')}}" class="image-fluid" alt="Shreyu" width="100%" height="100%">
                      @endif
                      <img src="{{asset('/public/productImages/'. $product->product_image )}}" class="image-fluid" alt="Shreyu" width="100%" height="100%">

                    </div>
                      <div class="col-lg-6 ml-lg-3">
                        <h5>{{$product->product_name}}</h5>
                        <p><a href=""> {{$product->product_description}}</a></p>
                        <p><a href="">Price {{$product->product_price}}</a></p>
                        <a name="" id=""  href="#"  type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Buy Now</a>
                        <span>
                            <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{  }}">
                                <img src="{{asset('public/assets/ZURVOS_ASSETS/ICONS/supermarket.png')}}" class="" alt="Shreyu" style=" height: 1.25rem; width: 1.25rem; margin-left: 7%;">
                            </a>
                        </span>
                    </div>
                </div>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{route('place_order') }}">
                                @csrf

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Recipient:</label>
                                <input type="hidden" class="form-control" id="recipient-name" name="product_id" value="{{$product->id}}">
                              </>
                              <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Address:</label>
                                <input type="text" class="form-control" id="recipient-name" name="address" value="">
                              </div>
                              <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Latitude:</label>
                                <input type="text" class="form-control" id="recipient-name" name="latitude" value="">
                              </div>
                              <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Longitute:</label>
                                <input type="text" class="form-control" id="recipient-name" name="longitude" value="">
                              </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Place order</button>
                              </div>
                          </form>
                        </div>

                      </div>
                    </div>
                  </div>
         @endforeach
    </div>

</main>
@endsection
<!-- end::main content -->
