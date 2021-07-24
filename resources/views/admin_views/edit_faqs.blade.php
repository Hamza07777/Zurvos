@extends('admin_layout.app')

@section('main-content')
<!-- begin::main content -->
<main class="main-content" style="margin-top: 13%;background-color:  #FFFFFF;">
    <div class="container">



        <div class="row" >
            <div class="col-xl-12">

                                    <form method="POST" action="{{ route('update_admin_faqs',$faq->id) }}" enctype="multipart/form-data">
                                        @csrf
                                  
                                        <div class="row p-lg-3" style="background-color:  #FFFFFF;margin: 24px;">

                                            <div class="col-lg-12 mt-lg-5">
                                                <label for="">Question </label>
                                                <textarea id="my-textarea" class="form-control" name="question" rows="5"  placeholder="Question" required>{{ $faq->question }}</textarea>
                                            </div>
                                            <div class="col-lg-12 mt-lg-5">
                                                <label for="">Answer </label>
                                                <textarea id="my-textarea" class="form-control" name="answer" rows="5"  placeholder="Answer" required>{{ $faq->answer }}</textarea>
                                            </div>
                                            <div class="col-lg-12 mt-3">
                                                <label for=""> Video</label>
                                                <input  class="form-control @error('video') is-invalid @enderror" type="file" style="border: none;height: 45px;"  name="video" accept="video/mp4, video/ogg" value="{{ old('video') }}" >

                                            </div>
                                            <div class="col-lg-12 mt-lg-5 mb-lg-5">
                                                <button type="submit" name="" id="" class="btn btn-primary btn-lg" href="#" role="button" style="width: 100%">ADD FAQ</button>
                                            </div>

                                        </div>
                                    </form>

                                </div>

        </div>

    </div>

</main>
@endsection

<!-- end::main content -->
