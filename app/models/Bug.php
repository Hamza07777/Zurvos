<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Bug extends Model
{
    static public function bugs(){

		return DB::table('customers')->join('bugs','customers.id','=','bugs.customer_id')
		->select('customers.id','customers.full_name','customers.email','bugs.report_message','report_images')->get();
    }

    static public function deletebugs($id){

    	$found=Bug::find($id);

    	if ($found) {
    		
    		$myimg=json_decode($found->report_images);

    		foreach ($myimg as $value) {
    			
    			$file=$value;
    		    $filename = public_path().'/reportImages/'.$file;
    		    \File::delete($filename);
    		}
    		

    		$found->delete();
    		
    		return true;
    	}
    	
    }
}
