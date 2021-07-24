<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TutorialResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // $myvideos=[];
        //  $videos=json_decode($this->course_videos);

        //  foreach ($videos as $value) {

        //      array_push($myvideos, asset('public/tutorialvideo/'.$value)); 
        //  }

        return [

            'id' => $this->id,

            'course_name' => $this->course_name ==null ? '0' : $this->course_name,
            'course_price' => $this->course_price ==null ? '0' : $this->course_price,

            'category' => $this->category ==null ? '0' : $this->category,
            'type' => $this->type,
            'files'=>$this->course_videos ==null ? '0' : asset('public/TutorialVideo/'.$this->course_videos),
            
                

        ];
    }
}
