<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AboutResource extends JsonResource
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

            'text' => $this->text ==null ? '0' : $this->text,

            'address' => $this->address ==null ? '0' : $this->address,
            'about_image'=>$this->about_image ==null ? '0' : asset('public/aboutimage/'.$this->about_image),

        ];
    }
}
