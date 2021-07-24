

<!DOCTYPE html>
<html>

@include('admin.layouts.header')

<body style="background-image: url('{{asset('public/assets/ZURVOS_ASSETS/IMAGES/WEB/Sign_up4.png')}}'); background-size: 100% 100%;">
    <!-- Login Form content start -->

    <!-- For responsiveness adding empty column -->
        <div class="row">
        <div class=" col-xs-2 col-sm-2 col-md-2 col-lg-2">

        </div>
    <!-- end -->

        <div class="card col-xs-4 col-sm-4 col-md-6 col-lg-3" style="width: 20rem; margin-top: 100px;  border-radius: 20px; background-color:  #eaeafa;">
            <div class="card-body">
                <h5 class="card-title text-center" style="margin-top: 50px; margin-bottom: 50px"><b>Social Media Links</b></h5>
                     <form method="POST" action="{{route('influence.proof_of_identity') }}">
                        @csrf

                        <div class="form-group" style="margin-left: 20px;">
                            <label for="facebooklink">Add Facebook Link</label>

                            <input id="facebooklink" type="text" class="form-control @error('facebooklink') is-invalid @enderror" name="facebooklink" value="{{ old('facebooklink') }}"  autocomplete="facebooklink" autofocus placeholder="https://www.facebook.com/user">

                                @error('facebooklink')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group" style="margin-left: 20px;">
                            <label for="instagramlink">Add Instagram Link</label>

                            <input id="instagramlink" type="text" class="form-control @error('instagramlink') is-invalid @enderror" name="instagramlink" value="{{ old('instagramlink') }}"  autocomplete="instagramlink"  placeholder="https://www.instagram.com/user">

                                @error('instagramlink')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group" style="margin-left: 20px;">
                            <label for="twitterlink">Add Twitter Link</label>

                            <input id="twitterlink" type="text" class="form-control @error('twitterlink') is-invalid @enderror" name="twitterlink" value="{{ old('twitterlink') }}"  autocomplete="twitterlink"  placeholder="https://www.twitter.com/user">

                                @error('twitterlink')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group" style="margin-left: 20px;">
                            <label for="tiktoklink">Add Tiktok Link</label>

                            <input id="tiktoklink" type="text" class="form-control @error('tiktoklink') is-invalid @enderror" name="tiktoklink" value="{{ old('tiktoklink') }}"  autocomplete="tiktoklink"  placeholder="https://www.Tiktok.com/user">

                                @error('tiktoklink')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <button type="submit" class="btn btn-primary" style="margin-left: 20px; margin-top: 20px; width:92%;">Next</button>

                    </form>
                    <a href=" {{route('influence.proof_of_identity_view_call')}} "><button type="submit" class="btn btn-primary" style="margin-left: 20px; margin-top: 10px; width:92%; margin-bottom: 40px; background-color:#EEF5FF;color:black;border:none">Skip</button></a>

            </div>
        </div>
</div>
    <!-- Login Form content end -->
</body>
</html>
