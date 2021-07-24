<?php

namespace App\Http\Controllers\apicontrollers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Workout;
use App\WorkoutVideo;
use App\ExerciseLib;
use App\Http\Resources\VideoExerciseLibraryResource;
use App\Http\Resources\workoutBuddyFindCollection;

class WorkoutController extends Controller
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
        $workouts = Workout::where('cust_id', auth('api')->user()->cust_id)->orderBy('workout_id', 'DESC')->get();
        return $workouts;
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
            'workout_type' => 'required',
            'workout_level' => 'required',
            'workout_goals' => 'required'
        ]);
        $work = new Workout();
        if (!($request->workout_type == 'indoor' || $request->workout_type == 'outdoor')) {
            return response()->json(["message" => "Invalid workout type is given, type can be indoor or outdoor", "status" => "error"], 404);
        }
        $work->workout_type = $request->workout_type;
                $work->title = $request->title;

        if (!($request->workout_level == 'easy' || $request->workout_level == 'hard' || $request->workout_level == 'intense')) {
            return response()->json(["message" => "Invalid level is given, level can be easy, hard or intense", "status" => "error"], 404);
        }
        $work->workout_level = $request->workout_level;
        // $matchGoals = array_intersect($request->workout_goals, ['Lose fat', 'Build muscle', 'Get stronger', 'Improve skills', 'Improve joint flexibility']);
        // if (count($matchGoals) < 1) {
            // return response()->json(["message" => "Invalid goals are given, goals can be ['Lose fat', 'Build muscle', 'Get stronger', 'Improve skills', 'Improve joint flexibility']", "status" => "error"], 404);
        // }
        $work->workout_goals = $request->workout_goals;
        $work->description=$request->description;
        $work->cust_id = auth('api')->user()->cust_id;
        $result = $work->save();
        $workout_videos = $request->workout_videos;
        // if (count($workout_videos) > 0) {
            // foreach ($workout_videos as $video) {
                $getVideo = new WorkoutVideo();
                $getVideo->workout_id = $work->workout_id;
                $getVideo->ex_lib_id = $workout_videos;
                $getVideo->cust_id = auth('api')->user()->cust_id;
                $getVideo->save();
            // }
        // }
        if (!empty($result)) {
            return response(['message' => 'Workout  Added Successfully','status' =>'success'], 200);
        }
        else {
            return response(['message' => 'Workout Not Add','status' =>'error'], 403);
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
    public function createlist(Request $request)
    {
        $work=new workout();
        $work->title=$request->workout_title;
        $work->description=$request->description;
        $work->cust_id=auth('api')->user()->cust_id;
        $result=$work->save();
        if (!empty($result)) {
        return response(['message' => 'Workout list  Added Successfully','status' =>'success']);

             }else{

              return response(['message' => 'Workout Not Add','status' =>'error']);
           }
    }


    // ===============================Custom functions with workout resource controller=================================
    function add_video(Request $request){
        request()->validate([
            'workout_id' => 'required',
            'video_id' => 'required',
        ]);

        $existing_in_workout = WorkoutVideo::where(['workout_id' => $request->workout_id, 'ex_lib_id' => $request->video_id, 'cust_id' =>  auth('api')->user()->cust_id])->count();
        if ($existing_in_workout > 0) {
            return response(['message' => 'Video already exists in workout','status' =>'error'], 422);
        }
        $work_out = Workout::where('workout_id' ,$request->workout_id)->count();
        $video = ExerciseLib::where('id', $request->video_id)->count();
        if ($work_out < 1) {
            return response(['message' => 'Invalid work_out id is given','status' =>'error'], 404);
        }
        if ($video < 1) {
            return response(['message' => 'Invalid video id is given','status' =>'error'], 404);
        }
        $video = new WorkoutVideo();
        $video->workout_id = $request->workout_id;
        $video->ex_lib_id = $request->video_id;
        $video->cust_id = auth('api')->user()->cust_id;
        $result = $video->save();
        if (!empty($result)) {
            return response(['message' => 'Add Video To Workout  Successfully','status' =>'success'], 200);
        }
        else
        {
            return response(['message' => 'Video Not Added','status' =>'error'], 403);
        }
    }

    // functions to get list of buddies and details
    public function getWorkoutDetails(Request $request)
    {
        $request->validate([
            'workout_id' => 'required'
        ]);
        if($request->has('workout_id'))
        {
            $workout = Workout::where('workout_id', $request->get('workout_id'))->first();
            $videos = WorkoutVideo::where('workout_videos.workout_id', $request->workout_id)->join('exercise_libs', 'exercise_libs.id', 'workout_videos.ex_lib_id')->get();
            $data = array(
                'workout' => $workout,
                'videos' => VideoExerciseLibraryResource::collection($videos)
            );
            if($workout->count() > 0){
                return response()->json($data , 200);
            }
            else{
                return response()->json(["status" => 'Error' , 'message' => 'Workout not found'] , 404);
            }
        }
        else{
            return response(["status" => 'Error' , 'message' => 'Workout ID is missing'] , 401);
        }
    }
}
