<!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu" style="background-color: #F2F7FC;">

                <div class="sidebar-content">
                    <!--- Sidemenu -->
                    <div id="sidebar-menu" class="slimscroll-menu">


                        <ul class="metismenu" id="menu-bar">


                    <li>
                        <a href="{{ route('admin_add_gym') }}">
                           <!--  <i data-feather="home"></i> -->
                            <!-- <span class="badge badge-success float-right">1</span> -->
                            <span>Add New Gym </span>
                        </a>


                    </li>
                    <li>
                        <a href="{{ route('invite_user') }}">
                           <!--  <i data-feather="home"></i> -->
                            <!-- <span class="badge badge-success float-right">1</span> -->
                            <span>Invite User</span>
                        </a>


                    </li>


                   <!--  <li class="menu-title">Apps</li> -->
                    <li>
                        <a href="{{ route('admin_order_list') }}">
                         <!--    <i data-feather="calendar"></i> -->
                            <span>View All Orders</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin_new_user') }}">
                         <!--    <i data-feather="calendar"></i> -->
                            <span>Manage Users</span>
                        </a>
                    </li>


                      <li>
                        <a href="{{ route('admin_affiliated_partner') }}">
                         <!--    <i data-feather="calendar"></i> -->
                            <span>Affiliate Partner</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin_new_partner') }}">
                         <!--    <i data-feather="calendar"></i> -->
                            <span>Add Partner</span>
                        </a>
                    </li>
                    <li>

                        <a href="{{ route('admin_new_vendors') }}">
                         <!--    <i data-feather="calendar"></i> -->
                            <span>Vendors</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin_new_tutorial') }}">
                         <!--    <i data-feather="calendar"></i> -->
                            <span>Upload Tutorials</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin_new_product') }}">
                         <!--    <i data-feather="calendar"></i> -->
                            <span>Add Product</span>
                        </a>
                    </li>
                    {{-- <li>
                        <a href="">
                         <!--    <i data-feather="calendar"></i> -->
                            <span>Excerise Library</span>
                        </a>
                    </li> --}}
                    <!--<li>-->
                    <!--    <a href="{{ route('admin_buddy_workout') }}">-->
                         <!--    <i data-feather="calendar"></i> -->
                    <!--        <span>Workout Buddy </span>-->
                    <!--    </a>-->
                    <!--</li>-->
                    <li>
                        <a href="{{ route('admin_faqs') }}">
                         <!--    <i data-feather="calendar"></i> -->
                            <span>FAQs</span>
                        </a>
                    </li>
                        </ul>
                </div>
                    <ul >
                    <li style="margin-top: 4%;">

                            <a href="{{ route('admin.logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();" class="btn btn-default btn-flat" style=" color: darkgray">
                                          Sign out</a>

                              <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                  @csrf
                              </form>

                        </li>
                </ul>






                    <!-- End Sidebar -->

                    <div class="clearfix"></div>
                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->
