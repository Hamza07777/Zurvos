@extends('vendor_layout.app')

@section('main-content')
<div class="" style="margin-top: 76px;">


                <!-- Start Content-->
                <div class="container-fluid">
                    <div class="row" >
                        <div class="col-lg-4 " style="margin-top: 5%">
                            <h5> Products</h5>
                        </div>
                        <div class="col-lg-4 " style="margin-top: 5%">
                           
                        </div>
                        <div class="col-lg-4 " style="margin-top: 5%">
                            <a href="{{ route('new_product_vendor') }}" type="button" class="btn btn-primary"  style="margin-left: -19%;">
                                
                                ADD NEW PRODUCT
                               </a>
                        </div>
                      </div>
                    <!-- tasks panel -->
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                   
                                   <ul class="nav nav-tabs">
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
                                        </br>
                                        <a name="" id=""  href="#"  type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$product->id  }}">Buy Now</a>

                                        <span>
                                            <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$product->id  }}">
                                                <img src="{{asset('public/assets/ZURVOS_ASSETS/ICONS/supermarket.png')}}" class="" alt="Shreyu" style=" height: 1.25rem; width: 1.25rem; margin-left: 7%;">
                                            </a>
                                        </span>
                                        </div>

                                    </div>
                                    <div class="modal fade" id="exampleModal{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Add Shipping Detail</h5>
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
                                                </div>
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
                                        </br>
                                            <a name="" id=""  href="#"  type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$product->id  }}">Buy Now</a>

                                            <span>
                                                <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                                    <img src="{{asset('public/assets/ZURVOS_ASSETS/ICONS/supermarket.png')}}" class="" alt="Shreyu" style=" height: 1.25rem; width: 1.25rem; margin-left: 7%;">
                                                </a>
                                            </span>
                                        </div>

                                    </div>
                                    <div class="modal fade" id="exampleModal{{$product->id  }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Add Shipping Detail</h5>
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
                                                </div>
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

                                        </div>
                                            <!-- end row -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- task details -->

                    </div>

                </div> <!-- container-fluid -->


        </div>

@endsection
<!-- end::main content -->
