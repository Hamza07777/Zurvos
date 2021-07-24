<?php
namespace App\Traits;
use App\models\Post;
use App\models\Action;
use App\models\Comment;
use App\models\Share;
use DB;

trait Poststrait
{
    public function allposts(){

        return DB::table('posts')->join('customers','customers.id','=','posts.customer_id')->select('posts.*','customers.full_name','customers.id as customer_id','customers.user_image')->get();

    }

    public function totallikes($id){

        return Action::where('post_id',$id)->count();
    }

    public function totalshares($id){

        return Share::where('post_id',$id)->count();
    }

     public function totalcomments($id){

        return Comment::where('post_id',$id)->count();
    }
        //add new post

        public function newpost($request){

    	    	$post=new Post();
    	        $post->post_title = $request->post_title;
    	        $post->checkin = $request->checkin;       
    	        $post->location = $request->location;
    	        $post->customer_id = $request->customer_id;
    	        
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

    	        $result=$post->save();
                
    	        
    	        if ($result) {
    	             
    	             return true;
    	        }

        }

        public function samecode($customer_id,$post_id){

        	return Action::where('customer_id',$customer_id)
        	       ->where('post_id',$post_id);
        }

        public function checkaction($customer_id,$post_id){

        	return $this->samecode($customer_id,$post_id)->first();
        }
        // like dislike

        public function actions($request){

        	 $check=$this->checkaction($request->customer_id,$request->post_id);

        	 if (!$check) {

        	 		$action=new Action();
        	 	    $action->post_id = $request->post_id;
        	 	    $action->customer_id = $request->customer_id;       
        	 	    $action->like = $request->like;
        	 	    $action->dislike = $request->dislike;
        	 	    $action->save();
        	 	         	     
        	 	    if (!empty($request->like)) {
        	 	         
        	 	         return 'like';
        	 	    }
        	 	
        	 }else{

        	   	if ($check->like == 'like') {
        	   	    
        	   	$this->samecode($request->customer_id,$request->post_id)
                ->update(['like'=>null]);
 	 			
 	 			return 'dislike';

        	   	}

        	   	if ($check->like == null) {
        	   	    
        	   	$this->samecode($request->customer_id,$request->post_id)
                ->update(['like'=>$request->like]);
 	 			
 	 			return 'like';

        	   	}		
                

       }
    	 	 
    }
}



// in future if customer want to handle dislike system this is the code of that purpose

// else{

//         	if ($request->like == 'like') {
        	 		
//                 $this->samecode($request->customer_id,$request->post_id)
//                 ->update(['like'=>'like']);

//                 $this->samecode($request->customer_id,$request->post_id)
//                 ->update(['dislike'=>null]);

//                  return 'like';

//         	 	}else{

//                 $this->samecode($request->customer_id,$request->post_id)
//                 ->update(['dislike'=>'dislike']);

// 			    $this->samecode($request->customer_id,$request->post_id)
// 			    ->update(['like'=>null]); 

// 			    return 'dislike';     
       
//        }
        	 	

//        }
