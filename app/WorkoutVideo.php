<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkoutVideo extends Model
{
    protected $table = 'workout_videos';
    protected $primaryKey = 'workout_video_id';

    protected $fillable = [
    	'workout_id',
        'cust_id',
        'ex_lib_id',
    ];


    public function libs()
    {
        return $this->belongsTo(ExerciseLib::class , 'lab_id' , 'id');
    }
}
