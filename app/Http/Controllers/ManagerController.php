<?php

namespace App\Http\Controllers;

use App\employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\models\Contactus;
use App\Gym;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ManagerController extends Controller
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


    public function contact_zurvos()
    {
        return view('gym_manager_views.contact_zurvos');
    }
    public function contact_zurvos_store(Request $request)
    {

      //  $id=Auth::guard('influence')->user()->cust_id;
        $contactus=new Contactus();
        $contactus->customer_id =1;
        $contactus->subject=$request->subject;
        $contactus->user_message=$request->user_message;
        $contactus->save();
        return view('gym_manager_views.contact_zurvos');

    }

    public function admin_add_gym()
    {
        if (view()->exists('gym_manager_views.add_gym')) {
            return view('gym_manager_views.add_gym');
        }
    }

    public function manager_save_employee()
    {
        if (view()->exists('gym_manager_views.add_employee')) {
            $user=employee::all();
            return view('gym_manager_views.new_employee')->with('user',$user);
        }
    }

    public function save_employee(Request $request)
    {
        $validatedData = $request->validate([

            'gymname' => 'required',
       ]);
        if ($request->hasFile('gymname')) {
            // dd($request);
            $extension=$request->gymname->extension();
            $filename=time()."_.".$extension;
            $request->gymname->move(public_path('employee'), $filename);
            $gym=new employee();
            $gym->name=$request->name;
            $gym->email=$request->email;
            $gym->password=Hash::make($request['password']);
            $gym->image=$filename;
            $gym->save();
       
            return redirect()->route('manager_save_employee');
        }
    }
    
    public function save_gym(Request $request)
    {
        $validatedData = $request->validate([

            'gymname' => 'required',
       ]);
        if ($request->hasFile('gymname')) {
            // dd($request);
            $extension=$request->gymname->extension();
            $filename=time()."_.".$extension;
            $request->gymname->move(public_path('gymimage'), $filename);
            $gym=new Gym();
            $gym->full_name=$request->name;
            $gym->full_name1=$request->name;
            $gym->email=$request->email;
            $gym->status='Approved';
            $gym->password=Hash::make($request['password']);
            $gym->gym_image=$filename;
            $gym->save();
            $id=$gym->id;
            return view('gym_manager_views.add_gym_location_detail')->with('id', $id);
        }
    }
    public function gym_location(Request $request,$id){

        Gym::whereId($id)->update([
                    'zipcode' => $request['zipcode'],
                    'phoneno' => $request['phoneno'],
                    'cost_per_day' => $request['cost_per_day'],
                    ]);
        return view('gym_manager_views.add_gym_descriptions')->with('id',$id);

    }

    // public function admin_add_gym_location_detail()
    // {
    //     if (view()->exists('admin_views.add_gym_location_detail'))
    //     {
    //         return view('admin_views.add_gym_descriptions')->with('id',$id);
    //         return ;
    //     }
    // }

    public function gym_descriptions(Request $request,$id)
    {
       // dd($request);
        Gym::whereId($id)->update([
            'gym_detail' => $request['gym_detail'],
            'check' =>$request->get('services'),
            ]);
            return redirect()->route('dashboared');
    }
    public function user_chk_in()
    {

     //  $id=16;
     $user_chk=DB::table('user_checks')
     ->join('customers','customers.cust_id','user_checks.user_id')
     ->select('customers.name','customers.user_image','user_checks.*')
     ->orderBy('id', 'desc')->get();

        return view('gym_manager_views.user_chk_in_session')->with('user_chk',$user_chk);

    }

    public function check_out_user()
    {
       // $id=16;
       $user_chk=DB::table('user_checks')
       ->whereNotNull('check_out')->join('customers','customers.cust_id','user_checks.user_id')
       ->select('customers.name','customers.user_image','user_checks.*')
       ->orderBy('id', 'desc')->get();
        return view('gym_manager_views.user_chk_out_session')->with('user_chk',$user_chk);
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
        //
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
