@extends('influence.layout.app')

@section('main-content')
<!-- begin::main content -->
<main class="main-content" style="margin-top: 13%;background-color: #F2F7FC;">

    <div class="container">
        <div class="row" style="margin-top: 8%">
            <div class="col-md-12 mb-3">
                <form action="{{route('search_page') }}" method="post">
                    @csrf
                <div class="input-group md-form form-sm form-2 pl-0">
                    <span class="input-group-text  lighten-3" id="basic-text1" style="border-radius:0px;border:none;background-color:white"> <i data-feather="search" style="margin-top:-3px;"></i></span>

                  <input class="form-control my-0 py-1 amber-border" type="text" placeholder="Search by location" aria-label="Search" style="border:none" name="search_by_location">
                  <div class="input-group-append">
                    <span class="input-group-text  lighten-3" id="basic-text1" style="border-radius:0px;border:none;background-color:white"> <i data-feather="filter" style="margin-top:-3px;"></i></span>
                  </div>
                </div>
                </form>
              </div>
        </div>
       
        @foreach ($gym as $gym)
        <div class="row" style="    margin-left: 0%;margin-right: 0%;margin-top:5%" >

            <div class="col-lg-2 " style="background-color: white;">
                <img src="{{asset('public/gymimage/'.$gym->gym_image)}}" class="avatar-xs rounded-circle mr-2" alt="Shreyu" style="width: 3.5rem;height: 4rem; margin-top:19%;margin-left: 35%;">
             </div>
            <div class="col-lg-10 " style="background-color: white">
                <h5 class="ml-lg-4">{{ $gym->full_name }}</h5>
                <img src="{{asset('public\assets\ZURVOS_ASSETS\ICONS\Locations.png')}}" class="img-fluid ml-lg-4" alt="Shreyu"> <span>{{ $gym->full_name1 }},{{ $gym->street_address }}</span>

              <a href="#" > <p class="ml-lg-4"> Cost -{{ $gym->cost_per_day }}/workout</p></a>
            </div>
        </div>
        @endforeach


    </div>

</main>
@endsection
<!-- end::main content -->
