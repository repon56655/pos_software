<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\BranchController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\PurchaseController;
use App\Http\Controllers\Backend\StockController;
use App\Http\Controllers\Backend\DashboardController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix'=>'/branch'],function(){
    Route::get('/add',[BranchController::class,'add'])->name('branch.add');
    Route::post('/store',[BranchController::class,'store'])->name('branch.store');
    Route::get('/manage',[BranchController::class,'manage'])->name('branch.manage');
    Route::get('/edit{id}',[BranchController::class,'edit'])->name('branch.edit');
    Route::post('/update{id}',[BranchController::class,'update'])->name('branch.update');
    Route::get('/destroy/{id}',[BranchController::class,'destroy'])->name('branch.destroy');
    Route::get('/status{id}',[BranchController::class,'status'])->name('branch.status');
});
Route::group(['prefix'=>'/product'],function(){
    Route::get('/add',[ProductController::class,'add'])->name('product.add');
    Route::post('/store',[ProductController::class,'store']);
    Route::get('/show',[ProductController::class,'show']);
    Route::get('/edit/{id}',[ProductController::class,'edit']);
    Route::post('/update/{id}',[ProductController::class,'update']);
    Route::get('/destroy/{id}',[ProductController::class,'destroy']);
});

Route::group(['prefix'=>'/purchase'],function(){
    Route::get('/add',[PurchaseController::class,'add'])->name('purchase.add');
    Route::post('/store',[PurchaseController::class,'store']);
    Route::get('/show',[PurchaseController::class,'show']);
    Route::get('/edit/{id}',[PurchaseController::class,'edit']);
    Route::post('/update/{id}',[PurchaseController::class,'update']);
    Route::get('/destroy/{id}',[PurchaseController::class,'destroy']);
    Route::get('/find/{id}',[PurchaseController::class,'find']);
});

Route::group(['prefix'=>'/stock'],function(){
    Route::get('/stock',[StockController::class,'stock'])->name('stock');
});


Route::get('/admin',[DashboardController::class,'dashboard'])->name('dashboard');



// Route::get('/admin/addproduct', function () {
//     return view('backend.pages.product.addproduct');
// })->name("addproduct");

// Route::get('/admin/manageproduct', function () {
//     return view('backend.pages.product.manageproduct');
// })->name("manageproduct");

