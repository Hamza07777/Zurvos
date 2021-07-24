<div class="navbar navbar-expand flex-column flex-md-row navbar-custom">
                <div class="container-fluid">
                    <!-- LOGO -->
                    <a href="{{url('influence/influence_home')}}" class="navbar-brand mr-0 mr-md-2 logo">
                        <span class="logo-lg">
                            <img src="{{asset('public/assets/images/logo.png')}}" alt="" height="24" />
                            <!-- <span class="d-inline h5 ml-1 text-logo">Zurvos</span> -->
                        </span>
                        <span class="logo-sm">
                            <img src="{{asset('public/assets/images/logo.png')}}" alt="" height="24">
                        </span>
                    </a>

                        {{-- <a name="" id="" class="btn btn-primary btn-lg" style="margin-left: 31%"  href="#" role="button">Generate Affiliated Link</a> --}}


                    <ul class="navbar-nav flex-row ml-auto d-flex list-unstyled topnav-menu float-right mb-0">



                         <li class="d-none d-sm-block">
<a href="{{route('search_page')}}">
                                <i data-feather="search" style="margin-top:28px;"></i>

</a>
                        </li>

                    <li class="d-none d-sm-block">
 <a href="{{route('notification_page')}}">
                                   <!--  <i data-feather="home"></i> -->
                                    <!-- <span class="badge badge-success float-right">1</span> -->
                                    <i data-feather="bell" style="margin-top:28px; margin-left: 20px;"></i>
                                
                               </a> 


                        </li>





        <li>

                                         <div class="media user-profile mt-2 mb-2">
                    

                                @if (!empty(Auth::guard('influence')->user()->user_image))
                                <img src=" {{asset('public/userimage/'.Auth::guard('influence')->user()->user_image)}}" class="avatar-sm rounded-circle mr-2" alt="Shreyu" >
    
                            @else
                            <img src=" {{asset('public/assets/images/users/avatar-7.png')}}" class="avatar-sm rounded-circle mr-2" alt="Shreyu">
    
                            
                            @endif
                                <div class="media-body">

                                <a  onclick="

                                document.getElementById('myForm').submit();">
                                <h6 class="pro-user-name mt-2 mb-0">
                                   {{  Auth::guard('influence')->user()->name}}</br>
                                    @if (Auth::guard('influence')->user()->customer_type=='influence'  & Auth::guard('influence')->user()->status=='active' )
                                {{-- <a href="#">   ${{  Auth::guard('influence')->user()->charges}}.00 USD</a> --}}
                                  @endif
                                </h6>
                                </a>
                                <form method="post" id="myForm" action="{{route('influence.logout')}}">
                                    @csrf
                                </form>

                                </div>

                </div>
        </li>



                        <li class="d-none d-sm-block">
                            <div class="dropdown" >
                                <button style="border: none;background-color: white;" class=" dropdown-toggle" type="button" data-toggle="dropdown"><i data-feather="more-vertical" style="margin-top:28px; color: blue"></i></button>
                                <ul class="dropdown-menu " style="width: 80%;margin-left: -141px;margin-top: 13px;">
                                    <li class="list-group-item"><a href="{{ url('/influence/my_profilee') }}">My Profile</a></li>
                                    <li class="list-group-item"><a href="{{ url('/influence/my_orders') }}">My Order List</a></li>
                                    <!--<li class="list-group-item"><a href="{{ url('/influence/all_sessions') }}">My Sessions</a></li>-->
                                    {{-- <li class="list-group-item"><a  href="{{ url('/influence/add_payment_method') }}">Add Payment</a></li> --}}
                                    <li class="list-group-item"><a href="{{ url('/influence/FAQ_question') }}">FAQ</a></li>
                                    <li class="list-group-item"><a href="{{ url('/influence/contact_zurvos') }}">Contact</a></li>
                                    <li class="list-group-item"><a href="{{ url('/influence/bug_report') }}">Bugs Report</a></li>
                                    <li class="list-group-item"><a href="{{ url('/influence/about_zurvos') }}">About Us</a></li>
                                </ul>
                              </div>



                        </li>
                    </ul>
                </div>

            </div>
