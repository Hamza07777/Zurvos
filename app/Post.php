<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'post_title',
        'post_image',
        'post_video',
        'latitude',
        'longitude',
        'post_city',
        'cust_id',
    ];



    /**
     * Get the user's first name.
     *
     * @param  string  $value
     * @return string
     */
    public function getPostImageAttribute($value)
    {
        if ($value != null && $value != "") {
            return asset('public/postImages/' . $value);
        }
        return $value;
    }

    /**
     * Get the user's first name.
     *
     * @param  string  $value
     * @return string
     */
    public function getPostVideoAttribute($value)
    {
        if ($value != null && $value != "") {
            return asset('public/postVideos/' . $value);
        }
        return $value;
    }



    // function to link the posts to customers
    public function customers()
    {
        return $this->belongsTo(Customer::class, 'cust_id');
    }

    protected $primaryKey = 'post_id';
}
