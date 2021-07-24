@extends('influence.layout.app')

@section('main-content')
<!-- begin::main content -->
<main class="main-content" style="margin-top: 13%;background-color: #ffffff;">

    <div class="row" style="padding: 39px;">
        <div class="col-lg-12">
            <h3><strong>Privacy Policy</strong></h3>
        </div>
        <div class="col-lg-12">
            <p>{{ $policy->text }}</p>
        </div>
        
   </div>

</main>
@endsection

<!-- end::main content -->