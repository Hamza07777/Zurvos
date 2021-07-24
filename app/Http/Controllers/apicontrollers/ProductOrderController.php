<?php

namespace App\Http\Controllers\apicontrollers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Payment_method;
use App\Product;
use App\ProductOrder;
use App\Transaction;
use App\Customer;
use App\Http\Resources\AllOrderProductsResource;
use App\Http\Resources\AllOrderVideoResource;
use Illuminate\Support\Facades\DB;
use Stripe;
use Validator;


class ProductOrderController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth:api');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function V_proallorder(Request $request)
    {
        $id=$request->id;
     //   dd($id);
        $order=DB::table('product_orders')->where('product_orders.user_id',$id)
        ->join('products','products.id','product_orders.product_id')
        ->join('customers','customers.cust_id','product_orders.user_id')
        ->select('product_orders.*','products.product_type','products.product_name','products.product_description','products.product_price','products.product_image','customers.name','customers.email','customers.phone_number')
        ->get();
        $v_order=DB::table('video_orders')->where('video_orders.user_id',$id)
        ->join('tutorials','tutorials.id','video_orders.tutorial_id')
        ->join('customers','customers.cust_id','video_orders.user_id')
        ->select('video_orders.*','tutorials.course_name','tutorials.course_price','tutorials.category','tutorials.course_videos','customers.name','customers.email','customers.phone_number')
        ->get();
        if($order->count()>0 || $v_order->count() > 0){
             $arr = array(
                    'products_orders' => AllOrderProductsResource::collection($order),
                    'videos_orders' => AllOrderVideoResource::collection($v_order)
                 );
                 return   response()->json($arr, 200);

             }else{

                return response(['message' => 'Order Not Found','status' =>'error']);
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
        $input = array(
            'product_id' => $request->product_id,
        );
        $rules = array(
            'product_id' => 'required',
        );
        $validator = Validator::make($input, $rules);
        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }
        $user=Customer::find(auth('api')->user()->cust_id);
        if ($user == "" && $user == null) {
            return response()->json(["message" => "User doest not exist", "status" => 'error'], 404);
        }
        $method = Payment_method::where(['user_id' => auth('api')->user()->cust_id])->get()->first();
        if(!($method != null || $method != "")){
            return response()->json(["message" => "Sorry! Payment method is not existing", "status" => 'error'], 404);
        }
        $products = Product::where('id', $request->product_id)->get()->first();
        if ($method->avalable_amount >=   $products->product_price) {
            $method->avalable_amount=$method->avalable_amount - $products->product_price;
            if ($method->save()) {
                $product=Product::find($request->product_id);
                $order=new ProductOrder();
                $order->user_id=auth('api')->user()->cust_id;
                $order->product_id=$product->id;
                $order->latitude=$request->latitude;
                $order->longitude=$request->longitude;
                $order->address=$request->address;
                $order->save();
                $payment=new Transaction();
                $payment->charge_id="pro_order".time().auth('api')->user()->cust_id.$request->product_id.$order->id;
                $payment->amount=$products->product_price;
                $payment->currency="usd";
                $payment->description="payment from deposit";
                $payment->status="succeeded";
                $payment->order_for="Product Purchase Amount";
                $payment->pro_order_id=$order->id;
                $payment->user_name=auth('api')->user()->name;
                $payment->email=$user->email;
                $payment->phone=$user->phone_number;
                $payment->t_type=1;
                $result=$payment->save();
                return response()->json(["message" => "Successfully purchased product", "status" => true,'transsaction' => $payment]);
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
                    "amount" => ($products->product_price-$method->avalable_amount)*100,
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
        $product=Product::find($request->product_id);
        $order=new ProductOrder();
        $order->user_id=auth('api')->user()->cust_id;
        $order->product_id=$product->id;
        $order->latitude=$request->latitude;
        $order->longitude=$request->longitude;
        $order->address=$request->address;
        $order->save();
        $payment=new Transaction();
        $payment->charge_id="pro_order".time().auth('api')->user()->cust_id.$request->product_id.$order->id;
        $payment->amount=$stripe->amount/100;
        $payment->currency=$stripe->currency;
        $payment->description=$stripe->description;
        $payment->status=$stripe->status;
        $payment->order_for="product order Amount";
        $payment->pro_order_id=$order->id;
        $payment->user_name=auth('api')->user()->name;
        $payment->email=$user->email;
        $payment->phone=$user->phone_number;
        $payment->t_type=1;
        $result=$payment->save();
        if($result){

            return response(['message' => 'Order Successfully Place',"status" => true,'transsaction' => $payment]);

        } else{

            return response(['message' => 'Order Not Place','status' =>'error']);
        }
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
