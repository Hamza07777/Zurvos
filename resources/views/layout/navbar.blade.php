<!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu" style="background-color: #F2F7FC;">

                <div class="sidebar-content">
                    <!--- Sidemenu -->
                    <div id="sidebar-menu" class="slimscroll-menu">


                        <ul class="metismenu" id="menu-bar">
                  
                       

                            <li>
                                <a href="{{ route('home') }}">
                                   <!--  <i data-feather="home"></i> -->
                                    <!-- <span class="badge badge-success float-right">1</span> -->
                                    <span>Check-in Users </span>
                                </a>


                            </li>
                           <!--  <li class="menu-title">Apps</li> -->
                            <li>
                                <a href="{{ route('check_out_user') }}">
                                 <!--    <i data-feather="calendar"></i> -->
                                    <span>Check-out Users</span>
                                </a>
                            </li>
                       
                   
                     
                        </ul>

                    </div>
                    
                    <ul >
                        <li style="float: left ; ">
                            <a href="{{ route('account_setting') }}" style=" color: darkgray"> Account Seting</a>
                        </li>
                        {{--  <li style="float: right; margin-top: -4%;">
                            <a href="{{ route('customer.logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();" class="btn btn-default btn-flat" style=" color: darkgray">
                                          Sign out</a>

                              <form id="logout-form" action="{{ route('customer.logout') }}" method="POST" style="display: none;">
                                  @csrf
                              </form>
                            </li>  --}}
                    </ul>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>
                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->
