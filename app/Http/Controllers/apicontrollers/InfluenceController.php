<?php

namespace App\Http\Controllers\apicontrollers;

use App\Http\Controllers\Controller;
use App\Influence;
use App\Gym;
use App\checkin_user;
use Carbon\Carbon;
use App\models\Policy;
use App\Workout;
use App\BuddyWorkout;
use App\WorkoutVideo;
use App\Pdf_files;
use App\Customer; 
use App\Http\Resources\SingleInfluenceResource;
use App\Http\Resources\InfluenceCollection;
use App\Http\Resources\SingleExcercse;
use Illuminate\Http\Request;
use App\Http\Resources\workoutBuddyFindCollection;
use App\Http\Resources\UserProfileResource;
use App\Http\Resources\usernotificationcollection;
use App\Http\Resources\WorkoutDetail;
use DB;
use App\models\Usernotification;


class InfluenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function influenceResources(){
        return response()->json(Pdf_files::all(), 200);
    }

  
    public function addvideo(Request $request)
    {
        $alredayvideo=WorkoutVideo::where('ex_lib_id',$request->video_id)->where('cust_id',$request->user_id)->get()->count();
        if($alredayvideo==0){
               $ok=new WorkoutVideo();
            $ok->ex_lib_id=$request->video_id;
            $ok->cust_id=$request->user_id;
            $result=$ok->save();
            if (!empty($result)) {
        return response(['message' => 'Add Video To Workout  Successfully','status' =>'success']);
            
             }else{

              return response(['message' => 'Video Not Added','status' =>'error']);
           }
            
        }
        else{
            return response(['message' => 'Video Already Added','status' =>'error']);
        }
        
    }
    public function getallvideo($id)
    {
         $video=DB::table('workout_videos')->where('workout_videos.cust_id',$id)
        ->join('exercise_libs','exercise_libs.id','workout_videos.ex_lib_id')
        ->select('exercise_libs.*')
        ->get();
            if (!empty($video)) {
            
                return SingleExcercse::collection($video);

            
             }else{

              return response(['message' => 'Video Not Found','status' =>'error']);
           }
    }
    
    
    public function influenceResources_page($term)
    {
        $resource = Pdf_files::where('file_name', 'LIKE', '%' . $term . '%')->get();
        if (is_null($resource)) {
            return response()->json(["message" => "Record not found"], 404);
        }
        return response()->json($resource, 200);
    }

    public function influenceGeneratelink(){
        $resource = "https://www.cdscdcsds.sdsds/sdsds/com";
        return response()->json($resource, 200);
    }

    public function influenceAffaliated_policy(){
        $policy = Policy::first();
        if (is_null($policy)) {
            return response()->json(["message" => "Record not found"], 404);
        }
        return response()->json($policy, 200);
    }
    public function index()
    {
        $influence=Influence::all();
        if (!empty($influence)) {


            return  InfluenceCollection::collection($influence);

        }else{

           return response(['message' => 'Influence Not Found','status' =>'error']);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $influence=new Influence();
        $influence->name=$request->name;
        $influence->email=$request->email;
        $influence->password=bcrypt($request->password);
        $result=$influence->save();
        if ($result) {

            return response([

                'message'=>'Influence Add successfully',
                'status' =>'success'
            ]);
        }else{

            return response([

                'message'=>'Record Not Created..',
                'status' =>'error'
            ]);
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
        $influence=Influence::find($id);
        if ($influence) {

            return  new SingleInfluenceResource($influence);

         }else{

            return response(['message' => 'Influence Not Found','status' =>'error']);
         }

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
        $influence=Influence::find($id);
        $influence->name=$request->name;
        $influence->email=$request->email;
        $influence->password=bcrypt($request->password);
        $result=$influence->save();
        if ($result) {

            return response([

                'message'=>'Influence Update successfully',
                'status' =>'success'
            ]);
        }else{

            return response([

                'message'=>'Influence Not Found..',
                'status' =>'error'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $influence=Influence::find($id);
        if ($influence) {
            $influence->delete();
            return response([

                'message'=>'Influence Delete successfully',
                'status' =>'success'
            ]);
        }else{

            return response([

                'message'=>'Influence Not Not..',
                'status' =>'error'
            ]);
        }
    }
    
    
    public function getInfluenceUsers()
    {
        if(request()->has('start_date') && request()->has('end_date'))
        {
            $influence = Influence::whereDate('created_at' , '>=' , request()->get('start_date'))->whereDate('created_at' , '<=' , request('end_date'))->get();
            return response(['status' => 'Success' , 'message' => '' , 'data' => $influence] , 200);
        }
        else
        {
            return response(['status' => 'Error' , 'message' => 'Start date or End date is missing'] , 401);
        }
    }
    public function getWorkoutDetails(Request $request)
    {
        if($request->has('workout_id'))
        {
            $workout = workout::whereId($request->get('workout_id'))->get();
            if(count($workout) > 0){
                $workout = ($workout->first())->with("customer" , "videos.libs","buddyworkout.customer")->get();
                return response(["status" => 'Success' , 'message' => '' , 'data' => $workout] , 200);
            }
            else{
                return response(["status" => 'Error' , 'message' => 'Workout not found'] , 404);
            }
        }
        else{
            return response(["status" => 'Error' , 'message' => 'Workout ID is missing'] , 401);
        }
    }

    public function getBuddies()
    {
        if(request()->has('user_id'))
        {
            $buddyWorkouts = BuddyWorkout::with("buddy")->where("customer_id" , request()->get('user_id'))->get();
            return response(['status' => 'Success' , 'message' => '', 'data' => $buddyWorkouts] , 200);
        }
        else{
            return response(["status" => 'Error' , 'message' => 'User ID is missing'] , 401);
        }
    }

    public function removeUserBuddies()
    {
        if(request()->has('user_id') && request()->has('buddy_id'))
        {
            $buddy = BuddyWorkout::where("id" , request()->get('buddy_id'))->where('buddy_id' , request()->get('user_id'))->get();
            if(count($buddy) > 0)
            {
                ($buddy->first())->delete();
                return response(['status' => 'Success' , 'message' => 'Buddy deleted successfully'] , 200);
            }
            else{
                return response(['status' => 'Error' , 'message' => 'Workout buddy not found'] , 404);
            }
        }
        else
        {
            return response(['status' => 'Error' , 'message' => 'Buddy id or user id not is invalid'] , 401);
        }
    }

    public function createWorkout()
    {
        if(request()->has('user_id'))
        {
            $workout = new workout();
            $workout->workout_title = request()->get('title');
            $workout->type = request()->get('type');
            $workout->workout_level = request()->get('level');
            $workout->goal = request()->get('goal');
            $workout->customer_id = request()->get('user_id');
            $workout->description = request()->get('description');
            $workout->save();
            return response(['status' => 'Success' , 'message' => 'Workout saved successfully' , 'data' => $workout] , 200);
        }
        else
        {
            return response(['status' => 'Error' , 'message' => 'User ID is missing'] , 401);
        }
    }

    public function getUserWorkoutList($user_id)
    {
                    if(!empty($user_id))
                    {
                         $res=DB::table('workout_videos')->where('workout_videos.cust_id',$user_id)
                  ->join('exercise_libs','exercise_libs.id','workout_videos.ex_lib_id')
                  ->join('workouts','workouts.workout_id','workout_videos.workout_id')
                  ->join('customers','customers.cust_id','workout_videos.cust_id')
                  ->select('workouts.title','workouts.cust_id','workouts.description','workouts.workout_type','workouts.workout_level','workouts.workout_goals','customers.name','workout_videos.workout_video_id','exercise_libs.video_title','exercise_libs.video_name')
                  ->orderBy('workouts.workout_id', 'DESC')
                  ->get();
           // dd($res);
                  if ($res->count() >0) {
            
                        return response(['message' => 'Workout List','status' =>'Success','data' => $res], 200);
                       //  return  WorkoutDetail::collection($res);
            
                     }else{
                         
                        return response(['message' => 'No Workout Found','status' =>'error']);
                     }
            
            
                 //   dd($user_id);

          //  $workouts = workout::where("cust_id" , $user_id);
           // $workouts = $workouts->with("videos.libs");
            //return response(['status' => 'Success' , 'message' => 'User Workout List Found' , 'data' => $workouts->get() ] , 200) ;
        }
        else
        {
            return response(['status' => 'Error' , 'message' => 'User ID is missing'] , 401);
        }
    }

    public function getUserBuddyList(){
        if(request()->has('user_id'))
        {
                $customer = BuddyWorkout::whereHas("workouts" , function($q) {
                   $q->where("customer_id" , request()->get('user_id'));
                })->with("buddy")->get();

            return response(['status' => 'Success' , 'message' => '' , 'data' => $customer] , 200);
        }
        else
        {
            return response(['status' => 'Error' , 'message' => 'User ID is missing'] , 401);
        }
    }


    public function getExerciseLibrary()
    {
        if(request()->has('user_id'))
        {
            $exerciseLib = ExerciseLib::where('customer_id' , request()->get('user_id'))->get();
            return response(['status' => 'Success' , 'message' => '' , 'data' => $exerciseLib] , 200);
        }
        else
        {
            return response(['status' => 'Error' , 'message' => 'Start date or End date is missing'] , 401);
        }
    }
    
    
    
    
      public function workoutbuddy_find(Request $request)
    {
       // dd($request);
        $type=$request->type;
        $title=$request->workout_title;
        $workout_level=$request->workout_level;
        $goal=$request->goal;
    	$timing=$request->timing;
    //   $buddy= workout::where('workout_type', 'LIKE', '%' . $type . '%')->orWhere('title', 'LIKE', '%' . $title . '%')->orWhere('workout_level', 'LIKE', '%' . $workout_level . '%')->orWhere('workout_goals', 'LIKE', '%' . $goal . '%')->groupBy('member_id')->get();
    //dd($buddy);
           $buddy= workout::where('workout_type', 'LIKE', '%' . $type . '%')->orWhere('title', 'LIKE', '%' . $title . '%')->orWhere('workout_level', 'LIKE', '%' . $workout_level . '%')->orWhere('workout_goals', 'LIKE', '%' . $goal . '%')->get();
           $buddy=$buddy->unique('cust_id');

      if (!empty($buddy)) {
            return workoutBuddyFindCollection::collection($buddy);
        }
        else {
            return response(['message' => 'Workout Buddy Not Found','status' =>'error'], 403);
        }

        
    }
    
    
    
    public function accept(Request $request)
    {
        
        $id=$request->buddy_workout_id;
        $buddy=BuddyWorkout::find($id);
        $buddy->request_status="accept";
        $buddy->save();
        if(!empty($buddy))
            {


             return response(['message' => 'Buddy Workout Accepted','status' =>'success']);

         }else{
             
            return response(['message' => 'No Workout Found','status' =>'error']);
         }
        
    }
    public function reject(Request $request)
    {
        $id=$request->buddy_workout_id;
        $buddy=BuddyWorkout::find($id);
        $buddy->request_status="reject";
        $buddy->save();
        if(!empty($buddy))
            {


             return response(['message' => 'Buddy Workout Rejected','status' =>'success']);

         }else{
             
            return response(['message' => 'No Workout Found','status' =>'error']);
         }
        
    }
    
     public function user_search(Request $request){

        //$id=$request->id;
    
        //dd($id);
        $querys = $request->get('querys');
       // =$request->querys;
                 $user=Customer::where('name', 'LIKE', '%' . $querys . '%')->orWhere('email', 'LIKE', '%' . $querys. '%')->get();
                  $user_count=Customer::where('name', 'LIKE', '%' . $querys . '%')->orWhere('email', 'LIKE', '%' . $querys. '%')->count();
//dd($user);
          if ($user_count > 0) {
                return response(['message' => 'Gyms  Found','status' =>'success','user'=>$user]);
           // return  new UserProfileResource($user);

         }else{

            return response(['message' => 'Gyms Not Found','status' =>'error']);
         }
    }
    
    public function user_notification($id)
    {
    	//$noti=Usernotification::find($id);
// $id=$request->id;
//dd($id);
    // 	$notifications=DB::table('usernotifications')->where('post_user_id',$id)
    // 	->join('customers','customers.cust_id','usernotifications.user_id')
    // 	->join('posts','posts.post_id','usernotifications.post_id')
    // 	->select('customers.name','customers.user_image','usernotifications.message','usernotifications.id','usernotifications.status','usernotifications.created_at','posts.post_title','posts.post_id as post_id','posts.post_image')
    // 	->orderBy('id', 'desc')->get();
    //	dd($notifications);
            $notifications=DB::table('usernotifications')
            ->where('post_user_id',$id)->join('customers','customers.cust_id','usernotifications.user_id')
            ->select('customers.name','customers.user_image','usernotifications.message','usernotifications.id','usernotifications.status','usernotifications.created_at','usernotifications.post_id')
            ->orderBy('id', 'desc')->get();
    	 if (!empty($notifications)) {


    	    return  usernotificationcollection::collection($notifications);

    	}else{
    	    
    	   return response(['message' => 'Notifications Not Found','status' =>'error']);
    	}
    }
    
    
    
    
    function point2point_distance(Request $request) 
    { 
       // dd($request->customer_id);
       
       
        $request->validate([
            'latitude' => 'required',
            'longitude' => 'required',
            'customer_id' => 'required',
        ]);
        $gym=Gym::first();
      //  dd($gym);
          $lat1 =$gym->latitude;
        $lon1 =$gym->longitude;
        //$lat1 =25.285136;
        //$lon1 =55.3248708;
       // $lat2 =25.3929771;
       // $lon2 =55.4564803;
        $lat2 =$request->latitude;
        $lon2 =$request->longitude;
        
        
    //   $dist=  DB::table("gyms")
    // ->select("gyms.id"
    //     ,DB::raw("6371 * acos(cos(radians(" . $lat2 . ")) 
    //     * cos(radians(gyms.latitude)) 
    //     * cos(radians(gyms.longitude) - radians(" . $lon2 . ")) 
    //     + sin(radians(" .$lat2. ")) 
    //     * sin(radians(gyms.latitude))) AS distance"))
    //     ->groupBy("gyms.id")
    //     ->get();
        
    //     dd($dist);
        
        $unit='K';
        $theta = $lon1 - $lon2; 
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta)); 
        $dist = acos($dist); 
        $dist = rad2deg($dist); 
        $miles = $dist * 60 * 1.1515;
        $unit = strtoupper($unit);

        if ($unit == "K") 
        {
            
            $kilometer=$miles * 1.609344; 
            $mile=$kilometer*1000;
            $distance=round($mile);
             if($distance<=10)
             { 
                $user_chkin=checkin_user::whereDate('created_at', Carbon::today())->whereNull('check_out')->where('user_id',$request->customer_id)->first();
                if($user_chkin)
                {
                    return response(['message' => 'Your are Already Check In any Gym','status' =>'success','Distance'=>$distance." meter",'check_in_user_deatil'=>$user_chkin]);

                }
                 else{
                     
                $check_in= new checkin_user();
                $check_in->user_id=$request->customer_id;
                $check_in->gym_id=$gym->id;
                $check_in->check_in=Carbon::now()->toDateTimeString();
                $check_in->status=1;
                $check_in->save();
                 $notification=new Usernotification();
                $notification->message="Checked into Gym";
                $notification->post_user_id=$request->customer_id;
                $notification->user_id=$request->customer_id;
                $notification->save();
                $user_check_deatil=checkin_user::where('id',$check_in->id)->first();
                return response(['message' => 'Area','status' =>'success','Distance'=>$distance." meter",'check_in_user_deatil'=>$user_check_deatil]);
        
                 }
                     
                 
        
            }
             else{
                $user_chkin=checkin_user::whereDate('created_at', Carbon::today())->whereNull('check_out')->where('user_id',$request->customer_id)->first();
                if($user_chkin)
                {
                $check_in= checkin_user::where('id',$user_chkin->id)->update([
                    'check_out'=>Carbon::now()->toDateTimeString(),
            ]);
             $notification=new Usernotification();
                $notification->message="Checked Out From Gym";
                $notification->post_user_id=$request->customer_id;
                $notification->user_id=$request->customer_id;
                $notification->save();
                $user_check_deatil=checkin_user::where('id',$user_chkin->id)->first();
                return response(['message' => 'Area','status' =>'success','Distance'=>$distance." meter",'check_out_user_deatil'=>$user_check_deatil]);
                }
                else{
                    return response(['message' => 'Your are not Check In any Gym','status' =>'error','Distance'=>$distance." meter"]);
                }
            }
            
            
            
        } 
        else if ($unit == "N") 
        {
                $mile=$miles * 0.8684;
        return response(['message' => 'Area','status' =>'success','miles'=>$mile]);
        } 
        else 
        {
            return response(['message' => 'Area','status' =>'success','miles'=>$miles]);
       
      }
    } 
}
