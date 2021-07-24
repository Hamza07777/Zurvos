<?php

namespace App\Http\Controllers\apicontrollers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BugsCollection;
use App\models\Bug;

class BugsController extends Controller
{
    public function bugs(Request $request){


        if($request->hasFile('report_images')){
            $extension=$request->report_images->extension();
                $report_images=time()."_.".$extension;
                $request->report_images->move(public_path('report_images'),$report_images);
        }
        else
        {
            $report_images='';
        }
                $bug=new Bug();
    	        $bug->customer_id = $request->customer_id;
    	        $bug->report_message = $request->report_message;
    	        $bug->email = $request->email;

    	        $bug->report_images = $report_images;
    	        $bug->save();

                return response(['message' => 'Bug Reported','status' =>'success']);
    }

    // all bugs report

    public function bugslist()
    {

        $bugs=Bug::bugs();

        if ($bugs->count() >0) {


             return  BugsCollection::collection($bugs);

         }else{

            return response(['message' => 'Bugs Not Found','status' =>'error']);
         }
    }

    public function delBug($id)
    {

        $bugs=Bug::deletebugs($id);

        if ($bugs==true) {

            return response(['message' => 'Bugs Deleted','status' =>'success']);

         }else{

           return response(['message' => 'Bugs Not Deleted','status' =>'error']);
         }
    }
}
