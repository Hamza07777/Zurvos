@extends('gym_manager_layout.app')

@section('main-content')
<!-- begin::main content -->
<main class="main-content" style="margin-top: 13%;background-color:  #EEF5FF;">
    <div class="container">
        <form method="POST" action="{{ route('gym_manager_descriptions',$id) }}" enctype="multipart/form-data">
            @csrf
            <div class="row p-lg-3" style="background-color:  #FFFFFF;margin: 24px;">

                    <div class="col-lg-12 mt-3 text-center">
                        <h3>Features</h3>

                    </div>

                    <div class="col-lg-12 mt-3">
                        <label for=""> Gym Descriptions</label>
                        <textarea id="my-textarea" class="form-control" name="gym_detail" rows="5" style="margin-left: 3%; margin-top: 8.39062px; border: none;" placeholder="Title"></textarea>
                        @error('gym_detail')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="col-lg-12 mt-3">
                        <label for=""> Add Features</label><br>
                        <div class="form-check form-check-inline">
                            <input id="checkbox2" type="checkbox" name='services[]' value="loses Weight">
                            <label for="checkbox2">loses Weight</label>
                          </div>
                          <div class="form-check form-check-inline" >
                            <input id="checkbox3" type="checkbox" name='services[]' checked="checked" value="Abs">
                            <label for="checkbox3">Abs</label>
                          </div>
                          <div class="form-check form-check-inline" >
                            <input id="checkbox3" type="checkbox" name='services[]' checked="checked" value="Muscel building">
                            <label for="checkbox3">Muscel building</label>
                          </div>
                    </div>
                    <div class="form-check" style="margin-left: 20px;">
                        <input class="form-check-input" type="checkbox" >

                                     <label class="form-check-label" for="remember">
                                         Send user details to email
                                     </label>
                         </div>
                    <div class="col-lg-12 mt-lg-5 mb-lg-5">
                        <button type="submit" name="" id="" class="btn btn-primary btn-lg" role="button" style="width: 100%">ADD GYM</button>
                    </div>



        </div>
        </form>
    </div>

</main>
@endsection

<!-- end::main content -->
