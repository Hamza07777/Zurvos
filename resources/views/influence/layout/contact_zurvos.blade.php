@extends('influence.layout.app')

@section('main-content')
<!-- begin::main content -->
<main class="main-content" style="margin-top: 13%;background-color:  #EEF5FF;">
    <div class="container">
        <div class="row m-5">

        </div>
      <div class="row p-lg-3" style="background-color:  #FFFFFF;margin: 24px;">
            <div class="col-lg-12">
                    <h3>Contact Fueled</h3>
            </div>
        <div class="col-lg-12">
            <form method="POST" action="{{ action('InfluenceeController@contact_zurvos_store') }}" >
                @csrf
            <div class="col-lg-12 mt-lg-5">
                <label for=""> Subject</label>
                <input class="form-control" type="text" name="subject" placeholder="">
            </div>
            <div class="col-lg-12 mt-lg-3">

                <div class="form-group">
                    <label for=""> Message</label>
                    <textarea id="my-textarea" class="form-control" name="user_message" rows="3" placeholder="Enter Details..."></textarea>
                </div>
                <p>Character limit 30</p>
            </div>
            <div class="col-lg-12 mt-lg-5 mb-lg-5">
                <button type="submit" class="btn btn-primary btn-lg" style="width: 100%">Send</button>
            </div>
            </form>
         </div>
   </div>

</main>
@endsection

<!-- end::main content -->
