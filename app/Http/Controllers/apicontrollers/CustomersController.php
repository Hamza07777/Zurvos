<?php

namespace App\Http\Controllers\apicontrollers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\Usertrait;
use App\Customer;
use App\Http\Resources\UserloginResource;
use App\Http\Resources\UseramountResource;
use App\Http\Resources\UserProfileResource;
use App\Http\Resources\UsersCollection;
use App\Mail\VerificationCode;
use Mail;
use App\models\Usernotification;
use App\models\Post;
use App\models\VideoOrder;
use App\Http\Resources\gymstatdetail;
use DB;
class CustomersController extends Controller
{




    public function userprofilee($id){

        //$id=$request->id;
    
       // dd($id);
                 $user=Customer::where('cust_id',$id)->firstOrFail();
//dd($user);
          if ($user) {

            return  new UserProfileResource($user);

         }else{

            return response(['message' => 'Users Not Found','status' =>'error']);
         }
    }





}
