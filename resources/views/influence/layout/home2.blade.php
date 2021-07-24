@extends('influence.layout.app')

@section('main-content')
<!-- begin::main content -->
<main class="main-content" style="margin-top: 13%">
<script>
    window.toggleFields = function toggleFields(){
        $('#fields').toggle();
        }

</script>
    <div class="container">

        <div class="card">

            <div class="card-header " style="background-color: #F2F7FC;">
             <h3> <strong> Create Post</strong> </h3>
            </div>
            <div class="card-body">
                <div class="container-fluid">
                    <form method="POST" action="{{route('influence.postss') }}" enctype="multipart/form-data">
                        @csrf
                    <div class="row">
                        <div class="col-lg-1">
                            {{--  @if(Storage::disk('public')->exists('property/'.$property->image) && $property->image)
                            <img src="{{Storage::url('property/'.$property->image)}}" alt="{{$property->title}}"  class="avatar-xs rounded-circle mr-2" alt="influencer" style="width: 3.5rem;height: 3rem; ">
                        @endif  --}}
                       
                            @if (!empty(Auth::guard('influence')->user()->user_image))
                            <img src=" {{asset('public/userimage/'.Auth::guard('influence')->user()->user_image)}}" class="avatar-xs rounded-circle mr-2" alt="Shreyu" style="width: 3.5rem;height: 3rem; ">

                        @else
                        <img src=" {{asset('public/assets/images/users/avatar-7.png')}}" class="avatar-xs rounded-circle mr-2" alt="Shreyu" style="width: 3.5rem;height: 3rem; ">

                        
                        @endif 
                        </div>

                        <div class="col-lg-11">

                                <textarea id="my-textarea" class="form-control" name="post_title" rows="5" style="margin-left: 3%; margin-top: 8.39062px; border: none;" placeholder="Title"></textarea>

                        </div>

                        <div class="row" style="display: none" id="fields">
                            <div class="col-lg-11">
                                <div class="form-group">
                                    <label for="image" class=" col-form-label text-md-right">{{ __('Location') }}</label>

                                    <input class="form-control" type="text" name="location" id="location">
                                </div>
                            </div>
                            <div class="col-lg-11">
                                <div class="form-group">
                                    <label for="image" class="col-form-label text-md-right">{{ __('check In') }}</label>

                                    <input class="form-control" type="text" name="chkin" id="chkin" >
                                </div>
                            </div>
                        </div>

                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group row">

                                    <input id="post_image" class="p-0 form-control @error('post_image') is-invalid @enderror"  name="post_image" type="file" accept="image/jpeg, image/png, application/pdf" value="{{ old('post_image') }}" required style="border: none"/>
                                    @error('post_image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                          </div>

                        <div class="col-lg-3">
                            <button type="button" class="btn" id="chkin_location" style="background-color: #F2F7FC; color:black;" onClick="toggleFields()">Check In</button>
                        </div>
                        <div class="col-lg-3">
                            <button type="button" class="btn" style="background-color: #F2F7FC; color:black;">Tag People</button>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary btn-lg" style="width: 100%">Post</button>
                        </div>
                    </div>
                     </form>
                </div>
            </div>

          </div>

          @foreach ($influence as $influence)

          <div class="card">
            <div class="card-body">
              <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-1">
                        @if (!empty($influence->influencer_detail->user_image))
                            <img src=" {{asset('public/userimage/'.$influence->influencer_detail->user_image)}}" class="avatar-xs rounded-circle mr-2" alt="Shreyu" style="width: 2.5rem;height: 2rem; margin-top:16%">

                        @else
                        <img src=" {{asset('public/assets/images/users/avatar-7.png')}}" class="avatar-xs rounded-circle mr-2" alt="Shreyu" style="width: 2.5rem;height: 2rem; margin-top:16%">

                        
                        @endif
                     </div>


                    <div class="col-lg-8">
                        
                        
                          @if (!empty($influence->influencer_detail->name))
                                <h5>{{ $influence->influencer_detail->name }}</h5>
                        @else
                                    <h5>User Name</h5>
                        
                        @endif
                        <img src="{{asset('public\assets\ZURVOS_ASSETS\ICONS\Locations.png')}}" class="img-fluid" alt="Shreyu">
                        <span>{{  $influence->post_city}}</span>
                    </div>

                         @if (!empty($influence->influencer_detail->cust_id ))
                             <div class="col-lg-2">
                                <form action="{{route('influence.fallllow') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="customer_id" value="{{ $influence->influencer_detail->cust_id }}">
                                    <input type="hidden" name="user_id" value="{{ Auth::guard('influence')->user()->cust_id }}">
                                    <button type="submit" class="btn" style="background-color: #F2F7FC; color:black;">Follow</button>
        
                                </form>
                            </div>

                        
                        @endif
                   
                    {{--  <div class="col-lg-1">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" style="background: none;
                            color: black;
                            border: none;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{asset('public\assets\ZURVOS_ASSETS\ICONS\Dot_menu.png')}}" class="image-fluid ml-3" alt="Shreyu" >
                              </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="#">Add links</a>
                            </div>
                          </div>
                        </div>  --}}
                </div>
              </div>

              <p style="margin-top:3%">{{ $influence->post_title  }}</p>
              <img src="{{asset('public/postImages/'.$influence->post_image)}}" class="img-fluid" width="100%" alt="Shreyu" >
              <div class="container-fluid">
                  <div class="row">
                    <div class="col-lg-4">
                       <div class="row" style="border-right: 1px solid darkgray; margin-top: 8%;">

                            <div class="col-lg-4">
                                
                                <button class="btn" style="border: none; background-color: white;"  onclick="edit_branch({{$influence->post_id }})" style="">
                                 <img src="{{asset('public\assets\ZURVOS_ASSETS\ICONS\Like.png')}}" class="img-fluid" alt="Shreyu" style="margin-left: 62%;">
                            </button>
                                
                            <!--<form method="post" action="{{route('save_likes')}}">-->
                            <!--    @csrf-->
                            <!--<input class="form-control" type="hidden" name="post_id" value={{$influence->post_id }}>-->
                            <!--<button type="submit" style="border: none; background-color: white;" >-->
                            <!--    <img src="{{asset('public\assets\ZURVOS_ASSETS\ICONS\Like.png')}}" class="img-fluid" alt="Shreyu" style="margin-left: 62%;">-->
                            <!--</button>-->
                            <!--</form>-->
                            </div>
                            <div class="col-lg-8" id="likes">
                                <p>Likes<br>{{$influence->totallikes($influence->post_id )}}</p>
                            </div>


                       </div>
                    </div>
                     <div class="col-lg-4">
                        <div class="row"  style="    border-right: 1px solid darkgray;
                        margin-top: 8%;">
                            <div class="col-lg-4">

                                <img src="{{asset('public\assets\ZURVOS_ASSETS\ICONS\Comments.png')}}" class="img-fluid" alt="Shreyu" style="margin-left: 62%;">
                            </div>

                            <div class="col-lg-8" id="commentsss">
                                <p>Comments<br>{{$influence->totalcomments($influence->post_id )}}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                       <div class="row"  style=" margin-top: 8%;">
                        <div class="col-lg-4">

                            <button data-toggle="modal" data-target="#exampleModal{{ $influence->post_id  }}" style="border: none; background-color: white;">
                            <img src="{{asset('public\assets\ZURVOS_ASSETS\ICONS\Share.png')}}" class="img-fluid" alt="Shreyu" style="margin-left: 62%;">
                        </div>
                         </button>
                        <div class="col-lg-8">
                            <p>Shares<br>{{$influence->totalshares($influence->post_id )}}</p>
                        </div>
                        <div class="modal fade" id="exampleModal{{ $influence->post_id  }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Share post</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="{{route('save_shares')}}">
                                        @csrf
                                    <input class="form-control" type="hidden" name="post_id" value={{$influence->post_id }}>
                                    <div class="form-group">
                                        <label for="image" class=" col-form-label text-md-right">{{ __('Share Message') }}</label>

                                      <input type="text" class="form-control" id="" name="message" value="">
                                    </div>
                                    <button name="" id="" class="btn btn-primary" type="submit">Share Now</button>

                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                       </div>

                    </div>
                    <div class="col-lg-8">
                     <h6><strong>
                         <ul>
                             <li id="comment_show">Latest Comment: {{$influence->latest_comment($influence->post_id )  }}</li>
                         </ul>

                    </strong> </h6>

                    </div>
                    <div class="col-lg-8 mt-3">
                    <!--<form method="post" action="{{route('save_comments')}}">-->
                    <!--    @csrf-->

                        <div class="form-group">
                            <!--<input class="form-control" type="hidden" name="post_id" id="post_id" value={{$influence->post_id }}>-->
                            <input class="form-control" type="text" name="comment" id="comment" id="location">
                        </div>
                    </div>
                    <div class="col-lg-4 mt-3" >
                        
                          <button class="btn btn-primary"   onclick="add_comment({{$influence->post_id }})">
                                     Add Comment
                            </button>
               
                    </div>
                    <!--</form>-->
                  </div>
              </div>
            </div>
          </div>

          @endforeach
    </div>
