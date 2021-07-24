@extends('influence.layout.app')

@section('main-content')
<!-- begin::main content -->
<main class="main-content" style="margin-top: 13%;background-color: #ffffff;">

   <div class="container">
      <div class="row" style="padding: 39px 10px 0px 10px;">
        <div class="col-lg-4" style="margin-left: 74px;">
            <a href="{{ route('FAQ_question') }}"><h4><strong>Questions</strong></h4></a>
         </div>
         <div class="col-lg-6">
            <a href="{{ route('FAQ_video') }}"><h4><strong>Videos</strong></h4></a>
         </div>
      </div>
      <hr>
        @foreach ($question as $question)

            <div class="row" style="padding: 39px;">
                <div class="col-lg-12">
                    <h3><strong>{{ $question->question }}</strong></h3>
                </div>
                <div class="col-lg-12">
                    <p>{{ $question->answer }}</p>
                </div>

            </div>
        @endforeach
   </div>

</main>
@endsection

<!-- end::main content -->
