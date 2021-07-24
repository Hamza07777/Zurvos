<div class="navbar navbar-expand flex-column flex-md-row navbar-custom">
                <div class="container-fluid">
                    <!-- LOGO -->
                    <a href="{{asset('admin/home')}}" class="navbar-brand mr-0 mr-md-2 logo">
                        <span class="logo-lg">
                            <img src="{{asset('public/assets/images/logo.png')}}" alt="" height="24" />
                            <!-- <span class="d-inline h5 ml-1 text-logo">Zurvos</span> -->
                        </span>
                        <span class="logo-sm">
                            <img src="{{asset('public/assets/images/logo.png')}}" alt="" height="24">
                        </span>
                    </a>

                  
                    <ul class="navbar-nav flex-row ml-auto d-flex list-unstyled topnav-menu float-right mb-0">
                        
                     

                         <li class="d-none d-sm-block">
                            
                                <i data-feather="search" style="margin-top:28px;"></i>
                                   
                        
                        </li>

                    <li class="d-none d-sm-block">
                            
                                <i data-feather="mail" style="margin-top:28px; margin-left: 20px;"></i>
                                   
                        
                        </li>



                       

        <li>
                                         <div class="media user-profile mt-2 mb-2">
                                <img src="{{asset('public/assets/images/users/avatar-7.png')}}" class="avatar-sm rounded-circle mr-2" alt="Shreyu" />
                                <img src="{{asset('public/assets/images/users/avatar-7.png')}}" class="avatar-xs rounded-circle mr-2" alt="Shreyu" />

                                <div class="media-body">
                                <a  href="{{asset('admin/logout')}}">
                                <h6 class="pro-user-name mt-2 mb-0">
                                    @if(Auth::check()){{ucfirst(Auth::user()->name)}}@endif
                                </h6>
                                </a>

                                    
                                </div>
               
                </div>
        </li>

                   

                        <li class="d-none d-sm-block">
                            
                                <i data-feather="more-vertical" style="margin-top:28px; color: blue"></i>
                                   
                        
                        </li>
                    </ul>
                </div>

            </div>