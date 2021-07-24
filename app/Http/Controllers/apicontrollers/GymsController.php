<?php

namespace App\Http\Controllers\apicontrollers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\Gymtrait;
use App\Gym;
use App\Http\Resources\RecentgymsCollection;
use App\Http\Resources\GymsCollection;
use App\Http\Resources\GymDetail;
use DB;
use App\models\GymNotification;
use App\Http\Resources\GymLoginResource;
use App\Http\Resources\GymResource;

class GymsController extends Controller
{
    // public function login(Request $request)
    // {
    //     $gym = Gym::where('email', '=', $request->input('gym_email'))->first();
    //         if (\Hash::check($request->password, $gym->password)) {
    //               return new GymLoginResource($gym);
    //         }
    //         return response(['message' => 'Login Not Successfull','status' =>'error']);
    // }

    // public function addgym(Request $request){



    // 	$find=Gym::where('email',$request->email)->first();

    // 	if(!$find){

    // 		 $result=Gymtrait::senddata($request);

    //          if ($result == true) {

    //            return response(['message' => 'Gym added successfully','status' =>'success']);

    //          }else{

    //           return response(['message' => 'Gym Not added','status' =>'error']);
    //        }

    // 	}else{

    // 		return response(['message' => 'Gym already registered on this email','status' =>'error']);
    // 	}


    // }


    // // recents gyms

    //  public function recent(){

    // 	  $gyms=Gymtrait::latestgymes();

    // 	  if ($gyms->count() >0) {


    //          return  RecentgymsCollection::collection($gyms);

    //      }else{

    //         return response(['message' => 'Gyms Not Found','status' =>'error']);
    //      }
    //  }

    // // Approved gyms

    //  public function approve($id){

    // 	  $gym=Gymtrait::changestatus($id);
    //       $gymnoti=new GymNotification();
    //         $gymnoti->message="Your Gym Approved Successfully";
    //           $gymnoti->gym_id=$id;
    //           //$gymnoti->user_id=$request->customer_id;
    //           $gymnoti->save();
    // 	  if ($gym) {

    //          return response(['message' => 'Gym Approved','status' =>'success']);

    //      }else{

    //         return response(['message' => 'Gym Not Approved','status' =>'error']);
    //      }
    //  }

    // // Approved gyms

    //  public function delete($id){

    // 	  $gym=Gymtrait::deletegym($id);

    // 	  if ($gym) {

    //          return response(['message' => 'Gym deleted','status' =>'success']);

    //      }else{

    //         return response(['message' => 'Gym Not deleted','status' =>'error']);
    //      }
    //  }


    //      // See all gyms

    //  public function seeall(){

    // 	 $gyms=Gym::all();


    // 		  if ($gyms->count() >0) {


    // 	         return  RecentgymsCollection::collection($gyms);

    // 	     }else{

    // 	        return response(['message' => 'Gyms Not Found','status' =>'error']);
    // 	     }
    //  }


    // // gym Detail

    //  public function show($id){

    // 		 $gym=Gym::find($id);


    // 		  if ($gym){


    // 	         return  new GymDetail($gym);

    // 	     }else{

    // 	        return response(['message' => 'Gym Not Found','status' =>'error']);
    // 	     }
    //  }



    // // New gyms

    //  public function newgyms(){

    // 	  $gyms=Gymtrait::gymslist(null);

    // 	  if ($gyms->count() >0) {


    //          return  GymsCollection::collection($gyms);

    //      }else{

    //         return response(['message' => 'Gyms Not Found','status' =>'error']);
    //      }
    //  }

    // // Existing gyms
    //  public function existinggyms(){

    // 	  $gyms=Gymtrait::gymslist('Approved');

    // 	  if ($gyms->count() >0) {


    //          return  GymsCollection::collection($gyms);

    //      }else{

    //         return response(['message' => 'Gyms Not Found','status' =>'error']);
    //      }
    //  }

    //  public function findgym($name)
    //  {
    //         $gyms=Gym::where('full_name', 'LIKE', "%{$name}%")
    //          ->orWhere('street_address', 'LIKE', "%{$name}%")
    //         ->get();
    //         if ($gyms->count() >0) {


    //          return  GymsCollection::collection($gyms);

    //      }else{

    //         return response(['message' => 'Gyms Not Found','status' =>'error']);
    //      }
    //  }

     public function allgyms()
     {
         $gyms=Gym::get();
         if ($gyms->count() >0) {
            // dd($gyms);
            // return response()->json(['gyms'=> GymsCollection::collection($gyms)],200);
             return  GymResource::collection($gyms);

         }else{

            return response(['message' => 'Gyms Not Found','status' =>'error']);
         }
     }
    //  public function gympaginate($number)
    //  {
    //      $gyms=Gym::paginate($number);
    //      if ($gyms->count() >0) {


    //          return  GymsCollection::collection($gyms);

    //      }else{

    //         return response(['message' => 'Gyms Not Found','status' =>'error']);
    //      }
    //  }


}
