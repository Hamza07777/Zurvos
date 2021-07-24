<?php

namespace App;

use App\WorkoutVideo;
use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    protected $table = 'workouts';
    protected $primaryKey = 'workout_id';

    protected $fillable = [
        'cust_id',
        'workout_type',
        'workout_level',
        'workout_goals',
        'for_type',
    ];

    protected $casts = [
        'workout_goals' => 'array',
    ];

    public function customer(){
        return $this->belongsTo(Customer::class , 'cust_id' , 'workout_id');
    }
    public function influencer_budy(){
        return $this->belongsTo(Customer::class , 'cust_id', 'cust_id');
    }
    public function videos()
    {
        return $this->hasMany(WorkoutVideos::class , 'workout_id' , 'id');
    }
    public function totalvideo($workout_id){
        $id=auth()->user()->cust_id;
        return WorkoutVideo::where('workout_id',$workout_id)->where('cust_id',$id)->count();
    }
}
