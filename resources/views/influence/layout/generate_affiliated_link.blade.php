@extends('influence.layout.app')

@section('main-content')
<!-- begin::main content -->
<main class="main-content" style="margin-top: 13%;background-color:  #EEF5FF;">
    <div class="container">
        <div class="row m-5">

        </div>
         <div class="row p-lg-3" style="background-color:  #FFFFFF;margin: 24px;">
            <div class="col-lg-12">

                    <h3>Affiliated Link</h3>

            <form method="POST" action="{{ route('affiliated_link_save') }}" enctype="multipart/form-data">
                @csrf
              {{-- {{  dd(Auth::guard('influence')->user()->affiliated_link)}} --}}
                @if (Auth::guard('influence')->user()->affiliated_link==Null)
                <div class="col-lg-12 mt-lg-5">
                    <label for=""> Generate Affiliated Link</label>
                    <input class="form-control" type="text" name="affiliated_link" value="https://imtekh.com/noman/zurvos/{{ $link }}">
                </div>

                <div class="col-lg-12 mt-3">
                    <button type="submit" name="" id="" class="btn btn-primary " href="#" role="button" style="width: 100%">Generate Link</button>
                </div>
            </form>
                @else
                    <h6 class="mt-4"><strong>{{ Auth::guard('influence')->user()->affiliated_link }}</strong></h6>
                @endif


            <div class="col-lg-12 mt-3 ">
                {{--  <button type="" name="" id="" class="btn btn-secondary" href="#" role="button" style="width: 100%">Copy Link</button>  --}}
            </div>
         </div>
        
    </div>

</main>
@endsection

<!-- end::main content -->
