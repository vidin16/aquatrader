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

Route::get('about', function(){

	 return view('about');
});

Route::get('contact', function(){


	 return view('contact');
});

Route::get('types/{id}', function($id){

	$type = \App\Models\Type::find($id);
	 return view('types',['type'=>$type]);

	 // return view('types',compact("type")); same thing as above
});

Route::get('products/create', function(){

	 return view('createProduct');
});

Route::post('products', function(\App\Http\Requests\CreateProductRequest $request){

	$product = \App\Models\Product::create($request->all());

	//move file for tempt location to productPhotos(folders name)
	$fileName = \Carbon\Carbon::now()->timestamp."_product.jpg";

	$request->file('photo')->move('productphotos', $fileName);

	$product->photo = $fileName;
	$product->save();

	return redirect('types/'.$product->type->id);
});

Route::get('products/{id}/edit', function($id){

	$product = \App\Models\Product::find($id);

	 return view('editProduct',compact('product'));
});

Route::put('products/{id}', function($id,\App\Http\Requests\UpdateProductRequest $request){

	$product = \App\Models\Product::find($id);

	$product->fill($request->all());

	$product->save();

	return redirect("types/".$product->type->id);
	 
});

Route::get('users/create', function(){

	 return view('createUser');
});


Route::get('users/{id}', function($id){

	$user = \App\Models\User::find($id);
	return view('users', ['user'=>$user]);
});

Route::post('users', function(\App\Http\Requests\CreateUserRequest $request){

	$user = \App\Models\User::create($request->all());

	//encrypt password
	$user->password = bcrypt($user->password);
	$user->save();

	return redirect('users/'.$user->id);
});

Route::get('users/{id}/edit', function($id){

	$user = \App\Models\User::find($id);

	 return view('editUser',compact('user'));
});

Route::put('users/{id}', function($id,\App\Http\Requests\UpdateUserRequest $request){

	$user = \App\Models\User::find($id);

	$user->fill($request->all());

	$user->save();

	return redirect("users/".$user->id);
	 
});









