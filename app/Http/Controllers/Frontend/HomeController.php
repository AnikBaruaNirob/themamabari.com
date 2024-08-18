<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\Category;


class HomeController extends Controller
{
    public function home(){

        $products= product::all();
        return view('Frontend.home',compact('products'));
    }
    public function showProducts()
{
    $categories = Category::all(); // Fetch all categories
    $products = Product::with('category')->get(); // Fetch products with their categories

    return view('frontend.pages.featured', compact('categories', 'products'));
}

}
