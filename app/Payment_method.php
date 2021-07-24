<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment_method extends Model
{
	protected $table = 'payment_methods';
    protected $fillable = [
        'method',
		'card_number',
		'expire_date',
		'card_holder_number',
		'cvv_code',
		'user_id',
		'gym_id'
    ];
}
