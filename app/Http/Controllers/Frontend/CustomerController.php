<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    //

    public function registration(Request $request)
    {
      
       //step1 validation
        $validation=Validator::make($request->all(),[
            'customer_firstname'=>'required',
            'customer_lastname'=>'required',
            'email'=>'required|email|unique:Customers,email',
            'password'=>'required|min:6|confirmed',
            'mobile_number'=>'required|min:11|max:11'
            
            
        ]);
      

        if($validation->fails())
        {
            notify()->error($validation->getMessageBag());
            
          
            return redirect()->back();
        }

        
       // query
       $CustomerImage=null;
     
       
       //check file exist
       if($request->hasFile('image'))
       {
        
        $file=$request->file('image');

           //file name generate
           $CustomerImage=date('Ymdhis').'.'.$file->getClientOriginalExtension();
         
       
         
            //file store where i want to 
            $file->storeAs('/customer',$CustomerImage);
      
       }

       //dd($CustomerImage);
       Customer::create([
        //bam pase column name=>dan pase value (form input)
        'firstname'=>$request->customer_firstname,
        'lastname'=>$request->customer_lastname,
        'email'=>$request->email,
        'password'=>bcrypt($request->password),

        'mobile'=>$request->mobile_number,
        'image'=> $CustomerImage
        
       ]);

       notify()->success('Customer Registration Successful.');

       return redirect()->back();



    }

    public function customerLogin(Request $request)
    {

       
       //step1 validation
       $validation=Validator::make($request->all(),[
        'email'=>'required|email',
        'password'=>'required|min:6',
        ]);

    if($validation->fails())
    {
        notify()->error($validation->getMessageBag());
       
        return redirect()->route('Home');
    }

   
       //condition for login
       $credentials=$request->except('_token');
       
       $check=auth('customerGuard')->attempt($credentials);
    //    $check=Auth::guard('customerGuard')->attempt($credentials)

       if($check){
        notify()->success('Login Success');
       
        return redirect()->route('Home');
       }else
       {
        notify()->error('Login failed.');

        return redirect()->route('Home');
       }
    }

    public function customerprofile(){
        
        $orders=Order::where( 'customer_id',auth('customerGuard')->user()->id )->get();
       // $order = Order::with('OrderDetails')->find($orderId);
        // Generate a dynamic invoice number if not stored in the database
     //$invoiceNumber = 'MB-' . str_pad($order->id, 6, '0', STR_PAD_LEFT); // Example: INV-000001
    // $dueDate = Carbon::parse($order->created_at)->addDays(5)->format('Y/m/d');
      return view('Frontend.Pages.customerprofile', compact('orders')); 
      //return view('Frontend.Pages.customerprofile', compact('orders', 'invoiceNumber' , 'dueDate'));    
    }

    public function logout()
    {
          Auth::guard('customerGuard')->logout();
          
          notify()->error("logout successful");

          return redirect()->route('Home');
    }

    
//   public function edit($profileID){
//     $profile= Customer::find($profileID);
//     return view('Backend.pages.categoryedit',compact('profile'));
//  }
 
//  public function update(Request $request,$profileID){
//      $profile= Customer::find($profileID);
//      $profile->update([
//        'name'=>$request->cat_name,
//        'description'=>$request->cat_description
    
    
//    ]);
//    notify()->success('Product updated successfully.');
//        return redirect()->route('product.list');

// }
public function cancelOrder($id)
{
    $order = Order::find($id);

    if ($order) {
        $order->update([
            'status' => 'cancel'
        ]);

        $items = OrderDetail::where('order_id', $id)->get();

        foreach ($items as $item) {
            $product = Product::find($item->id69);

            if ($product) {
                $product->increment('stock', $item->quantity);
            }
        }

        notify()->success('Order cancelled.');
    } else {
        notify()->error('Order not found.');
    }

    return redirect()->route('customer.profile');
}


   
}