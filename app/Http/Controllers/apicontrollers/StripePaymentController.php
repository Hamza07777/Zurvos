<?php

namespace App\Http\Controllers\apicontrollers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Stripe;
use App\models\Transaction;
use App\Customer;
use App\Http\Resources\AllTransactionCollection;
use App\Payment_method;
use App\models\ProductOrder;
use App\models\VideoOrder;
use Validator;
use App\packages_user;
use App\packages;
use App\sessions;
use App\Http\Resources\FinaceResource;
use App\Admin;
use App\Transaction as AppTransaction;

class StripePaymentController extends Controller
{
    function getKeys(){
        return response()->json(["secret" => env('STRIPE_SECRET'), "publish_key" => env('STRIPE_KEY')]);
    }
    // function valut_report($user_id){
    //     $available_amount = Payment_method::where('user_id', $user_id)->select('user_id','method', 'card_holder_number','avalable_amount', 'created_at', 'updated_at')->get()->first();
    //     if ($available_amount != "" || $available_amount != null) {
    //         return response()->json($available_amount,200);
    //     }
    //     else{
    //        return response()->json(["message" => "No record found"],404);
    //     }
    // }
    // public function financial_report() {
    //     $dateNow = \Carbon\Carbon::now();

    //     //one month / 30 days
    //     $dateStart = \Carbon\Carbon::now()->subDays(365);
    //     $year = Transaction::where("created_at",">=",$dateStart)->where('t_type', 1)->sum('amount');
    //     $dateStart = \Carbon\Carbon::now()->subDays(30);
    //     $month = Transaction::where("created_at",">=",$dateStart)->where('t_type', 1)->sum('amount');
    //     $dateStart = \Carbon\Carbon::now()->subDays(7);
    //     $weekly = Transaction::where("created_at",">=",$dateStart)->where('t_type', 1)->sum('amount');
    //     $dateStart = \Carbon\Carbon::now()->today();
    //     $today = Transaction::where("created_at",">=",$dateStart)->where('t_type', 1)->sum('amount');
    //     $revenueTotal = Transaction::where('t_type', 1)->sum('amount');
    //     $data = array(
    //         "yearly" => $year, "monthly" => $month, "weekly" => $weekly, "today" => $today, "totalRevenue" => $revenueTotal
    //     );
    //     // $data = [
    //     //     "yearly" => $year, "monthly" => $month, "weekly" => $weekly, "today" => $today
    //     // ];
    //     return response()->json($data);
    // }

    // public function financial_report_gym($gym_id) {
    //     $dateNow = \Carbon\Carbon::now();

    //     //one month / 30 days
    //     $dateStart = \Carbon\Carbon::now()->subDays(365);

