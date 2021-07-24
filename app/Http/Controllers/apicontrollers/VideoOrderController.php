<?php

namespace App\Http\Controllers\apicontrollers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Transaction;
use App\Customer;
use App\Payment_method;
use App\Tutorial;
use App\VideoOrder;
use Stripe;
use Validator;

class VideoOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $input = array(
            'tutorial_id' => $request->tutorial_id,
        );
        $rules = array(
            'tutorial_id' => 'required',
        );
        $validator = Validator::make($input, $rules);
        if($validator->fails()){
            return response()->json($validator->errors());
        }
        $user=Customer::find(auth('api')->user()->cust_id);
        if ($user == "" && $user == null) {
            return response()->json(["message" => "User doest not exist", "status" => 0]);
        }
        $method = Payment_method::where(['user_id' => auth('api')->user()->cust_id])->get()->first();
        if(!($method->count() > 0)){
            return response()->json(["message" => "Sorry! Payment method is not existing", "status" => 0]);
        }
        $videos = Tutorial::where('id', $request->tutorial_id)->get()->first();
        if ($videos == "" || $videos == null) {
        	return response()->json(["message" => "no  tutorail is found against this id", "status" => "error"],404);
        }
        if ($videos->type == 1) {
            if ($method->avalable_amount >=   $videos->course_price ) {
                $method->avalable_amount = $method->avalable_amount - $videos->course_price;
                if ($method->save()) {
                    $video=Tutorial::find($request->tutorial_id);
                    $order = new VideoOrder();
                    $order->user_id = $user->cust_id;
                    $order->tutorial_id = $video->id;
                    $order->save();
                    $payment=new Transaction();
                    $payment->charge_id="video_order".time().$request->user_id.$request->tutorial_id.$order->id;
                    $payment->amount=$videos->course_price;
                    $payment->currency="usd";
                    $payment->description="payment from deposit";
                    $payment->status="succeeded";
                    $payment->order_for="video Purchase Amount";
                    $payment->video_order_id=$order->id;
                    $payment->user_name=$user->name;
                    $payment->email=$user->email;
                    $payment->phone=$user->phone_number;
                    $payment->t_type=1;
                    $result=$payment->save();
                    return response()->json(["message" => "Successfully purchased product", "status" => true,'transsaction' => $payment], 200);
                }
            }
            try {
                Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
                 $response = \Stripe\Token::create(array(
                   "card" => array(
                     "number"    => $method->card_number,
                     "exp_month" => \Carbon\Carbon::parse($method->expire_date)->month,
                     "exp_year"  => \Carbon\Carbon::parse($method->expire_date)->year,
                     "cvc"       => $method->cvv_code,
                     "name"      => $method->card_holder_number
                 )));
            } catch (\Exception $e) {
                $body = $e->getJsonBody();
                $err  = $body['error'];
                return response()->json(["detail" => $err,"message" => $e->getMessage(), "errCode" => 401],401);
             }
            
             $token = $response->id;
             $ss = false;
             if ($method->avalable_amount > 0) {
                 $ss = true;
             }
             try {
                 $stripe = Stripe\Charge::create ([
                         "amount" => ($videos->course_price-$method->avalable_amount)*100,
                         "currency" => "usd",
                         "source" => $token,
                         "description" => "Client from Card payment." 
                 ]);
             } catch (\Exception $e) {
                $body = $e->getJsonBody();
                $err  = $body['error'];
                return response()->json(["detail" => $err,"message" => $e->getMessage(), "errCode" => 401],401);
             }
            if ($ss = true) {
                $method->avalable_amount=0;
                $method->save();
            }
        }

        $video=Tutorial::find($request->tutorial_id);
        $order=new VideoOrder();
        $order->user_id=$user->cust_id;
        $order->tutorial_id=$video->id;
        $order->save();
        if ($videos->type == 1) {
            $payment=new Transaction();
            $payment->charge_id="video_order".time().$request->user_id.$request->tutorial_id.$order->id;
            $payment->amount=$stripe->amount/100;
            $payment->currency=$stripe->currency;
            $payment->description=$stripe->description;
            $payment->status=$stripe->status;
            $payment->order_for="video order Amount";
            $payment->video_order_id=$order->id;
            $payment->user_name=$user->name;
            $payment->email=$user->email;
            $payment->phone=$user->phone_number;
            $payment->t_type=1;
            $result=$payment->save();
            if($result){

                     return response()->json(['message' => 'Order Successfully Place',"status" => true,'transsaction' => $payment], 200);

                 }else{
                     
                    return response()->json(['message' => 'Order Not Place','status' =>'error'], 500);
                 }
        }
        return response()->json(['message' => 'Order Successfully Place',"status" => true], 200);
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
}
