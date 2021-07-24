<?php

namespace App\Http\Resources;
use App\models\Post;
use App\models\Follow;
use App\Customer;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class UserProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       //d($this->user_image);
        $result=Post::where('cust_id',$this->cust_id)->get();
        $user=Customer::where('cust_id',$this->cust_id)->firstOrFail();
        $totalfollower=Follow::where('follow_id',$this->cust_id)->count();

        $totalfollowing=Follow::where('following_id',$this->cust_id)->count();
        $totalposts=Post::where('cust_id',$this->cust_id)->count();

        return [

             'id' =>$this->cust_id,

            'name' => $this->name ==null ? '0' : $this->name,

            'email' => $this->email ==null ? '0' : $this->email,

            'password' => $this->password ==null ? '0' : $this->password,

            'city' => $this->city ==null ? '0' : $this->city,

            'phone_no' => $this->phone_number ==null ? '0' : $this->phone_number,

            'zip_code' => $this->zip_code ==null ? '0' : $this->zip_code,

            // 'street_address' => $this->street_address ==null ? '0' : $this->street_address,
          'user_image'=>     $user->user_image ==null ? '0' :   asset('public/userimage/' . $user->user_image) ,

            'totalfollower' =>(string)$totalfollower,

            'totalfollowing' =>(string)$totalfollowing,
            
            'totalposts' =>(string)$totalposts,

            'datetime'=>Carbon::parse($this->created_at)->diffForHumans(),
            'posts'=> PostsResource::collection($result),

        ];
    }
}
