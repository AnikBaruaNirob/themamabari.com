<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
     public function authlog(){

        //dd('habijabi');

        return view ('Backend.login');
     }

     public function dologin( Request $request)
     {

      // $credentials=$request->only(['email','password']);
      // $credentials=['email'=>$request->user_email,'password'=>$request->user_password];
      $credentials=$request->except("_token");

      $check= Auth::attempt($credentials);
      if($check)
      {
          notify()->success("login successful");
          return redirect()->route('home');

      }else{
          //2 number user
          return redirect()->back();
      }




  }
  public function logout()
    {
          Auth::logout();
          
          notify()->success("logout successful");

          return redirect()->route('login');
    }


 
}
