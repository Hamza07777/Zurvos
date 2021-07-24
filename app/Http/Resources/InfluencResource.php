<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class InfluencResource extends JsonResource
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

           'full_name' => $this->name ==null ? '0' : $this->name,

           'email' => $this->email ==null ? '0' : $this->email,

           'password' => $this->password ==null ? '0' : $this->password,


           'datetime'=>Carbon::parse($this->created_at)->diffForHumans(),

           ];
    }
}
