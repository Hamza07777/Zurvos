@extends('influence.layout.app')

@section('main-content')
<!-- begin::main content -->
<main class="main-content" style="margin-top: 13%;background-color:#EEF5FF;">

   <div class="container">
      <div class="row p-lg-3">
         <div class="col-lg-12">
            <h3>Resources File</h3>
            <div class="row">
               <div class="col-lg-12 mb-4" style="margin-top: 5%">
                <form action="{{route('search_resource_page') }}" method="post">
                    @csrf
                  <div class="input-group md-form form-sm form-2 pl-0" style="border: 1px solid;border-radius: 4px;">
                    <div class="input-group-append">
                      <span class="input-group-text  lighten-3" id="basic-text1" style="border-left: 1px solid;border-right: 0px;border-radius: 4px;background-color:white"> <i data-feather="search" style="margin-top:-3px;"></i></span>
                    </div>
                    <input class="form-control my-0 py-1 amber-border" name="serach" type="text" placeholder="Search by name" aria-label="Search" style="border:none">

                  </div>
                </form>
              </div>
            </div>

         </div>
      </div>
   </div>
<div class="container pl-5 pr-5">
    
    @foreach ($resourcess as $resourcess)


      <div class="row p-lg-3" style="background-color: white">
         <div  class="col-lg-3" >
            <img src="{{asset('public/assets/ZURVOS_ASSETS/IMAGES/WEB/pdf.png')}}" class="image-fluid mt-3" alt="Shreyu">

         </div>
         <div  class="col-lg-8" >
               <h5>{{ $resourcess->file_name }}</h5>
               <p>By Influence {{ date("Y-m-d", strtotime($resourcess->created_at))}}</p>
         </div>
         <div  class="col-lg-1" >
            <div class="dropdown" >
               <button style="border: none;background-color: white;" class=" dropdown-toggle" type="button" data-toggle="dropdown"><i data-feather="more-vertical" style="margin-top:0px; color: blue"></i></button>
               <ul class="dropdown-menu " style="width: 80%;margin-left: -141px;margin-top: 13px;">
                   <li class="list-group-item">View</li>
                   <li class="list-group-item">Share</li>
                   <li class="list-group-item">
                    <form action="{{action('InfluenceeController@my_resources_delete',$resourcess->id) }}" method="POST" style="">
                        @csrf
                        @method('DELETE')

                        <button type="submit" style="border: none;color: red; background-color: #F9F9F9; width:100%">Delete</button>
                    </form> 
                   </li>

               </ul>

             </div>
         </div>
      </div>
      <hr>
      @endforeach
   </div>

</main>
@endsection

<!-- end::main content -->
