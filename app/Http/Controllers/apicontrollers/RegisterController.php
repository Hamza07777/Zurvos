<?php

namespace App\Http\Controllers\apicontrollers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Customer;
use App\Mail\VerificationCode;
use Mail;
use App\Http\Resources\UserProfileResource;

class RegisterController extends Controller
{

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['register', 'confirm', 'sendcode', 'createUser', 'updateprofile']]);
    }
    // function to register the customer as user or influencer
    // public function register(Request $request)
    // {
    //     $request->validate([
    //         'customer_type' => 'required',
    //     ]);
    //     if (!($request->customer_type == "customer" || $request->customer_type == "influencer")) {
    //         return response()->json(['error' => 'Invalid Customer type', 'status' => 'error'], 422);
    //     }
    //     $request->validate([
    //         'name' => 'required',
    //         'email' => 'required|email',
    //         'password' => 'required',
    //         'gender' => 'required',
    //         'phone_number' => 'required|unique:customers',
    //         'zip_code' => 'required',
    //         'verification_code_admin' => 'required',
    //         't_shirt_size' => 'nullable'
    //     ]);
    //     if (!($request->gender == "male" ||  $request->gender == "female")) {
    //         return response()->json(['error' => 'Invalid Gender type', 'status' => 'error'], 422);
    //     }
    //     $result = $this->createUser($request);
    //     if ($result==1) {
    //         return response()->json([
    //             'message'=>'User Created Successfully',
    //             'status' =>'success',
    //             'user' => $result
    //         ],200);
    //     }
    //     else if($result=='invalid'){
            
    //          return response()->json([
    //             'message'=>'Email or Verification Code is Invalid',
    //             'status' =>'error'
    //         ],400);
    //     }
    //     else{
    //         return response()->json([
    //             'message'=>'User Not Created..',
    //             'status' =>'error'
    //         ],400);
    //     }
    // }




  public function register(Request $request)
    {
        $request->validate([
            'customer_type' => 'required',
        ]);
        if (!($request->customer_type == "customer" || $request->customer_type == "influencer")) {
            return response()->json(['error' => 'Invalid Customer type', 'status' => 'error'], 422);
        }
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers',
            'password' => 'required',
            'gender' => 'required',
            'phone_number' => 'required|unique:customers',
            'zip_code' => 'required',
            't_shirt_size' => 'nullable'
        ]);
        if (!($request->gender == "male" ||  $request->gender == "female")) {
            return response()->json(['error' => 'Invalid Gender type', 'status' => 'error'], 422);
        }
        $result = $this->createUser($request);
        if ($result) {
            return response()->json([
                'message'=>'User Created Successfully',
                'status' =>'success',
                'user' => $result
            ],200);
        }else{
            return response()->json([
                'message'=>'User Not Created..',
                'status' =>'error'
            ],400);
        }
    }

    // function to create or update a customer
    // function createUser($request){
    //     $user=Customer::where('email',$request->email)->first();
    //     $filename = "";
    //     if ($request->hasFile('user_image')) {
    //         $extension = $request->user_image->extension();
    //         $filename = 'user_'.time() . "_." . $extension;
    //         $request->user_image->move(public_path('userimage'), $filename);
    //     }
    //     // $data = array(
    //     //     'name' => $request->name,
    //     //     'email' => $request->email,
    //     //     'password' => bcrypt($request->password),
    //     //     'city' => $request->city,
    //     //     'gender' => $request->gender,
    //     //     'phone_number' => $request->phone_number,
    //     //     'zip_code' => $request->zip_code,
    //     //     't_shirt_size' => $request->t_shirt_size,
    //     //     'bio' => $request->bio,
    //     //     'customer_type' => $request->customer_type,
    //     //     'user_image' => $filename,
    //     // );
    //     if($user->verification_code_admin== $request->verification_code_admin)
    //     {
    //     $result = Customer::where('email', $request->email)
    //                 ->update(['name' => $request->name,
    //         //'email' => $request->email,
    //         'password' => bcrypt($request->password),
    //         'city' => $request->city,
    //         'gender' => $request->gender,
    //         'phone_number' => $request->phone_number,
    //         'zip_code' => $request->zip_code,
    //         't_shirt_size' => $request->t_shirt_size,
    //         'bio' => $request->bio,
    //         'status' => 'active',
    //         'customer_type' => $request->customer_type,
    //         'user_image' => $filename]);
    //     return $result;
    //     }
    //     else{
    //         return $result='invalid';
    //     }
    // }



   function createUser($request){
        $filename = "";
        if ($request->hasFile('user_image')) {
            $extension = $request->user_image->extension();
            $filename = 'user_'.time() . "_." . $extension;
            $request->user_image->move(public_path('userimage'), $filename);
        }
        $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'city' => $request->city,
            'gender' => $request->gender,
            'phone_number' => $request->phone_number,
            'zip_code' => $request->zip_code,
            't_shirt_size' => $request->t_shirt_size,
            'bio' => $request->bio,
            'customer_type' => $request->customer_type,
        );
        $result = Customer::create($data);
        return $result;
    }

    // function to send verification mail with code
    public function sendcode(Request $request)
    {
        if (empty($request->email)) {
            return response()->json(['message' => 'Email is required', 'status' => 'error'],401);
        } else {
            $getRecord = Customer::where('email',$request->email)->first();
            if ($getRecord) {
                $verificaitonCode = rand(1000, 9999);
                $result = Customer::where('email', $request->email)->update(['verification_code' => $verificaitonCode]);
               // dd($result);
               // dd(class_exists('DOMDocument'));
                if ($result) {

                    Mail::to($request->email)->send(new VerificationCode($verificaitonCode));

                    return response()->json(['message' => 'Verificaiton code sent to gmail', 'status' => 'success'], 200);
                } else {
                    return response()->json(['message' => 'Verificaiton Code Not Sent To This Mail...', 'status' => 'error'], 401);
                }
            } else {
                return response()->json(['message' => 'Email is not valid', 'status' => 'error']);
            }
        }
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60000000000
        ]);
    }

    // function to confirm the verification code and authorized the user
    public function confirm(Request $request)
    {
        if (empty($request->email) || empty($request->code)) {
            return response()->json(['message' => 'Email and code is required', 'status' => 'error'],401);
        } else {

            $getRecord = Customer::where('email', $request->email)->first();

            if ($getRecord) {

                $result = Customer::where('email', $request->email)
                    ->where('verification_code', $request->code)->first();

                if ($result) {
                    $user = Customer::where('email', $request->email)->update(['status' => 'active']);
                    $user = Customer::where(['status' => 'active', 'email' => $request->email])->first();
                    $token = auth()->login($user);
                    return $this->respondWithToken($token);
                    return response(['token' => $this->respondWithToken($token),'message' => 'Verificaiton Code Matched', 'status' => 'success'],200);
                } else {

                    return response()->json(['message' => 'Verificaiton Code Not Matched (check your mail too)', 'status' => 'error'],401);
                }
            } else {

                return response()->json(['message' => 'Email is invalid', 'status' => 'error'], 401);
            }
        }
    }


    // function to update the password of customer
    public function updatepassword(Request $request)
    {
        $email = auth('api')->user()->email;
        if (empty($email)  || empty($request->password)) {
            return response()->json(['message' => 'Email and password is required', 'status' => 'error'], 401);
        } else {
            $getRecord = Customer::where('email', $email)->first();
            if ($getRecord) {
                $result = Customer::where('email', $email)
                    ->update(['password' => bcrypt($request->password)]);
                if ($result) {
                    return response()->json(['message' => 'Password Updated Successfully', 'status' => 'success'], 200);
                } else {
                    return response()->json(['message' => 'Password Not Updated', 'status' => 'error'], 500);
                }
            } else {
                return response()->json(['message' => 'No user found', 'status' => 'error'], 404);
            }
        }
    }

    // function to update the the profile of the user
    public function updateprofile(Request $request)
    {
        $customer = auth('api')->user();
        if ($request->has('password')) {
            return response()->json(['message' => 'This is not allowed to have password here', 'status' => 'error'], 500);
        }
        if ($request->has('gender')) {
            if (!($request->gender == "male" ||  $request->gender == "female")) {
                return response()->json(['error' => 'Invalid Gender type', 'status' => 'error'], 404);
            }
        }
       // dd($customer);
        if ($customer) {
            if ($request->hasFile('user_image')) {
                //$filenamePath = public_path() . '/userimage/' . $customer->user_image;
                //\File::delete($filenamePath);
                $extension = $request->user_image->extension();
            $filename = 'user_'.time() . "_." . $extension;
            $request->user_image->move(public_path('userimage'), $filename);
            }
            else{
                $filename=$customer->user_image;
            }
           
            if ($request->hasFile('cover_image')) {
                //$filenamePath = public_path() . '/userimage/' . $customer->user_image;
                //\File::delete($filenamePath);
                $extension = $request->cover_image->extension();
            $file_cover = 'user_'.time() . "_." . $extension;
            $request->cover_image->move(public_path('userimage'), $file_cover);
            }
            else{
                $file_cover=$customer->cover_image;
            }
           
              if (!empty($request->full_name)) {
               $name=$request->full_name;
            }
            else{
                $name=$customer->name;
            }
           
               if (!empty($request->email)) {
               $email=$request->email;
            }
            else{
                $email=$customer->email;
            }
           
               if (!empty($request->city)) {
               $city=$request->city;
            }
            else{
                $city=$customer->city;
            }
            
                if (!empty($request->gender)) {
               $gender=$request->gender;
            }
            else{
                $gender=$customer->gender;
            }
            
                if (!empty($request->phone_number)) {
               $phone_number=$request->phone_number;
            }
            else{
                $phone_number=$customer->phone_number;
            }
            
                if (!empty($request->zip_code)) {
               $zip_code=$request->zip_code;
            }
            else{
                $zip_code=$customer->zip_code;
            }
            
                if (!empty($request->t_shirt_size)) {
               $t_shirt_size=$request->t_shirt_size;
            }
            else{
                $t_shirt_size=$customer->t_shirt_size;
            }
            
                if (!empty($request->bio)) {
               $bio=$request->bio;
            }
            else{
                $bio=$customer->bio;
            }
            
                if (!empty($request->verification_code)) {
               $verification_code=$request->verification_code;
            }
            else{
                $verification_code=$customer->verification_code;
            }
            
                if (!empty($request->affiliated_link)) {
               $affiliated_link=$request->affiliated_link;
            }
            else{
                $affiliated_link=$customer->affiliated_link;
            }
            
                if (!empty($request->customer_type)) {
               $customer_type=$request->customer_type;
            }
            else{
                $customer_type=$customer->customer_type;
            }
            
                if (!empty($request->status)) {
               $status=$request->status;
            }
            else{
                $status=$customer->status;
            }
            
                if (!empty($request->facebook_link)) {
               $facebook_link=$request->facebook_link;
            }
            else{
                $facebook_link=$customer->facebook_link;
            }
            
                if (!empty($request->instagram_link)) {
               $instagram_link=$request->instagram_link;
            }
            else{
                $instagram_link=$customer->instagram_link;
            }
            
                if (!empty($request->twitter_link)) {
               $twitter_link=$request->twitter_link;
            }
            else{
                $twitter_link=$customer->twitter_link;
            }
            
                if (!empty($request->tiktok_link)) {
               $tiktok_link=$request->tiktok_link;
            }
            else{
                $tiktok_link=$customer->tiktok_link;
            }
            
                if (!empty($request->paypalemail)) {
               $paypalemail=$request->paypalemail;
            }
            else{
                $paypalemail=$customer->paypalemail;
            }
            
                if (!empty($request->paypalemail_document)) {
               $paypalemail_document=$request->paypalemail_document;
            }
            else{
                $paypalemail_document=$customer->paypalemail_document;
            }
           
               if (!empty($request->verification_code_admin)) {
               $verification_code_admin=$request->verification_code_admin;
            }
            else{
                $verification_code_admin=$customer->verification_code_admin;
            }
            
           
           
           
           
           
           
             Customer::where('cust_id',$customer->cust_id)->update([
            'name' => $name,
            'email' => $email,
            'city' => $city,
            'gender' => $gender,
            'phone_number' => $phone_number,
            'zip_code' => $zip_code,
            't_shirt_size' => $t_shirt_size,
            'bio' => $bio,
            'verification_code' => $verification_code,
            'affiliated_link' => $affiliated_link,
            'customer_type' => $customer_type,
            'status' => $status,
            'facebook_link' => $facebook_link,
            'twitter_link' => $twitter_link,
            'tiktok_link' => $tiktok_link,
            'paypalemail' => $paypalemail,
            'paypalemail_document' => $paypalemail_document,
            'verification_code_admin' => $verification_code_admin,
           'user_image' => $filename,
           'cover_image' => $file_cover,
            ]);
           // $customer->update($request->except('created_at', 'customer_type', 'status', 'verification_code'));
        // $customer->update($request->except('created_at', 'customer_type', 'status', 'verification_code'));

           $update_customer = Customer::where('cust_id',$customer->cust_id)->first();
           return  new UserProfileResource($update_customer);
          //  return
          //  response()->json(['message' => 'Updated Successfully', 'status' => 'success', 'user' => $update_customer], 200);
        }
        else {
            return response()->json(['message' => 'No user found', 'status' => 'error'], 404);
        }
    }
}
