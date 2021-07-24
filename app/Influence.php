<?php

namespace App;

use App\models\BuddyWorkout;
use App\models\Post;
use App\models\Follow;
use App\models\workout;
use App\Notifications\InfluenceResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Influence extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_name', 'email', 'password','zip_code','t_shirt_size','facebook_link','instagram_link','twitter_link','tiktok_link','phone_number','paypalemail','location','image','bio','posts','followers','following',
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
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new InfluenceResetPassword($token));
    }
    public function posts()
    {
        return $this->hasMany(Post::class,'customer_id');
    }
     public function follower()
    {
        return $this->hasMany(Follow::class,'id','follow_id');
    }
    public function workout_buddy_influencer()
    {
        return $this->hasMany(workout::class,'customer_id');
    }
    public function workout_buddy_influencerss()
    {
        return $this->hasMany(BuddyWorkout::class,'customer_id');
    }
    public function exercise_libarary()
    {
        return $this->hasMany(exercise_libarary::class,'customer_id');
    }
    public function workout_buddy_invitation()
    {
        return $this->hasMany(BuddyWorkout::class,'buddy_id');
    }
    public function following()
    {
        return $this->hasMany(Follow::class,'id','user_id');
    }
    public function totalposts($id){
        
        return Post::where('customer_id',$id)->count();
    }

    public function totalfollow($id){

        return Follow::where('user_id',$id)->count();
    }

     public function totalfollower($id){

        return Follow::where('follow_id',$id)->count();
    }
}
