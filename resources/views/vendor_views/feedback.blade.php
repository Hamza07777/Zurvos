@extends('influence.layout.app')

@section('main-content')
<!-- begin::main content -->
<main class="main-content" style="margin-top: 13%;">

    <div class="col-12 center-container">
        <div class="feedback-main">
            <form action="{{route('feedback_storeee') }}" method="post">
                @csrf
                <div class="feedback-inner">
                    <h5 class="fnt-w-700">
                    Overall, how did you feel about the services?
                    </h5>
                    <div class="radio-buttons" >
                    <label class="container">
                        Very Satisfied
                        <input type="radio" checked="checked" name="radio"  value="Very Satisfied" />
                        <span class="checkmark"></span>
                    </label>
                    <label class="container">
                        Neither Satisfied or dissatisfied
                        <input type="radio" name="radio"  value="Neither Satisfied or dissatisfied" />
                        <span class="checkmark"></span>
                    </label>
                    <label class="container">
                        Dissatisfied
                        <input type="radio" name="radio"  value="Dissatisfied" />
                        <span class="checkmark"></span>
                    </label>
                    <label class="container">
                        Very Dissatisfied
                        <input type="radio" name="radio" value="Very Dissatisfied" />
                        <span class="checkmark"></span>
                    </label>
                    </div>
                    <h5 class="mrg-top-40">How could we improve our services?</h5>
                    <textarea class="mrg-top-10" rows="3" maxLength="120" name="improvement">
                    </textarea>
                    <p>character limit 120</p>
                    <h6 class="mrg-top-10">
                    Please dont include any financial information such as your credit
                    card number.
                    </h6>
                    <div class="mrg-top-30">
                    <button type="submit" class="btn-blue">GIVE FEEDBACK</button>
                    </div>
                </div>
            </form>
        </div>
      </div>

</main>
@endsection

<!-- end::main content -->
