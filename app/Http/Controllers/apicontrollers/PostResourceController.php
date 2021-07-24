<?php

namespace App\Http\Controllers\apicontrollers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use DB;
use App\Customer;
use App\Tutorial;
use App\Workout;
use App\BuddyWorkout;
use App\Http\Resources\PostsResource;
use App\Http\Resources\TutorialResource;
use Illuminate\Database\Eloquent\Collection;

class PostResourceController extends Controller
{

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $posts = DB::table('posts')->join('customers', 'customers.cust_id', 'posts.cust_id')->select('posts.*', 'customers.name', 'customers.cust_id', 'customers.user_image', 'posts.post_city', 'customers.zip_code', 'posts.latitude', 'posts.longitude')->orderBy('post_id', 'DESC')->get();
       
        if ($posts->count() > 0) {
           //dd($posts);
            return response()->json(['posts' => PostsResource::collection($posts)], 200);
        }
        else {
            return response()->json(['message' => "no posts can be found", 'status' => "empty"], 404);
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
        $result = $this->newpost($request);
        if ($result) {
            return response()->json(['message' => 'Post added successfully', 'status' => 'success', 'post' => $result], 200);
        } else {
            return response()->json(['message' => 'Post Not added', 'status' => 'error'], 401);
        }
    }


    // function to create new post
    public function newpost($request)
    {
        $request->validate([
            'post_title' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);
        $post['post_title'] = $request->post_title;
        $post['latitude'] = $request->latitude;
        $post['longitude'] = $request->longitude;
        $post['post_city'] = $request->post_city;
        $post['cust_id'] = auth('api')->user()->cust_id;

        if ($request->hasFile('post_image')) {
            $extension = $request->post_image->extension();
            $filename = time() . "_." . $extension;
            $request->post_image->move(public_path('postImages'), $filename);
            $post['post_image'] = $filename;
        } elseif ($request->hasFile('post_video')) {
            $extension = $request->post_video->extension();
            $filename = time() . "_." . $extension;
            $request->post_video->move(public_path('postVideos'), $filename);
            $post['post_video'] = $filename;
        }
        return Post::create($post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        if ($post) {
            return response()->json(["message" => "success", "post" => $post], 200);
        }
        else {
            return response()->json(["message" => "No post is found again this id", "status" => "error"], 404);
        }
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
    
          public function freevideo()
    {
        $tutorials=Tutorial::where('type','0')->get();
        if ($tutorials->count() >0) {


             return  TutorialResource::collection($tutorials);

         }else{

            return response(['message' => 'Tutorial Not Found','status' =>'error']);
         }
    }

    public function paidvideo()
    {
        $tutorials=Tutorial::where('type','1')->get();
        if ($tutorials->count() >0) {


             return  TutorialResource::collection($tutorials);

         }else{

            return response(['message' => 'Tutorial Not Found','status' =>'error']);
         }
    }
    
        public function workout_buddy(Request $request)
    {
    	$work=workout::find($request->workout_id);
    	$buddy=new BuddyWorkout();
    	$buddy->type=$request->type;
        $buddy->workout_level=$request->workout_level;
    	$buddy->goal=$request->goal;
    	$buddy->buddy_id=$request->buddy_id;
    	$buddy->time=$request->time;
    	$buddy->workout_id=$request->workout_id;
    	$buddy->customer_id=$work->customer_id;
        $result=$buddy->save();
        if ($result) {

             return response(['message' => 'Buddy Workout Added Successfully','status' =>'success']);

             }else{

            return response(['message' => 'Buddy Workout Not Added','status' =>'error']);

           }
    }
}
