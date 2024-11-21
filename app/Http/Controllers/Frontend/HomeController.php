<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\Category;


class HomeController extends Controller
{
    public function home(){

        $products= product::all();
        // Fetch the latest 5 products
      $latestProducts = Product::orderBy('created_at', 'desc')->take(5)->get();
      $banners = Banner::all(); // Assuming you have a Banner model
        return view('Frontend.home',compact('products', 'banners' , 'latestProducts'));
    }
    public function showProducts()
{
    $categories = Category::all(); // Fetch all categories
    $products = Product::with('category')->get(); // Fetch products with their categories
      // Fetch the latest 5 products
      $latestProducts = Product::orderBy('created_at', 'desc')->take(5)->get();

    return view('frontend.pages.featured', compact('categories', 'products'));
}

}
