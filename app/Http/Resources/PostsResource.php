<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Traits\Poststrait;
use App\Follow;

class PostsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    use Poststrait;

    public function toArray($request)
    {
//dd($request);
  $cust_id = auth('api')->user()->cust_id;
        $fallow_user=Follow::where('follower_id',$cust_id)->where('following_id',$this->cust_id)->where('follow_status','follow')->count();
        if($fallow_user>0)
        {
            $fallow_status=true;
        }
        else{
            $fallow_status=false;
        }
       
        $totallikes=$this->totallikes($this->post_id);

        $totalcomments=$this->totalcomments($this->post_id);

        $totalshares=$this->totalshares($this->post_id);

        return [

            'id' => $this->post_id,

            'post_title' => $this->post_title ==null ? '0' : $this->post_title,

            'postimage' => $this->post_image ==null ? '0' : asset('public/postImages/'.$this->post_image),
            
            'latitude' => $this->latitude ==null ? '0' : $this->latitude,


            'longitude' => $this->longitude ==null ? '0' : $this->longitude,

            'post_city' => $this->post_city ==null ? '0' : $this->post_city,

            //'zip_code' => $this->zip_code ==null ? '0' : $this->zip_code,

            'totalLikes' =>strval($totallikes),

            'totalComments' =>strval($totalcomments),

            'totalShares' =>strval($totalshares),
            'user_id'=>$this->cust_id,
            'username' => $this->name ==null ? '0' : $this->name,
            'user_image'=>$this->user_image ==null ? '0' : asset('public/userimage/'.$this->user_image),
            'fallow_status'=>$fallow_status,


        ];
    }
}
