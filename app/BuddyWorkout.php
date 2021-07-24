<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuddyWorkout extends Model
{
    protected $table = 'buddy_workouts';
    protected $primaryKey = 'buddy_workout_id';

    protected $fillable = [
        'cust_id',
        'buddy_id',
        'buddy_workout_id_from_workouts',
        // 'buddy_workout_type',
        // 'buddy_workout_level',
        // 'buddy_workout_goals',
        'buddy_workout_time',
        // 'buddy_for_type',
        'request_status',
    ];

    // protected $casts = [
    //     'buddy_workout_goals' => 'array',
    // ];

    public function custmoer_name(){

        return $this->belongsTo(Customer::class,'cust_id');
    }
    public function buddy_name(){
        return $this->belongsTo(Customer::class,'buddy_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class , 'cust_id' , 'id');
    }
    public function Influence_buddy_workout()
    {
        return $this->belongsTo(Customer::class , 'cust_id');
    }
    public function invi_buddy_workout()
    {
        return $this->belongsTo(Customer::class , 'buddy_id');
    }
    public function workouts()
    {
        return $this->belongsTo(workout::class , 'workout_id' , 'id');
    }

    public function buddy()
    {
        return $this->belongsTo(Customer::class , 'buddy_id' , 'id');
    }
}

