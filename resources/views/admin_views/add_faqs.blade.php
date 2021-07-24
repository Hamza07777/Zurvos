@extends('admin_layout.app')

@section('main-content')
<!-- begin::main content -->
<main class="main-content" style="margin-top: 13%;background-color:  #FFFFFF;">
    <div class="container">



        <div class="row" >
            <div class="col-xl-12">


                <ul class="nav nav-tabs" style="margin-left: 6%;">
                    <li class="nav-item" style="margin-left: 5%;">
                        <a href="#one" data-toggle="tab" aria-expanded="false"
                            class="nav-link active" >
                            <span class="d-block d-sm-none"><small>ADD NEW FAQ</small></span>
                            <span class="d-none d-sm-block">ADD NEW FAQ</span>
                        </a>
                    </li>
                    <li class="nav-item" style="margin-left: 28%;">
                        <a href="#two" data-toggle="tab" aria-expanded="true"
                            class="nav-link">
                            <span class="d-block d-sm-none"><small>EXISTING FAQ</small></span>
                            <span class="d-none d-sm-block">EXISTING FAQ</span>
                        </a>
                    </li>

                </ul>


                            <div class="tab-content p-3 text-muted">
                                <div class="tab-pane active" id="one">

                                    <form method="POST" action="{{ route('save_admin_faqs') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row p-lg-3" style="background-color:  #FFFFFF;margin: 24px;">

                                            <div class="col-lg-12 mt-3">
                                                <label><strong>FAQs Type</strong> </label><br>
                                                <div class="radio radio-primary mt-4" style="display: inline;">
                                                  <input id="radioinline1" type="radio" name="type" value="question" checked>
                                                  <label class="mb-0" for="radioinline1">Question</label>
                                                </div>
                                                <div class="radio radio-primary mt-4" style="display: inline;margin-left: 11%;">
                                                  <input id="radioinline2" type="radio" name="type" value="video">
                                                  <label class="mb-0" for="radioinline2"> Video</label>
                                                </div>

                                            </div>
                                            <div class="col-lg-12 mt-lg-5">
                                                <label for="">Question </label>
                                                <textarea id="my-textarea" class="form-control" name="question" rows="5"  placeholder="Question" required></textarea>
                                            </div>
                                            <div class="col-lg-12 mt-lg-5">
                                                <label for="">Answer </label>
                                                <textarea id="my-textarea" class="form-control" name="answer" rows="5"  placeholder="Answer" required></textarea>
                                            </div>
                                            <div class="col-lg-12 mt-3">
                                                <label for=""> Video</label>
                                                <input  class="form-control @error('video') is-invalid @enderror" type="file" style="border: none;height: 45px;"  name="video" accept="video/mp4, video/ogg" value="{{ old('video') }}" required >

                                            </div>
                                            <div class="col-lg-12 mt-lg-5 mb-lg-5">
                                                <button type="submit" name="" id="" class="btn btn-primary btn-lg" href="#" role="button" style="width: 100%">ADD FAQ</button>
                                            </div>

                                        </div>
                                    </form>

                                </div>

                                <!-- TAB 2 -->


                                <div class="tab-pane" id="two">

                                    <div class="row " style="background-color: #ffffff;">

                                        <div class="col-lg-12 " >
                                            <form method="POST" action="" enctype="multipart/form-data">
                                                @csrf

                                                <i data-feather='search' class='ml-2 mt-lg-2' style="position: absolute;"></i>
                                                <input class="form-control pl-lg-5"  type="search" name="" placeholder=" Search your question">
                                            </form>
                                        </div>
                                        <div class="col-lg-12 mt-lg-5" >
                                            <h4>All Questions</h4>
                                            @foreach ($faq as $faqs)
                                            <div class="row  " style="background-color: #F7F7FF">
                                                <div class="col-lg-10" >


                                                    <h4>{{ $faqs->question }}</h4>
                                                    <p>{{ $faqs->answer }}</p>

                                                </div>

                                                <div class="col-lg-1 " style="margin-top: -3%;">
                                                    <div class="dropdown ">

                                                            <button style="border: none;background-color: transparent;" class=" dropdown-toggle" type="button" data-toggle="dropdown"><i data-feather="more-vertical" style="margin-top:28px; color: blue; margin-left: 52px;"></i></button>
                                                            <ul class="dropdown-menu " style="width: 80%;margin-left: -97px;margin-top: 13px;">
                                                                <li class="list-group-item"><a href="{{ route('edit_faq',$faqs->id) }}">Edit Question</a></li>
                                                                <li class="list-group-item"><a href="{{ route('delete_faq',$faqs->id) }}">Delete</a></li>
                                                            </ul>

                                                        </div>
                                                </div>
                                            </div>
                                            @endforeach

                                        </div>


                                        <div class="col-lg-12 mt-lg-5" >
                                            <h4>All Videos</h4>
                                            <div class="row">
                                                @foreach ($faq as $faqss)
                                                <div class="col-lg-6" >
                                                    <figure class="figure" style="width: 100%;">
                                                        <div class="embed-responsive embed-responsive-16by9">
                                                            <iframe class="embed-responsive-item" src="{{asset('/public/faqVideos/'.$faqss->video)}}" allowfullscreen title="$tutorials->course_name"></iframe>
                                                          </div>
                                                        <figcaption class="figure-caption" style="background-color: #F3F4F7;margin-top: -3%;border-radius: 0% 0% 13% 13%;padding: 7px;">
                                                            <div class="row  ">
                                                                <div class="col-lg-11" >
                                                                        <p>{{ $faqss->answer }} </p>
                                                                </div>
                                                                <div class="col-lg-1 " style="margin-top: -3%;margin-left: -9%;">
                                                                    <div class="dropdown ">

                                                                            <button style="border: none;background-color: transparent;" class=" dropdown-toggle" type="button" data-toggle="dropdown"><i data-feather="more-vertical" style="margin-top:9px; color: blue"></i></button>
                                                                            <ul class="dropdown-menu " style="width: 80%;margin-left: -141px;margin-top: 13px;">
                                                                                <li class="list-group-item"><a href="{{ route('edit_faq',$faqs->id) }}">Edit Question</a></li>
                                                                                <li class="list-group-item"><a href="{{ route('delete_faq',$faqss->id) }}">Delete</a></li>
                                                                            </ul>

                                                                        </div>
                                                                </div>
                                                            </div>
                                                        </figcaption>
                                                      </figure>

                                                </div>
                                                @endforeach


                                            </div>
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

<!-- end::main content -->
