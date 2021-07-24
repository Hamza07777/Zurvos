@extends('influence.layout.app')

@section('main-content')
<!-- begin::main content -->
<main class="main-content" style="margin-top: 13%;background-color: #ffffff;">

   <div class="container">
    <div class="row" style="padding: 39px;">
       <div class="col-lg-12">
         <h2><strong>Affiliate Policy</strong></h2>
       </div>
       <div class="col-lg-12">
         <p>{{ $policy->text }}</p>
       </div>
       
    </div>
   </div>

</main>
@endsection

<!-- end::main content -->