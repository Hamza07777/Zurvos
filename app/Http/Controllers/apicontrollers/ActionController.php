<?php

namespace App\Http\Controllers\apicontrollers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\Poststrait;
use App\models\Usernotification;
use App\models\Post;
use App\models\Action;

class ActionController extends Controller
{
   

    public function action(Request $request){
        
        $count_like=Action::where('post_id',$request->post_id)->where('customer_id',$request->customer_id)->count();
        
        if($count_like > 0)
        {
           $like_id= Action::where('post_id',$request->post_id)->where('customer_id',$request->customer_id)->first();
           $result=$like_id->delete();
            return response(['message' => 'You disliked','status' =>'success']);
        }
        else{
             $action=new Action();
         $action->post_id = $request->post_id;
         $action->customer_id = $request->customer_id;
         $action->like = 1;
         $action->dislike = 0;
         $action->save();
           $post=Post::where('post_id',$request->post_id)->first();
               $notification=new Usernotification();
               $notification->message="Liked Your Post";
               $notification->post_id=$post->post_id;
               $notification->post_user_id=$post->cust_id;
               $notification->user_id=$request->customer_id;
               $notification->save();

               return response(['message' => 'You liked','status' =>'success']);
            
        }
    }    
}
