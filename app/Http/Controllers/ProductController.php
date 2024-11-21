<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redis;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    public function productlist(){
        
       return view('Backend.product-list');
    }

    public function EXproductList(){

       {

            $data=Product::all();
        return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                           $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a><a href="" class="edit btn btn-success btn-sm">Edit</a>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        

   



    }


    public function addproduct()
    {
        $allCategory=Category::all();
        
        return view('Backend.addproduct',compact('allCategory'));

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
            notify()->error($validation->getMessageBag());
            return redirect()->back();
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

       Product::create([
        'pname'=>$request->product_name,
        'pcategory'=>$request->category_id,
        'pdescription'=>$request->product_Des,
        'price' =>$request->product_price,
        'stock'=> $request->product_Stock,
        'image'=>$fileName
        
       ]);
        //dd($request);
       return redirect()->route('product.list');

    }

    public function viewproduct($id){
        $viewProduct=Product::find($id);
       // dd($viewProduct);
        return view('Backend.pages.viewproduct',compact('viewProduct'));   
    }

    public function delete($pID){
        $product=Product::find($pID);
        $product-> delete();
        notify()->success('Product Deleted successfully.');

        return redirect()->back();
    }

    public function edit($productid)
    {
        

        $product=Product::find($productid);
        $allCategory=Category::all();
        return view('Backend.pages.productedit',compact('allCategory','product'));
    }
    public function update(Request $request,$pID)
    {
        //dd($request->all());

        //validation
        
       
        
        $updateImage=null;
       
        //check file exist
        if($request->hasFile('product_image'))
        {
       
            $file=$request->file('product_image');

            //file name generate
            $updateImage=date('Ymdhis').'.'.$file->getClientOriginalExtension();

             //file store where i want to 
            $file->storeAs('/',$updateImage);
       
        }

        
        //query
        $product=Product::find($pID);
        $product->update([
            'pname'=>$request->pname,
            'pdescription'=>$request->pdescription,
            'price'=>$request->price,
            'product_Stock'=>$request->stock,
            'image'=> $updateImage
         
        ]);
      
        notify()->success('Product updated successfully.');
        return redirect()->route('product.list');


    }
    public function stock(){

        $allProduct=Product::paginate(5);
        return view('Backend.pages.stock',compact('allProduct'));
    }
}
