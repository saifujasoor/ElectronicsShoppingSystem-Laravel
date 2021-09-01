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

// Route::get('/', function () {
//     return view('welcome');
// });

// Home Page
Route::get('/','IndexController@index');

Route::match(['get','post'],'/admin','AdminController@login')->name('admin-login');

Auth::routes();
// Route for Demo Ordes 
Route::get('/demoorder',function(){
	return view('order');
});
// Banners Route
Route::match(['get', 'post'],'/admin/add-banners','BannersController@banners');
// Category Listing Page
Route::get('/products/{url}','ProductsController@products');
// Product Details Page
Route::get('/product/{id}','ProductsController@product');
// Get Product Attribute Color
Route::get('/get-product-color','ProductsController@getProductColor');
// Get Product Attribute Stock
Route::get('/get-product-stock','ProductsController@getProductStock');
// Get Product Attribute Ram-Rom
Route::get('/get-product-ramrom','ProductsController@getProductRamRom');
// Display Contact Page
Route::match(['get','post'],'/contact','ContactController@contact');
// Contact Form Submit
Route::post('/contact-us','ContactController@contactus');
// About Page 
Route::get('/about','ContactController@about');
// Customer Register Page
Route::get('/register-user','UsersController@registeruser');
// Customer Register Form Submit
Route::post('/user-register','UsersController@userRegister');
// Customer Login Page
Route::get('/login-user','UsersController@loginuser')->name('customer-login');
// Customer Login Form Submit
Route::post('/user-login','UsersController@userLogin');
// Customer Logout Route
Route::get('/logout-user','UsersController@userlogout');
// Customer Forgot Password Page
Route::get('/forgot-password','UsersController@forgotPassword');
// Customer Forgot Password Form Submit
Route::post('/user-forgot-password','UsersController@userForgotPassword');
// Search Products
Route::post('/search-products','ProductsController@searchProducts');
// All Routes after Login

Route::group(['middleware' => 'FrontLogin'],function(){
	// Users Account Page
	Route::match(['get','post'], 'account','UsersController@account');
	// Check User Current Password
	Route::post('/check-user-pwd','UsersController@chkUserPassword');
	// Update User Password
	Route::post('/update-user-pwd','UsersController@updatePassword');
	// User Add Shipping Address Form Submit
	Route::post('/add-address','DeliveryAddressController@addAddress');
	// Delete Shipping Address
	Route::get('/delete-address/{id}','DeliveryAddressController@deleteAddress');
	// Get City for Address
	Route::get('/get-address-city','DeliveryAddressController@getCity');
	// Get State for Address
	Route::get('/get-address-state','DeliveryAddressController@getState');
	// Route for Edit Address Ajax
	Route::get('/edit-address','DeliveryAddressController@editAddress'); 
	// Route for Edit Address Ajax
	Route::post('/edit-add/{id}','DeliveryAddressController@updateAddress'); 
	// Route For add to Cart
	Route::get('/add-to-cart','CartController@addtoCart');
	// Route For Shopping Cart
	Route::match(['get','post'],'/shopping-cart','CartController@showCart');
	// Delete Product From Cart Page
	Route::get('/cart-delete-product/{id}','CartController@deleteCartProduct');
	// Thank you Page
	Route::get('/thank-you',function(){
		return view('cart.thank_you');
	});
	// My Orders Page & View Orders Details
	Route::get('/orders','OrderController@myOrder');
	// Place Order Route Ajax
	Route::get('/placeorder','CartController@placeorder');
	// Route for Quantity
	Route::get('/get-quantity','CartController@getQuantity');
	// Route for Checkout Page
	Route::get('/checkout','OrderController@checkout');
	// Route for Get Address
	Route::get('/get-address','OrderController@getAddress');
	// Ajax Route Cancel Order
	Route::get('/cancel-Orders','OrderController@cancelOrders');
	// Ajax Order Return
	Route::get('/order-return','OrderController@returnOrders');
	// PDF Invoice
	Route::get('/view-pdf-invoice/{id}','OrderController@PDFInvoice');
	// Downlaod PDF Invoice
	Route::get('/download-pdf-invoice/{id}','OrderController@PDFInvoiceDownload');
});

