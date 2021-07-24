<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExerciseLib extends Model
{
    protected $table = 'exercise_libs';
    protected $primaryKey = 'id';

    public function getVideoNameAttribute($value)
    {
        return url('/public/lib_videos/' . $value);
    }

    public function influencer_excercise_lib()
    {
        return $this->belongsTo(Customer::class,'cust_id');
    }
}
