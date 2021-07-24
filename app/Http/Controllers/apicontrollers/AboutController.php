<?php

namespace App\Http\Controllers\apicontrollers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\About;
use App\models\ExerciseLib;
use App\Http\Resources\AboutResource;
use App\Workout;

class AboutController extends Controller
{
    public function about()
    {
    	 $about=About::find(1);
    	 if($about){

    	         return  new AboutResource($about);

    	     }else{

    	        return response(['message' => 'Data Not Found','status' =>'error']);
    	     }
    }

    public function editabout(Request $request)
    {
    	$about=About::find(1);
    	$about->text=$request->text;
        $about->address=$request->address;
        if($request->hasFile('about_image')){
            $filenamePath = public_path().'/aboutimage/'.$about->about_image;
            \File::delete($filenamePath);
                  $extension=$request->about_image->extension();
                  $filename=time()."_.".$extension;
                  $request->about_image->move(public_path('aboutimage'),$filename);
                  $about->about_image=$filename;
                }
    	$result=$about->save();
    	if ($result) {

             return response(['message' => 'About Us Updated Successfully','status' =>'success']);

             }else{

            return response(['message' => 'About Us Not Updated','status' =>'error']);

           }
    }

    public function getWorkoutDetails(Request $request)
    {
        if($request->has('workout_id'))
        {
            $workout = workout::where('workout_id',$request->get('workout_id'))->get();
            if(count($workout) > 0){
                $workout = ($workout->first())->with("customers" , "videos.libs","buddyworkout.customers")->get();
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

}
