<!DOCTYPE html>
<html lang="en">
<head>
	<title>FUELED</title>

	   @include('admin_layout.header')
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
</head>
<body >

    <div id="wrapper">

    	@include('admin_layout.topbar')
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    @include('admin_layout.navbar')
                </div>
                <div class="col-lg-6">
                    @include('admin_layout.flash-message')
                    @section('main-content')
			        @show
                </div>
                <div class="col-lg-3 ">
                    @include('admin_layout.rightsidebar')
                </div>
            </div>
        </div>
	    @include('admin_layout.footer')
    </div>
</body>
</html>
