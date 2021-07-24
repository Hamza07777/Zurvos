@extends('admin_layout.app')

@section('main-content')
<!-- begin::main content -->
<main class="main-content" style="margin-top: 13%;background-color: #ffffff;">

    <div class="col-12 center-container">
        <div class="msg-main">
            <h3>Recent messages</h3>

              <div class="msg-contant mrg-top-20">
                <div class="d-flex jst-cont-between">
                  <div class="d-flex mrg-top-15">
                    <div>
                      <img src="{{asset('public/assets/images/users/avatar-7.png')}}" class="avatar-md rounded-circle mr-2" alt="" />
                    </div>
                    <div class="mrg-left-20">
                      <h6 class="fnt-w-700">George Smith</h6>
                      <p>Lora ipsam dolor sit amet</p>
                    </div>
                  </div>
                  <div>
                    <p style="font-size: 14px;">7:30PM<span style="padding-left: 22px;"> 1/12/2020</span>  </p>
                  </div>
                </div>
              </div>
          </div>

      </div>
</main>
@endsection

<!-- end::main content -->
