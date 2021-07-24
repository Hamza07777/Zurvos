@extends('admin_layout.app')

@section('main-content')
<!-- begin::main content -->
<main class="main-content" style="margin-top: 13%;background-color:  #EEF5FF;">
    <div class="container">
        <form method="POST" action="{{ route('save_new_tutorial') }}" enctype="multipart/form-data">
            @csrf
            <div class="row p-lg-3" style="background-color:  #FFFFFF;margin: 24px;">

                <div class="col-lg-12">
                        <h3 class="text-center">Add New Tutorials</h3>
                </div>


                <div class="col-lg-12 mt-lg-5">
                    <label for="">Course Name </label>
                    <input id="course_name" type="text" class="form-control @error('course_name') is-invalid @enderror" name="course_name" value="{{ old('course_name') }}" required autocomplete="course_name" autofocus placeholder="Course Name">
                    @error('course_name')
                        <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-lg-12 mt-lg-5">
                    <label for="">Course Price </label>
                    <input id="course_price" type="text" class="form-control @error('course_price') is-invalid @enderror" name="course_price" value="{{ old('course_price') }}" required autocomplete="course_price" autofocus placeholder="Course Price">
                    @error('course_price')
                        <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

            <div class="col-lg-12 mt-3">
                <label for=""> Course Category</label>
                    <select class="form-control" name="category">
                        <optgroup label="Course Category">
                          <option value="fitness">Fitness</option>
                          <option value="Suppliments">Suppliments</option>
                          <option value="zurvos">Zurvos</option>
                        </optgroup>
                      </select>
                      @error('category')
                      <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="col-lg-12 mt-3">
                    <label>Course Type</label><br>
                    <div class="radio radio-primary mt-2">
                      <input id="radioinline1" type="radio" name="type" value="0" checked>
                      <label class="mb-0" for="radioinline1">Free Video</label>
                    </div>
                    <div class="radio radio-primary mt-2">
                      <input id="radioinline2" type="radio" name="type" value="1">
                      <label class="mb-0" for="radioinline2">Paid Video</label>
                    </div>

                </div>
                <div class="col-lg-12 mt-3">
                    <label for=""> Upload File</label>
                    <input  class="form-control @error('course_videos') is-invalid @enderror" type="file" style="border: none;height: 45px;"  name="course_videos" accept="video/mp4, video/ogg" value="{{ old('course_videos') }}" required >

                </div>
                <div class="col-lg-12 mt-lg-5 mb-lg-5">
                    <button type="submit" name="" id="" class="btn btn-primary btn-lg" href="#" role="button" style="width: 100%">ADD TUTORIALS</button>
                </div>

            </div>
        </form>
    </div>

</main>
@endsection

<!-- end::main content -->
