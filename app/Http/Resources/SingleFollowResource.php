<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SingleFollowResource extends JsonResource
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
            'follow_status' => $this->follow_status == null ? null : $this->follow_status,
            'name' => $this->name == null ? null : $this->name,
            'email' => $this->email == null ? null : $this->email,
            'cust_id' => $this->cust_id == null ? null : $this->cust_id,
            'gender' => $this->gender == null ? null : $this->gender,
            't_shirt_size' => $this->t_shirt_size == null ? null : $this->t_shirt_size,
            'phone_number' => $this->phone_number == null ? null : $this->phone_number,
            'zip_code' => $this->zip_code == null ? null : $this->zip_code,
            'bio' => $this->bio == null ? null : $this->bio,
            'city' => $this->city == null ? null : $this->city,
            'user_image' => $this->user_image == null ? null : asset('public/userimage/'.$this->user_image),
            'customer_type' => $this->customer_type == null ? null : $this->customer_type,
        ];
    }
}
