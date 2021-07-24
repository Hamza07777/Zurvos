<?php

namespace App\Http\Resources;


use Illuminate\Http\Resources\Json\JsonResource;

use Carbon\Carbon;
use App\Post;
class usernotificationcollection extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        
        //  return [

        //     'id' => $this->id,
        //     'name' => $this->name,
        //     'user_image' => $this->user_image == null ? null : asset('public/userimage/' . $this->user_image),
            
        //     'status'=>$this->status,

        //     'message' => $this->message,
        //   'post_title' => $post->post_title == null ? null : $post->post_title,
        //     'post_image' => $post->post_image == null ? null : asset('public/postImages/'). '/'. $post->post_image,
        //   // 'post'=>route('postsin',$this->post_id),
        //     'time'=>Carbon::parse($this->created_at)->diffForHumans(),
        // ];
        
        
    
        if(!empty($this->post_id)){
        $post = Post::find($this->post_id);
        return [

            'id' => $this->id,
            'name' => $this->name,
            'user_image' => $this->user_image == null ? null : asset('public/userimage/' . $this->user_image),
            
            'status'=>$this->status,

            'message' => $this->message,
          'post_title' => $post->post_title == null ? null : $post->post_title,
            'post_image' => $post->post_image == null ? null : asset('public/postImages/'). '/'. $post->post_image,
          // 'post'=>route('postsin',$this->post_id),
            'time'=>Carbon::parse($this->created_at)->diffForHumans(),
        ];
      }
      else{
          return [

            'id' => $this->id,
            'name' => $this->name,
            'user_image' => $this->user_image == null ? null : asset('public/userimage/' . $this->user_image),
            
            'status'=>$this->status,

            'message' => $this->message,
          // 'post_title' => $post->post_title == null ? null : $post->post_title,
          //  'post_image' => $post->post_image == null ? null : asset('public/postImages/'). '/'. $post->post_image,
          // 'post'=>route('postsin',$this->post_id),
            'time'=>Carbon::parse($this->created_at)->diffForHumans(),
        ];
      }
      
      
      
    }
}
