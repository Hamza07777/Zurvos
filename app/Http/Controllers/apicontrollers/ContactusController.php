<?php

namespace App\Http\Controllers\apicontrollers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\models\Contactus;
use App\models\ContactGym;

class ContactusController extends Controller
{
    public function sendinfo(Request $request)
    {
                $cont=new Contactus();
    	        $cont->customer_id = $request->customer_id;
    	        $cont->subject = $request->subject;
    	        $cont->user_message = $request->user_message;
    	        $result=$cont->save();

    	        if ($result) {

             return response(['message' => 'Your Info added','status' =>'success']);

             }else{

            return response(['message' => 'Your Info Not added','status' =>'error']);

           }
    }

    public function contactsave(Request $request)
    {
        $cont=new ContactGym();
                $cont->customer_id = $request->customer_id;
                $cont->subject = $request->subject;
                $cont->user_message = $request->user_message;
                $result=$cont->save();

                if ($result) {

             return response(['message' => 'Your Info added','status' =>'success']);

             }else{

            return response(['message' => 'Your Info Not added','status' =>'error']);

           }
    }
}
