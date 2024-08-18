<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function Checkout(){
    
        return view('Frontend.Pages.Checkout');

    }
    public function placeorder(Request $request){
        //$Orders= Order::all();
        //dd($request->all());
       $mycart = session()->get('basket');
        $validated = $request->validate([
            'Customer_name' => 'required|string|max:255',
            'customer_address' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_mobile' => 'required|string|max:15',
            ]);

            $order = Order::create([
                'name' => $request->Customer_name,
                'address' => $request->customer_address,
                'email' => $request->customer_email,
                'mobile' => $request->customer_mobile
            ]);
            foreach($mycart as $singledata){
            OrderDetail::create([
                'order_id'=> $order-> id,
                'product_name' => $singledata['pname'],
                'product_unit_price' => $singledata['price'],
                'product_quantity' => $singledata['quantity'],
                'subtotal' => $singledata['subtotal'],
                
            ]);
        }
            
        // Redirect to the invoice view, passing the order data
        return redirect()->route('invoice.show', ['orderid' => $order->id]); 
       
    }
    public function showInvoice($orderId)
{
    $order = Order::with('OrderDetails')->find($orderId);

    // Pass the order details to the view
    return view('Frontend.Pages.invoice', compact('order'));
}


}
