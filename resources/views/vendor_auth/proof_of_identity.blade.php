

<!DOCTYPE html>
<html>

@include('admin.layouts.header')
<style>
    ::-webkit-file-upload-button {
        background: #FF4B2B;
        color: white;
        padding: 8px 25px;
        font-size: 10px;
        border-radius: 20px;
        box-shadow: 0 4px 6px rgba(50, 50, 93, 0.11), 0 1px 3px rgba(0, 0, 0, 0.08);
        border-color: #FF4B2B;
        transition: all 0.15s ease;
        letter-spacing: 1px;
        box-sizing: border-box;
        outline: none;
        cursor: pointer;
        line-height: 1.5;
        display: inline-block;
        font-weight: bold;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        user-select: none;
        border: 1px solid transparent;
    }

</style>
<body style="background-image: url('{{asset('public/assets/ZURVOS_ASSETS/IMAGES/WEB/Sign_up5.png')}}'); background-size: 100% 100%;">

    <!-- Login Form content start -->

    <!-- For responsiveness adding empty column -->
        <div class="row">
        <div class=" col-xs-2 col-sm-2 col-md-2 col-lg-2">

        </div>
    <!-- end -->

        <div class="card col-xs-4 col-sm-4 col-md-6 col-lg-3" style="width: 20rem; margin-top: 100px;  border-radius: 20px; background-color:  #eaeafa;">
            <div class="card-body">
                <h5 class="card-title text-center" style="margin-top: 50px; margin-bottom: 50px"><b>Proof of Identity </b></h5>
                     <form method="POST" action="{{route('vendor.proof_of_identity_save') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group" style="margin-left: 20px;">
                            <label for="paypalemail">Add PayPal Email</label>

                            <input id="paypalemail" type="text" class="form-control @error('paypalemail') is-invalid @enderror" name="paypalemail" value="{{ old('paypalemail') }}"  autocomplete="paypalemail" autofocus placeholder="someone@gmail.com">
                            <p> Add your identiy verification document such as driving licenses ,passport etc</p>
                                @error('paypalemail')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        
                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                            <div class="col-md-6">
                                <input id="image" class="p-0 form-control @error('image') is-invalid @enderror" required name="image" type="file" accept="image/jpeg, image/png, application/pdf" value="{{ old('image') }}" required style="border: none"/>
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <label for="upload_file" class="col-md-4 col-form-label text-md-right">{{ __('Upload File') }}</label>

                            <div class="col-md-6">
                                <input id="upload_file" class="p-0 form-control @error('upload_file') is-invalid @enderror" required name="upload_file" type="file" accept="image/jpeg, image/png, application/pdf" value="{{ old('upload_file') }}" required style="border: none"/>
                                @error('upload_file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- <div class="form-check" style="margin-left: 20px;">
                            <input class="form-check-input" type="checkbox" name="customer_type" id="remember" value="influence">

                                         <label class="form-check-label" for="remember">
                                             {{ __('Apply For Influencer') }}
                                         </label>
                             </div> --}}
                        <button type="submit" class="btn btn-primary" style="margin-left: 20px; margin-top: 10px; width:92%; margin-bottom: 40px;">Register</button>

                    </form>
            </div>
        </div>
</div>
    <!-- Login Form content end -->
</body>
</html>
