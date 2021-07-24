<?php
namespace App\Traits;
use DB;
use App\models\Feedback;

trait Feedbacktrait
{
    public function userFeedback(){

        return DB::table('customers')
               ->join('feedbacks','customers.cust_id','=','feedbacks.customer_id')
               ->select('feedbacks.*','customers.name','customers.city')->get();
    }

    public function deleteFeedback($id){

    	$found=Feedback::find($id);

    	if ($found) {

    		$result=$found->delete();

    		if ($result) {

    			return true;
    		}else{

    			return false;
    		}
    	}else{
    		return false;
    	}

    }
}
