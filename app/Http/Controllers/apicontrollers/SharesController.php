<?php

namespace App\Http\Controllers\apicontrollers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Share;
use App\models\Usernotification;
use App\models\Post;

class SharesController extends Controller
{
    public function share(Request $request)
    {
      //dd($request->customer_id);
        $posts=Post::where('post_id',$request->post_id)->first();

            $action=new Share();
            $action->post_id = $request->post_id;
            $action->customer_id = $request->customer_id;       
            $action->message = $request->message;
            $action->save();
           
            $notification=new Usernotification();
            $notification->message="Shared Your Post";
            $notification->post_id=$posts->post_id;
            $notification->post_user_id=$posts->cust_id;
            $notification->user_id=$request->customer_id;
            $notification->save();
            $post=new Post();
             $post['post_title'] = $request->message;
        $post['latitude'] = $posts->latitude;
        $post['longitude'] = $posts->longitude;
        $post['post_city'] = $posts->post_city;
        $post['cust_id'] = $request->customer_id;
         $post['post_image']=$posts->post_image ==null ? '0' : $posts->post_image;
         $post['post_video']=$posts->post_video ==null ? '0' : $posts->post_video;

     
         $result=$post->save();
         $idd=$post->id;
            $newposts=Post::where('post_id',$idd)->first();
            if ($result) {
                
               return response(['message' => 'Post shared successfully','status' =>'success','post'=>$newposts]);

            }else{

                return response(['message' => 'Post not shared ','status' =>'error']);
            }

    }
}
