<?php

use App\Http\Controllers\API\productcontroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::get('/all-products',[productcontroller::class,'products']);
Route::post('/create-products',[productcontroller::class,'store']);