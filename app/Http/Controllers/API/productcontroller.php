<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class productcontroller extends Controller
{
    public function products(){

        $product=product::all();
        return response()->json($product);

    }
    public function store(Request $request)
    {


       
        $validation=Validator::make($request->all(),[
            'product_name'=>'required',
            'product_price'=>'required|numeric|min:10',
            'product_image'=>'required|file|max:1024',
            'product_Stock'=>'required'
        ]);
        if($validation->fails())
        {
           return response()->json([
            'success'=>false,
             'data'=> null,
             'message'=>$validation->getMessageBag()

           ]);
          
        }

        $fileName=null;
       
        //check file exist
        if($request->hasFile('product_image'))
        {
       
            $file=$request->file('product_image');

            //file name generate
            $fileName=date('Ymdhis').'.'.$file->getClientOriginalExtension();

             //file store where i want to 
            $file->storeAs('/',$fileName);
       
        }

      $product= product::create([
        'pname'=>$request->product_name,
        'pcategory'=>$request->category_id,
        'pdescription'=>$request->product_Des,
        'price' =>$request->product_price,
        'stock'=> $request->product_Stock,
        'image'=>$fileName
        
       ]);
       
       return response()->json([
        'success'=>true,
         'data'=> $product,
         'message'=>$validation->getMessageBag()

       ]);
}
}