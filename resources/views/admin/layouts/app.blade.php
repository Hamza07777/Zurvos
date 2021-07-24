<!DOCTYPE html>
<html lang="en">
<head>
	<title>FUELED</title>

	   @include('admin.layouts.header')
		
</head>
<body >

    <div id="wrapper">

    	@include('admin.layouts.topbar')

    	@include('admin.layouts.navbar')


			@section('main-content')
		        
			@show

	    @include('admin.layouts.footer')
    </div>
</body>
</html>