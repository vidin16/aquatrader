<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {

	return view('welcome');

	// $product = \App\Models\Product::find(1);
	// return $product->type;

	// $type = \App\Models\Type::find(2);
	// return $type->products;

	// $user = \App\Models\User::find(1);
	// return $user->orders;

	// $order = \App\Models\Order::find(1);
	// return $order->user;

	// $order = \App\Models\Order::find(3);
	// return $order;

	// $order = \App\Models\Order::find(1);
	// return $order->products;

	// $type = new \App\Models\Type();
	// $type->name = "shark";
	// $type->save();

	// return $type;

	// $user = \App\Models\User::create([
	// 	"username"=>"JoeJai",
	// 	"firstname"=>"Joe",
	// 	"lastname"=>"Jai",
	// 	"email"=>"joe.jai@gmail.com",
	// 	"password"=>"bla"
	// 	]);

	// return $user;

});

Route::get('about', "PagesController@showAbout");
Route::get('contact', "PagesController@showContact");

Route::get('login', "LoginController@showLoginForm");
Route::post('login', "LoginController@processLogin");
Route::get('logout', "LoginController@logout");

Route::get('cart', "CartController@showCart");
Route::post('cartItems', "CartController@addItem");
Route::post('orders', "CartController@checkout");

Route::get('types/{id}', function($id){ // create types controller and put it under show//

	$type = \App\Models\Type::find($id);
	 return view('types',['type'=>$type]);

	 // return view('types',compact("type")); same thing as above
});

// Route::get('products/create',"ProductsController@create");

// Route::post('products', "ProductsController@store");

// Route::get('products/{id}/edit',"ProductsController@edit");

// Route::put('products/{id}',"ProductsController@update");

Route::resource('products', 'ProductsController');


// Route::get('users/create', "UsersContollers@create");

// Route::get('users/{id}',"UsersContollers@show");

// Route::post('users',"UsersContollers@store");

// Route::get('users/{id}/edit',"UsersContollers@edit"

// Route::put('users/{id}',"UsersContollers@update"

Route::resource('users', 'UsersController');









