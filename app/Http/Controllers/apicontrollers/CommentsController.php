<?php

namespace App\Http\Controllers\apicontrollers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;
use App\Http\Resources\CommentsCollection;
use App\models\Comment;
use App\models\Post;
use App\models\Usernotification;

class CommentsController extends Controller
{

    public function store(Request $request)
    {


            $action=new Comment();
            $action->post_id = $request->post_id;
            $action->customer_id = $request->customer_id;
            $action->comment = $request->comment;
            $action->parent_comment_id = $request->parent_comment_id;
            $result=$action->save();
            if ($result) {
              $post=Post::where('post_id',$request->post_id)->first();
                $notification=new Usernotification();
                $notification->message="Commented on Your Post";
                $notification->post_id=$post->post_id;
                $notification->post_user_id=$post->cust_id;
                $notification->user_id=$request->customer_id;
                $notification->save();

                return response(['message' => 'Your comment posted','status' =>'success']);

            }else{

                return response(['message' => 'Your comment not posted','status' =>'error']);
            }

    }


    public function show_comment($id)
    {
//dd($request->id);
         $comments=Comment::where('post_id',$id)->where('parent_comment_id',null)->get();

          if ($comments->count() >0) {


             return  CommentResource::collection($comments);

         }else{

            return response(['message' => 'Comments Not Found','status' =>'error']);
         }
    }


}
