<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Usernotification extends Model
{
    public function user_noti_post()
    {
        return $this->belongsTo(Post::class,'post_id');
    }
    public function user_noti_customer()
    {
        return $this->belongsTo(Customer::class,'user_id');
    }
}
