<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductsCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [

            'product_id' => $this['id'],

            'product_name' => $this['product_name'] ==null ? '0' : $this['product_name'],

            'product_price' => $this['product_price'] ==null ? '0' : $this['product_price'],
            'product_type' => $this['product_type'] ==null ? '0' : $this['product_type'],

            'product_image' => $this['product_image'] ==null ? '0' : asset('public/productImages/'.$this['product_image']),
            'product_description' =>$this['product_description'] ==null ? '0' : $this['product_description'],
        ];
    }
}
