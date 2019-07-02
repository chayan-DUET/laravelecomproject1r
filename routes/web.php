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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'WelcomeController@index');
Route::get('/category-view/{id}', 'WelcomeController@category');
//Route::get('/api', 'WelcomeController@api');
Route::get('/contact', 'WelcomeController@contuct');
Route::get('/product-details/{id}', 'WelcomeController@productDetails');

Route::get('/Login/facebook', 'Auth\LoginController@redirectToFacebook');
Route::get('/auth/facebook/callback', 'Auth\LoginController@handleFacebookCallback');
Route::get('/viewCart', 'WelcomeController@viewCart');

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('home');



Route::group(['middleware'=>'AuthenticateMiddleware'],function(){

// category////////

Route::get('/category/add', 'CategoryController@createCategory');

Route::post('/category/save', 'CategoryController@storeCategory');
Route::get('category/manage', 'CategoryController@manageCategory');
Route::get('category/edit/{id}', 'CategoryController@editCategory');
Route::post('category/update', 'CategoryController@updateCategory');
Route::get('category/delete/{slider_id}', 'CategoryController@deleteCategory');


//category end////////  
//
//
//
// manufacture////////


Route::get('/manufacture/add', 'ManufactureController@createManufacture');
Route::post('/manufacture/save', 'ManufactureController@storeManufacture');
Route::get('manufacture/manage', 'ManufactureController@manageManufacture');
Route::get('manufacture/edit/{id}', 'ManufactureController@editManufacture');
Route::post('manufacture/update', 'ManufactureController@updateManufacture');
Route::get('manufacture/delete/{id}', 'ManufactureController@deleteManufacture');
// manufacture info end////////
// 
// 
// 
// product////////


Route::get('/product/add', 'ProductController@createProduct');
Route::post('/product/save', 'ProductController@storeProduct');
Route::get('/product/manage', 'ProductController@manageProduct');
Route::get('/product/view/{id}', 'ProductController@viewProduct');
Route::get('/product/edit/{id}', 'ProductController@editProduct');
Route::post('/product/update', 'ProductController@updateProduct');
Route::get('product/delete/{id}', 'ProductController@deleteProduct');
// product info end////////

//slider//

Route::get('/add_slider', 'sliderController@index');
Route::post('/save_slider', 'sliderController@save_slider');
Route::get('/all_slider', 'sliderController@all_slider');
Route::get('/unactive_slider/{slider_id}', 'sliderController@unactive_slider');
Route::get('/active_slider/{slider_id}', 'sliderController@active_slider');
Route::get('/delete_slider/{slider_id}', 'sliderController@delete_slider');


// manageorder//

Route::get('/manage-order', 'ManageorderController@manage_order');
Route::get('/order-view/{order_id}', 'ManageorderController@order_view');


});
    //////cart///////
Route::post('/add-to-cart', 'CartController@addtocart');
Route::get('/show-cart', 'CartController@showcart');
Route::get('/delete-to-cart/{rowId}', 'CartController@delete_to_cart');
Route::post('/update-cart', 'CartController@update_to_cart');

    //////cart end///////
	
	
	/////Checkout/////////
Route::get('/loging-check', 'CheckoutController@loging_check');
Route::get('/customer-logout', 'CheckoutController@customer_logout');
Route::post('/customer-registration', 'CheckoutController@customer_registration');
Route::post('/customer-login', 'CheckoutController@customer_login');
Route::get('/checkout', 'CheckoutController@customer_checkout');
Route::post('/save-shipping-details', 'CheckoutController@save_shipping_details');
Route::get('/pament', 'CheckoutController@pament');
Route::post('/order-place', 'CheckoutController@order_place');
	
		/////Checkout end/////////
		
  /////payple Checkout /////////
  Route::get('/pay-with-payple', 'PaymentController@paywithpayple');
		
		