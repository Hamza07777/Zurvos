<?php

namespace App\Http\Controllers\apicontrollers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ProductsCollection;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  public function index()
    {

          /**
         * Display a listing of zavour_store.
         *
         * @return \Illuminate\Http\Response
         */

        $result = \DB::table('products')->select('id','product_type','product_name','product_price','product_image','product_description')->where('product_type','fitness')->orWhere('product_type', 'Suppliments')->get();
        if ($result->count() >0) {
            return ProductsCollection::collection(json_decode($result, true));
            return  ProductsCollection::collection(collect($result));
        }
        else{
            return response()->json(['message' => 'Products Not Found','status' =>'error'], 404);
        }
    }
    public function zavour_store()
    {
        $result = \DB::table('products')->select('id','product_type','product_name','product_price','product_image','product_description')->where('product_type','zurvos')->get();
        if ($result->count() >0) {
            return ProductsCollection::collection(json_decode($result, true));
            return  ProductsCollection::collection(collect($result));
        }
        else{
            return response()->json(['message' => 'Products Not Found','status' =>'error'], 404);
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