    //     $year = Transaction::where("transactions.created_at",">=",$dateStart)->join('user_checks', 'user_checks.id', 'transactions.chk_id')->where(['transactions.t_type'=> 1, 'user_checks.gym_id' => $gym_id])->sum('transactions.amount');
    //     // return Transaction::where("transactions.created_at",">=",$dateStart)->get();
    //     $dateStart = \Carbon\Carbon::now()->subDays(30);
    //     $month = Transaction::where("transactions.created_at",">=",$dateStart)->join('user_checks', 'user_checks.id', 'transactions.chk_id')->where(['transactions.t_type'=> 1, 'user_checks.gym_id' => $gym_id])->sum('transactions.amount');
    //     $dateStart = \Carbon\Carbon::now()->subDays(7);
    //     $weekly = Transaction::where("transactions.created_at",">=",$dateStart)->join('user_checks', 'user_checks.id', 'transactions.chk_id')->where(['transactions.t_type'=> 1, 'user_checks.gym_id' => $gym_id])->sum('transactions.amount');
    //     $dateStart = \Carbon\Carbon::now()->today();
    //     $today = Transaction::where("transactions.created_at",">=",$dateStart)->join('user_checks', 'user_checks.id', 'transactions.chk_id')->where(['transactions.t_type'=> 1, 'user_checks.gym_id' => $gym_id])->sum('transactions.amount');
    //     $revenueTotal = Transaction::join('user_checks', 'user_checks.id', 'transactions.chk_id')->where(['transactions.t_type'=> 1, 'user_checks.gym_id' => $gym_id])->sum('transactions.amount');
    //     $data = array(
    //         "yearly" => $year, "monthly" => $month, "weekly" => $weekly, "today" => $today, "totalRevenue" => $revenueTotal
    //     );
    //     // $data = [
    //     //     "yearly" => $year, "monthly" => $month, "weekly" => $weekly, "today" => $today
    //     // ];
    //     return response()->json($data);
    // }
    public function my_subscription(Request $request)
    {
        $id=$request->id;
        // dd($id);
        $packages=packages_user::where('packages_users.user_id',$id)->join('packages', 'packages.id', 'packages_users.package_id')->select('packages_users.*','packages.type', 'packages.price','packages.product','packages.shipping')->get();
        if ($packages->count() > 0) {
            return response()->json($packages, 200);
        }
        else {
            return response()->json(["message" => "No record found", "status" => false]);
        }

    }
    // public function all_packages()
    // {
    //     //  $id=Auth::guard('influence')->user()->id;
    //     $packages=packages::all();
    //     return response()->json($packages, 200);
    // }
    // public function my_subscription_store(Request $request)
    // {
    //     return $this->make_payment($request);
    // }
    // function make_payment($request){
    //     $request->validate([
    //         "package_id" => "required",
    //         "user_id" => "required"
    //     ]);
    //     $pkg = packages::find($request->package_id);
    //         $user=Customer::find($request->user_id);
    //         if (!$user) {
    //             return response()->json(["message" => "Sorry! user against this id doest not exist", "status" => 0], 404);
    //         }
    //         if (!$pkg) {
    //             return response()->json(["message" => "Sorry! package against this id doest not exist", "status" => 0], 404);
    //         }
    //         $method = Payment_method::where(['user_id' => $request->user_id])->get()->first();
    //         if(!($method->count() > 0)){
    //             return response()->json(["message" => "Sorry! Payment method is not existing", "status" => 0]);
    //         }
    //         $products = packages::where('id', $request->package_id)->get()->first();
    //         return $products;
    //         if ($method->avalable_amount >=   $products->price) {
    //             $method->avalable_amount=$method->avalable_amount - $products->price;
    //             if ($method->save()) {
    //                 $product=packages::find($request->package_id);
    //                 $id=$request->user_id;
    //                 $package_user=new packages_user();
    //                 $package_user->package_id=$request->package_id;
    //                 $package_user->user_id=$id;
    //                 $package_user->save();
    //                 $payment=new Transaction();
    //                 $payment->charge_id="pkg_order".time().$request->user_id.$request->package_id.$package_user->id;
    //                 $payment->amount=$products->price;
    //                 $payment->currency="usd";
    //                 $payment->description="payment from deposit for package";
    //                 $payment->status="succeeded";
    //                 $payment->order_for="package Purchase Amount";
    //                 $payment->pkg_order_id=$package_user->id;
    //                 $payment->user_name=$user->full_name;
    //                 $payment->email=$user->email;
    //                 $payment->phone=$user->phone_no;
    //                 $payment->t_type=1;
    //                 $result=$payment->save();
    //                 return response()->json(["message" => "Successfully purchased package", "status" => true,'transsaction' => $payment]);
    //             }
    //         }
    //         try {
    //             Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    //              $response = \Stripe\Token::create(array(
    //                "card" => array(
    //                  "number"    => $method->card_number,
    //                      "exp_month" => \Carbon\Carbon::parse($method->expire_date)->month,
    //                      "exp_year"  => \Carbon\Carbon::parse($method->expire_date)->year,
    //                      "cvc"       => $method->cvv_code,
    //                      "name"      => $method->card_holder_number
    //              )));
    //         } catch (\Exception $e) {
    //          $body = $e->getJsonBody();
    //          $err  = $body['error'];
    //          return response()->json(["detail" => $err,"message" => $e->getMessage(), "errCode" => 401],401);
    //       }