Route::group(['middleware' => 'AdminLogin'],function(){
    Route::get('/admin/dashboard','AdminController@dashboard');	
	Route::get('/admin/settings','AdminController@settings');
	Route::get('/admin/check-pwd','AdminController@chkPassword');
	Route::match(['get','post'],'/admin/update-pwd','AdminController@updatePassword');

	// Categories Routes (Admin)
	Route::match(['get', 'post'], '/admin/add-category','CategoryController@addCategory');
	Route::match(['get', 'post'], '/admin/edit-category/{id}','CategoryController@editCategory');
	Route::get('/admin/delete-category/{id}','CategoryController@deleteCategory');
	Route::get('/admin/view-category','CategoryController@viewCategories');

	// Products Routes (Admin)
	Route::match(['get', 'post'], '/admin/add-product','ProductsController@addProduct');
	Route::get('/admin/view-products','ProductsController@viewProducts');
	Route::get('/admin/export-products','ProductsController@exportProducts');
	Route::post('/admin/import-products','ProductsController@importProducts');
	Route::match(['get', 'post'], '/admin/edit-product/{id}','ProductsController@editProduct');
	Route::get('/admin/delete-product-image/{id}','ProductsController@deleteProductImage');
	Route::get('/admin/delete-product/{id}','ProductsController@deleteProduct');
	Route::get('/admin/delete-alt-image/{id}','ProductsController@deleteAltImage');

	// Products Attributes (Admin)
	Route::match(['get', 'post'], '/admin/add-attributes/{id}','ProductsController@addAttributes');
	Route::match(['get','post'],'/admin/edit-attributes/{id}','ProductsController@editAttributes');
	Route::match(['get', 'post'], '/admin/add-images/{id}','ProductsController@addImages');
	Route::get('/admin/delete-attribute/{id}','ProductsController@deleteAttribute');

	// Orders Route (Admin)
	Route::get('/admin/view-orders','OrderController@viewOrders');
	Route::get('/admin/cancel-orders','OrderController@OrderCancel');
	Route::match(['get','post'], '/admin/edit-order-status/{id}','OrderController@editStatus');

	// Sales Route (Admin)
	Route::get('/admin/view-sales','SalesController@viewSales');
	Route::get('/admin/view-sales-return','SalesReturnController@viewSalesReturn');

	// Company Routes (Admin)
	Route::match(['get','post'], '/admin/add-company','CompanyController@addCompany');
	Route::get('/admin/view-company','CompanyController@viewCompany');
	Route::match(['get','post'], '/admin/edit-company/{id}','CompanyController@editCompany');
	Route::get('/admin/delete-company/{id}','CompanyController@deleteCompany');

	// State Routes (Admin)
	Route::match(['get','post'], '/admin/add-state','StateController@addState');
	Route::get('/admin/view-state','StateController@viewState');
	Route::match(['get','post'], '/admin/edit-state/{id}','StateController@editState');
	Route::get('/admin/delete-state/{id}','StateController@deleteState');

	// City Routes (Admin)
	Route::match(['get','post'], '/admin/add-city','CityController@addCity');
	Route::get('/admin/view-city','CityController@viewCity');
	Route::match(['get','post'], '/admin/edit-city/{id}','CityController@editCity');
	Route::get('/admin/delete-city/{id}','CityController@deleteCity');

	// Area Routes (Admin)
	Route::match(['get','post'], '/admin/add-area','AreaController@addArea');
	Route::get('/admin/view-area','AreaController@viewArea');
	Route::match(['get','post'], '/admin/edit-area/{id}','AreaController@editArea');
	Route::get('/admin/delete-area/{id}','AreaController@deleteArea');
});

Route::get('/logout','AdminController@logout');

