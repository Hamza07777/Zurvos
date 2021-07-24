<?php

namespace App\models;

use App\Influence;
use App\Customer;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'post_title', 'post_image', 'post_video','checkin','location','customer_id',
    ];
    public function user()
    {
        return $this->belongsTo(Customer::class,'cust_id');
    }

    public function influencer_detail()
    {
        return $this->belongsTo(Customer::class,'cust_id');
    }
    public function post_noti()
    {
        return $this->hasMany(Usernotification::class,'post_id');
    }
    public function totallikes($id){

        return Action::where('post_id',$id)->count();
    }

    public function totalshares($id){

        return Share::where('post_id',$id)->count();
    }

     public function totalcomments($id){

        return Comment::where('post_id',$id)->count();
    }
    public function latest_comment($id){
        // $comment= Comment::where('post_id',$id)->latest()->get();
      $comment= Comment::where('post_id',$id)->latest()->value('comment');
       return  $comment;

    }

}
