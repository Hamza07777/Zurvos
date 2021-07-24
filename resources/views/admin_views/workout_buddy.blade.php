@extends('admin_layout.app')

@section('main-content')
<!-- begin::main content -->
<main class="main-content" style="margin-top: 13%;background-color: #ffffff;">

   <div class="container" style="background-color: #EEF5FF">
        <div class="row" >
            <div class="col-xl-12">

                       <ul class="nav nav-tabs">
                                <li class="nav-item" style="margin-left: 5%;">
                                    <a href="#one" data-toggle="tab" aria-expanded="false"
                                        class="nav-link active" >
                                        <span class="d-block d-sm-none"><small>BUDDY LIST</small></span>
                                        <span class="d-none d-sm-block">BUDDY LIST</span>
                                    </a>
                                </li>
                                <li class="nav-item" style="margin-left: 5%;">
                                    <a href="#two" data-toggle="tab" aria-expanded="true"
                                        class="nav-link">
                                        <span class="d-block d-sm-none"><small>MESSAGING STATS</small></span>
                                        <span class="d-none d-sm-block">MESSAGING STATS</span>
                                    </a>
                                </li>
                                <li class="nav-item" style="margin-left: 5%;">
                                    <a href="#three" data-toggle="tab" aria-expanded="true"
                                        class="nav-link">
                                        <span class="d-block d-sm-none"><small>EDIT BUDDY CRITERIA</small></span>
                                        <span class="d-none d-sm-block">EDIT BUDDY CRITERIA</span>
                                    </a>
                                </li>
                            </ul>


                            <div class="tab-content p-3 text-muted">
                                <div class="tab-pane active" id="one">

                                    <div class="row p-lg-5  " style="background-color: #ffffff;">

                                         <div class="col-lg-12" style="margin-left: -8%;">
                                            <div class="row">
                                                @foreach ($buddy_workout as $buddy_workout)
                                                    
                                               
                                                <div class="col-lg-6" style="border-right: 1px solid black;padding-right:0px;">
                                                    <div class="row">
                                                        <div class="col-lg-2" style="margin-left: -3%;">
                                                            <img src="{{asset('public/userimage/'.$buddy_workout->custmoer_name->user_image)}}" class="avatar-lg rounded-circle mt-3" alt="Shreyu">
                                                        </div>
                                                        <div class="col-lg-7" style="margin-left: 16%;">
                                                            <h5>{{ $buddy_workout->custmoer_name->name }}</h5>
                                                            <img src="{{asset('public\assets\ZURVOS_ASSETS\ICONS\Locations.png')}}" class="img-fluid " alt="Shreyu"><span class="ml-3">{{ $buddy_workout->custmoer_name->city }}</span> <br>
                                                            <p>{{ $buddy_workout->custmoer_name->email }}</p>
                
                                                        </div>
                                                    </div>
                                                </div> 

                                                <div class="col-lg-6">
                                                    <div class="row " style="margin-left: 3%;">
                                                        <div class="col-lg-2" style="margin-left: -8%;">
                                                            <img src="{{asset('public/userimage/'.$buddy_workout->buddy_name->user_image)}}" class="avatar-lg rounded-circle mt-3" alt="Shreyu">
                                                        </div>
                                                        <div class="col-lg-7" style="margin-left: 23%;">
                                                            <h5>{{ $buddy_workout->buddy_name->name }}</h5>
                                                            <img src="{{asset('public\assets\ZURVOS_ASSETS\ICONS\Locations.png')}}" class="img-fluid " alt="Shreyu"><span class="ml-3">{{ $buddy_workout->buddy_name->city }}</span> <br>
                                                            <p>{{ $buddy_workout->buddy_name->email }}</p>
                            
                                                        </div>
                                                        <div class="col-lg-1 " style="margin-top: -3%;">
                                                            <div class="dropdown ">
                
                                                                    <button style="border: none;background-color: white;" class=" dropdown-toggle" type="button" data-toggle="dropdown"><i data-feather="more-vertical" style="margin-top:28px; color: blue"></i></button>
                                                                    <ul class="dropdown-menu " style="width: 80%;margin-left: -141px;margin-top: 13px;">
                                                                        <li class="list-group-item"><a href="">View Profile</a></li>
                                                                        <li class="list-group-item"><a href="">Session History</a></li>
                                                                    </ul>
                
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div> 
                                                @endforeach
                                            </div>
                                         </div>      

                                       



                                      
                                    </div>

                                </div>

                                <!-- TAB 2 -->


                                <div class="tab-pane" id="two">

                                    <div class="row ">
                                        <div class="col-lg-5 m-4" style="background-color: #006CDE;">
                                           <div class="row pt-4 pb-4">
                                              <div class="col-lg-4 ">
                                                 <img src="{{asset('public\assets\ZURVOS_ASSETS\IMAGES\WEB\Icon_1.png')}}" class="avatar-md rounded-circle mt-3" width="100%" alt="Shreyu" style="background:white; padding: 10px;" >  
                                              </div>
                                              <div class="col-lg-8">
                                                 <h3 class="text-white"><strong>{{ $total_user }}</strong></h3>
                                                 <h5 class="text-white">Total Users</h5>
                                              </div>
                                           </div>
                                        </div>
                                        <div class="col-lg-5 m-4" style="background-color: #006CDE;">
                                           <div class="col-lg-12">
                                              <div class="row pt-4 pb-4">
                                                 <div class="col-lg-4">
                                                    <img src="{{asset('public\assets\ZURVOS_ASSETS\IMAGES\WEB\Icon_1.png')}}" class="avatar-md rounded-circle mt-3" width="100%" alt="Shreyu" style="background:white; padding: 10px;" >  
                                                 </div>
                                                 <div class="col-lg-8 ">
                                                    <h3 class="text-white"><strong>{{ $total_gym }}</strong></h3>
                                                    <h5 class="text-white">Total Gyms </h5>
                                                 </div>
                                              </div>
                                           </div>
                                        </div>
                                        <div class="col-lg-5 m-4" style="background-color: #006CDE;">
                                          <div class="col-lg-12">
                                             <div class="row pt-4 pb-4">
                                                <div class="col-lg-4">
                                                   <img src="{{asset('public\assets\ZURVOS_ASSETS\IMAGES\WEB\Icon_7.png')}}" class="avatar-md rounded-circle mt-3" width="100%" alt="Shreyu" style="background:white; padding: 10px;" >  
                                                </div>
                                                <div class="col-lg-8">
                                                  <h3 class="text-white"><strong>{{ $total_partner }}</strong></h3>
                                                  <h5 class="text-white">Total Affiliate Partner</h5>
                                                   
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                     
                                       <div class="col-lg-12 m-4" >
                                           <h3>Recent Request</h3>

                                       </div>
                                
                                     </div>
                                     <div class="row p-lg-5  " style="background-color: #ffffff;">

                                        <div class="col-lg-12" style="margin-left: -8%;">
                                           <div class="row">
                                               @foreach ($recent_buddy_workout as $recent_buddy_workout)
                                               <div class="col-lg-6" style="border-right: 1px solid black;padding-right:0px;">
                                                <div class="row">
                                                    <div class="col-lg-2" style="margin-left: -3%;">
                                                        <img src="{{$recent_buddy_workout->custmoer_name->user_image }}" class="avatar-lg rounded-circle mt-3" alt="Shreyu">
                                                    </div>
                                                    <div class="col-lg-7" style="margin-left: 16%;">
                                                        <h5>{{ $recent_buddy_workout->custmoer_name->name }}</h5>
                                                        <img src="{{asset('public\assets\ZURVOS_ASSETS\ICONS\Locations.png')}}" class="img-fluid " alt="Shreyu"><span class="ml-3">{{ $recent_buddy_workout->custmoer_name->city }}</span> <br>
                                                        <p>{{ $recent_buddy_workout->custmoer_name->email }}</p>
            
                                                    </div>
                                                </div>
                                            </div> 

                                            <div class="col-lg-6">
                                                <div class="row " style="margin-left: 3%;">
                                                    <div class="col-lg-2" style="margin-left: -8%;">
                                                        <img src="{{$recent_buddy_workout->buddy_name->user_image }}" class="avatar-lg rounded-circle mt-3" alt="Shreyu">
                                                    </div>
                                                    <div class="col-lg-7" style="margin-left: 23%;">
                                                        <h5>{{ $recent_buddy_workout->buddy_name->name }}</h5>
                                                        <img src="{{asset('public\assets\ZURVOS_ASSETS\ICONS\Locations.png')}}" class="img-fluid " alt="Shreyu"><span class="ml-3">{{ $recent_buddy_workout->buddy_name->city }}</span> <br>
                                                        <p>{{ $recent_buddy_workout->buddy_name->email }}</p>
                                       
                                                    </div>
                                                    <div class="col-lg-1 " style="margin-top: -3%;">
                                                        <div class="dropdown ">
            
                                                                <button style="border: none;background-color: white;" class=" dropdown-toggle" type="button" data-toggle="dropdown"><i data-feather="more-vertical" style="margin-top:28px; color: blue"></i></button>
                                                                <ul class="dropdown-menu " style="width: 80%;margin-left: -141px;margin-top: 13px;">
                                                                    <li class="list-group-item"><a href="">View Profile</a></li>
                                                                    <li class="list-group-item"><a href="">Session History</a></li>
                                                                </ul>
            
                                                            </div>
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="col-lg-12" >
                                             <h5>Message</h5>
                                             <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Rerum magni laborum, quaerat mollitia totam sapiente tempore veritatis aperiam nemo voluptatem doloribus reiciendis qui, asperiores facilis delectus necessitatibus suscipit at eos.</p>
                                            </div> 
                                               @endforeach
                                              
                                           </div>
                                        </div>      


                                          
                                      



                                     
                                   </div>
                                </div>


                                <div class="tab-pane" id="three">
                                    <div class="row p-lg-5  " style="background-color: #ffffff;">
                                        <div class="col-md-8 float-left"><h3>Workout buddy Criteria</h3></div>
                                        <div class="col-md-4 "><button class="btn btn-primary float-right" style="width: 59%;">Edit</button></div>
                                        <div class="col-md-12">
                                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cupiditate perspiciatis sint
                                                 corrupti, velit exercitationem eligendi suscipit ratione, maxime dicta debitis
                                                  obcaecati perferendis aliquam in quisquam beatae odio omnis repellat sequi?
                                                   Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minima necessitatibus
                                                    laborum rem, culpa velit facilis labore nostrum eligendi, vitae laboriosam sunt in,
                                                     pariatur corrupti accusamus tenetur fuga ullam dignissimos unde? Lorem ipsum dolor 
                                                     sit amet consectetur adipisicing elit. Sit velit ex eum pariatur doloribus, tempore
                                                      totam rem, soluta laborum error ut, quibusdam quasi optio nam officiis voluptatibus.
                                                       At, sunt quo! Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla 
                                                       mollitia quam, nam quaerat, porro magni laboriosam ducimus perferendis suscipit 
                                                       autem dolorum exercitationem illum reprehenderit culpa doloremque iusto cumque 
                                                       quasi consectetur.</br></br>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cupiditate perspiciatis sint
                                                       corrupti, velit exercitationem eligendi suscipit ratione, maxime dicta debitis
                                                        obcaecati perferendis aliquam in quisquam beatae odio omnis repellat sequi?
                                                         Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minima necessitatibus
                                                          laborum rem, culpa velit facilis labore nostrum eligendi, vitae laboriosam sunt in,
                                                           pariatur corrupti accusamus tenetur fuga ullam dignissimos unde? Lorem ipsum dolor 
                                                           sit amet consectetur adipisicing elit. Sit velit ex eum pariatur doloribus, tempore
                                                            totam rem, soluta laborum error ut,</br></br> quibusdam quasi optio nam officiis voluptatibus.
                                                             At, sunt quo! Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla 
                                                             mollitia quam, nam quaerat, porro magni laboriosam ducimus perferendis suscipit 
                                                             autem dolorum exercitationem illum reprehenderit culpa doloremque iusto cumque 
                                                             quasi consectetur.Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cupiditate perspiciatis sint
                                                             corrupti, velit exercitationem eligendi suscipit ratione, maxime dicta debitis
                                                              obcaecati perferendis aliquam in quisquam beatae odio omnis repellat sequi?
                                                               Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minima necessitatibus
                                                                laborum rem, culpa velit facilis labore nostrum eligendi, vitae laboriosam sunt in,
                                                                 pariatur corrupti accusamus tenetur fuga ullam dignissimos unde? Lorem ipsum dolor 
                                                                 sit amet consectetur adipisicing elit. </br></br>Sit velit ex eum pariatur doloribus, tempore
                                                                  totam rem, soluta laborum error ut, quibusdam quasi optio nam officiis voluptatibus.
                                                                   At, sunt quo! Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla 
                                                                   mollitia quam, nam quaerat, porro magni laboriosam ducimus perferendis suscipit 
                                                                   autem dolorum exercitationem illum reprehenderit culpa doloremque iusto cumque 
                                                                   quasi consectetur.Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cupiditate perspiciatis sint
                                                                   corrupti, velit exercitationem eligendi suscipit ratione, maxime dicta debitis
                                                                    obcaecati perferendis aliquam in quisquam beatae odio omnis repellat sequi?
                                                                     Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minima necessitatibus
                                                                      laborum rem, culpa velit facilis labore nostrum eligendi, vitae laboriosam sunt in,
                                                                       pariatur corrupti accusamus tenetur fuga ullam dignissimos unde? Lorem ipsum dolor 
                                                                       sit amet consectetur adipisicing elit.</br></br> Sit velit ex eum pariatur doloribus, tempore
                                                                        totam rem, soluta laborum error ut, quibusdam quasi optio nam officiis voluptatibus.
                                                                         At, sunt quo! Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla 
                                                                         mollitia quam, nam quaerat, porro magni laboriosam ducimus perferendis suscipit 
                                                                         autem dolorum exercitationem illum reprehenderit culpa doloremque iusto cumque 
                                                                         quasi consectetur.Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cupiditate perspiciatis sint
                                                                         corrupti, velit exercitationem eligendi suscipit ratione, maxime dicta debitis
                                                                          obcaecati perferendis aliquam in quisquam beatae odio omnis repellat sequi?
                                                                           Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minima necessitatibus
                                                                            laborum rem, culpa velit facilis labore nostrum eligendi, vitae laboriosam sunt in,
                                                                             pariatur corrupti accusamus tenetur fuga ullam dignissimos unde? Lorem ipsum dolor 
                                                                             sit amet consectetur adipisicing elit. </br></br>Sit velit ex eum pariatur doloribus, tempore
                                                                              totam rem, soluta laborum error ut, quibusdam quasi optio nam officiis voluptatibus.
                                                                               At, sunt quo! Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla 
                                                                               mollitia quam, nam quaerat, porro magni laboriosam ducimus perferendis suscipit 
                                                                               autem dolorum exercitationem illum reprehenderit culpa doloremque iusto cumque 
                                                                               quasi consectetur.Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cupiditate perspiciatis sint
                                                                               corrupti, velit exercitationem eligendi suscipit ratione, maxime dicta debitis
                                                                                obcaecati perferendis aliquam in quisquam beatae odio omnis repellat sequi?
                                                                                 Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minima necessitatibus
                                                                                  laborum rem, culpa velit facilis labore nostrum eligendi, vitae laboriosam sunt in,
                                                                                   pariatur corrupti accusamus tenetur fuga ullam dignissimos unde? Lorem ipsum dolor 
                                                                                   sit amet consectetur adipisicing elit. </br></br>Sit velit ex eum pariatur doloribus, tempore
                                                                                    totam rem, soluta laborum error ut, quibusdam quasi optio nam officiis voluptatibus.
                                                                                     At, sunt quo! Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla 
                                                                                     mollitia quam, nam quaerat, porro magni laboriosam ducimus perferendis suscipit 
                                                                                     autem dolorum exercitationem illum reprehenderit culpa doloremque iusto cumque 
                                                                                     quasi consectetur.</p>
                                        </div>    
                                    </div>
                                </div>


                </div>
            </div>

            <!-- task details -->

        </div>
   </div>

</main>
@endsection

<!-- end::main content -->

