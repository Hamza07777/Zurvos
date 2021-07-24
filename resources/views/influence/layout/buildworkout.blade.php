@extends('influence.layout.app')

@section('main-content')
<!-- begin::main content -->
<main class="main-content" style="margin-top: 13%;background-color: #ffffff;">

    <div class="col-12 center-container">
        <div class="container-fluid build-workout-container">
            <div class="row inner">
                <form action="{{route('buildworkout_store') }}" method="post">
                    @csrf
                    <div class="col-12">
                        <h5 class="txt-align-cntr">Build A Workout</h5>
                        <h5 class="mrg-top-40">Title</h5>
                        <input class="form-control" type="text" name="workout_title" placeholder="Title" required>
                        <h5 class="mrg-top-40">Description</h5>
                        <textarea class="form-control" name="description" id="" cols="50" rows="4" required></textarea>
                        <h6 class="mrg-top-30">Select The Type Of Workout</h6>
                        <select name="type" required>
                        <option value="Indoor">Indoor</option>
                        <option value="Outdoor">Outdoor</option>
                        </select>
                        <h6 class="mrg-top-30">Intensity Level Change</h6>
                        <div class="radio-buttons" name="workout_level">
                        <label class="container">
                            Easy
                            <input type="radio" checked="checked" name="radio" value="Easy" />
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">
                            Hard
                            <input type="radio" name="radio" value="Hard"/>
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">
                            Intense
                            <input type="radio" name="radio" value="Hard"/>
                            <span class="checkmark"></span>
                        </label>
                        </div>
                        <h6 class="mrg-top-40">Your Goals</h6>
                        <div class="radio-buttons">
                        <label class="container">
                             Lose Fat
                            <input type="checkbox" class="form-check-input"  name="goal[]" value="Lose fat" checked="checked" id="exampleCheck1">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">
                            Build Muscle
                            <input type="checkbox" class="form-check-input"  name="goal[]" value="Build muscle" checked="checked" id="exampleCheck1">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">
                            Get Stronger
                            <input type="checkbox" class="form-check-input"  name="goal[]" value="Got stronger" checked="checked" id="exampleCheck1">
                            <span class="checkmark"></span>
                        </label>
                    </div>

                        <div class="mrg-top-30">
                            <button type="submit" class="btn-blue">Build Workout</button>
                            </div>
                    </div>
                </form>
            </div>
            <hr></hr>




              {{--  <div class="vedio-div">
                <div class="image-text">
                  <img class="image" src="../assets/images/test.jpg" alt="" />
                  <div class="mrg-left-20">
                    <h5>Video title</h5>
                    <p>by creator name</p>
                    <h5 class="a-tag">Add Workouts list</h5>
                  </div>
                </div>
              </div>  --}}

          </div>
      </div>
</main>

@endsection

<!-- end::main content -->
