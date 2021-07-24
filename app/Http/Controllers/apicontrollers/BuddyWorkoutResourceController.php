<?php

namespace App\Http\Controllers\apicontrollers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\CreataedBuddiesResource;


use App\Http\Resources\CreatedBuddiesResource;
use App\BuddyWorkout;
use App\Workout;

class BuddyWorkoutResourceController extends Controller
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
        $myCreatedBuddies = BuddyWorkout::join('workouts', 'workouts.workout_id', 'buddy_workouts.buddy_workout_id_from_workouts')->join('customers', 'workouts.cust_id', 'customers.cust_id')->where('buddy_workouts.cust_id', auth('api')->user()->cust_id)->get();
       //  $myCreatedBuddies=$myCreatedBuddies->unique('cust_id');
      //   dd($myCreatedBuddies);
        if ($myCreatedBuddies->count() > 0) {
            return CreataedBuddiesResource::collection($myCreatedBuddies);
        }
        else {
            return response()->json(['message' => 'you have not any  buddies yet', 'status' => 'error' ], 404);
        }
    }

    // function to view all the invitations for to be buddies
    function invitations($id){
       // dd(auth('api')->user()->cust_id);
        $myInvitations = BuddyWorkout::join('workouts', 'workouts.workout_id', 'buddy_workouts.buddy_workout_id_from_workouts')->join('customers', 'buddy_workouts.cust_id', 'customers.cust_id')->where('buddy_workouts.request_status', 'pending')->where('buddy_workouts.buddy_id', $id)->get();
      // dd($myInvitations);
        //$myInvitations=$myInvitations->unique('cust_id');
       
        if ($myInvitations->count() > 0) {
            return CreataedBuddiesResource::collection($myInvitations);
        }
        else {
            return response()->json(['message' => 'No Invititation is pending', 'status' => 'error' ], 404);
        }
    }

    // function to change the status of invitations
    public function changeInvitationStatus(Request $request)
    {
        $request->validate([
            'status' => 'required',
            'buddy_id' => 'required',
            'workout_id' => 'required',
        ]);
        if (!($request->status == 'pending' || $request->status == 'accept' || $request->status == 'reject')) {
            return response()->json(['message' => 'status could be only [pending, accept, reject]', 'status' => 'error' ], 422);
        }
        $findBuddy = BuddyWorkout::where(['buddy_id' => $request->buddy_id, 'buddy_workout_id_from_workouts' => $request->workout_id, 'cust_id' => auth('api')->user()->cust_id])->count();
        if ($findBuddy > 0) {
            $buddy=BuddyWorkout::where(['cust_id' => $request->buddy_id, 'buddy_workout_id_from_workouts' => $request->workout_id, 'buddy_id' => auth('api')->user()->cust_id])->first();
            $buddy->request_status=$request->status;
            $buddy->save();
            if(!empty($buddy))
            {
                return response()->json(['message' => 'Buddy Workout status changed to '.$request->status,'status' =>'success'], 200);

            }
            else{
                return response()->json(['message' => 'No Workout Found','status' =>'error'], 404);
            }
        }
        else {
            return response()->json(['message' => 'No Workout Found','status' =>'error'], 404);
        }
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
        request()->validate([
            'buddy_id' => 'required',
            'buddy_workout_id_from_workouts' => 'required',
            'buddy_workout_time' => 'required'
        ]);
        $work = new BuddyWorkout();
        $work->cust_id = auth('api')->user()->cust_id;
        $findBuddy = Workout::where(['cust_id' => $request->buddy_id, 'workout_id' => $request->buddy_workout_id_from_workouts])->count();
       // dd($findBuddy);
      //  $existing = BuddyWorkout::where(['cust_id' => auth('api')->user()->cust_id, 'buddy_id' => $request->buddy_id, 'buddy_workout_id_from_workouts' => $request->buddy_workout_id_from_workouts])->where('buddy_workouts.request_status', 'accept')->get();
        $existing = BuddyWorkout::where(['cust_id' => auth('api')->user()->cust_id, 'buddy_id' => $request->buddy_id])->where('buddy_workouts.request_status', 'accept')->get();
  $existing_pending = BuddyWorkout::where(['cust_id' => auth('api')->user()->cust_id, 'buddy_id' => $request->buddy_id])->where('buddy_workouts.request_status', 'pending')->get();
        if ($existing->count() > 0 || $existing_pending->count() > 0) {
            return response()->json(['message' => "Invite Already Send To This Buddy", 'status' => 'error'], 422);
        }
      //  dd(auth('api')->user()->cust_id);
        if ($findBuddy > 0) {
            $work->buddy_id = $request->buddy_id;
            $work->buddy_workout_id_from_workouts = $request->buddy_workout_id_from_workouts;
            $work->buddy_workout_time = $request->buddy_workout_time;
            $work->request_status = "pending";
            $result = $work->save();
            if (!empty($result)) {
                return response()->json(['message' => 'Invite Send Successfully','status' =>'success'], 200);
            }
            else {
                return response()->json(['message' => 'buddy Workout Not Add','status' =>'error'], 400);
            }
        }
        else {
            return response()->json(['message' => 'buddy_id or buddy_workout_id_from_workouts is Invalid','status' =>'error'], 422);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    // function to get the list of buddies
    public function getBuddies($user_id)
    {
     //  $user_id=auth('api')->user()->cust_id;
       // dd($user_id);

        $myCreatedBuddies = BuddyWorkout::join('workouts', 'workouts.workout_id', 'buddy_workouts.buddy_workout_id_from_workouts')->join('customers', 'buddy_workouts.buddy_id', 'customers.cust_id')->where('buddy_workouts.cust_id', $user_id)->where('buddy_workouts.request_status', 'accept')->get();
       // dd($myCreatedBuddies);
       // $myCreatedBuddies=$myCreatedBuddies->unique('cust_id');
        if ($myCreatedBuddies->count() > 0) {
            return CreatedBuddiesResource::collection($myCreatedBuddies);
        }
        else {
            return response()->json(['message' => 'you have not any  buddies yet', 'status' => 'error' ], 404);
        }
    }
}
