@extends('influence.layout.app')

@section('main-content')
<!-- begin::main content -->
<main class="main-content" style="margin-top: 13%;">

    <div class="col-12 center-container">
        <div class="msg-main-buddy-list">
            <h4>Buddy List</h4>
            @foreach ($buddy as $buddy)
              <div class="msg-contant mrg-top-20">
                <div class="d-flex jst-cont-between">
                  <div class="d-flex mrg-top-15 aln-itm-c ">
                    <div>
                      <img class="img" src="{{asset('public/userimage/'.$buddy->Influence_buddy_workout->user_image)}} " alt="" />
                    </div>
                    <div class="mrg-left-20">
                      <h4 class="fnt-w-700">{{ $buddy->Influence_buddy_workout->name }}</h4>
                      <p>{{ $buddy->Influence_buddy_workout->city }}</p>
                      <!-- {/* <p class="mrg-top-30">{sin.time}</p> */} -->
                    </div>
                  </div>
                  <div>
                    <img src="../assets/images/icons/Dot_menu.png" alt="" />
                  </div>
                </div>
              </div>
              @endforeach
          </div>

      </div>

</main>
@endsection

<!-- end::main content -->
