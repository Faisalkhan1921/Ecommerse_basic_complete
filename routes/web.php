<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

Route::get('/',[HomeController::class,'index']);
//redirect route
Route::get('/redirect', [HomeController::class,'redirect'])->middleware('auth','verified');

//category_view
Route::get('/category_view', [AdminController::class,'category_view']);
//add_category
Route::post('/add_category',[AdminController::class,'add_category']);

//view category
Route::get('/view_category',[AdminController::class,'view_category']);
//delete category
Route::get('/delete_category/{id}', [AdminController::class,'delete_category']);

//PRODUCT VIEW
Route::get('/product_view',[AdminController::class,'product_view']);
//ADD_PRODUCT
Route::post('/add_product' , [AdminController::class,'add_product']);
//show product
Route::get('/show_product',[AdminController::class,'show_product']);
// delete product
Route::get('/delete_product/{id}',[AdminController::class,'delete_product']);

//UPDATE PRODUCT_VIEW
Route::get('/update_product_view/{id}',[AdminController::class,'update_product_view']);
//UPDATE PRODUCT CONFIRM
Route::post('/update_product_confirm/{id}',[AdminController::class,'update_product_confirm']);

//PRODUCT DETAILS
Route::get('/product_details/{id}',[HomeController::class,'product_details']);

// addtocart 
Route::post('/addtocart/{id}', [HomeController::class,'addtocart']);
//show cart 
Route::get('/show_cart',[HomeController::class,'show_cart']);
//remove from cart
Route::get('/removefrom_cart/{id}',[HomeController::class,'removefrom_cart']);

// CASH ON DELIVERY
Route::get('/cashon_delivery',[HomeController::class,'cashon_delivery']);
//CASH USING STRIPE
Route::get('/stripe/{totalamount}',[HomeController::class,'stripe']);
//route for stripe post
Route::post('stripe/{totalamount}', [HomeController::class, 'stripePost'])->name('stripe.post');

//order table display in admin
Route::get('/order_view',[AdminController::class,'order_view']);
// delivered 
Route::get('/delivered/{id}',[AdminController::class,'delivered']);
//PRINT PDF
Route::get('/print_pdf/{id}',[AdminController::class,'print_pdf']);

//send email
Route::get('send_email/{id}', [AdminController::class,'send_email']);
//SEND EMAIL POST MEHTOD
Route::post('/sendemail_user/{id}', [AdminController::class,'sendemail_user']);

//SEARCH
Route::get('/search',[AdminController::class,'search']);

//orderdata
Route::get('/orderdata',[HomeController::class,'orderdata']);

//cancelorder
Route::get('/cancelorder/{id}',[HomeController::class,'cancelorder']);

//ADD COMMENT 
Route::post('/add_comment',[HomeController::class,'add_comment']);
//REPLY
Route::post('/add_reply',[HomeController::class,'add_reply']);

//SEARCH PRODUCT
Route::get('/search_product',[HomeController::class,'search_product']);

Route::get('/allproducts',[HomeController::class,'allproducts']);

Route::get('/searchallproducts',[HomeController::class,'searchallproducts']);

Route::get('/pdfall',[AdminController::class,'pdfall']);
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/excel' , function(){
    return view('admin.excel');
});

Route::get('/export_order',[AdminController::class,'export_order']);

Route::get('/export_user',[AdminController::class,'export_user']);

Route::get('/export_product',[AdminController::class,'export_product']);

Route::get('/export_category',[AdminController::class,'export_category']);