<script>
    $(document).ready(function(){
    
    
    
   
    // Fetch all records
  $.ajaxSetup({
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        });
           
      
});
    function edit_branch(id){

   
 
    $.ajax(
    {
        url: '{{route("save_likes")}}',
        type: 'POST',
        // dataType: 'json',
        data: {
            "post_id": id,
           _token: '{{csrf_token()}}'
        },
        success: function (response){
             //  console.log(response)
                 $('#likes').empty();
                 var str=' <p>Likes<br>'+ response +'</p>';
         $("#likes").append(str);

        },
          error: function (data, textStatus, errorThrown) {
        console.log(data);

    },
    });
    // fetchRecords();
   
}


    function add_comment(id){

   
 var comment=$("#comment"). val();
 //alert(id);
    $.ajax(
    {
        url: '{{route("save_comments")}}',
        type: 'POST',
        // dataType: 'json',
        data: {
            "post_id": id,
            "comment": comment,
           _token: '{{csrf_token()}}'
        },
        success: function (response){
               console.log(response);
                $('#commentsss').empty();
                 var str=' <p>Comments<br>'+ response +'</p>';
         $("#commentsss").append(str);
               
                 $('#comment_show').empty();
                 var str='Latest Comment: '+ comment;
         $("#comment_show").append(str);

        },
          error: function (data, textStatus, errorThrown) {
        console.log(data);

    },
    });
    // fetchRecords();
   
}
</script>
</main>
@endsection
<!-- end::main content -->
