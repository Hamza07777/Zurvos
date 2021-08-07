<!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu" style="background-color: #F2F7FC;">

                <div class="sidebar-content">
                    <!--- Sidemenu -->
                    <div id="sidebar-menu" class="slimscroll-menu">


                        <ul class="metismenu" id="menu-bar">


                    <li>
                        <a href="{{ route('partner_dashboared') }}">
                           <!--  <i data-feather="home"></i> -->
                            <!-- <span class="badge badge-success float-right">1</span> -->
                            <span>User Status </span>
                        </a>


                    </li>
                    <li>
                        <a href="#">
                           <!--  <i data-feather="home"></i> -->
                            <!-- <span class="badge badge-success float-right">1</span> -->
                            <span>Financial Dashborad </span>
                        </a>


                    </li>


                   <!--  <li class="menu-title">Apps</li> -->
                    <li>
                        <a href="{{ route('partner_admin_user_feedbacks') }}">
                         <!--    <i data-feather="calendar"></i> -->
                            <span>User Feedback</span>
                        </a>
                    </li>
                                           </ul>
                </div>
                    <ul >
                    <li style="margin-top: 4%;">

                            <a href="{{ route('partner.logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();" class="btn btn-default btn-flat" style=" color: darkgray">
                                          Sign out</a>

                              <form id="logout-form" action="{{ route('partner.logout') }}" method="POST" style="display: none;">
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
