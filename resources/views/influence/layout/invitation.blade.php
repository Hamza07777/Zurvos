@extends('influence.layout.app')

@section('main-content')
<!-- begin::main content -->
<main class="main-content" style="margin-top: 13%;background-color: #ffffff;">


    <div class="col-12 center-container">
        <div class="msg-main-invitaion">
            <h4>Invitations</h4>

            @foreach ($buddy as $buddy)


                <div class="msg-contant mrg-top-20">
                    <div class="d-flex jst-cont-between">
                    <div class="d-flex mrg-top-15">
                        <div>
                            <img class="img" src="{{asset('public/userimage/'.$buddy->invi_buddy_workout->user_image)}} " alt="" />
                        </div>
                        <div class="mrg-left-20">
                        <h6 class="fnt-w-700">{{ $buddy->invi_buddy_workout->name }}</h6>
                        <p>{{ $buddy->invi_buddy_workout->city }}</p>
                        </div>
                    </div>
                    <div>
                        <form action="{{ url('influence/accept_invite/'.$buddy->buddy_workout_id )}}" method="post" class="mt-1">
                            @csrf
                            <button class="btn btn-primary">Accept</button>
                        </form>
                        <form action="{{ url('influence/reject_invite/'.$buddy->buddy_workout_id )}}" method="post" class="mt-5">
                            @csrf
                            <button class="btn btn-danger">Reject</button>
                        </form>


                    </div>
                    </div>
                </div>
              @endforeach
          </div>

      </div>

</main>
@endsection

<!-- end::main content -->
