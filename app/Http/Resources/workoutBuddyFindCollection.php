<?php

namespace App\Http\Resources;
use App\Customer;
use Illuminate\Http\Resources\Json\JsonResource;

class workoutBuddyFindCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
     //  public static $wrap = 'user';
    public function toArray($request)
    {
      
          $user=Customer::where('cust_id',$this->cust_id)->first();
         // dd($user);
         return [
                 'workout_id' =>$this->workout_id,

                'id' =>$user->cust_id,

            'name' => $user->name ==null ? '0' : $user->name,

            'email' => $user->email ==null ? '0' : $user->email,

            'password' => $user->password ==null ? '0' : $user->password,

            'city' => $user->city ==null ? '0' : $user->city,

            'phone_no' => $user->phone_number ==null ? '0' : $user->phone_number,

            'zip_code' => $user->zip_code ==null ? '0' : $user->zip_code,

            // 'street_address' => $this->street_address ==null ? '0' : $this->street_address,
            'user_image'=>$user->user_image ==null ? '0' : $user->user_image,
            ];
    }
}
