@extends('influence.layout.app')

@section('main-content')
<!-- begin::main content -->
<main class="main-content" style="margin-top: 13%;background-color:  #EEF5FF;">
    <div class="container">
        <div class="row m-5">

        </div>
         <div class="row p-lg-3" style="background-color:  #FFFFFF;margin: 24px;">
            <div class="col-lg-12">
                    <h3>Add Resource</h3>

            <form method="POST" action="{{ action('InfluenceeController@my_resources_store') }}" enctype="multipart/form-data">
                @csrf

            <div class="col-lg-12 mt-lg-5">
                <label for=""> Resource Name</label>
                <input class="form-control" type="text" name="file_name" placeholder="pdf file">
            </div>
            <div class="form-group row mt-lg-3">
                <div class="col-md-6">
                    <input id="pdf_file" class="p-0 "  name="pdf_file" type="file" accept="image/jpeg, image/png, application/pdf" value="{{ old('pdf_file') }}" required style="border: none"/>

                </div>
            </div>

            <div class="col-lg-12 mt-lg-5 mb-lg-5">
                <button type="submit" name="" id="" class="btn btn-primary btn-lg" href="#" role="button" style="width: 100%">ADD Resource</button>
            </div>
         </div>
        </form>
    </div>

</main>
@endsection

<!-- end::main content -->
