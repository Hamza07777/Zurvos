<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sessions extends Model
{
    public function sessions_customer()
    {
        return $this->belongsTo(Customer::class,'customer_id');
    }
    public function sessions_gym()
    {
        return $this->belongsTo(Gym::class,'gym_id');
    }
}
