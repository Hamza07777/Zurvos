<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FaqResource extends JsonResource
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

            'id' => $this->id,

            'type' => $this->type ==null ? '0' : $this->type,

            'question' => $this->question ==null ? '0' : $this->question,

            'answer' => $this->answer ==null ? '0' : $this->answer,

            'video' => $this->video ==null ? '0' : asset('public/faqVideos/'.$this->video),


        ];
    }
}
