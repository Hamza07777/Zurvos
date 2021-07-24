<?php


namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Customer;
use Carbon\Carbon;


class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        request()->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = array(
            'email' => request('email'),
            'password' => request('password'),
          //  'status' => 'active'
        );
        $token = auth('api')->attempt($credentials);
        if (! $token) {
            return response()->json(['error' => 'Unauthorized','token_res' => 'false'], 401);
        }
        $user=Customer::where('email',request('email'))->first();
        $u_id=$user->cust_id;
       // dd($u_id);
        return $this->respondWithToken($token,$u_id);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth('api')->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth('api')->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth('api')->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
   protected function respondWithToken($token,$id)
    {
          $user=Customer::where('cust_id',$id)->first();

        return response()->json([
            'access_token' => $token,
            'id' =>$user->cust_id,

            'name' => $user->name ==null ? '0' : $user->name,

            'email' => $user->email ==null ? '0' : $user->email,

            'password' => $user->password ==null ? '0' : $user->password,

            'city' => $user->city ==null ? '0' : $user->city,

            'phone_no' => $user->phone_no ==null ? '0' : $user->phone_no,

            'zip_code' => $user->zip_code ==null ? '0' : $user->zip_code,

            'street_address' => $user->street_address ==null ? '0' : $user->street_address,
            'user_image'=>$user->user_image ==null ? '0' : asset('public/userimage/' . $user->user_image),

            'datetime'=>Carbon::parse($user->created_at)->diffForHumans(),

            'token_res' => 'true',
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60000000000
        ]);
    }
}
