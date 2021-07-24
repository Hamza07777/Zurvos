<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WorkoutDetail extends JsonResource
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

            'workout_title' => $this->workout_title,

            'created_by' => $this->full_name ==null ? '0' : $this->full_name,
            'excercise_library_id' => $this->id,

            'video_title' => $this->video_title ==null ? '0' : $this->video_title,

            'video_name' => $this->video_name ==null ? '0' : asset('public/lib_videos/'.$this->video_name),
           // 'files'=>asset('public/tutorialvideo/'.$value),
                
            


        ];
    }
}
