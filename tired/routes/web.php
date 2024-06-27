<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//page routes
Route::view('/', "welcome");
Route::view('/login', "login");
Route::view('/dashboard', "dashboard");
Route::view('/category', "category");
Route::view('/items', "items");
Route::view('/users', "users");
Route::view('/vendors', "vendors");
Route::view('/borrows', "borrow");
Route::view('/orders', "orders");
Route::view('/compartments', "compartments");
Route::view('/consignments', "consignments");
Route::view('/cart', "cart");

//multiple name routes
Route::view('/edit_category_form', "edit_category_form");
Route::view('/edit_user_form', "edit_user_form");
Route::view('/edit_consignment_form', "edit_consignment_form");
Route::view('/edit_item_form', "edit_item_form");
Route::view('/edit_compartment_form', "edit_compartment_form");
Route::view('/edit_vendor_form', "edit_vendor_form");
Route::view('/register_category', "register_category");
Route::view('/register_item', "register_item");
Route::view('/register_user', "register_user");
Route::view('/register_compartment', "register_compartment");
Route::view('/register_consignment', "register_consignment");
Route::view('/register_vendors', "register_vendors");

//security route
Route::get('logmeout','App\Http\Controllers\adminlogin@logout');

//inserting to the database
Route::post('registercat','App\Http\Controllers\register_category@insert_category');
Route::post('registervendor','App\Http\Controllers\register_category@insert_vendor');
Route::post('registeritem','App\Http\Controllers\register_category@insert_item');
Route::post('registeruser','App\Http\Controllers\register_category@insert_user');
Route::post('registerstorage','App\Http\Controllers\register_category@insert_compartment');
Route::post('registerorder','App\Http\Controllers\register_category@insert_consignment');
Route::post('checkout','App\Http\Controllers\checkout@checkout');

//fetching stuff from the database
Route::post('adminlogin','App\Http\Controllers\adminlogin@log_user_in');
Route::get('/category', 'App\Http\Controllers\fetch_stuff@fetch_things');
Route::get('/vendors', 'App\Http\Controllers\fetch_stuff@fetch_vendors');
Route::get('/items', 'App\Http\Controllers\fetch_stuff@fetch_cat_item');
Route::get('/users', 'App\Http\Controllers\fetch_stuff@fetch_users');
Route::get('/compartments', 'App\Http\Controllers\fetch_stuff@fetch_compartments');
Route::get('/consignments', 'App\Http\Controllers\fetch_stuff@fetch_consignments');
Route::get('/borrows', 'App\Http\Controllers\fetch_stuff@fetch_borrow_items');
Route::get('/orders', 'App\Http\Controllers\fetch_stuff@fetch_orders');
Route::get('/return_items', 'App\Http\Controllers\borrow_user_cart@complete_order');
Route::get('/dashboard', 'App\Http\Controllers\reports@fetch_reports');

//dropdown routes for form select items
Route::get('/register_item', 'App\Http\Controllers\fetch_stuff@fetch_cat_for_item');
Route::get('/register_consignment', 'App\Http\Controllers\fetch_stuff@fetch_vendor_for_consignment');

// routes used for updating the database content
Route::post('/editcategory', 'App\Http\Controllers\edit_content@edit_category');
Route::post('/edituser', 'App\Http\Controllers\edit_content@edit_user');
Route::post('/edititem', 'App\Http\Controllers\edit_content@edit_item');
Route::post('/editvendor', 'App\Http\Controllers\edit_content@edit_vendor');
Route::get('/activate_deactivate', 'App\Http\Controllers\edit_content@user_status');
Route::get('/deleteuser', 'App\Http\Controllers\edit_content@delete_user');
Route::post('/editstorage', 'App\Http\Controllers\edit_content@edit_compartment');
Route::post('/editorder', 'App\Http\Controllers\edit_content@edit_consignment');
Route::post('/deletefromcart', 'App\Http\Controllers\borrow_user_cart@delete_from_cart');


//cotrollers for borrowing purposes.
Route::post('user_cart', 'App\Http\Controllers\borrow_user_cart@addToCart');
Route::post('item_cart', 'App\Http\Controllers\borrow_user_cart@addToCart');

//returning the borrowed items
Route::post('returnOrder', 'App\Http\Controllers\borrow_user_cart@complete_order');
Route::post('returnItems', 'App\Http\Controllers\return_items@return_items');
