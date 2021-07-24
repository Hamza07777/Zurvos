<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VideoExerciseLibraryResource extends JsonResource
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

            'video_title' => $this->video_title,
            'video_description' => $this->video_description ==null ? '0' : $this->video_description,

            'video_level' => $this->video_level ==null ? '0' : $this->video_level,

            'video_name' => $this->video_name ==null ? '0' : asset('public/lib_videos/'.$this->video_name),
           // 'files'=>asset('public/tutorialvideo/'.$value),
        ];
    }
}
