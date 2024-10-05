<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CustomerAuth; // Ensure this is correct
use App\Mail\Sendemail;
use App\Models\Order;
use Carbon\Carbon;
use App\Models\OrderDetail;
use App\Models\product;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Throwable;

class OrderController extends Controller
{
    public function Checkout(){
    
        return view('Frontend.Pages.Checkout');

    }
    public function placeorder(Request $request){
        //$Orders= Order::all();
        //dd($request->all());
    
        $validated = Validator::make($request->all(),[
            'Customer_name' => 'required|string|max:255',
            'customer_address' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_mobile' => 'required|string|max:15',
            ]);
            if($validated->fails())
            {
                notify()->error($validated->getMessageBag());
                return redirect()->back();

            }
            try{
                $mycart = session()->get('basket');
                DB::beginTransaction();

            $order = Order::create([
                'name' => $request->Customer_name,
                'address' => $request->customer_address,
                'email' => $request->customer_email,
                'mobile' => $request->customer_mobile,
                'payment_method'=>$request->paymentMethod,
                'customer_id'=>auth('customerGuard')->user()->id,
                'total'=> (array_sum(array_column($mycart, 'subtotal')))
                
            ]);
            foreach($mycart as $singledata){
            OrderDetail::create([
                'order_id'=> $order-> id,
                'product_name' => $singledata['pname'],
                'product_unit_price' => $singledata['price'],
                'product_quantity' => $singledata['quantity'],
                'subtotal' => $singledata['subtotal']
                
            ]);
             
             //decrement stock 
             $product=product::find($singledata['id']);
             $product->decrement('stock',$singledata['quantity']);
        }
             DB::commit();
             Mail::to($request->customer_email)->send(new Sendemail($order));
             if($request->paymentMethod!='cod')
             {
                $payment=new SslCommerzPaymentController() ;
                $payment->index($order);
             }
             notify()->success('Order place successfully');
             session()->forget('basket');
             return redirect()->back();
            }catch(Throwable $exception)
            {
                DB::rollback();
                notify()->error($exception->getMessage());
                return redirect()->back();

            }
             
        
            
        // Redirect to the invoice view, passing the order data
       // return redirect()->route('invoice.show', ['orderid' => $order->id]); 
       
    }
    public function showInvoice($orderId)
{
    $order = Order::with('OrderDetails')->find($orderId);
       // Generate a dynamic invoice number if not stored in the database
    $invoiceNumber = 'MB-' . str_pad($order->id, 6, '0', STR_PAD_LEFT); // Example: INV-000001
    $dueDate = Carbon::parse($order->created_at)->addDays(5)->format('Y/m/d');

    // Pass the order details to the view
    return view('Frontend.Pages.invoice', compact('order', 'invoiceNumber' , 'dueDate'));
}

public function downloadPDF($id)
    {
        $order = Order::with('OrderDetails')->findOrFail($id);

        $pdf = Pdf::loadView('Frontend.Pages.invoice', compact('order'));
        return $pdf->download('invoice_'.$order->id.'.pdf');
    }


}
