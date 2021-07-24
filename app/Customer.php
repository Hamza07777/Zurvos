<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable implements JWTSubject
{

    protected $primaryKey = 'cust_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        't_shirt_size',
        'phone_number',
        'zip_code',
        'bio',
        'city',
        'verification_code',
        'user_image',
        'affiliated_link',
        'customer_type',
        'status',
        'facebook_link',
        'instagram_link',
        'twitter_link',
        'tiktok_link',
        'paypalemail',
        'paypalemail_document',
        'cover_image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'verification_code'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    // table to be used for the customers side

    // Rest omitted for brevity

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * Get the user's first name.
     *
     * @param  string  $value
     * @return string
     */
    // public function getUserImageAttribute($value)
    // {
    //     return asset('public/userimage/' . $value);
    // }

    // function to link the posts
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_id', 'cust_id');
    }

    protected $table = "customers";


    public function postss()
    {
        return $this->hasMany(Post::class,'cust_id');
    }
     public function follower()
    {
        return $this->hasMany(Follow::class,'id','follow_id');
    }
    public function workout_buddy_influencer()
    {
        return $this->hasMany(workout::class,'cust_id');
    }
    public function workout_buddy_influencerss()
    {
        return $this->hasMany(BuddyWorkout::class,'cust_id');
    }
    public function exercise_libarary()
    {
        return $this->hasMany(ExerciseLib::class,'cust_id');
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

        return Post::where('cust_id',$id)->count();
    }

    public function totalfollow($id){

        return Follow::where('following_id',$id)->count();
    }

     public function totalfollower($id){

        return Follow::where('follower_id',$id)->count();
    }
}
