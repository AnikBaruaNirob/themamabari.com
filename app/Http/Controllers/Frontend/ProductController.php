<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\product;
use App\Models\Category;
use Illuminate\Http\Request;

use function Laravel\Prompts\search;

class ProductController extends Controller
{
    public function productList(){

        $products= product::all(); 
        return view('Frontend.Pages.products',compact('products'));
    }
    public function shopgrid(){
        $products= product::all(); 
        
        return view('Frontend.pages.shop-grid',compact('products'));
    }
    
    public function search(){
       request()->all();
      // $products= product::all(); 
     
      //dd(request()->all());
     $products= product::where('pname','LIKE','%'.request()->Search.'%')->get();
       return view('Frontend.pages.search', compact('products'));
    }
    public function add_to_cart($pID){
        $product = product::find($pID);
        $mycart = session()->get('basket', []); // Initialize $mycart as an empty array if session is empty
    
        if(empty($mycart)) {
            // Add the first product to the cart
            $mycart[$product->id] = [
                'id' => $product->id,
                'pname' => $product->pname,
                'pdescription' => $product->pdescription,
                'image' => $product->image,
                'price' => $product->price,
                'quantity' => 1,
                'subtotal' => 1 * $product->price
            ];
    
            session()->put('basket', $mycart);
            notify()->success('Product Added Successfully');
            return redirect()->back();
        } else {
            if(array_key_exists($pID, $mycart)) {
                // If the product already exists in the cart, update its quantity and subtotal
                $mycart[$pID]['quantity'] += 1;
                $mycart[$pID]['subtotal'] = $mycart[$pID]['quantity'] * $mycart[$pID]['price'];
            } else {
                // Add a new product to the cart
                $mycart[$product->id] = [
                    'id' => $product->id,
                    'pname' => $product->pname,
                    'pdescription' => $product->pdescription,
                    'image' => $product->image,
                    'price' => $product->price,
                    'quantity' => 1,
                    'subtotal' => 1 * $product->price
                ];
            }
    
            // Save the updated cart back to the session
            session()->put('basket', $mycart);
    
            // Calculate the total sum of subtotals
            $totalSubtotal = 0;
            foreach($mycart as $item) {
                $totalSubtotal += $item['subtotal'];
            }
            
            // Optionally, store the total sum in the session or use it as needed
            session()->put('totalSubtotal', $totalSubtotal);
    
            notify()->success('Product Added Again');
            return redirect()->back();
        }
    }
    
    public function viewcart(){
        //session()->forget('basket');
        $mycart = session()->get('basket');
        
        return view('Frontend.Pages.viewcart', compact('mycart'));
    }
    public function viewproduct($pID){
      
       // $categories = Category::find($pID); // Fetch all categories
        $products= product::find($pID); 

        $multipleproduct= product::where('id', '!=' , $products->id)
                                   ->where('pcategory', $products-> category)
                                   ->limit(4)
                                   ->get();
        return view('Frontend.Pages.viewproduct',compact('products', 'multipleproduct'));

    }
}
    

