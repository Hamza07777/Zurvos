<?php

namespace App\Http\Controllers\InfluenceAuth;

use App\Influence;
use Validator;
use App\Http\Controllers\Controller;
use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    // use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/influence/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('influence.guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'user_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:influences',
            'password' => 'required|min:6|confirmed',
            'zipcode' => 'required|max:10000000',
            'tshirtsize' => 'required|max:255',
            'facebooklink' => 'required|max:255',
            'instagramlink' => 'required|max:255',
            'twitterlink' => 'required|max:255',
            'tiktoklink' => 'required|max:255',
            'phonenumber' => 'required',
            'paypalemail' => 'required|max:255',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return Influence
     */
    protected function create(array $data)
    {
        // dd($request);

        return Influence::create([
            // 'user_name' => $data['user_name'],
            // 'email' => $data['email'],
            // 'password' => bcrypt($data['password']),
            // 'zip_code' => '2',
            // 't_shirt_size' => '2',
            // 'facebook_link' => '2',
            // 'instagram_link' => '2',
            // 'twitter_link' => '2',
            // 'tiktok_link' => '2',
            // 'phone_number' => '2',
            // 'paypalemail' => '2',
        ]);
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('influence.auth.additional_information');
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('influence');
    }
}
