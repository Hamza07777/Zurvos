@extends('influence.layout.app')

@section('main-content')

    <main class="main-content" style="margin-top: 13%;background-color: #ffffff;">

        <div class="col-12 center-container">
            <div class="container-fluid build-workout-container">
                <div class="row inner">
                    <form action="{{route('workoutbuddy_find') }}" method="post">
                        @csrf
                        <div class="col-12">
                            <h5 class="txt-align-cntr">Find Workout Buddy</h5>
                            <h5 class="mrg-top-40">Workout Title</h5>
                            <input class="form-control" type="text" name="workout_title" placeholder="Title" required>
                            <h6 class="mrg-top-30">Select the type of workout</h6>
                            <select name="type" required>
                            <option value="Indoor">Indoor</option>
                            <option value="Outdoor">Outdoor</option>
                            </select>
                            <h6 class="mrg-top-30">Intensity level</h6>
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
                            <h6 class="mrg-top-40">Your goal</h6>
                            <div class="radio-buttons">
                            <label class="container">
                                Lose Fat
                                <input type="radio" checked="checked" name="radio1" value="Lose fat" />
                                <span class="checkmark"></span>
                            </label>
                            <label class="container">
                                Build Muscle
                                <input type="radio" name="radio1" value="Build muscle" />
                                <span class="checkmark"></span>
                            </label>
                            <label class="container">
                                Get Stronger
                                <input type="radio" name="radio1" value="Got stronger" />
                                <span class="checkmark"></span>
                            </label>
                        </div>
    
                            <div class="workout-time d-flex mrg-top-40">
                                <h6 class=" fnt-w-700">Workout Time</h6>
                                <select name="timing" required>
                                <option value="9:30 PM">9:30 PM</option>
                                <option value="10:30 PM">10:30 PM</option>
                                <option value="11:30 PM<">11:30 PM</option>
                                </select>
                            </div>
    
                            <div class="mrg-top-30">
                                <button type="submit" class="btn-blue">Find Buddy</button>
                                </div>
                        </div>
                    </form>
                </div>
                <hr></hr>
            </div>    
        </div>          

    </main>
@endsection

