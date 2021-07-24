<?php

namespace App\Http\Resources;

use App\models\Comment;
use Carbon\Carbon;
use App\Customer;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $comments=Comment::all()->where('parent_comment_id',$this->id);
        $user=Customer::where('cust_id',$this->customer_id)->first();
        return [

            'id' => $this->id,

            'post_id' => $this->post_id ==null ? '0' : $this->post_id,

            'customer_id' => $this->customer_id ==null ? '0' : $this->customer_id,

            'comment' => $this->comment ==null ? '0' : $this->comment,

            'childs' => CommentResource::collection($comments),
            
            'user_name' => $user->name ==null ? '0' : $user->name,
            
            'user_image'=>$user->user_image ==null ? '0' : asset('public/userimage/' . $user->user_image),
            

            
            'datetime'=>Carbon::parse($this->created_at)->diffForHumans(),
        ];
    }
}
