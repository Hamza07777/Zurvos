<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $table = 'follows';
    protected $primaryKey = 'follow_id';

    protected $fillable = [
    	'follower_id',
        'following_id',
        'follow_status',
    ];

    public function following()
    {
        return $this->belongsTo(Customer::class,'following_id','cust_id');
    }
}
