<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use DB;
class SingleExcercse extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        

        return [

            'id' =>$this->id,
            'video_title' => $this->video_title ==null ? '0' : $this->video_title,
            'video_description' => $this->video_description ==null ? '0' : $this->video_description,
            'video' => $this->video_name ==null ? '0' : asset('public/lib_videos/'.$this->video_name),
        ];
    }
}
