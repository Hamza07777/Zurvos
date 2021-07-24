<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\models\Contactus;
use App\models\Feedback;
use App\Vendors;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\ProductOrder;
use Carbon\Carbon;
use App\Pdf_files;

class VendorController extends Controller
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
                // return Validator::make($request, [
        //     'user_name' => 'required|max:255',
        //     'email' => 'required|email|max:255|unique:influences',
        //     'password' => 'required|min:6|confirmed',
        //     'zipcode' => 'required|max:10000000',
        //     'tshirtsize' => 'required|max:255',
        //     'facebooklink' => 'required|max:255',
        //     'instagramlink' => 'required|max:255',
        //     'twitterlink' => 'required|max:255',
        //     'tiktoklink' => 'required|max:255',
        //     'phonenumber' => 'required',
        //     'paypalemail' => 'required|max:255',
        // ]);

        $vendor=new Vendors();

      //  $vendor->name = $request['user_name'];
        $vendor->email  = $request['email'];
        $vendor->password = bcrypt($request['password']);
        $vendor->save();
        $id = Vendors::latest()->value('id');
        return view('vendor_auth.address_detail')->with('ID',$id);
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

    public function vendor_policy()
    {
        return view('vendor_views.vendor_policy');
    }

    public function admin_new_product()
    {
        if (view()->exists('vendor_views.add_product'))
        {
            return view('vendor_views.add_product');
        }
    }



    public function save_new_product(Request $request)
    {
        if($request->hasFile('image')){

            $extension=$request->image->extension();
    	          $filename=time()."_.".$extension;
    	          $request->image->move(public_path('productImages'),$filename);
        }
        else{

            return redirect()->back();
        }
        $product=new Product();
        $product->product_name = $request->product_name;
        $product->product_type  = $request->product_type;
        $product->product_price  = $request->product_price;
        $product->product_description = $request->product_description;
        $product->product_image = $filename;


        $result=$product->save();

        return redirect()->back();
    }

    public function contact_zurvos()
    {
        return view('vendor_views.contact_zurvos');
    }

    public function contact_zurvos_store(Request $request)
    {

        $id=Auth::guard('vendor')->user()->id;
        $contactus=new Contactus();
        $contactus->customer_id =$id;
        $contactus->subject=$request->subject;
        $contactus->user_message=$request->user_message;
        $contactus->save();
        return redirect()->back();

    }

    public function feedback()
    {

        return view('vendor_views.feedback');
    }
    public function feedback_storeee(Request $request)
    {

        $id=Auth::guard('vendor')->user()->id;
        $feedback=new Feedback();
    	$feedback->customer_id  =$id;
    	$feedback->feedback = $request->radio;
    	$feedback->improvement = $request->improvement;
        $feedback->save();

        return redirect()->back();
    }

    public function fitness_produsts_page()
    {
       $product= Product::where('product_type','fitness')->get();
       $zurvosproducts=Product::where('product_type','zurvos')->get();
        return view('vendor_views.fitness_produsts_page')->with('fitnessproducts',$product)->with('zurvosproducts',$zurvosproducts);
    }




    public function address_detail(Request $request)
    {
        $id = Vendors::latest()->value('id');
        Vendors::where('id',$id)->update([
            'address'=>$request->zipcode,
            'store_name'=>$request->store_name,
            'phone'=>$request->phonenumber,
            ]);

        return view('vendor_auth.proof_of_identity')->with('ID',$id);
    }


    public function proof_of_identity_save(Request $request)
    {

// dd($request);
        $id = Vendors::latest()->value('id');
        if($request->hasFile('image')){


                $extension=$request->image->extension();
                $image_name=time()."_.".$extension;
                $request->image->move(public_path('vendorImage'),$image_name);

            $file_name=$request->file('upload_file');
            $file=$file_name->store('files','public');
            Vendors::where('id',$id)->update([
                'paypal'=>$request->paypalemail,
                'image'=>$image_name,
                'status'=>'active',
                // 'customer_type'=>'customers',
                ]);
        }
        else{
            redirect()->back();
        }
        return redirect()->route('vendor.login');
        //  return view('influence.auth.login');
    }

    public function admin_profile_update()
    {
        if (view()->exists('vendor_views.my_profile'))
        {
            return view('vendor_views.my_profile');
        }
    }

    public function order_list()
    {
        if (view()->exists('vendor_views.order_list'))
        {
            $order=ProductOrder::all();
            $pending_order=ProductOrder::where('status','Pending')->get();
            $completed_order=ProductOrder::where('status','Completed')->get();
            $new_order=ProductOrder::whereMonth('created_at', Carbon::now()->month)
                    ->get();
            return view('vendor_views.order_list')->with('order',$order)->with('pending_order',$pending_order)
            ->with('completed_order',$completed_order)->with('new_order',$new_order);
        }
    }

    public function sales_list()
    {
        if (view()->exists('vendor_views.sales'))
        {
            $order=ProductOrder::all();

            return view('vendor_views.sales')->with('order',$order);
        }
    }

    public function admin_profile_update_save(Request $request)
    {
        $id=Auth::guard('vendor')->user()->id;
        Vendors::whereId($id)->update([
            'password' => Hash::make($request->password)
        ]);
        return redirect()->back();
    }

    public function admin_vendor_faqs()
    {
        if (view()->exists('vendor_views.vendor_faqs'))
        {
            return view('vendor_views.vendor_faqs');
        }
    }


    public function save_vendor_faqs(Request $request)
    {
        if($request->hasFile('pdf_file')){

            $extension=$request->pdf_file->extension();
    	          $filename=time()."_.".$extension;
    	          $request->pdf_file->move(public_path('Pdf_files'),$filename);
        }
        else{

            return redirect()->back();
        }
        $pdf=new Pdf_files();
        $pdf->file_name = $request->file_name;
        $pdf->pdf_file = $filename;
        $result=$pdf->save();

        return redirect()->back();

    }

    public function admin_vendor_profile()
    {
        $id=Auth::guard('vendor')->user()->id;
        if (view()->exists('vendor_views.vendor_profile'))
        {
            $vendor= Vendors::findOrFail($id);
            $product= Product::where('product_type','fitness')->get();
       $zurvosproducts=Product::where('product_type','zurvos')->get();
            return view('vendor_views.vendor_profile')->with('vendor',$vendor)->with('fitnessproducts',$product)->with('zurvosproducts',$zurvosproducts);
        }
    }

    public function vendor_store()
    {

        if (view()->exists('vendor_views.vendor_store'))
        {

            $product= Product::where('product_type','fitness')->get();
       $zurvosproducts=Product::where('product_type','zurvos')->get();
            return view('vendor_views.vendor_store')->with('fitnessproducts',$product)->with('zurvosproducts',$zurvosproducts);
        }
    }

}
