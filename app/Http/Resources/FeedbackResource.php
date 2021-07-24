<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FeedbackResource extends JsonResource
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

            'name' => $this->name ==null ? '0' : $this->name,

            'city' => $this->city ==null ? '0' : $this->city,

            'feedback' => $this->feedback ==null ? '0' : $this->feedback,

            'improvement' => $this->improvement ==null ? '0' : $this->improvement,

        ];
    }
}
