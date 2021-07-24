<?php

namespace App\models;
 use App\Customer;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    public function influencer_followers()
    {
        return $this->belongsTo(Customer::class,'follower_id');
    }
    public function influencer_following()
    {
        return $this->belongsTo(Customer::class,'following_id');
    }
}
