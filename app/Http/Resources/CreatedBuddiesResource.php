<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\BuddyWorkout;
use App\Customer;
class CreatedBuddiesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $buudy_workout=BuddyWorkout::where('buddy_workout_id',$this->buddy_workout_id)->first();
    //     $cumtomer_id=$buudy_workout->buddy_id;
    //     $user=Customer::where('cust_id',$cumtomer_id)->first();
    //   //  dd($cumtomer_id);
        
        // return parent::toArray($request);
        return [
            'buddy_workout_id' => $this->buddy_workout_id == null ? null : $this->buddy_workout_id,
            'buddy_id' => $this->cust_id == null ? null : $this->cust_id,
            'workout_id' => $this->workout_id == null ? null : $this->workout_id,
            'name' => $this->name == null ? null : $this->name,
            // 'email' => $user->email == null ? null : $user->email,
            // 'gender' => $user->gender == null ? null : $user->gender,
            // 't_shirt_size' => $user->t_shirt_size == null ? null : $user->t_shirt_size,
            // 'phone_number' => $user->phone_number == null ? null : $user->phone_number,
            //'zip_code' => $user->zip_code == null ? null : $user->zip_code,
            //'bio' => $user->bio == null ? null : $user->bio,
           // 'city' => $user->city == null ? null : $user->city,
            'user_image' => $this->user_image == null ? null : asset('public/userimage/'.$this->user_image),
            'workout_type' => $this->workout_type == null ? null : $this->workout_type,
            'workout_level' => $this->workout_level == null ? null : $this->workout_level,
            'workout_goals' => $this->workout_goals == null ? null : $this->workout_goals,
            'buddy_workout_time' => $this->buddy_workout_time == null ? null : $this->buddy_workout_time,
            'request_status' => $this->request_status == null ? null : $this->request_status,
        ];
    }
}
