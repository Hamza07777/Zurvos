<!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu" style="background-color: #F2F7FC;">

                <div class="sidebar-content">
                    <!--- Sidemenu -->
                    <div id="sidebar-menu" class="slimscroll-menu">


                        <ul class="metismenu" id="menu-bar">
                         {{--  {{   dd(Auth::guard('influence')->user()->bio)}}  --}}
                            @if (Auth::guard('influence')->user()->customer_type=='influencer' )
                            <li class="treeview">
                                <a href="#" style="color: black">
                                Influencer Dashboard
                                <span class="pull-right-container">
                                    <i data-feather="chevron-left" class="ml-1" style="width: 24;
                                    height: 24;
                                    fill: none;
                                    stroke: currentcolor;
                                    stroke-width: 2;
                                    stroke-linecap: round;
                                    stroke-linejoin: round;
                                "></i>
                                </span>
                                </a>
                                <ul class="treeview-menu ml-1" id="menu-bar" >
                                    <li >
                                        <a href="{{route('generate_affiliated_link')}}" style="color:  #4B4B5A;font-size:15px">
                                            <i data-feather="chevron-right"></i>
                                                <span>Generate Affiliated Link</span>
                                            </a>
                                    </li>
                                    <li class="mt-4">
                                        <a href="{{route('my_affiliated')}}" style="color:  #4B4B5A;font-size:15px">
                                                <i data-feather="chevron-right"></i>
                                                <span>My Affiliate Status</span>
                                            </a>
                                    </li>
                                    <li class="mt-4">
                                        <a href="{{route('my_earning')}}" style="color:  #4B4B5A;font-size:15px">
                                            <i data-feather="chevron-right"></i>
                                            <span>My Earning</span>
                                        </a>
                                    </li>
                                    <li class="mt-4">
                                        <a href="{{route('my_resources')}}" style="color: #4B4B5A;font-size:15px">
                                            <i data-feather="chevron-right"></i>
                                            <span>Resources</span>
                                        </a>
                                    </li>
                                    <li class="mt-4">
                                        <a href="{{route('affaliated_policy')}}" style="color: #4B4B5A;font-size:15px">
                                            <i data-feather="chevron-right"></i>
                                            <span>Our Affiliated Policy</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            @else
                             <li>
                                <a href="{{route('verify_link_form')}}">
                                   <!--  <i data-feather="home"></i> -->
                                    <!-- <span class="badge badge-success float-right">1</span> -->
                                    <span>Make Influencer </span>
                                </a>


                            </li>
                            
                            @endif

                            <li>
                                <a href="{{route('search_page')}}">
                                   <!--  <i data-feather="home"></i> -->
                                    <!-- <span class="badge badge-success float-right">1</span> -->
                                    <span>Gym Near Me </span>
                                </a>


                            </li>
                           <!--  <li class="menu-title">Apps</li> -->
                            <li>
                                <a href="{{route('free_video_page')}}">
                                 <!--    <i data-feather="calendar"></i> -->
                                    <span>Tutorials</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('fitness_produsts_page')}}">
                                 <!--    <i data-feather="calendar"></i> -->
                                    <span>Products</span>
                                </a>
                            </li>


                              <li>
                                <a href="{{route('transaction_sto')}}">
                                 <!--    <i data-feather="calendar"></i> -->
                                    <span>Transactions</span>
                                </a>
                            </li>
                            <!--<li>-->
                            <!--    <a href="{{route('buildworkout')}}">-->
                                 <!--    <i data-feather="calendar"></i> -->
                            <!--        <span>Build a Workout</span>-->
                            <!--    </a>-->
                            <!--</li>-->
                            <!--<li>-->
                            <!--    <a href="{{route('exercise')}}">-->
                                 <!--    <i data-feather="calendar"></i> -->
                            <!--        <span>Exercise library </span>-->
                            <!--    </a>-->
                            <!--</li>-->
                            <li>
                                <a href="{{route('workoutlist_influ')}}">
                                 <!--    <i data-feather="calendar"></i> -->
                                    <span>Workout List </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('buddylist')}}">
                                 <!--    <i data-feather="calendar"></i> -->
                                    <span>Buddy List</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('invitation')}}">
                                 <!--    <i data-feather="calendar"></i> -->
                                    <span>Invitations</span>
                                </a>
                            </li>
                            <!--<li>-->
                            <!--    <a href="{{route('workoutbuddy_influ')}}">-->
                                 <!--    <i data-feather="calendar"></i> -->
                            <!--        <span>Workout Buddy </span>-->
                            <!--    </a>-->
                            <!--</li>-->
                            <!--<li>-->
                            <!--    <a href="{{ url('/influence/all_sessions') }}">-->
                                 <!--    <i data-feather="calendar"></i> -->
                            <!--        <span>Sessions</span>-->
                            <!--    </a>-->
                            <!--</li>-->
                            <li>
                                <a href="{{ url('/influence/FAQ_question') }}">
                                 <!--    <i data-feather="calendar"></i> -->
                                    <span>FAQ</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('feedback')}}">
                                 <!--    <i data-feather="calendar"></i> -->
                                    <span>Give Feedback</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/influence/contact_zurvos') }}">
                                 <!--    <i data-feather="calendar"></i> -->
                                    <span>Contact Fueled</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/influence/about_zurvos') }}">
                                 <!--    <i data-feather="calendar"></i> -->
                                    <span>About Us</span>
                                </a>
                            </li>
                        </ul>

                    </div>
                    <ul >
                        <li style="float: left ; ">
                            <a href="{{ url('influence/account_setting') }}" style=" color: darkgray"> Account Seting</a>
                        </li>
                        <li style="float: right; margin-top: -4%;">
                            <a href="{{ route('influence.logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();" class="btn btn-default btn-flat" style=" color: darkgray">
                                          Sign out</a>

                              <form id="logout-form" action="{{ route('influence.logout') }}" method="POST" style="display: none;">
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
