<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){

        $Productlist=Product::count();
        $Orderlist=Order::count();

        return view ('Backend.pages.dashboard', compact('Productlist','Orderlist'));
    }
}