    //                       $token = $response->id;
    //          $ss = false;
    //          if ($method->avalable_amount > 0) {
    //              $ss = true;
    //          }
    //         try {
    //            $stripe = Stripe\Charge::create ([
    //                    "amount" => ($products->price-$method->avalable_amount)*100,
    //                    "currency" => "usd",
    //                    "source" => $token,
    //                    "description" => "Client from Card payment for pkg."
    //            ]);
    //         }
    //         catch (\Exception $e) {
    //          $body = $e->getJsonBody();
    //          $err  = $body['error'];
    //          return response()->json(["detail" => $err,"message" => $e->getMessage(), "errCode" => 401],401);
    //       }
    //         if ($ss = true) {
    //             $method->avalable_amount=0;
    //             $method->save();
    //         }
    //         $product=packages::find($request->package_id);
    //         $id=$request->user_id;
    //         $package_user=new packages_user();
    //         $package_user->package_id=$request->package_id;
    //         $package_user->user_id=$id;
    //         $package_user->save();
    //         $payment=new Transaction();
    //         $payment->charge_id="pkg_order".time().$request->user_id.$request->package_id.$package_user->id;
    //         $payment->amount=$products->price;
    //         $payment->currency="usd";
    //         $payment->description="payment from card for package";
    //         $payment->status="succeeded";
    //         $payment->order_for="package Purchase Amount";
    //         $payment->pkg_order_id=$package_user->id;
    //         $payment->user_name=$user->full_name;
    //         $payment->email=$user->email;
    //         $payment->phone=$user->phone_no;
    //         $payment->t_type=1;
    //         $result=$payment->save();
    //         if($result){

    //                  return response(['message' => 'package Successfully Place',"status" => true,'transsaction' => $payment]);

    //              }else{

    //                 return response(['message' => 'package Not Place','status' =>'error']);
    //              }
    // }
    public function all_sessions(Request $request)
    {
        $id=$request->id;
        $session=sessions::where('customer_id',$id)->get();
        if ($session->count() > 0) {
            return response()->json($session, 200);
        }
        else {
            return response()->json(["message" => "No record found", "status" => false]);
        }

    }

    public function all_transactions(Request $request)
    {
        $id=$request->id;
        $user=Customer::find($id);
        if ($user) {
            $transactions=AppTransaction::where('email',$user->email)->get();
           // $trans = AllTransactionCollection::collection($transactions);
            return response()->json($transactions, 200);
        }
        else {
           return response()->json(["message" => "user against this id doest no exist", "status" => 0], 404);
        }
    }

    // public function all_transactions_gym($id) {
    //     $gym = Admin::where('id',$id)->get()->count();
    //     if ($gym > 0) {
    //         $trans = Transaction::join('user_checks', 'user_checks.id', 'transactions.chk_id')->where(['user_checks.gym_id' => $id])->get();
    //         if ($trans->count() > 0) {
    //             return response()->json($trans);
    //         }
    //         else {
    //             return response()->json(["message" => "no record found", "status" => 0]);
    //         }

    //     }
    //     else{
    //         return response()->json(["message" => "no gym found", "status" => 0]);
    //     }
    // }

    function add_method($request){
    //    return env('STRIPE_SECRET');
        $input = array(
            'card_number' => $request->card_number,
            'user_id' => $request->user_id
        );
        $rules = array(
            // 'card_number' => 'required|unique:payment_methods',
            'user_id' => 'required'
        );
        $validator = Validator::make($input, $rules);
        if($validator->fails()){
            return response()->json($validator->errors());
        }
        $data = array(
            'method' => $request->method,
            'card_number' => $request->card_number,
            'expire_date' => $request->expire_date,
            'card_holder_number' => $request->card_holder_number,
            'cvv_code' => $request->cvv_code,
            'user_id' => $request->user_id
        );
        try {
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
             $response = \Stripe\Token::create(array(
               "card" => array(
                 "number"    => $request->input('card_number'),
                 "exp_month" => \Carbon\Carbon::parse($request->input('expire_date'))->month,
                 "exp_year"  => \Carbon\Carbon::parse($request->input('expire_date'))->year,
                 "cvc"       => $request->input('cvc'),
                 "name"      => $request->input('cardHolderName')
             )));
         }catch (\Exception $e) {
           // $body = $e->getJsonBody();
          //  $err  = $body['error'];
            return response()->json(["detail" => 'eroor',"message" => $e->getMessage(), "errCode" => 401],401);
         }
        // $Payment_method=new Payment_method();
        // $Payment_method->method=$request->method;
        // $Payment_method->card_number=$request->card_number;
        // $Payment_method->expire_date=$request->expire_date;
        // $Payment_method->card_holder_number=$request->card_holder_number;
        // $Payment_method->cvv_code=$request->cvv_code;

         try {
             if (Payment_method::updateOrCreate($data,['user_id' =>$request->user_id, 'card_number' => $request->card_number ])) {
                 return response()->json(["message" => "method is added successfully", "status" => 1]);
             }
         } catch (\Exception $e) {
           return $e;
         }
        return response()->json(["message" => "method is not added successfully", "status" => 0]);
    }

