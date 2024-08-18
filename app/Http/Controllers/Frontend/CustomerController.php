<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;

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
            'customer_name'=>'required',
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
        'name'=>$request->customer_name,
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
       
        return redirect()->back();
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
        
      return view('Frontend.Pages.customerprofile');    
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


   
}