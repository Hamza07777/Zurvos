<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Customer;
class libResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $customer=Customer::find($this->customer_id);
        return [

            'id' => $this->id,

            'video_title' => $this->video_title ==null ? '0' : $this->video_title,
            'created_by'=>$customer->full_name,
            'user_image'=>$customer->user_image ==null ? '0' : asset('public/userimage/'.$customer->user_image),
            'type' => $this->type ==null ? 'free' : 'paid',
            
            'level'=>$this->video_level ==null ? '0' : $this->video_level,
            
            'tages'=>$this->tags ==null ? '0' : $this->tags,

            'category' => $this->category ==null ? '0' : $this->category,

            'video' => $this->video_name ==null ? '0' : asset('public/lib_videos/'.$this->video_name),
            'total_view'=>$this->total_view,
            'total_like'=>$this->total_like,
           // 'files'=>asset('public/tutorialvideo/'.$value),
                
            


        ];
    }
}
