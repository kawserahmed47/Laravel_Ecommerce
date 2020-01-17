<?php

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
//Frontend site...............
Route::get('/', 'home@index');
Route::get('/productByCategory/{category_id}', 'home@showCategoryProduct');
Route::get('/productByManufacture/{manufacture_id}', 'home@showManufactureProduct');


Route::get('/productDetails/{product_id}', 'home@showProductDetails');
Route::post('/add-to-cart', 'cartController@add_to_cart');
Route::post('/update-cart', 'cartController@update_cart');
Route::get('/show-cart', 'cartController@show_cart');
Route::get('/delete-to-cart/{rowId}', 'cartController@delete_to_cart');

//Checkout Controller..........
Route::get('/login-check', 'checkoutController@login_check');
Route::get('/check-out', 'checkoutController@check_out');
Route::get('/customer-logout', 'checkoutController@customer_logout');
Route::post('/customer-registration', 'checkoutController@customer_registration');
Route::post('/save-shipping', 'checkoutController@save_shipping');
Route::post('/customer-login', 'checkoutController@customer_login');
Route::get('/payment', 'checkoutController@customer_payment');
Route::post('/bill-pay', 'checkoutController@bill_pay');
Route::get('/manage-order', 'checkoutController@manage_order');
Route::get('/view-order/{order_id}', 'checkoutController@view_order');






//Backend site...............

Route::get('/logout', 'superadminController@logout');
Route::get('/admin', 'adminController@admin_login');
Route::get('/dashboard', 'superAdminController@index');
Route::post('/admin_go', 'adminController@dashboard');


//Category
Route::get('/addcategory', 'categoryController@addcategory');
Route::get('/allcategory', 'categoryController@allcategory');
Route::post('/savecategory', 'categoryController@savecategory');
Route::get('/edit_category/{category_id}', 'categoryController@edit_category');
Route::get('/inactivePublication/{category_id}', 'categoryController@inactivePublicatnion');
Route::get('/activePublication/{category_id}', 'categoryController@activePublication');
Route::post('/updatecategory/{category_id}', 'categoryController@updatecategory');
Route::get('/deletecategory/{category_id}', 'categoryController@deletecategory');

//Manufacture
Route::get('/addmanufacture', 'manufactureController@addmanufacture');
Route::get('/allmanufacture', 'manufactureController@allmanufacture');
Route::post('/savemanufacture', 'manufactureController@savemanufacture');
Route::get('/edit_manufacture/{manufacture_id}', 'manufactureController@edit_manufacture');
Route::get('/inactivePublication1/{manufacture_id}', 'manufactureController@inactivePublicatnion');
Route::get('/activePublication1/{manufacture_id}', 'manufactureController@activePublication');
Route::post('/updatemanufacture/{manufacture_id}', 'manufactureController@updatemanufacture');
Route::get('/deletemanufacture/{manufacture_id}', 'manufactureController@deletemanufacture');


//Products
Route::get('/addproduct', 'productController@addproduct');
Route::get('/allproduct', 'productController@allproduct');
Route::post('/saveproduct', 'productController@saveproduct');
Route::get('/edit_product/{product_id}', 'productController@edit_product');
Route::get('/inactivePublication2/{product_id}', 'productController@inactivePublicatnion');
Route::get('/activePublication2/{product_id}', 'productController@activePublication');
Route::post('/updateproduct/{product_id}', 'productController@updateproduct');
Route::get('/deleteproduct/{product_id}', 'productController@deleteproduct');


//Slider
Route::get('/addslider', 'sliderController@addslider');
Route::get('/allslider', 'sliderController@allslider');
Route::post('/saveslider', 'sliderController@saveslider');
Route::get('/inactivePublication3/{slider_id}', 'sliderController@inactivePublicatnion');
Route::get('/activePublication3/{slider_id}', 'sliderController@activePublication');
Route::get('/deleteslider/{slider_id}', 'sliderController@deleteslider');

