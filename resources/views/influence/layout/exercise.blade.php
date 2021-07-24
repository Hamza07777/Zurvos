@extends('influence.layout.app')

@section('main-content')
<!-- begin::main content -->
<main class="main-content" style="margin-top: 13%;background-color: #ffffff;">
    <script>
        window.toggleFields = function toggleFields(){
            $('#fields').toggle();
            }
    </script>

    <div class="col-12 center-container">
        <div class="excercise-container">
            <h5>Videos</h5>
            <p>Total {{ $libarary->count() }} workout videos</p>
            <hr></hr>
            {{-- {{ dd($libarary) }} --}}
            @foreach ($libarary as $libarary)
                <div class="vedio-excercise d-flex">
                    <div class="col-lg-5">
                        <div class="embed-responsive embed-responsive-16by9">
                          <iframe class="embed-responsive-item" src="{{ $libarary->video_name }}" allowfullscreen autoplay="0" title="$tutorials->course_name"></iframe>
                        </div>
                      </div>

                    <div class="col-lg-4">
                        <div class="mrg-left-20 txt-excercise">
                            <h3>{{ $libarary->video_title }}</h3>

                            <p>by {{ $libarary->influencer_excercise_lib->full_name }}</p>
                            @if ($libarary->price=="0")
                            <div class="paid-button ">
                                <button type="button" class="btn a-tag" style="background-color: #F2F7FC; color:black; text-align:left" onClick="toggleFields()">Add Workout Lists</button>
                            </div>
                             @else
                            <div class="paid-button ">

                            </div>
                            @endif
                            <div style="display: none" id="fields">
                               <form action="{{ route('exercise_store') }}" method="post">
                                   @csrf

                               <input  type="hidden" name="lab_id" value="{{ $libarary->id }}">
                               <input  type="hidden" name="customer_id" value="{{ Auth::guard('influence')->user()->id  }}">
                                    <label for="image" class="col-form-label text-md-right mt-2">{{ __('Workouts') }}</label>
                                    <select class="form-control" id="sel1" name="workout_id">
                                     {{ $count_loop=$workout->count() }}
                                     @for ( $i= 0; $i < $count_loop; $i++)
                                          <option value="{{ $workout[$i]->id }}">{{ $workout[$i]->title }}</option>
                                     @endfor
                                      </select>
                                       @error('model_year')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div class="paid-button mt-2">
                                            <button>Add to list</button>
                                       </div>
                                    </form>
                                </div>

                        </div>
                    </div>
                    <div class="col-lg-3">

                        @if ($libarary->price=="0")
                            <div class="paid-button ">
                                <button>Free</button>
                            </div>

                       @else
                       <div class="paid-button ">
                           <button data-toggle="modal" data-target="#exampleModal">Order now </button>
                       </div>
                       <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">New Order video</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form method="POST" action="{{ route('order_workout_vedio') }}">
                                  @csrf
                                <div class="form-group">
                                  <input type="hidden" class="form-control" id="" name="tutorial_id" value="{{ $libarary->id }}">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">latitude:</label>
                                    <input type="text" class="form-control" id="recipient-name" name="latitude">
                                  </div>
                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">	longitude:</label>
                                    <input type="text" class="form-control" id="recipient-name"  name="longitude">
                                  </div>
                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Address:</label>
                                    <input type="text" class="form-control" id="recipient-name"  name=" address">
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Order now</button>
                                  </div>
                              </form>
                            </div>

                          </div>
                        </div>
                      </div>
                       @endif


                    </div>
                </div>
              @endforeach
          </div>
    </div>
</main>



 <script>
    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('New message to ' + recipient)
        modal.find('.modal-body input').val(recipient)
      })
</script>
@endsection
<!-- end::main content -->
