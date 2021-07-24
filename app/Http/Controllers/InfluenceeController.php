<?php

namespace App\Http\Controllers;


use App\Influence;
use App\Gym;
use App\models\Follow;
use App\ProductOrder;
use App\models\Post;
use App\models\Policy;
use App\Product;
use App\Tutorial;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;
use App\models\About;
use App\BuddyWorkout;
use App\models\Contactus;
use App\Customer;
use App\models\Faqquestion;
use App\Payment_method;
use App\Pdf_files;
use App\models\Bug;
use App\models\ExerciseLib;
use App\models\Feedback;
use App\models\Usernotification;
use App\VideoOrder;
use App\models\workout;
use App\WorkoutVideo;
use App\Payment;
use App\models\Action;
use App\models\Comment;
use App\models\Share;
use App\Traits\Poststrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;




class InfluenceeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('influence.layout/privacy_policy');
        $post=Post::orderBy('post_id', 'DESC')->get();
        // dd($post);
        return view('influence.layout.home2')->with('influence',$post);

    }
/**
     * Display a listing of search.
     *
     * @return \Illuminate\Http\Response
     */
    public function search_page()
    {

        return view('influence.layout.search_page')->with('gym',Gym::all());
    }
    public function search_page_result(Request $request)
    {

         $term=$request['search_by_location'];

        $query = Gym::where('full_name1', 'LIKE', '%' . $term . '%')->orWhere('street_address', 'LIKE', '%' . $term . '%')->orWhere('full_name', 'LIKE', '%' . $term . '%')->get();
    //    dd($query);
        return view('influence.layout.search_page')->with('gym',$query);
    }

/**
     * Display a listing of notification.
     *
     * @return \Illuminate\Http\Response
     */
    public function notification_page()
    {
        $id=Auth::guard('influence')->user()->cust_id;
        $post=Usernotification::where('post_user_id',$id)->orderBy('id', 'DESC')->get();
        return view('influence.layout.notification')->with('post',$post);
    }
        public function notification_page_today()
    {

            $date = Carbon::now();
           $id=Auth::guard('influence')->user()->cust_id;
        $post=Usernotification::where('post_user_id',$id)->whereDate('created_at', '=', Carbon::today()->toDateString())->orderBy('id', 'DESC')->get();
        return view('influence.layout.notification')->with('post',$post);
    }
       public function notification_page_yesterday()
    {

            $date = Carbon::now();
           $id=Auth::guard('influence')->user()->cust_id;
        $post=Usernotification::where('post_user_id',$id)->whereDate('created_at', '=', Carbon::yesterday()->toDateString())->orderBy('id', 'DESC')->get();
        return view('influence.layout.notification')->with('post',$post);
    }