    // function add_method_manager($request){
    //     $input = array(
    //         'card_number' => $request->card_number,
    //         'gym_id' => $request->gym_id
    //     );
    //     $rules = array(
    //         // 'card_number' => 'required|unique:payment_methods',
    //         'gym_id' => 'required'
    //     );
    //     $validator = Validator::make($input, $rules);
    //     if($validator->fails()){
    //         return response()->json($validator->errors());
    //     }
    //     $data = array(
    //         'method' => $request->method,
    //         'card_number' => $request->card_number,
    //         'expire_date' => $request->expire_date,
    //         'card_holder_number' => $request->card_holder_number,
    //         'cvv_code' => $request->cvv_code,
    //         'gym_id' => $request->gym_id
    //     );
    //     try {
    //         Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    //          $response = \Stripe\Token::create(array(
    //            "card" => array(
    //              "number"    => $request->input('card_number'),
    //              "exp_month" => \Carbon\Carbon::parse($request->input('expire_date'))->month,
    //              "exp_year"  => \Carbon\Carbon::parse($request->input('expire_date'))->year,
    //              "cvc"       => $request->input('cvc'),
    //              "name"      => $request->input('cardHolderName')
    //          )));
    //      }catch (\Exception $e) {
    //         $body = $e->getJsonBody();
    //         $err  = $body['error'];
    //         return response()->json(["detail" => $err,"message" => $e->getMessage(), "errCode" => 401],401);
    //      }
    //     // $Payment_method=new Payment_method();
    //     // $Payment_method->method=$request->method;
    //     // $Payment_method->card_number=$request->card_number;
    //     // $Payment_method->expire_date=$request->expire_date;
    //     // $Payment_method->card_holder_number=$request->card_holder_number;
    //     // $Payment_method->cvv_code=$request->cvv_code;
    //     // return $request->gym_id;
    //      return Payment_method::create($data);
    //      try {
    //          if (Payment_method::updateOrCreate($data,['gym_id' =>$request->gym_id, 'card_number' => $request->card_number ])) {
    //              return response()->json(["message" => "method is added successfully", "status" => 1]);
    //          }
    //      } catch (\Exception $e) {
    //        return $e;
    //      }
    //     return response()->json(["message" => "method is not added successfully", "status" => 0]);
    // }
    public function add_payment_method(Request $request){
        return $this->add_method($request);
    }
    // public function add_payment_method_manager(Request $request){
    //     return $this->add_method_manager($request);
    // }
    //  public function stripePostProduct(Request $request)
    // {
    //     Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    //     Stripe\Charge::create ([
    //             "amount" => $request->amount * 100,
    //             "currency" => "usd",
    //             "source" => $request->stripeToken,
    //             "description" => "Order Payment From Client."
    //     ]);
    //     $user=Customer::find($request->user_id);
    //     $payment=new Transaction();
    //     $payment->charge_id=$stripe->id;
    //     $payment->amount=$stripe->amount/100;
    //     $payment->currency=$stripe->currency;
    //     $payment->description=$stripe->description;
    //     $payment->status=$stripe->status;
    //     $payment->order_for="Product";
    //     $payment->order_id=$request->order_id;
    //     $payment->user_name=$user->full_name;
    //     $payment->email=$user->email;
    //     $payment->phone=$user->phone_no;
    //     $result=$payment->save();

    //     if ($result) {

    //          return response(['message' => 'Paymentent Successfully','status' =>'success']);

    //          }else{

    //         return response(['message' => 'Something Went Wrong','status' =>'error']);

