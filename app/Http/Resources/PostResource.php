<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'cust_id' => $this->cust_id,
            'cust_name' => $this->name,
            'post_id' => $this->post_id,
            'post_title' => $this->post_title == null ? null : $this->post_title,
            'post_image' => $this->post_image == null ? null : asset('public/postImages/'). '/'. $this->post_image,
            'post_video' => $this->post_video == null ? null : asset('public/postVideos/').'/'. $this->post_video,
            'city' => $this->post_city == null ? null :  $this->post_city,
            'zip_code' => $this->zip_code == null ? null : $this->zip_code,
            'latitude' => $this->latitude == null ? null : $this->latitude,
            'longitude' => $this->longitude == null ? null : $this->longitude,
            // 'totalLikes' => strval($totallikes),
            // 'totalComments' => strval($totalcomments),
            // 'totalShares' => strval($totalshares),
            // 'user_id' => $this->customer_id,
            // 'username' => $this->full_name == null ? '0' : $this->full_name,
            'user_image' => $this->user_image == null ? null : asset('public/userimage/' . $this->user_image),
            // 'follow_id' => $this->customer_id,
        ];
    }
}
