<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class checkin_user extends Model
{
    public function chk_in_customer()
    {
        return $this->belongsTo(Customer::class,'user_id');
    }

    protected $table = "user_checks";
}
