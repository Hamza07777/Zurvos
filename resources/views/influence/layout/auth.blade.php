
<!DOCTYPE html>
<html>

@include('admin.layouts.header')

<body>
    <!-- Login Form content start -->

    <!-- For responsiveness adding empty column -->
        <div class="row">
        <div class=" col-xs-2 col-sm-2 col-md-2 col-lg-12" style="background-color: black">

        </div>
    <!-- end -->

        <div class="card col-xs-4 col-sm-4 col-md-6 col-lg-3" style="width: 20rem; margin-top: 100px;  border-radius: 20px; background-color:  #eaeafa;">
            @section('content')
            @show

        </div>
</div>
    <!-- Login Form content end -->
</body>
</html>
