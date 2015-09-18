<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
     public function __construct(){

          $this->middleware('auth', ['only' => ['create','store','edit','update']]);
            $this->middleware('admin', ['only' => ['create','store','edit','update']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
         return view('createProduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(\App\Http\Requests\CreateProductRequest $request)
    {
        //
        $product = \App\Models\Product::create($request->all());

        //move file for tempt location to productPhotos(folders name)
        $fileName = \Carbon\Carbon::now()->timestamp."_product.jpg";

        $request->file('photo')->move('productphotos', $fileName);

        $product->photo = $fileName;
        $product->save();

        return redirect('types/'.$product->type->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        
        $product = \App\Models\Product::find($id);
        return view('product', ['product'=>$product]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
        $product = \App\Models\Product::find($id);

        return view('editProduct',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(\App\Http\Requests\UpdateProductRequest $request, $id)
    {
        //
        $product = \App\Models\Product::find($id);

        $product->fill($request->all());

        $product->save();

        return redirect("types/".$product->type->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