/**
     * Display a listing of free Video.
     *
     * @return \Illuminate\Http\Response
     */
    public function free_video_page()
    {
        $tutorials=Tutorial::where('type','0')->get();
        return view('influence.layout.free_video_page')->with('tutorials',$tutorials);
    }
    /**
     * Display a listing of paid Video.
     *
     * @return \Illuminate\Http\Response
     */
    public function paid_video_page()
    {
        $tutorials=Tutorial::where('type','1')->get();
        return view('influence.layout.paid_video_page')->with('tutorials',$tutorials);
    }
    /**
     * Display a listing of search Video.
     *
     * @return \Illuminate\Http\Response
     */

    public function search_video_page_load()
    {

        return view('influence.layout.search_video_page');
    }

    public function search_video_page(Request $request)
    {
        $term=$request['video_keyword'];

        $tutorials = Tutorial::where('course_name', 'LIKE', '%' . $term . '%')->orWhere('category', 'LIKE', '%' . $term . '%')->get();

        return view('influence.layout.search_video_page')->with('tutorials',$tutorials);
    }
    public function search_resource_page(Request $request)
    {
        $term=$request['serach'];

        $resource = Pdf_files::where('file_name', 'LIKE', '%' . $term . '%')->get();

        return view('influence.layout.my_resources')->with('resourcess',$resource);
    }
     /**
     * Display a listing of fitness produsts.
     *
     * @return \Illuminate\Http\Response
     */
    public function fitness_produsts_page()
    {
       $product= Product::where('product_type','fitness')->get();
       $zurvosproducts=Product::where('product_type','zurvos')->get();
        return view('influence.layout.fitness_produsts_page')->with('fitnessproducts',$product)->with('zurvosproducts',$zurvosproducts);
    }
      /**
     * Display a listing of zavour_store.
     *
     * @return \Illuminate\Http\Response
     */
    public function zavour_store()
    {
        $zurvosproducts=Product::where('product_type','zurvos')->get();
        return view('influence.layout.zavour_store')->with('zurvosproducts',$zurvosproducts);
    }
     /**
     * Display a listing of my_affiliated.
     *
     * @return \Illuminate\Http\Response
     */
    public function my_affiliated()
    {
        $id=Auth::guard('influence')->user()->cust_id;
        $influencer=Customer::where('influencer_id',$id)->count();
        return view('influence.layout.my_affiliated')->with('influencer',$influencer);
    }
    /**
     * Display a listing of my_earning.
     *
     * @return \Illuminate\Http\Response
     */
    public function my_earning()
    {
        $id=Auth::guard('influence')->user()->cust_id;
        $user=Customer::where('influencer_id',$id)->get();
        return view('influence.layout.my_earning')->with('user',$user);
    }
    /**
     * Display a listing of transaction_store.
     *
     * @return \Illuminate\Http\Response
     */
    public function transaction_store()
    {
        return view('influence.layout.transaction_store')->with('product',ProductOrder::all());
    }
    /**
     * Display a listing of credit_store.
     *
     * @return \Illuminate\Http\Response
     */
    public function credit_store()
    {
        $product=Payment::all();
        return view('influence.layout.credit_store')->with('product',$product);
    }
    /**
     * Display a listing of affaliated_policy.
     *
     * @return \Illuminate\Http\Response
     */
    public function affaliated_policy()
    {
        return view('influence.layout.affaliated_policy')->with('policy',Policy::first());
    }
    /**
     * Display a listing of account_setting.
     *
     * @return \Illuminate\Http\Response
     */
    public function account_setting()
    {
        return view('influence.layout.account_setting');
    }
    /**
     * Display a listing of my_profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function my_profile()
    {
        $id=Auth::guard('influence')->user()->cust_id;
        $post=Post::where('cust_id',$id)->get();
        return view('influence.layout.my_profile')->with('post',$post);
    }
    /**
     * Display a listing of posts_page.
     *
     * @return \Illuminate\Http\Response
     */
    public function posts_page()
    {
        $id=Auth::guard('influence')->user()->cust_id;
        $post=Post::where('customer_id',$id)->get();
        return view('influence.layout.posts_page')->with('influence',$post);
    }
    /**
     * Display a listing of followers_page.
     *
     * @return \Illuminate\Http\Response
     */
    public function followers_page()
    {
        $id=Auth::guard('influence')->user()->cust_id;
        $follow=Follow::where('follow_id',$id)->distinct('follow_id')->get();
        return view('influence.layout.followers_page')->with('follow',$follow);
    }
    /**
     * Display a listing of following_page.
     *
     * @return \Illuminate\Http\Response
     */
    public function following_page()
    {
        $id=Auth::guard('influence')->user()->cust_id;
        $follow=Follow::where('user_id',$id)->distinct('user_id')->get();
        return view('influence.layout.following_page')->with('follow',$follow);
    }
    /**
     * Display a listing of my_orders.
     *
     * @return \Illuminate\Http\Response
     */
    public function my_orders()
    {
        $id=Auth::guard('influence')->user()->cust_id;
        $order=ProductOrder::where('user_id',$id)->get();
        return view('influence.layout.my_orders')->with('order',$order);
    }
    public function affiliated_link_save( Request $request)
    {
        $id=Auth::guard('influence')->user()->cust_id;
        Customer::whereId($id)->update([
            'affiliated_link'=>$request->affiliated_link,

            ]);
            return redirect('/influence/influence_home');

    }
    /**
     * Display a listing of my_orders_detail.
     *
     * @return \Illuminate\Http\Response
     */
    public function my_orders_detail()
    {
        return view('influence.layout.my_orders_detail');
    }
    /**
     * Display a listing of all_sessions.
     *
     * @return \Illuminate\Http\Response
     */
    public function all_sessions()
    {
        return view('influence.layout.all_sessions');
    }
    /**
     * Display a listing of add_payment_method.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_payment_method()
    {
        return view('influence.layout.add_payment_method');
    }
    public function add_payment_method_store(Request $request )
    {

        // dd($request);
        $Payment_method=new Payment_method();
        $Payment_method->method=$request->method;;
        $Payment_method->card_number=$request->card_number;
        $Payment_method->expire_date=$request->expire_date;
        $Payment_method->card_holder_number=$request->card_holder_number;
        $Payment_method->cvv_code=$request->cvv_code;
        $Payment_method->save();
        return view('influence.layout.add_payment_method');
    }
     /**
     * Display a listing of FAQ_question.
     *
     * @return \Illuminate\Http\Response
     */
    public function FAQ_question()
    {
        return view('influence.layout.FAQ_question')->with('question',Faqquestion::all());
    }
     /**
     * Display a listing of FAQ_video.
     *
     * @return \Illuminate\Http\Response
     */
    public function FAQ_video()
    {
        return view('influence.layout.FAQ_video')->with('question',Faqquestion::all());
    }
    /**
     * Display a listing of contact_zurvos.
     *
     * @return \Illuminate\Http\Response
     */
    public function contact_zurvos()
    {
        return view('influence.layout.contact_zurvos');
    }
    /**
     * Display a listing of bug_report.
     *
     * @return \Illuminate\Http\Response
     */
    public function bug_report()
    {
        return view('influence.layout.bug_report');
    }
     /**
     * Display a listing of bug_report.
     *
     * @return \Illuminate\Http\Response
     */
    public function privacy_policy()
    {
        return view('influence.layout.privacy_policy')->with('policy',Policy::first());

    }
    /**
     * Display a listing of bug_report.
     *
     * @return \Illuminate\Http\Response
     */
    public function about_zurvos()
    {
        return view('influence.layout.about_zurvos')->with('about',About::first());
    }
    /**
     * Display a listing of additional_information.
     *
     * @return \Illuminate\Http\Response
     */
    public function additional_information()
    {
        return view('influence.auth.additional_information');
    }

    public function my_resources()
    {
        return view('influence.layout.my_resources')->with('resourcess',Pdf_files::all());
    }
    public function my_resources_store(Request $request)

    {
        // dd($request);
        $pdf=new Pdf_files();
        if($request->hasFile('pdf_file')){
            $extension=$request->pdf_file->extension();
            $filename=time()."_.".$extension;
            $request->pdf_file->move(public_path('resources'),$filename);
            $pdf->pdf_file=$filename;
            $pdf->file_name = $request['file_name'];
            $pdf->save();
        }

        return view('influence.layout.my_resources');
    }
    public function my_resources_delete($id)
    {
        // dd($request);
        $note=Pdf_files::findOrFail($id);
        $note->delete();
        return view('influence.layout.my_resources');
    }
    public function my_resources_create()
    {
        return view('influence.layout.add_resource');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }
    public function generate_affiliated_link()
    {
        $link=Str::random(10);
        return view('influence.layout.generate_affiliated_link')->with('link',$link);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return Validator::make($request, [
        //     'user_name' => 'required|max:255',
        //     'email' => 'required|email|max:255|unique:influences',
        //     'password' => 'required|min:6|confirmed',
        //     'zipcode' => 'required|max:10000000',
        //     'tshirtsize' => 'required|max:255',
        //     'facebooklink' => 'required|max:255',
        //     'instagramlink' => 'required|max:255',
        //     'twitterlink' => 'required|max:255',
        //     'tiktoklink' => 'required|max:255',
        //     'phonenumber' => 'required',
        //     'paypalemail' => 'required|max:255',
        // ]);

        $Influence=new Customer();

        $Influence->name = $request['user_name'];
        $Influence->email = $request['email'];
        $Influence->password = bcrypt($request['password']);
        $Influence->save();
        $id = Customer::latest()->value('cust_id');
        return view('influence.auth.address_detail')->with('ID',$id);
    }
    public function address_detail_view_call(Request $request)
    {

        return view('influence.auth.social_media_links');
    }
    public function address_detail(Request $request)
    {
        $id = Customer::latest()->value('cust_id');
        Customer::where('cust_id',$id)->update([
            'zip_code'=>$request->zipcode,
            't_shirt_size'=>$request->tshirtsize,
            'phone_number'=>$request->phonenumber,
            'gender'=>$request->gender,
            ]);

        return view('influence.auth.social_media_links')->with('ID',$id);
    }
    public function proof_of_identity_view_call(Request $request)
    {

        return view('influence.auth.proof_of_identity');
    }
    public function proof_of_identity(Request $request)
    {

        $id = Customer::latest()->value('cust_id');
        Customer::where('cust_id',$id)->update([
            'facebook_link'=>$request->facebooklink,
            'instagram_link'=>$request->instagramlink,
            'twitter_link'=>$request->twitterlink,
            'tiktok_link'=>$request->tiktoklink,
            ]);
            $id = Customer::latest()->value('cust_id');
        return view('influence.auth.proof_of_identity')->with('ID',$id);
    }
    public function proof_of_identity_save(Request $request)
    {

// dd($request);
        $id = Customer::latest()->value('cust_id');
        if($request->hasFile('image') & $request->hasFile('upload_file') & $request->hasFile('cover_image')){


  $extension=$request->image->extension();
                $image_name=time()."_.".$extension;
                $request->image->move(public_path('userimage'),$image_name);

            $extension=$request->cover_image->extension();
                $cover_image=time()."_.".$extension;
                $request->cover_image->move(public_path('userimage'),$cover_image);
            $file_name=$request->file('upload_file');
            $file=$file_name->store('files','public');
            Customer::where('cust_id',$id)->update([
                'charges'=>$request->charges,
                'paypalemail'=>$request->paypalemail,
                'paypalemail_document'=>$file,
                'user_image'=>$image_name,
                'cover_image'=>$cover_image,
                // 'customer_type'=>'customers',
                ]);
        }
        else{
            redirect()->back();
        }
        return redirect()->route('influence.login');
        //  return view('influence.auth.login');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function save_post(Request $request)
    {   $id=Auth::guard('influence')->user()->cust_id;
        //  dd($id);
         $request['influence_id']=$id;
        $post=new Post();
    	        $post->post_title = $request->post_title;
    	        $post->checkin = $request->chkin;
    	        $post->location = $request->location;
    	        $post->customer_id = $request->influence_id;

    	        if($request->hasFile('post_image')){
    	          $extension=$request->post_image->extension();
    	          $filename=time()."_.".$extension;
    	          $request->post_image->move(public_path('postImages'),$filename);
    	          $post->post_image=$filename;
    	        }

    	        if($request->hasFile('post_video')){
    	          $extension=$request->post_video->extension();
    	          $filename=time()."_.".$extension;
    	          $request->post_video->move(public_path('postVideos'),$filename);
    	          $post->post_video=$filename;
    	        }

                $post->save();

                return redirect('influence/influence_home');

    }

        // post Fallow
    public function postfollow(Request $request)
    {
        // dd($request);
    	 $follow=new  Follow();
    	 $follow->user_id=$request->user_id;
    	 $follow->follow_id=$request->customer_id;
         $follow->save();
         return redirect('influence/influence_home');
    }
    public function account_setting_update_profile(Request $request)
    {
      //  dd($request);
        $id = $request->id;
       // dd($id);
        if($request->hasFile('image') && $request->hasFile('cover_image')){


             $extension=$request->image->extension();
                $image_name=time()."_.".$extension;
                $request->image->move(public_path('userimage'),$image_name);

            $extension=$request->cover_image->extension();
                $cover_image=time()."_c.".$extension;
                $request->cover_image->move(public_path('userimage'),$cover_image);


                
            Customer::where('cust_id',$id)->update([
                'name'=>$request->user_name,
                'phone_number'=>$request->phone_number,
                'city'=>$request->location,
                'zip_code'=>$request->zip_code,
                 'bio'=>$request->bio,
                'user_image'=>$image_name,
                'cover_image'=>$cover_image,
                ]);
        }
        else{
            dd($id);
            Customer::where('cust_id',$id)->update([
                'name'=>$request->user_name,
                'phone_number'=>$request->phone_number,
                'city'=>$request->location,
                'zip_code'=>$request->zip_code,
                'bio'=>$request->bio,
                ]);
        }



        return redirect()->route('account_setting');
    }

    public function product_order(Request $request)
    {

        $id=Auth::guard('influence')->user()->cust_id;
        $order=new ProductOrder();
    	$order->user_id=$id;
    	$order->product_id=$request->product_id;
    	$order->latitude=$request->latitude;
    	$order->longitude=$request->longitude;
    	$order->address=$request->address;
        $order->save();
        return redirect()->back();
    }

    public function show($id)
    {

        return view('influence.layout.my_orders_detail')->with('order', ProductOrder::findOrFail($id));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function contact_zurvos_store(Request $request)
    {

        $id=Auth::guard('influence')->user()->cust_id;
        $contactus=new Contactus();
        $contactus->customer_id =$id;
        $contactus->subject=$request->subject;
        $contactus->user_message=$request->user_message;
        $contactus->save();
        return redirect('/influence/influence_home');

    }
    public function bug_report_store(Request $request)
    {
        // dd($request);
        $id=Auth::guard('influence')->user()->cust_id;
        if($request->hasFile('image')){
            $extension=$request->image->extension();
    	          $filename=time()."_.".$extension;
                  $request->image->move(public_path('reportImages'),$filename);

        $contactus=new Bug();
        $contactus->customer_id =$id;
        $contactus->email =Auth::guard('influence')->user()->email;
        $contactus->report_message=$request->report_message;
        $contactus->report_images=$filename;
        $contactus->save();
        return redirect('/influence/influence_home');
        }

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
        // Property::whereId($id)->update([
        //     'price'=>$request->price,
        //     'property_details'=>$request->property_details,


        // ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function workoutbuddy()
    {
        return view('influence.layout.workoutbuddy');
    }
    public function workoutbuddy_find(Request $request)
    {
        $type=$request->type;
        $title=$request->workout_title;
        $workout_level=$request->radio;
        $goal=$request->radio1;
    	$timing=$request->timing;
        return view('influence.layout.workoutbuddy_friend')->with('query',workout::where('type', 'LIKE', '%' . $type . '%')->orWhere('title', 'LIKE', '%' . $title . '%')->orWhere('workout_level', 'LIKE', '%' . $workout_level . '%')->orWhere('goal', 'LIKE', '%' . $goal . '%')->orWhere('timing', 'LIKE', '%' . $timing . '%')->get());
    }
    public function workoutbuddy_save(Request $request)
    {
        // dd($request);
        $work=new BuddyWorkout();
        $work->type=$request->type;
        $work->workout_level=$request->radio;
        $work->goal=$request->radio1;
        $work->buddy_id=$request->buddy_id;
    	$work->time=$request->timing;
    	$work->workout_id=$request->workout_id;
        $work->customer_id=$request->customer_id;
        $work->status='pending';
        $work->save();
        $type=$request->type;
        $title=$request->workout_title;
        $workout_level=$request->radio;
        $goal=$request->radio1;
    	$timing=$request->timing;
        return view('influence.layout.workoutbuddy_friend')->with('query',workout::where('type', 'LIKE', '%' . $type . '%')->orWhere('title', 'LIKE', '%' . $title . '%')->orWhere('workout_level', 'LIKE', '%' . $workout_level . '%')->orWhere('goal', 'LIKE', '%' . $goal . '%')->orWhere('timing', 'LIKE', '%' . $timing . '%')->get());

        // return redirect()->back();
    }

    public function workoutlist()
    {

        $id=Auth::guard('influence')->user()->cust_id;
        $workouts=workout::where('cust_id',$id)->get();
        // dd($workouts);
        return view('influence.layout.workoutlist')->with('workout',$workouts);
    }
    public function message()
    {
        return view('influence.layout.message');
    }
    public function invitation()
    {
        $id=Auth::guard('influence')->user()->cust_id;
        $buddy=BuddyWorkout::where('buddy_id',$id)->where('request_status','pending')->get();
        return view('influence.layout.invitation')->with('buddy',$buddy);
    }
    public function feedback()
    {

        return view('influence.layout.feedback');
    }
    public function feedback_storeee(Request $request)
    {

        $id=Auth::guard('influence')->user()->cust_id;
        $feedback=new Feedback();
    	$feedback->customer_id  =$id;
    	$feedback->feedback = $request->radio;
    	$feedback->improvement = $request->improvement;
        $feedback->save();

     return redirect('/influence/influence_home');
    }

    public function buildworkout()
    {
        return view('influence.layout.buildworkout');
    }

    public function buildworkout_store(Request $request)
    {
        $goal = implode(",", $request->get('goal'));
        //  dd($goal);
        $id=Auth::guard('influence')->user()->cust_id;
        $work=new workout();
        $work->type=$request->type;
        $work->title=$request->workout_title;
        $work->workout_level=$request->radio;
        $work->goal=$goal;
    	$work->timing=$request->timing;
    	$work->description=$request->description;
        $work->customer_id=$id;
        $work->save();
        // $result=$work->save();
        //  $v=json_decode($request->video);
        // foreach ($v as $value) {
        //     $ok=new WorkoutVideos();
        //     $ok->workout_id=$work->id;
        //     $ok->lab_id=$value;
        //     $ok->customer_id=$request->user_id;
        //     $ok->save();
        // }

     return redirect('/influence/influence_home');
    }



    public function buddylist()
    {
        $id=Auth::guard('influence')->user()->cust_id;
        $buddy=BuddyWorkout::where('cust_id',$id)->where('request_status','accept')->get();
        return view('influence.layout.buddylist')->with('buddy',$buddy);
    }

    public function exercise()
    {
         $id=Auth::guard('influence')->user()->cust_id;
         $workout=workout::where('cust_id',$id)->get();
        return view('influence.layout.exercise')->with('libarary',ExerciseLib::all())->with('workout',$workout);
    }
    public function exercise_store(Request $request)
    {
        $excer=new WorkoutVideo();
        $excer->workout_id=$request->workout_id;
        $excer->lab_id=$request->lab_id;
        $excer->customer_id=$request->customer_id;
        $excer->save();
        return redirect('/influence/influence_home');
    }
    public function workout_exercise_video($id)
    {
        $user_id=Auth::guard('influence')->user()->cust_id;
        $workout_video=WorkoutVideo::where('workout_id',$id)->where('cust_id',$user_id)->get();
        // dd($workout_video);
        // foreach ($workout_video as $workout_video) {
        //     $workout_video_detail=ExerciseLib::where('id',$workout_video->lab_id)->get();
        //     print_r($workout_video_detail);
        // }

        return view('influence.layout.workout_videos')->with('workout',$workout_video);
    }
    public function order_workout_vedio(Request $request)
    {
        $id=Auth::guard('influence')->user()->cust_id;
        $order_vedio=new VideoOrder();
        $order_vedio->user_id=$id;
        $order_vedio->tutorial_id=$request->tutorial_id;
        $order_vedio->latitude=$request->latitude;
        $order_vedio->longitude=$request->longitude;
        $order_vedio->address=$request->address;
        $order_vedio->status='pending';
        $order_vedio->save();
        return redirect('/influence/exercise');
    }

    public function accept_invite($id)
    {
       // dd($id);
        BuddyWorkout::where('buddy_workout_id',$id)->update([
            'request_status'=>'accept',
        ]);
        return redirect('influence/invitation');
    }
    public function reject_invite($id)
    {
       // dd($id);
        BuddyWorkout::where('buddy_workout_id',$id)->update([
            'request_status'=>'reject',
        ]);
        return redirect('influence/invitation');
    }


    public function save_likes(Request $request)
    {
        // dd($request);
        $id=Auth::guard('influence')->user()->cust_id;
        $like=new Action();
        $like->post_id=$request->post_id;
        $like->customer_id =$id;
        $like->like ='like';
        $like->save();
        $post=Post::where('id',$request->post_id)->first();
               $notification=new Usernotification();
               $notification->message="Is Liked Your Post ";
               $notification->post_id=$post->id;
               $notification->post_user_id=$post->customer_id;
               $notification->user_id=$id;
               $notification->save();

         $like=Action::where('post_id',$request->post_id)->count();

        return $like;
        exit;
    }

    public function save_comments(Request $request)
    {
        //  dd($request);
        $id=Auth::guard('influence')->user()->cust_id;
        $like=new Comment();
        $like->post_id=$request->post_id;
        $like->customer_id =$id;
        $like->comment =$request->comment;
        $like->save();
$post=Post::where('id',$request->post_id)->first();
               $notification=new Usernotification();
               $notification->message="Is Comment On Your Post ";
               $notification->post_id=$post->id;
               $notification->post_user_id=$post->customer_id;
               $notification->user_id=$id;
               $notification->save();


        $like=Comment::where('post_id',$request->post_id)->count();

        return $like;
        exit;
    }
    public function save_shares(Request $request)
    {

        $post_id=$request->post_id;
        $id=Auth::guard('influence')->user()->cust_id;
        $like=new Share();
        $like->post_id=$post_id;
        $like->customer_id =$id;
        $like->message =$request->message;
        $like->save();
        $expense_details=Post::where('id', $post_id)->first();
        $post=new Post();
    	        $post->post_title = $request->message;
    	        $post->checkin = $expense_details->chkin;
    	        $post->location = $expense_details->location;
    	        $post->customer_id = $id;
                $post->post_image=$expense_details->post_image;
                $post->save();
                $post=Post::where('id',$request->post_id)->first();
               $notification=new Usernotification();
               $notification->message="Is Share Your Post ";
               $notification->post_id=$post->id;
               $notification->post_user_id=$post->customer_id;
               $notification->user_id=$id;
               $notification->save();
        return redirect('/influence/influence_home');
    }
    public function followw($id)
    {

        $user_id=Auth::guard('influence')->user()->cust_id;
        $like=new Follow();
        $like->user_id=$user_id;
        $like->follow_id =$id;
        $like->save();
        return redirect('/influence/followers_page');
    }


    public function unfolloww($id)
    {
        // dd($id);
        $note=Follow::findOrFail($id);
        $note->delete();
        return redirect('/influence/following_page');
    }
    public function destroy($id)
    {
        $note=ProductOrder::findOrFail($id);
        $note->delete();
        return redirect('/influence/influence_home');
    }

     public function verify_link_form()
    {

        return view('influence.layout.verify_affiliated_link');
    }




    public function verify_link_form_verify(Request $request)
    {
        $user_id=Auth::guard('influence')->user()->cust_id;
        $link=$request->affiliated_link;

        $influencer=Customer::where('affiliated_link',$link)->first();
        $influence_countr=Customer::where('affiliated_link',$link)->count();
        if($influence_countr>0){
            $charge=$influencer->charges+20;
            Customer::whereId($user_id)->update([
                'customer_type'=>'influence',

                ]);
                Customer::whereId($influencer->id)->update([
                    'charges'=>$charge,
                    'influencer_id'=>$influencer->id,

                    ]);

            return redirect('/influence/influence_home');
        }
        else{
            return redirect('/influence/influence_home');
        }


    }
}