    //        }

    // }
    // public function stripePostvideo(Request $request)
    // {
    //     Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    //     Stripe\Charge::create ([
    //             "amount" => $request->amount * 100,
    //             "currency" => "usd",
    //             "source" => $request->stripeToken,
    //             "description" => "Order Payment From Client."
    //     ]);
    //     $user=Customer::find($request->user_id);
    //     $payment=new Transaction();
    //     $payment->charge_id=$stripe->id;
    //     $payment->amount=$stripe->amount/100;
    //     $payment->currency=$stripe->currency;
    //     $payment->description=$stripe->description;
    //     $payment->status=$stripe->status;
    //     $payment->order_for="Tutorial";
    //     $payment->order_id=$request->order_id;
    //     $payment->user_name=$user->full_name;
    //     $payment->email=$user->email;
    //     $payment->phone=$user->phone_no;
    //     $result=$payment->save();

    //     if ($result) {

    //          return response(['message' => 'Paymentent Successfully','status' =>'success']);

    //          }else{

    //         return response(['message' => 'Something Went Wrong','status' =>'error']);

    //        }

    // }
    // public function stripedeposit(Request $request)
    // {
    //     $input = array(
    //         'card_number' => $request->card_number,
    //         'user_id' => $request->user_id
    //     );
    //     $rules = array(
    //         'card_number' => 'required',
    //         'user_id' => 'required'
    //     );
    //     $validator = Validator::make($input, $rules);
    //     if($validator->fails()){
    //         return response()->json($validator->errors());
    //     }
    //     $user=Customer::find($request->user_id);
    //     $method = Payment_method::where(['user_id' => $request->user_id])->get()->first();
    //     if(!($method->count() > 0)){
    //          return response()->json(["message" => "Sorry! Payment method is not existing", "status" => 0]);
    //     }
    //     if(!($method->first()->card_number ==  $request->card_number)){
    //          return response()->json(["message" => "Sorry! Payment method is not existing", "status" => 0]);
    //     }

    //     $method->avalable_amount=$method->avalable_amount+$request->amount;
    //     $method->save();
    //     try {
    //         Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    //          $response = \Stripe\Token::create(array(
    //            "card" => array(
    //              "number"    => $request->input('card_number'),
    //              "exp_month" => $request->input('exp_month'),
    //              "exp_year"  => $request->input('exp_year'),
    //              "cvc"       => $request->input('cvc'),
    //              "name"      => $request->input('cardHolderName')
    //          )));
    //      }catch (\Exception $e) {
    //         $body = $e->getJsonBody();
    //         $err  = $body['error'];
    //         return response()->json(["detail" => $err,"message" => $e->getMessage(), "errCode" => 401],401);
    //      }
    //      try {
    //          $token = $response->id;
    //          $stripe = Stripe\Charge::create ([
    //                  "amount" => $request->amount * 100,
    //                  "currency" => "usd",
    //                  "source" => $token,
    //                  "description" => "Client Deposit Amount."
    //          ]);
    //      }  catch (\Exception $e) {
    //         $body = $e->getJsonBody();
    //         $err  = $body['error'];
    //         return response()->json(["detail" => $err,"message" => $e->getMessage(), "errCode" => 401],401);
    //      }

    //     try {
    //         $payment=new Transaction();
    //         $payment->charge_id=$stripe->id;
    //         $payment->amount=$stripe->amount/100;
    //         $payment->currency=$stripe->currency;
    //         $payment->description=$stripe->description;
    //         $payment->status=$stripe->status;
    //         $payment->order_for="Deposit Amount";
    //         if ($request->order_id != "" && $request->order_id != null) {
    //             $payment->order_id=$request->order_id;
    //         }
    //         $payment->user_name=$user->full_name;
    //         $payment->email=$user->email;
    //         $payment->phone=$user->phone_no;
    //         $payment->t_type=0;
    //         $result=$payment->save();
    //     } catch (\Exception $e) {
    //         return $e;
    //      }

    //     if ($result) {
    //          return response(['message' => 'Paymentent Successfully','status' =>'success']);

    //          }else{

    //         return response(['message' => 'Something Went Wrong','status' =>'error']);

    //        }

  //  }
}
