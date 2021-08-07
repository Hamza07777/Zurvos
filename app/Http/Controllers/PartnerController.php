<?php

namespace App\Http\Controllers;

use App\Partner;
use App\Product;
use App\Vendors;
use App\Tutorial;
use App\Admin;
use App\models\Bug;
use App\models\Faqquestion;
use App\Pdf_files;
use App\Customer;
use App\BuddyWorkout;
use App\Gym;
use Carbon\Carbon;
use App\models\Feedback;
use App\ProductOrder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\models\Post;
use App\models\Follow;
use Illuminate\Support\Facades\Auth;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (view()->exists('partner_views.admin_dashborad')) {
            $total_gym=Gym::all()->count();
            $total_user=Customer::all()->count();
            $verfied_user=Customer::where('status','active')->get()->count();
            $total_partner=Partner::all()->count();
            $user=Customer::where('status','active')->get()->sortByDesc('id');
            return view('partner_views.admin_dashborad')->with('user',$user)
            ->with('total_gym',$total_gym)->with('total_user',$total_user)->with('verfied_user',$verfied_user)
            ->with('total_partner',$total_partner);
        }
    }


    public function admin_user_feedbacks()
    {

        if (view()->exists('partner_views.user_feedbacks'))
        {
            $feedback=DB::table('feedbacks')
        ->join('customers','customers.cust_id','feedbacks.customer_id')
        ->select('customers.*','feedbacks.*')
        ->orderBy('id', 'desc')->get();
            return view('partner_views.user_feedbacks')->with('feedback',$feedback);
        }
    }
    public function admin_delete_feedbacks($id)
    {
        $feedback=Feedback::findOrFail($id);
        $feedback->delete();
        return redirect()->back();

    }

    
    public function admin_profile_update()
    {
        if (view()->exists('partner_views.my_profile'))
        {
            return view('partner_views.my_profile');
        }
    }

    public function admin_profile_update_save(Request $request)
    {
        $id=Auth::guard('partner')->user()->id;
        Partner::whereId($id)->update([
            'password' => Hash::make($request->password)
        ]);
        return redirect()->back();
    }
}
