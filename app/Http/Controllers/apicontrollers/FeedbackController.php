<?php

namespace App\Http\Controllers\apicontrollers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\FeedbackRequest;
use App\Traits\Feedbacktrait;
use App\models\Feedback;
use App\Http\Resources\FeedbackCollection;
use App\Http\Resources\FeedbackResource;

class FeedbackController extends Controller
{
    use Feedbacktrait;

    public function Addfeedback(Request $request)
    {
              $feedback=new Feedback();
    	        $feedback->customer_id = $request->customer_id;
    	        $feedback->feedback = $request->feedback;
    	        $feedback->improvement = $request->improvement;
    	        $result=$feedback->save();

    	        if ($result) {

                  return response(['message' => 'Feedback added','status' =>'success']);

             }else{

              return response(['message' => 'Feedback Not added','status' =>'error']);
           }
    }

    public function usersFeedback()
    {
        $feedbacks=$this->userFeedback();

        if ($feedbacks->count() >0) {


             return  FeedbackResource::collection($feedbacks);

         }else{

            return response(['message' => 'Feedback Not Found','status' =>'error']);
         }
    }

    public function delFeedback(Request $request)
    {
        $id=$request->id;
      //  dd($id);
        $feedbacks=$this->deleteFeedback($id);

        if ($feedbacks==true) {

            return response(['message' => 'Feedback Deleted','status' =>'success']);

         }else{

           return response(['message' => 'Feedback Not Deleted','status' =>'error']);
         }
    }

}
