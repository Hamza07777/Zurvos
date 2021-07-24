@extends('influence.layout.app')

@section('main-content')
<!-- begin::main content -->
<main class="main-content" style="margin-top: 13%;background-color: #ffffff;">

   <div class="container" style="padding: 0px;">
    <?php  $coverimage=Auth::guard('influence')->user()->cover_image; ?>
      <img src="{{asset('public/userimage/'.$coverimage)}}" class="image-fluid" alt="Shreyu" width="100%" >
      <div class="row">
         <div class="col-lg-12 text-center">
            <?php  $image=Auth::guard('influence')->user()->user_image; ?>
            <img src="{{asset('public/userimage/'.$image)}}" class=" rounded-circle" alt="Shreyu" width="15% " style="z-index: 1; margin-top: -9%;" />
            {{-- <img src="{{asset('public\assets\ZURVOS_ASSETS\RAW_IMAGES\camera.png')}}" class=" rounded-circle" alt="Shreyu" width="5% " style="z-index: 2; margin-left: -5%; background-color: #ffffff;" /> --}}
            <h5>{{ Auth::guard('influence')->user()->name }}</h5>
            <img src="{{asset('public\assets\ZURVOS_ASSETS\ICONS\Locations.png')}}" class="img-fluid" alt="Shreyu">
            <span>{{ Auth::guard('influence')->user()->city }}</span>

         </div>
      </div>
      <form method="POST" action="{{route('account_setting_update_profile') }}" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="id" value="{{ Auth::guard('influence')->user()->cust_id }}">
            <div class="row p-3">
                <div class="col-lg-12">
                    <h3><strong>BASIC INFORMATION</strong></h3>
                </div>
                <div class="col-lg-11">
                    <div class="form-group">
                    <label for="full_name">Full Name</label>
                    <input type="text" class="form-control" name="user_name" id="" aria-describedby="helpId" placeholder="Enter Full Name" style="border: #ffffff;border-bottom:1px solid darkgrey;border-radius:0px" value="{{ Auth::guard('influence')->user()->name }}">
                    </div>
                </div>
                <div class="col-lg-1">
                    <img src="{{asset('public\assets\ZURVOS_ASSETS\ICONS\pen.png')}}" class="img-fluid" alt="Shreyu" style="background: #EDEEF0; padding: 6px;margin-left: -183%; margin-top: 127%;" >
                </div>
            </div>
            <div class="row p-3">
                <div class="col-lg-11">
                    <div class="form-group">
                    <label for="full_name">Contact Number</label>
                    <input type="text" class="form-control" name="phone_number" id="" aria-describedby="helpId" placeholder="356892-456-78965" style="border: #ffffff;border-bottom:1px solid darkgrey;border-radius:0px" value="{{ Auth::guard('influence')->user()->phone_number }}">
                    </div>
                </div>
                <div class="col-lg-1">
                    <img src="{{asset('public\assets\ZURVOS_ASSETS\ICONS\pen.png')}}" class="img-fluid" alt="Shreyu" style="background: #EDEEF0; padding: 6px;margin-left: -183%; margin-top: 127%;" >
                </div>
            </div>
            <div class="row p-3">
                <div class="col-lg-11">
                    <div class="form-group">
                    <label for="bio">Bio</label>
                    <input type="text" class="form-control" name="bio" id="" aria-describedby="helpId" placeholder="bio" style="border: #ffffff;border-bottom:1px solid darkgrey;border-radius:0px" value="{{ Auth::guard('influence')->user()->bio }}">
                    </div>
                </div>
                <div class="col-lg-1">
                    <img src="{{asset('public\assets\ZURVOS_ASSETS\ICONS\pen.png')}}" class="img-fluid" alt="Shreyu" style="background: #EDEEF0; padding: 6px;margin-left: -183%; margin-top: 127%;" >
                </div>
            </div>
            <div class="row p-3">
                <div class="col-lg-11">
                    <div class="form-group">
                    <label for="full_name">Locations</label>
                    <input type="text" class="form-control" name="location" id="" aria-describedby="helpId" placeholder="location" style="border: #ffffff;border-bottom:1px solid darkgrey;border-radius:0px" value="{{ Auth::guard('influence')->user()->city }}">
                    </div>
                </div>
            </div>

            <div class="row p-3">
                <div class="col-lg-11">
                    <div class="form-group">
                    <label for="full_name">Zip Code</label>
                    <input type="text" class="form-control" name="zip_code" id="" aria-describedby="helpId" placeholder="53200" style="border: #ffffff;border-bottom:1px solid darkgrey;border-radius:0px" value="{{ Auth::guard('influence')->user()->zip_code }}">
                    </div>
                </div>
                <div class="col-lg-1">
                    <img src="{{asset('public\assets\ZURVOS_ASSETS\ICONS\pen.png')}}" class="img-fluid" alt="Shreyu" style="background: #EDEEF0; padding: 6px;margin-left: -183%; margin-top: 127%;">
                </div>
            </div>
            <div class="row p-3">
                <div class="col-lg-11">
                    <div class="form-group">
                    <label for="full_name">Image</label>
                    <input id="image" class="p-0 form-control @error('image') is-invalid @enderror"  name="image" type="file" accept="image/jpeg, image/png, application/pdf" value="{{ old('image') }}" required style="border: none"/>
                </div>
                </div>
            </div>
            <div class="row p-3">
                <div class="col-lg-11">
                    <div class="form-group">
                    <label for="full_name">Cover Image</label>
                    <input id="cover_image" class="p-0 form-control @error('cover_image') is-invalid @enderror"  name="cover_image" type="file" accept="image/jpeg, image/png, application/pdf" value="{{ old('cover_image') }}" required style="border: none"/>
                </div>
                </div>
            </div>
            <div class="row p-3">
                <div class="col-lg-11">
                    <button type="submit" class="btn btn-primary btn-lg" style="width: 100%">UPDATE</button>
                </div>
            </div>
      </form>
   </div>

</main>
@endsection

<!-- end::main content -->
