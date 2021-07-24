@extends('influence.layout.app')

@section('main-content')
<!-- begin::main content -->
<main class="main-content" style="margin-top: 13%;background-color:  #EEF5FF;">
    <div class="container">
        <div class="row m-5">

        </div>
         <div class="row p-lg-3" style="background-color:  #FFFFFF;margin: 24px;">
            <div class="col-lg-12">

                    <h3>Make Influencer</h3>

            <form method="POST" action="{{ route('verify_link_form_verify') }}" enctype="multipart/form-data">
                @csrf

                <div class="col-lg-12 mt-lg-5">
                    <label for=""> Verify Affiliated Link.</label>
                    <input class="form-control" type="text" style="-webkit-text-security: circle;" name="affiliated_link" value="" required  autofocus placeholder="Enter Affiliated Link">
                    <small>In this field enter the link which your influencer friend share with you </small>
                </div>

                <div class="col-lg-12 mt-3">
                    <button type="submit" name="" id="" class="btn btn-primary " href="#" role="button" style="width: 100%">Verify Link</button>
                </div>
            </form>



            <div class="col-lg-12 mt-3 ">
                {{--  <button type="" name="" id="" class="btn btn-secondary" href="#" role="button" style="width: 100%">Copy Link</button>  --}}
            </div>
         </div>

    </div>

</main>
@endsection

<!-- end::main content -->
