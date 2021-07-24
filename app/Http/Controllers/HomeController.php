<?php

namespace App\Http\Controllers;

use App\Gym;
use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\models\Post;
use App\models\Follow;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id=Auth::guard('gym')->user()->id;
      // $id=16;
        $user_chk=DB::table('user_checks')
            ->where('gym_id',$id)->join('customers','customers.cust_id','user_checks.user_id')
            ->select('customers.name','customers.user_image','user_checks.*')
            ->orderBy('id', 'desc')->get();
            // dd($user_chk);
        return view('gym.check_in_user')->with('user_chk',$user_chk);
    }


    public function check_in_user_month()
    {
        $id=Auth::guard('gym')->user()->id;
      // $id=16;
        $user_chk=DB::table('user_checks')
            ->where('gym_id',$id)->whereMonth('check_in',Carbon::now()->month)->join('customers','customers.cust_id','user_checks.user_id')
            ->select('customers.name','customers.user_image','user_checks.*')
            ->orderBy('id', 'desc')->get();
            // dd($user_chk);
        return view('gym.check_in_user')->with('user_chk',$user_chk);
    }
    public function check_in_user_week()
    {
        $id=Auth::guard('gym')->user()->id;
            //  $id=16;
       $previous_week = strtotime("-1 week +1 day");
       $start_week = strtotime("last sunday midnight",$previous_week);
       $end_week = strtotime("next saturday",$start_week);
       $start_week = date("Y-m-d",$start_week);
       $end_week = date("Y-m-d",$end_week);
        $user_chk=DB::table('user_checks')
            ->where('gym_id',$id)->whereBetween('check_in',[Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->join('customers','customers.cust_id','user_checks.user_id')
            ->select('customers.name','customers.user_image','user_checks.*')
            ->orderBy('id', 'desc')->get();
            // dd($user_chk);
        return view('gym.check_in_user')->with('user_chk',$user_chk);
    }
    public function check_in_user_year()
    {
        $id=Auth::guard('gym')->user()->id;
      // $id=16;
        $user_chk=DB::table('user_checks')
            ->where('gym_id',$id)->whereBetween('check_in',[
                Carbon::now()->startOfYear(),
                Carbon::now()->endOfYear(),
            ])->join('customers','customers.cust_id','user_checks.user_id')
            ->select('customers.name','customers.user_image','user_checks.*')
            ->orderBy('id', 'desc')->get();
            // dd($user_chk);
        return view('gym.check_in_user')->with('user_chk',$user_chk);
    }





    


    public function check_out_user()
    {
        $id=Auth::guard('gym')->user()->id;
       // $id=16;
        $user_chk=DB::table('user_checks')
            ->where('gym_id',$id)->whereNotNull('check_out')->join('customers','customers.cust_id','user_checks.user_id')
            ->select('customers.name','customers.user_image','user_checks.*')
            ->orderBy('id', 'desc')->get();
        return view('gym.check_out_user')->with('user_chk',$user_chk);
    }




    public function check_out_user_month()
    {
        $id=Auth::guard('gym')->user()->id;
      // $id=16;
        $user_chk=DB::table('user_checks')
            ->where('gym_id',$id)->whereNotNull('check_out') ->whereMonth('check_out',Carbon::now()->month)->join('customers','customers.cust_id','user_checks.user_id')
            ->select('customers.name','customers.user_image','user_checks.*')
            ->orderBy('id', 'desc')->get();
            // dd($user_chk);
        return view('gym.check_in_user')->with('user_chk',$user_chk);
    }
    public function check_out_user_week()
    {
        $id=Auth::guard('gym')->user()->id;
      // $id=16;
       $previous_week = strtotime("-1 week +1 day");
       $start_week = strtotime("last sunday midnight",$previous_week);
       $end_week = strtotime("next saturday",$start_week);
       $start_week = date("Y-m-d",$start_week);
       $end_week = date("Y-m-d",$end_week);
        $user_chk=DB::table('user_checks')
            ->where('gym_id',$id)->whereNotNull('check_out')->whereBetween('check_out',[Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->join('customers','customers.cust_id','user_checks.user_id')
            ->select('customers.name','customers.user_image','user_checks.*')
            ->orderBy('id', 'desc')->get();
            // dd($user_chk);
        return view('gym.check_in_user')->with('user_chk',$user_chk);
    }
    public function check_out_user_year()
    {
        $id=Auth::guard('gym')->user()->id;
     //  $id=16;
        $user_chk=DB::table('user_checks')
            ->where('gym_id',$id)->whereNotNull('check_out')->whereBetween('check_out',[
                Carbon::now()->startOfYear(),
                Carbon::now()->endOfYear(),
            ])->join('customers','customers.cust_id','user_checks.user_id')
            ->select('customers.name','customers.user_image','user_checks.*')
            ->orderBy('id', 'desc')->get();
            // dd($user_chk);
        return view('gym.check_in_user')->with('user_chk',$user_chk);
    }







          public function user_chk_in($idd)
            {
                $id=Auth::guard('gym')->user()->id;
             //  $id=16;
                $user_chk=DB::table('user_checks')
                    ->where('gym_id',$id)->where('user_id',$idd)->join('customers','customers.cust_id','user_checks.user_id')
                    ->select('customers.name','customers.user_image','user_checks.*')
                    ->orderBy('id', 'desc')->get();
                    // dd($user_chk);
                return view('user.user_chk_in_session')->with('user_chk',$user_chk)->with('id',$idd);
            }




 public function user_chk_in_month(Request $request)
    {
        $idd=$request->user_id;
        $id=Auth::guard('gym')->user()->id;
      // $id=16;
        $user_chk=DB::table('user_checks')
            ->where('gym_id',$id)->where('user_id',$idd)->whereMonth('check_in',Carbon::now()->month)->join('customers','customers.cust_id','user_checks.user_id')
            ->select('customers.name','customers.user_image','user_checks.*')
            ->orderBy('id', 'desc')->get();
            // dd($user_chk);
       return view('user.user_chk_in_session')->with('user_chk',$user_chk)->with('id',$idd);
    }
    public function user_chk_in_week(Request $request)
    {
         $idd=$request->user_id;
        $id=Auth::guard('gym')->user()->id;
//$id=16;
       $previous_week = strtotime("-1 week +1 day");
       $start_week = strtotime("last sunday midnight",$previous_week);
       $end_week = strtotime("next saturday",$start_week);
       $start_week = date("Y-m-d",$start_week);
       $end_week = date("Y-m-d",$end_week);
        $user_chk=DB::table('user_checks')
            ->where('gym_id',$id)->where('user_id',$idd)->whereBetween('check_in',[Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->join('customers','customers.cust_id','user_checks.user_id')
            ->select('customers.name','customers.user_image','user_checks.*')
            ->orderBy('id', 'desc')->get();
            // dd($user_chk);
        return view('user.user_chk_in_session')->with('user_chk',$user_chk)->with('id',$idd);
    }
    public function user_chk_in_year(Request $request)
    {
         $idd=$request->user_id;
        $id=Auth::guard('gym')->user()->id;
      // $id=16;
        $user_chk=DB::table('user_checks')
            ->where('gym_id',$id)->where('user_id',$idd)->whereBetween('check_in',[
                Carbon::now()->startOfYear(),
                Carbon::now()->endOfYear(),
            ])->join('customers','customers.cust_id','user_checks.user_id')
            ->select('customers.name','customers.user_image','user_checks.*')
            ->orderBy('id', 'desc')->get();
            // dd($user_chk);
         return view('user.user_chk_in_session')->with('user_chk',$user_chk)->with('id',$idd);
    }





       public function view_profile($id)
            {
                
                $user=Customer::where('cust_id',$id)->first();
                    $totalfollower=Follow::where('follow_id',$user->cust_id)->count();

                    $totalfollowing=Follow::where('following_id',$user->cust_id)->count();
                    $totalposts=Post::where('cust_id',$user->cust_id)->count();
                    //dd($totalposts);
                return view('user.user_profile')->with('user',$user)->with('totalfollower',$totalfollower)->with('totalfollowing',$totalfollowing)->with('totalposts',$totalposts);
            }



















         public function user_chk_out($idd)
            {
                $id=Auth::guard('gym')->user()->id;
              //  $id=16;
                $user_chk=DB::table('user_checks')
                    ->where('gym_id',$id)->where('user_id',$idd)->whereNotNull('check_out')->join('customers','customers.cust_id','user_checks.user_id')
                    ->select('customers.name','customers.user_image','user_checks.*')
                    ->orderBy('id', 'desc')->get();
                return view('user.user_chk_out_session')->with('user_chk',$user_chk)->with('id',$idd);
            }

  public function user_chk_out_month(Request $request)
    {
         $idd=$request->user_id;
        $id=Auth::guard('gym')->user()->id;
      // $id=16;
        $user_chk=DB::table('user_checks')
            ->where('gym_id',$id)->where('user_id',$idd)->whereNotNull('check_out') ->whereMonth('check_out',Carbon::now()->month)->join('customers','customers.cust_id','user_checks.user_id')
            ->select('customers.name','customers.user_image','user_checks.*')
            ->orderBy('id', 'desc')->get();
            // dd($user_chk);
        return view('gym.user_chk_out_session')->with('user_chk',$user_chk)->with('id',$idd);
    }
    public function user_chk_out_week(Request $request)
    {
         $idd=$request->user_id;
        $id=Auth::guard('gym')->user()->id;
      // $id=16;
       $previous_week = strtotime("-1 week +1 day");
       $start_week = strtotime("last sunday midnight",$previous_week);
       $end_week = strtotime("next saturday",$start_week);
       $start_week = date("Y-m-d",$start_week);
       $end_week = date("Y-m-d",$end_week);
        $user_chk=DB::table('user_checks')
            ->where('gym_id',$id)->where('user_id',$idd)->whereNotNull('check_out')->whereBetween('check_out',[Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->join('customers','customers.cust_id','user_checks.user_id')
            ->select('customers.name','customers.user_image','user_checks.*')
            ->orderBy('id', 'desc')->get();
            // dd($user_chk);
        return view('gym.user_chk_out_session')->with('user_chk',$user_chk)->with('id',$idd);
    }
    public function user_chk_out_year(Request $request)
    {
         $idd=$request->user_id;
        $id=Auth::guard('gym')->user()->id;
      // $id=16;
        $user_chk=DB::table('user_checks')
            ->where('gym_id',$id)->where('user_id',$idd)->whereNotNull('check_out')->whereBetween('check_out',[
                Carbon::now()->startOfYear(),
                Carbon::now()->endOfYear(),
            ])->join('customers','customers.cust_id','user_checks.user_id')
            ->select('customers.name','customers.user_image','user_checks.*')
            ->orderBy('id', 'desc')->get();
            // dd($user_chk);
        return view('gym.user_chk_out_session')->with('user_chk',$user_chk)->with('id',$idd);
    }




















    

    public function account_setting()
    {

        return view('gym.account_setting');
    }

    public function account_setting_update_profile(Request $request)
    {
        $id=Auth::guard('gym')->user()->id;
//$id=16;
        $user = Gym::findOrFail($id);
        $request->validate([
            'old_password' => 'required|string',
            'password' => 'confirmed|min:8',


        ]);
        if (Hash::check($request->old_password, $user->password)) {
            $user->fill([
             'password' => Hash::make($request->password)
             ])->save();

                return redirect('/home')->with('success','Password changed.');

         } else {
            return redirect('/account_setting')->with('error', 'Password does not match');

         }

    }

}
