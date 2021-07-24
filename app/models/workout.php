<?php

namespace App\models;

use App\Influence;
use App\WorkoutVideo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class workout extends Model
{
    protected $guarded = [];
    protected $table = 'workouts';
    protected $primaryKey = 'id';

    public function customer(){
        return $this->belongsTo(Customer::class , 'cust_id' , 'id');
    }
    public function influencer_budy(){
        return $this->belongsTo(Customer::class , 'cust_id');
    }

    public function buddyworkout()
    {
        return $this->hasMany(BuddyWorkout::class , 'workout_id' , 'id');
    }

    public function videos()
    {
        return $this->hasMany(WorkoutVideos::class , 'workout_id' , 'id');
    }
    public function totalvideo($workout_id){
        $id=Auth::guard('influence')->user()->cust_id;
        return WorkoutVideo::where('workout_id',$workout_id)->where('cust_id',$id)->count();
    }
}
