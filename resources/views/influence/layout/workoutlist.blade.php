@extends('influence.layout.app')

@section('main-content')
<!-- begin::main content -->
<main class="main-content" style="margin-top: 13%;background-color: #ffffff;">
    <div class="col-12 center-container">
        <div class="msg-main-workout-list">
            <div class="d-flex jst-cont-between alg-itm-end">
              <h5>Workout list</h5>
              {{-- <button class="add-new-list">Add New List</button> --}}
            </div>
            {{-- {{ dd($workout) }} --}}
            @foreach ($workout as $workout)

            <a href="{{ url('influence/workout_videos/'.$workout->id) }}">
              <div class="msg-contant mrg-top-20">
                <div class="d-flex jst-cont-between">
                  <div class="d-flex mrg-top-15 ">
                    {{-- <div>
                      <img class="img" src="../assets/images/test.jpg" alt="" />
                    </div> --}}
                    <div class="mrg-left-20 mrg-top-20">
                      <h4 class="fnt-w-700">{{ $workout->title }}</h4>
                      <p>{{ $workout->totalvideo($workout->id)}} videos</p>
                      <!-- {/* <p class="mrg-top-30">{sin.time}</p> */} -->
                    </div>
                  </div>
                  <div>
                    <img src="../assets/images/icons/Dot_menu.png" alt="" />
                  </div>
                </div>
              </div>
            </a>  
              @endforeach
          </div>

      </div>
</main>
@endsection

<!-- end::main content -->
