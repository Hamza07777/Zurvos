<?php

namespace App;

use App\Notifications\GymResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Gym extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    // public function sendPasswordResetNotification($token)
    // {
    //     $this->notify(new GymResetPassword($token));
    // }
    // public function gym_sessions()
    // {
    //     return $this->hasMany(sessions::class,'gym_id');
    // }
    
    
     public static function Gym_logo()
        {
           // $id=16;
            $company=Gym::where('id',$id)->first();
            $logo= $company->gym_image ;
            return $logo;
        }

        public static function Gym_name()
        {
           // $id=16;
            $company=Gym::where('id',$id)->first();
            $logo= $company->full_name;
            return $logo;
        }
}
