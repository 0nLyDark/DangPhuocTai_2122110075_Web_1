<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\ProductController;
use App\Http\Controllers\frontend\ContactController;

use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\BrandAdminController;
use App\Http\Controllers\backend\CategoryAdminController;
use App\Http\Controllers\backend\ContactAdminController;
use App\Http\Controllers\backend\ProductAdminController;
use App\Http\Controllers\backend\PostAdminController;
use App\Http\Controllers\backend\OrderAdminController;
use App\Http\Controllers\backend\UserAdminController;

Route::get('/',[HomeController::class,'index']);
Route::get('/san-pham',[ProductController::class,'index']);
Route::get('/chi-tiet-san-pham/{slug}',[ProductController::class,'product_detail']);
Route::get('/lien-he',[ContactController::class,'index']);


Route::get('/admin/',[DashboardController::class,'index']);
Route::get('/admin/brand',[BrandAdminController::class,'index']);
Route::get('/admin/category',[CategoryAdminController::class,'index']);
Route::get('/admin/product',[ProductAdminController::class,'index']);
Route::get('/admin/order',[OrderAdminController::class,'index']);
Route::get('/admin/post',[PostAdminController::class,'index']);
Route::get('/admin/contact',[ContactAdminController::class,'index']);
Route::get('/admin/user',[UserAdminController::class,'index']);

