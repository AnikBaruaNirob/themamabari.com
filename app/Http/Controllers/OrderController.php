<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    

    public function orderList()
    {
        $orders = Order::with('customer')->orderBy('created_at', 'desc')->paginate(5);
        return view('Backend.pages.order-list', compact('orders'));
    }


}
