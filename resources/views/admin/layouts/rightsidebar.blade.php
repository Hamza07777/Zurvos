<!-- RIGHT SIDE BAR -->

                                    
                                    <div class="col">
                                        
                                           
                                           <a href="#" class="btn btn-sm mt-2 float-right" style="color: #ababb0; padding-top: 10px;">
                                        See All
                                    </a>
                                    <h6 class="header-title mb-4" style=" padding-left: 10px; padding-top: 5px">Recently Added Gyms</h6>
                                            <div id="task-list-one" class="task-list-items">
                                        
                                        <!-- Task Item -->

                                        <div class="card border mb-0">
                                        @foreach($gyms as $gym)
                                            <div class="card-body p-3">

                                              <div class="dropdown float-right">

                                                    <a href="#" class="dropdown-toggle text-muted arrow-none"
                                                        data-toggle="dropdown" aria-expanded="false">
                                                        <i class="uil uil-ellipsis-v font-size-10"></i>
                                                    </a>

                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <!-- item-->
                                                        <a href="javascript:void(0);" class="dropdown-item">View more</a>
                                                        <!-- item-->
                                                        <a href="route('approve-gym',$gym->id)" class="dropdown-item">Approve on Listing</a>
                                
                                                        <!-- item-->
                                                        <a href="route('delete-gym',$gym->id)"
                                                            class="dropdown-item text-danger">Delete</a>
                                                    </div>
                                                </div>
                                                <h6 class="mt-0 mb-2 font-size-1">
                                                    <img src="{{asset('public/assets/images/users/avatar-9.jpg')}}"
                                                class="mr-2 rounded-circle"  height="30"  />
                                                
                                                    <a href="#" data-toggle="modal" data-target="#task-detail-modal"
                                                        class="text-body">{{str_limit($gym->full_name,24)}}</a>
                                                </h6>

                                                <!-- <span class="badge badge-soft-danger">High</span> -->

                                                <p class="mb-0 mt-4">
                                                    <i data-feather="map-pin"></i>
                                                       <span style="align-content: center;" class="text-muted">{{$gym->full_name1}}</span>

                                                    
                                                    
                                                </p>
                                               
                                            </div> <!-- end card-body -->    
                                         @endforeach
                                        </div>
                                        <!-- TASK ITEM END -->

                                      


                                            <!-- Recent feeds -->
                                        <div class="row mt-3">
                                            <div class="col">
                                                                    <h5 class="mb-2 font-size-16" style="color: grey; margin: 20px;">RECENT FEEDS</h5>
                                                    
                                                                         <hr />
                                                    <div class="media">
                                                                    <img src="{{asset('public/assets/images/users/avatar-7.jpg')}}" class="mr-3 avatar rounded-circle" alt="shreyu" />
                                                                    <div class="media-body">
                                                                        <h6 class="mt-0 mb-0 font-size-14 font-weight-normal">
                                                                            <a href="#" class="font-weight-bold">Kevin Bruce</a> & <span class="font-weight-bold text-primary">16 others</span> liked your photo
                                                                        </h6>
                                                                        <p class="text-muted">23M</p>
                                                                    </div>
                                                    </div>

                                                                    <hr />

                                                    <div class="media">
                                                        <img src="{{asset('public/assets/images/users/avatar-7.jpg')}}" class="mr-3 avatar rounded-circle" alt="shreyu" />
                                                        <div class="media-body">
                                                            <h6 class="mt-0 mb-0 font-size-14 font-weight-normal">
                                                                <a href="#" class="font-weight-bold">Kevin Bruce</a> & <span class="font-weight-bold text-primary">16 others</span> liked your photo
                                                            </h6>
                                                            <p class="text-muted">23M</p>
                                                        </div>
                                                    </div>

                                                                    <hr />

                                                    <div class="media">
                                                        <img src="{{asset('public/assets/images/users/avatar-7.jpg')}}" class="mr-3 avatar rounded-circle" alt="shreyu" />
                                                        <div class="media-body">
                                                            <h6 class="mt-0 mb-0 font-size-14 font-weight-normal">
                                                                <a href="#" class="font-weight-bold">Kevin Bruce</a> & <span class="font-weight-bold text-primary">16 others</span> liked your photo
                                                            </h6>
                                                            <p class="text-muted">23M</p>
                                                        </div>
                                                    </div>

                                                </div> <!-- end col -->
                                                            </div> <!-- end row -->

                                                           
                                                            <!-- end comments -->
                                                        </div>
                                                </div>
                                            </div>
                                  <!-- END RIGHT SIDEBAR --> 