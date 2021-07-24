@extends('admin_layout.app')

@section('main-content')
<!-- begin::main content -->
<main class="main-content" style="margin-top: 13%;background-color: #ffffff;">

   <div class="container" style="background-color: #EEF5FF">
        <div class="row" >
            <div class="col-xl-12">

                       <ul class="nav nav-tabs" style="margin-left: 6%;">
                                <li class="nav-item" style="margin-left: 5%;">
                                    <a href="#one" data-toggle="tab" aria-expanded="false"
                                        class="nav-link active" >
                                        <span class="d-block d-sm-none"><small>VENDORS FAQS</small></span>
                                        <span class="d-none d-sm-block">VENDORS FAQS</span>
                                    </a>
                                </li>
                                <li class="nav-item" style="margin-left: 28%;">
                                    <a href="#two" data-toggle="tab" aria-expanded="true"
                                        class="nav-link">
                                        <span class="d-block d-sm-none"><small>RESOURCES</small></span>
                                        <span class="d-none d-sm-block">RESOURCES</span>
                                    </a>
                                </li>

                            </ul>





                            <div class="tab-content p-3 text-muted">
                                <div class="tab-pane active" id="one">

                                    <div class="row p-lg-3 m-lg-1" style="margin-top: 2%;background-color: #ffffff">
                                        <div class="col-lg-10 ">
                                            <h5>Do you Ship Internationlly</h5>
                                        </div>
                                        <div class="col-lg-1 " style="margin-top: -3%;">
                                            <div class="dropdown ">

                                                    <button style="border: none;background-color: white;" class=" dropdown-toggle" type="button" data-toggle="dropdown"><i data-feather="more-vertical" style="margin-top:28px; color: blue"></i></button>
                                                    <ul class="dropdown-menu " style="width: 80%;margin-left: -141px;margin-top: 13px;">
                                                        <li class="list-group-item"><a href="">Edit Question</a></li>
                                                        <li class="list-group-item"><a href="">Delete</a></li>
                                                    </ul>

                                            </div>
                                        </div>
                                        <div class="col-lg-12 mt-4" >
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum aperiam omnis vel praesentium beatae, natus nostrum eligendi consequuntur non? At magni itaque deleniti quidem alias sit incidunt laudantium fugit nam.</p>
                                        </div>
                                    </div>
                                    <div class="row p-lg-3 m-lg-1" style="margin-top: 2%;background-color: #ffffff">
                                        <div class="col-lg-10 ">
                                            <h5>Do you Ship Internationlly</h5>
                                        </div>
                                        <div class="col-lg-1 " style="margin-top: -3%;">
                                            <div class="dropdown ">

                                                    <button style="border: none;background-color: white;" class=" dropdown-toggle" type="button" data-toggle="dropdown"><i data-feather="more-vertical" style="margin-top:28px; color: blue"></i></button>
                                                    <ul class="dropdown-menu " style="width: 80%;margin-left: -141px;margin-top: 13px;">
                                                        <li class="list-group-item"><a href="">Edit Question</a></li>
                                                                <li class="list-group-item"><a href="">Delete</a></li>
                                                    </ul>

                                            </div>
                                        </div>
                                        <div class="col-lg-12 mt-4" >
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum aperiam omnis vel praesentium beatae, natus nostrum eligendi consequuntur non? At magni itaque deleniti quidem alias sit incidunt laudantium fugit nam.</p>
                                        </div>
                                    </div>

                                </div>
                            
                                <!-- TAB 2 -->


                                <div class="tab-pane" id="two">

                                    <div class="row p-lg-3 m-lg-1" style="margin-top: 2%;background-color: #ffffff">
                                        <div class="col-md-3" style="margin: 2% 2% 2% 10%;background-color: #EEF5FF;padding: 14px;text-align: center;">
                                            <i data-feather='file-text' class='' ></i>
                                            <h3>PDF</h3>
                                        </div>
                                        <div class="col-md-3" style="margin: 2%;background-color: #EEF5FF;padding: 14px;text-align: center;">
                                            <i data-feather='video' class='' style=""></i>
                                            <h3>VIDEO</h3>

                                        </div>
                                        <div class="col-md-3" style="margin: 2%;background-color: #EEF5FF;padding: 14px;text-align: center;">
                                            <i data-feather='image' class='' ></i>
                                            <h3>IMAGE</h3>
                                        </div>

                                       
                                            <div class="col-lg-12 mt-3">
                                                <form method="POST" action="{{ route('save_vendor_faqs') }}" enctype="multipart/form-data">

                                                    @csrf
                                                    <label for="">Resource Name </label>
                                                    <input id="file_name" type="text" class="form-control @error('file_name') is-invalid @enderror" name="file_name" value="{{ old('file_name') }}" required autocomplete="file_name" autofocus placeholder="File Name">
                                                        @error('file_name')
                                                            <span class="invalid-feedback" role="alert">
                                                                 <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                            </div>
                                            <div class="col-lg-12 mt-3">
                                                <label for=""> Upload File</label>
                                                <input  class="form-control @error('pdf_file') is-invalid @enderror" type="file" style="border: none;height: 45px;"  name="pdf_file" accept="image/jpeg, image/png, video/mp4, video/ogg, application/pdf" value="{{ old('pdf_file') }}" required >
                            
                                            </div>
                                            <div class="col-lg-12 mt-lg-5 mb-lg-5">
                                                <button type="submit" name="" id="" class="btn btn-primary btn-lg" href="#" role="button" style="width: 100%">ADD RESOURCE</button>
                                            </form>
                                            </div>
                                        
                                    </div>
                                </div>
                            </div>


                
            </div>

            <!-- task details -->

        </div>
   </div>

</main>
@endsection
