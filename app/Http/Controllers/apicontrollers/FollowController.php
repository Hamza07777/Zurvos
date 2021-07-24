<?php

namespace App\Http\Controllers\apicontrollers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Follow;
use App\Customer;
use App\Http\Resources\SingleFollowResource;

class FollowController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'following_id' => "required"
        ]);
        $currentUser = auth('api')->user()->cust_id;
        $findLeader = Customer::find($request->following_id);
        $findFollow = Follow::where(['following_id' => $request->following_id, 'follower_id' => $currentUser])->get();
        if ($findFollow->count() > 0) {
            if ($findFollow->first()->follow_status == "unfollow") {
                // $follow = new Follow();
                $findFollow->first()->follow_status = "follow";
                $result = $findFollow->first()->update();
                if ($result) {    
                    return response()->json([
                        'message'=>'Following successfully',
                        'status' =>'success',
                        'following' => $findFollow->first()->following
                    ], 200);
                }
            } else {
                return response()->json(['message' => 'customer is already following this id (following)', 'status' => 'error'], 422);
            }
        }
        if ($findLeader) {
            if ($findLeader->cust_id == $currentUser) {
                return response()->json(['message' => 'customer cannot follow ownself', 'status' => 'error'], 422);
            }
            $follow = new Follow();
            $follow->follower_id = auth('api')->user()->cust_id;
            $follow->following_id = $request->following_id;
            $follow->follow_status = "follow";
            $result=$follow->save();
            if ($result) {    
                return response([
                    'message'=>'Following successfully',
                    'status' =>'success',
                    'following' => $follow->following
                ], 200);
            }
            else{
                return response([
                    'message'=>'some error occured in following',
                    'status' =>'error'
                ], 500);
            }
        }
        else {
            return response()->json(['message' => 'No customer is found againt this id to be followed', 'status' => 'error'], 422);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $request->validate([
            'type' => 'required'
        ]);
        if (!($request->type == "follower" || $request->type == "following")) {
            return response()->json(['message' => 'variable type in params can be [follower, following]','status' =>'error'], 404);
        }
        $cust_id = auth('api')->user()->cust_id;
        if ($request->type == "follower") {
            $followers = Follow::where(['follows.following_id' => $cust_id, 'follows.follower_id' => $id])->join('customers','customers.cust_id','follows.follower_id')->select('follows.follow_status', 'customers.name', 'customers.email', 'customers.cust_id', 'customers.gender', 'customers.t_shirt_size', 'customers.phone_number', 'customers.zip_code', 'customers.bio', 'customers.city', 'customers.user_image', 'customers.customer_type')->get();
            if ($followers->count() > 0) {
                return SingleFollowResource::collection($followers);
            }
            else {
                return response()->json(['message' => 'No follower exists against this id','status' =>'error'], 404);
            }
        }
        elseif($request->type == "following"){
            $followers = Follow::where(['follows.follower_id' => $cust_id, 'follows.following_id' => $id])->join('customers','customers.cust_id','follows.following_id')->select('follows.follow_status', 'customers.name', 'customers.email', 'customers.cust_id', 'customers.gender', 'customers.t_shirt_size', 'customers.phone_number', 'customers.zip_code', 'customers.bio', 'customers.city', 'customers.user_image', 'customers.customer_type')->get();
            if ($followers->count() > 0) {
                return SingleFollowResource::collection($followers);
            }
            else {
                return response()->json(['message' => 'No following exists against this id','status' =>'error'], 404);
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $currentUser = auth('api')->user()->cust_id;
        $findLeader = Customer::find($id);
        $findFollow = Follow::where(['following_id' => $id, 'follower_id' => $currentUser])->first();
        if ($findFollow->count() > 0) {
            if ($findFollow->follow_status == 'unfollow') {
                return response([
                    'message' => 'Already unfollowed',
                    'status' => 'error'
                ], 422);
            }
            $follow = Follow::where(['follower_id' => auth('api')->user()->cust_id, 'following_id' => $id])->first();
            $result = $follow->update(['follow_status' => 'unfollow']);
            if ($result) {  
                return response([
                    'message'=>'Un Following successfully',
                    'status' =>'success',
                    'unfollow_customer_leader' => $follow->following
                ], 200);
            }else{
                return response([
                    'message' => 'Error in unfollowing...',
                    'status' => 'error'
                ], 500);
            }
        }
        else {
           return response()->json(['message' => 'cannot find any following (following customer) against this id', 'status' => 'error'], 404); 
        } 
    }

    // custom functions to show all followers and followings
    function allFollowers(){
        $cust_id = auth('api')->user()->cust_id;
        $followers=\DB::table('follows')->where('follows.following_id', $cust_id)->join('customers','customers.cust_id','follows.follower_id')->select('follows.follow_status', 'customers.name', 'customers.email', 'customers.cust_id')->get();
        if ($followers->count() >0) {
            return  response()->json($followers, 200);
        }
        else{
            return response()->json(['message' => 'No Follower Yet','status' =>'error'], 404);
        }
    }

    function allFollowings(){
        $cust_id = auth('api')->user()->cust_id;
        $following=\DB::table('follows')->where('follows.follower_id', $cust_id)->join('customers','customers.cust_id','follows.follower_id')->select('follows.follow_status', 'customers.name', 'customers.email', 'customers.cust_id')->get();
        if ($following->count() >0) {
            return  response()->json($following, 200);
        }
        else{
            return response()->json(['message' => 'No Followings Yet','status' =>'error'], 404);
        }
    }
}
