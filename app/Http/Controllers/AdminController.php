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

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (view()->exists('admin_views.admin_dashborad')) {
            $total_gym=Gym::all()->count();
            $total_user=Customer::all()->count();
            $verfied_user=Customer::where('status','active')->get()->count();
            $total_partner=Partner::all()->count();
            $user=Customer::where('status','active')->get()->sortByDesc('id');
            return view('admin_views.admin_dashborad')->with('user',$user)
            ->with('total_gym',$total_gym)->with('total_user',$total_user)->with('verfied_user',$verfied_user)
            ->with('total_partner',$total_partner);
        }
    }

    public function admin_notification()
    {
        if (view()->exists('admin_views.admin_notification')) {
            return view('admin_views.admin_notification');
        }
    }

    public function invite_user()
    {
        if (view()->exists('admin_views.invite_user')) {
            return view('admin_views.invite_user');
        }
    }
    public function save_invite_user(Request $request)
    {
           $validatedData = $request->validate([
            'email' => 'required|email|max:255|unique:customers',

       ]);
        $password=Str::random(10);
        $data = [];
        $data['email'] = $request->email;
        $data['password'] = $password;
        $data['name'] = $request->name;

        Mail::send('emails.credential', $data, function($message) use ($data){
            $message->to($data['email'], env('APP_NAME'))->subject
            ('Login Credentials');
        });

        $user=Customer::create([
            'name' => $request['name'],
            'email' => $request['email'],
           'password' => Hash::make($password),
           'customer_type'=>'customer',
           'status'=>'active',
        ]);

       // $user->markEmailAsVerified();
        return redirect()->route('dashboared')->with('success','Invite Sent Successfully.');
    }

    public function admin_message()
    {
        if (view()->exists('admin_views.message')) {
            return view('admin_views.message');
        }
    }


    public function admin_add_gym()
    {
        if (view()->exists('admin_views.add_gym')) {
            return view('admin_views.add_gym');
        }
    }
    public function save_gym(Request $request)
    {
        $validatedData = $request->validate([

            'gymname' => 'required',
       ]);
        if ($request->hasFile('gymname')) {
            // dd($request);
            $extension=$request->gymname->extension();
            $filename=time()."_.".$extension;
            $request->gymname->move(public_path('gymimage'), $filename);
            $gym=new Gym();
            $gym->full_name=$request->name;
            $gym->full_name1=$request->name;
            $gym->email=$request->email;
            $gym->status='Approved';
            $gym->password=Hash::make($request['password']);
            $gym->gym_image=$filename;
            $gym->save();
            $id=$gym->id;
            return view('admin_views.add_gym_location_detail')->with('id', $id);
        }
    }
    public function gym_location(Request $request,$id){

        Gym::whereId($id)->update([
                    'zipcode' => $request['zipcode'],
                    'phoneno' => $request['phoneno'],
                    'cost_per_day' => $request['cost_per_day'],
                    ]);
        return view('admin_views.add_gym_descriptions')->with('id',$id);

    }

    // public function admin_add_gym_location_detail()
    // {
    //     if (view()->exists('admin_views.add_gym_location_detail'))
    //     {
    //         return view('admin_views.add_gym_descriptions')->with('id',$id);
    //         return ;
    //     }
    // }

    public function gym_descriptions(Request $request,$id)
    {
       // dd($request);
        Gym::whereId($id)->update([
            'gym_detail' => $request['gym_detail'],
            'check' =>$request->get('services'),
            ]);
            return redirect()->route('dashboared');
    }




    public function admin_order_list()
    {
        if (view()->exists('admin_views.orders_list'))
        {
            $order=ProductOrder::all();
            return view('admin_views.orders_list')->with('order',$order);
        }
    }



    public function admin_orders_detail($id)
    {
        if (view()->exists('admin_views.my_orders_detail'))
        {
            $order=ProductOrder::findOrFail($id);
            return view('admin_views.my_orders_detail')->with('order',$order);
        }
    }



    public function admin_new_user()
    {

        if (view()->exists('admin_views.new_users'))
        {
            $new_user=Customer::whereMonth('created_at',Carbon::now()->month)->where('customer_type','customer')->get()->sortByDesc('id');
            $user=Customer::where('status','active')->where('customer_type','customer')->get()->sortByDesc('id');
            return view('admin_views.new_users')->with('new_user',$new_user)->with('user',$user);
        }
    }





    public function admin_affiliated_partner()
    {

        if (view()->exists('admin_views.affiliated_partner'))
        {
            $new_user=Customer::whereMonth('created_at',Carbon::now()->month)->where('customer_type','influencer')->get()->sortByDesc('id');
             $user=Customer::where('status','active')->where('customer_type','influencer')->get()->sortByDesc('id');

            return view('admin_views.affiliated_partner')->with('new_user',$new_user)->with('user',$user);
        }
    }


    public function admin_new_partner()
    {
        if (view()->exists('admin_views.new_partner'))
        {
            $partner=Partner::all()->sortByDesc('id');
        return view('admin_views.new_partner')->with('partner',$partner);
        }
    }

    public function save_partner(Request  $request)
    {
        //dd($request);
        if($request->hasFile('image')){

            $extension=$request->image->extension();
    	          $filename=time()."_.".$extension;
    	          $request->image->move(public_path('Partner_image'),$filename);
        }
        else{

            return redirect()->back();
        }
        $partner=new Partner();
        $partner->name = $request->name;
        $partner->email  = $request->email;
        $partner->address = $request->address;
        $partner->image = $filename;
        $partner->password = Hash::make($request->password);

        $result=$partner->save();
        return redirect()->route('admin_new_partner');

    }




    public function admin_new_vendors()
    {


        if (view()->exists('admin_views.vendors'))
        {

            $new_vendors=Vendors::whereMonth('created_at',Carbon::now()->month)->get()->sortByDesc('id');
        $exictng_vendors=Vendors::all();
            return view('admin_views.vendors')->with('new_vendors',$new_vendors)->with('exictng_vendors',$exictng_vendors);
        }
    }


    public function admin_new_tutorial()
    {
        if (view()->exists('admin_views.add_tatorial'))
        {
            return view('admin_views.add_tatorial');
        }
    }


    public function save_new_tutorial(Request $request)
    {

        if($request->hasFile('course_videos')){
         //   dd($request);
            $extension=$request->course_videos->extension();
    	          $filename=time()."_.".$extension;
    	          $request->course_videos->move(public_path('TutorialVideo'),$filename);
        }
        else{

            return redirect()->back();
        }
        $product=new Tutorial();
        $product->course_name = $request->course_name;
        $product->category  = $request->category;
        $product->type  = $request->type;
        $product->course_price  = $request->course_price;
        $product->course_videos = $filename;


        $result=$product->save();

        return redirect()->back();
    }


    public function admin_new_product()
    {
        if (view()->exists('admin_views.add_product'))
        {
            return view('admin_views.add_product');
        }
    }



    public function save_new_product(Request $request)
    {
        if($request->hasFile('image')){

            $extension=$request->image->extension();
    	          $filename=time()."_.".$extension;
    	          $request->image->move(public_path('productImages'),$filename);
        }
        else{

            return redirect()->back();
        }
        $product=new Product();
        $product->product_name = $request->product_name;
        $product->product_type  = $request->product_type;
        $product->product_price  = $request->product_price;
        $product->product_description = $request->product_description;
        $product->product_image = $filename;


        $result=$product->save();

        return redirect()->back();
    }

    public function admin_excerise_library()
    {
        if (view()->exists('admin_views.excerise_library'))
        {
            return view('admin_views.excerise_library');
        }
    }

    public function admin_buddy_workout()
    {
        $buddy_workout=BuddyWorkout::all();
        $recent_buddy_workout=BuddyWorkout::whereMonth('created_at',Carbon::now()->month)->get()->sortByDesc('id');
        $total_user=Customer::all()->count();
        $total_gym=Gym::all()->count();
        $total_partner=Partner::all()->count();
        if (view()->exists('admin_views.workout_buddy'))
        {
            return view('admin_views.workout_buddy')->with('buddy_workout',$buddy_workout)
            ->with('recent_buddy_workout',$recent_buddy_workout)->with('total_user',$total_user)
            ->with('total_gym',$total_gym)->with('total_partner',$total_partner);
        }
    }


    public function admin_faqs()
    {
        if (view()->exists('admin_views.add_faqs'))
        {

            $faq=Faqquestion::all()->sortByDesc('id');
            return view('admin_views.add_faqs')->with('faq',$faq);
        }
    }

    public function save_admin_faqs(Request $request)
    {
        if($request->hasFile('video')){

            $extension=$request->video->extension();
    	          $filename=time()."_.".$extension;
    	          $request->video->move(public_path('faqVideos'),$filename);
        }
        else{

            return redirect()->back();
        }
        $faq=new Faqquestion();
        $faq->type = $request->type;
        $faq->question  = $request->question;
        $faq->answer  = $request->answer;
        $faq->video = $filename;


        $result=$faq->save();

        return redirect()->back();
    }



    public function admin_profile_update()
    {
        if (view()->exists('admin_views.my_profile'))
        {
            return view('admin_views.my_profile');
        }
    }

    public function admin_profile_update_save(Request $request)
    {
        Admin::whereId(1)->update([
            'password' => Hash::make($request->password)
        ]);
        return redirect()->back();
    }



    public function admin_bug_reports()
    {
        if (view()->exists('admin_views.bug_reports'))
        {
            $bug=DB::table('bugs')
            ->join('customers','customers.cust_id','bugs.customer_id')
            ->select('customers.*','bugs.*')
            ->orderBy('id', 'desc')->get();
            return view('admin_views.bug_reports')->with('bug',$bug);
        }
    }

    public function admin_delete_bug_reports($id)
    {
        $feedback=Bug::findOrFail($id);
        $feedback->delete();
        return redirect()->back();

    }

    public function admin_vendor_faqs()
    {
        if (view()->exists('admin_views.vendor_faqs'))
        {
            return view('admin_views.vendor_faqs');
        }
    }


    public function save_vendor_faqs(Request $request)
    {
        if($request->hasFile('pdf_file')){

            $extension=$request->pdf_file->extension();
    	          $filename=time()."_.".$extension;
    	          $request->pdf_file->move(public_path('Pdf_files'),$filename);
        }
        else{

            return redirect()->back();
        }
        $pdf=new Pdf_files();
        $pdf->file_name = $request->file_name;
        $pdf->pdf_file = $filename;
        $result=$pdf->save();

        return redirect()->back();

    }


    public function admin_user_feedbacks()
    {

        if (view()->exists('admin_views.user_feedbacks'))
        {
            $feedback=DB::table('feedbacks')
        ->join('customers','customers.cust_id','feedbacks.customer_id')
        ->select('customers.*','feedbacks.*')
        ->orderBy('id', 'desc')->get();
            return view('admin_views.user_feedbacks')->with('feedback',$feedback);
        }
    }
    public function admin_delete_feedbacks($id)
    {
        $feedback=Feedback::findOrFail($id);
        $feedback->delete();
        return redirect()->back();

    }


    public function admin_vendor_profile()
    {
        if (view()->exists('admin_views.vendor_profile'))
        {
            return view('admin_views.vendor_profile');
        }
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
        //
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

    public function delete_faq($id)
    {
        $faq=Faqquestion::findOrFail($id);
        $faq->delete();
        return redirect()->back();
    }
    public function edit_faq($id)
    {
        $faq=Faqquestion::findOrFail($id);
        return view('admin_views.edit_faqs')->with('faq',$faq);
    }
    

    public function update_admin_faqs(Request $request, $id)
    {
        if($request->hasFile('video')){

            $extension=$request->video->extension();
    	          $filename=time()."_.".$extension;
    	          $request->video->move(public_path('faqVideos'),$filename);
                  Faqquestion::whereId($id)->update([
                    'question' =>$request->question,
                    'answer' =>$request->answer,
                    'video' =>$filename,
                    ]);
                    return redirect()->route('admin_faqs');

        }
        else{

            Faqquestion::whereId($id)->update([
                'question' =>$request->question,
                'answer' =>$request->answer,
                ]);
                return redirect()->route('admin_faqs');
        }

    }
    public function view_profile($id)
    {
        
        $user=Customer::where('cust_id',$id)->first();
            $totalfollower=Follow::where('follow_id',$user->cust_id)->count();

            $totalfollowing=Follow::where('following_id',$user->cust_id)->count();
            $totalposts=Post::where('cust_id',$user->cust_id)->count();
            //dd($totalposts);
        return view('admin_views.user_profile')->with('user',$user)->with('totalfollower',$totalfollower)->with('totalfollowing',$totalfollowing)->with('totalposts',$totalposts);
    }
    
        public function delete_user_profile($id)
    {
        
        $user=Customer::where('cust_id',$id)->firstorFail();
        $user->delete();
        return redirect()->back();
            }


    public function user_chk_in($idd)
    {

     //  $id=16;
        $user_chk=DB::table('user_checks')->where('user_id',$idd)->join('customers','customers.cust_id','user_checks.user_id')
            ->select('customers.name','customers.user_image','user_checks.*')
            ->orderBy('id', 'desc')->get();
            // dd($user_chk);
        return view('admin_views.user_chk_in_session')->with('user_chk',$user_chk)->with('id',$idd);
    }

    public function check_out_user($idd)
    {
       // $id=16;
        $user_chk=DB::table('user_checks')->where('user_id',$idd)->whereNotNull('check_out')->join('customers','customers.cust_id','user_checks.user_id')
            ->select('customers.name','customers.user_image','user_checks.*')
            ->orderBy('id', 'desc')->get();
        return view('admin_views.user_chk_out_session')->with('user_chk',$user_chk)->with('id',$idd);
    }
}
