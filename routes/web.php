<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Frontend\HomeController as FrontendHomeController;
use App\Http\Controllers\Frontend\ProductController as FrontendProductController;
use App\Http\Controllers\Frontend\OrderController as FrontendOrderController;
use App\Http\Controllers\Frontend\CustomerController as FrontendCustomerController;
use App\Http\Controllers\AddtocartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\WishlistController;

use App\Models\product;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\search;

//For website

Route::get('/',[FrontendHomeController::class,'home'])->name('Home');
Route::get('/allproducts',[FrontendProductController::class,'productlist'])->name('frontend.products');
Route::get('/shop-grid',[FrontendProductController::class,'shopgrid'])->name('product.shop');
Route::get('/search',[FrontendProductController::class,'search'])->name('search');
Route::get('/viewcart',[FrontendProductController::class,'viewcart'])->name('view.cart');
Route::get('/viewproduct/{viewproduct}',[FrontendProductController::class,'viewproduct'])->name('Fview.product');
Route::get('/add-to-cart/{ProductID}',[FrontendProductController::class,'add_to_cart'])->name('add.cart');
Route::post('/registration',[FrontendCustomerController::class,'registration'])->name('customer.registration');
Route::post('/do-login',[FrontendCustomerController::class,'customerLogin'])->name('customer.login');
Route::get('/customerprofile',[FrontendCustomerController::class,'customerprofile'])->name('customer.profile');

// Route::get('/profile-edit{profileID}',[FrontendCustomerController::class,'edit'])->name('profile.edit');
// Route::post('/profile-update{profileID}',[FrontendCustomerController::class,'update'])->name('profile.update');
Route::get('/checkout',[FrontendOrderController::class,'Checkout'])->name('Product.checkout');
Route::post('/placeorder',[FrontendOrderController::class,'Placeorder'])->name('Order.Place');
Route::get('/invoice/{orderid}', [FrontendOrderController::class, 'showInvoice'])->name('invoice.show');
Route::get('/Logout',[FrontendCustomerController::class,'Logout'])->name('Frontend.logout');



//For Admin Panel
Route::group(['prefix'=> 'admin'],function(){

   Route::get('/login',[loginController::class,'authlog'])->name('login');
   Route::post('/do-login',[loginController::class, 'dologin'])->name('do.login');
   //signup

   Route::get('/signup',[SignupController::class,'signup']);

   //group
   Route::group(['middleware'=>'auth'],function(){

   Route::get('/',[HomeController::class,'home'])->name('home');

   Route::get('/contact-us',[ContactController::class,'contact']);

   Route::get('/order-list',[OrderController::class,'orderList']);

   Route::get('/Logout',[loginController::class,'Logout'])->name('logout');

   //product
   Route::get('/product-list',[ProductController::class,'productList'])->name('product.list');

   Route::get('create-product',[ProductController::class,'addproduct'])->name('product.add');
   
   //product View
   Route::get('/product/view{productid}',[ProductController::class,'viewproduct'])->name('view.product');
   //product Edit
   Route::get('/product/edit{productid}',[ProductController::class, 'edit'])->name('product.edit');
   Route::post('/product/update{pID}',[ProductController::class, 'update'])->name('product.update');
   Route::get('/product/delete{pID}',[productController::class, 'delete'])->name('product.delete');


   Route::post('/product-store',[ProductController::class,'store'])->name('product.store');

   #customer

   Route::get('/customer-list',[CustomerController::class,'customerList'])->name('customer.list');

   Route::get('/add-to-cart',[AddtocartController::class,'addtocart']);

   Route::get('/add-to-wishlist',[WishlistController::class,'wishlist']);

   //category
   Route::get('/category-list',[CategoryController::class,'List'])->name('category.list');

   Route::get('/create-category',[CategoryController::class,'createform'])->name('category.form');
   Route::get('/category/edit{categoryId}',[CategoryController::class,'edit'])->name('category.edit');
   Route::post('/category/update{categoryId}',[CategoryController::class,'update'])->name('category.update');
   Route::get('/category/delete{pID}',[CategoryController::class, 'delete'])->name('category.delete');
   
   Route::post('/category-store',[CategoryController::class,'store'])->name('category.store');
});

});