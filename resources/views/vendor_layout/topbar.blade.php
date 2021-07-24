<div class="navbar navbar-expand flex-column flex-md-row navbar-custom">
                <div class="container-fluid">
                    <!-- LOGO -->
                    <a href="{{asset('home')}}" class="navbar-brand mr-0 mr-md-2 logo">
                        <span class="logo-lg">
                            <img src="{{asset('public/assets/images/logo.png')}}" alt="" height="24" />
                            <!-- <span class="d-inline h5 ml-1 text-logo">Zurvos</span> -->
                        </span>
                        <span class="logo-sm">
                            <img src="{{asset('public/assets/images/logo.png')}}" alt="" height="24">
                        </span>
                    </a>


                    <ul class="navbar-nav flex-row ml-auto d-flex list-unstyled topnav-menu float-right mb-0">

                        <li class="" style="margin-top: 6%;">

                            <a href="{{ route('new_product_vendor') }}" style="margin-left: -19%;">
                                 <i data-feather="plus"></i> 
                                    <!-- <span class="badge badge-success float-right">1</span> -->
                                    <span>ADD NEW PRODUCT </span>
                                </a>


                            </li>

                         {{-- <li class="d-none d-sm-block">

                                <i data-feather="search" style="margin-top:28px;"></i>


                        </li> --}}
                        <li class="d-none d-sm-block">

                            <i data-feather="bell" style="margin-top:28px; margin-left: 20px;"></i>


                    </li>
                    {{-- <li class="d-none d-sm-block">

                                <i data-feather="mail" style="margin-top:28px; margin-left: 20px;"></i>


                        </li> --}}





        <li>
                                         <div class="media user-profile mt-2 mb-2">




                                 <img src="{{asset('public/vendorImage/'.Auth::guard('vendor')->user()->image)}}" class="avatar-sm rounded-circle mr-2" alt="Shreyu" />
                                {{-- <img src="{{asset('public/assets/images/users/avatar-7.png')}}" class="avatar-sm rounded-circle mr-2" alt="Shreyu" /> --}}

                                <div class="media-body">

                                <a  onclick="

                                document.getElementById('myForm').submit();">
                                <h6 class="pro-user-name mt-2 mb-0">
                                     
                                    {{ ucfirst(Auth::guard('vendor')->user()->store_name)}}

                                    <br>
                                     <a href="#">

                                         {{-- {{  Auth::guard('admin')->user()->cost_per_day}}.00 USD --}}
                                        </a>



                                </h6>
                                </a>

                                </div>

                </div>
        </li>




        
                            <li class="d-none d-sm-block">
                                <div class="dropdown" >
                                    <button style="border: none;background-color: white;" class=" dropdown-toggle" type="button" data-toggle="dropdown"><i data-feather="more-vertical" style="margin-top:28px; color: blue"></i></button>
                                    <ul class="dropdown-menu " style="width: 80%;margin-left: -141px;margin-top: 13px;">
                                        <li class="list-group-item"><a href="{{ route('vendor_profile') }}">My Profile</a></li>
                                        <li class="list-group-item"><a href="{{ route('vendor_faqs') }}">Vendors Info Packs</a></li>
                                        <li class="list-group-item"><a href="{{ route('vendor_profile_update') }}">Change Password</a></li>
                                         <li class="list-group-item" style="padding: 0px;">
                                            <a href="{{ route('vendor.logout') }}"
                                            onclick="event.preventDefault();
                                                          document.getElementById('logout-form').submit();" class="btn btn-default btn-flat" style=" color: darkgray">
                                                          Sign out</a>

                                              <form id="logout-form" action="{{ route('vendor.logout') }}" method="POST" style="display: none;">
                                                  @csrf
                                              </form>
                                            </li>
                                    </ul>
                                  </div>




                        </li>
                    </ul>
                </div>

            </div>
