<?php

namespace App\Http\Controllers;

use App\products;
use App\categories;
use App\OtherImage;
use App\Price;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = products::join('categories','products.category_id','=','categories.id')
        ->select('products.*','categories.categories_Name as categories_Name')
        ->get();
        return view('Products.view_products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = categories::all();
        return view('Products.add_products', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
       
        $this->validate(request(), [
            'item_id' => 'required',
            'product_name' => 'required|max:255',
            'isActive' => 'required',
            'category_id' => 'required',
            'main_image_path' => 'required',
            'product_description' => 'required',
            'other_image_path' => 'image|mimes:jpeg,bmp,png|size:2000',
            'price' => 'required',
            'quantity' => 'required',
        ]);

        $filename = $request->main_image_path->store('photos');

        $products = new products;
        $products->item_id = $request->get('item_id');
        $products->product_name = $request->get('product_name');
        $products->isActive = $request->get('isActive');
        $products->category_id = $request->get('category_id');
        $products->main_image_path = $filename;
        $products->product_description = $request->get('product_description');
        $products->save();

        foreach ($request->other_image_path as $photo) {
            $filename = $photo->store('photos');
            $otherImage = new OtherImage;
            $otherImage->product_id = $products->id;
            $otherImage->image_path = $filename;
            $otherImage->save();
        }

        for ($i=0; $i<count($request->price); $i++) {
            $price = new Price;
            $price->product_id = $products->id;
            $price->quantity = $request->get('quantity[i]');
            $price->price = $request->get('price[i]');
            $price->save();
        }

        // $products = products::create(request(['item_id', 'product_name', 'isActive','category_id', 'main_image_path', 'product_description']));
        return redirect()->to('categories');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = products::join('categories','products.category_id','=','categories.id')
        // ->join('other_image','products.id','=','other_image.product_id')
        // ->join('price','products.id','=','price.product_id')
        ->where('products.id',$id)
        ->select('products.*','categories.categories_Name as categories_Name','categories.id as categories_id')
        ->first();
        return view('Products.edit_products', compact('products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'item_id' => 'required',
            'product_name' => 'required|max:255',
            'isActive' => 'required',
            'category_id' => 'required',
            'main_image_path' => 'required',
            'product_description' => 'required',
            'other_image_path' => 'image|mimes:jpeg,bmp,png|size:2000',
            'price' => 'required',
            'quantity' => 'required',
        ]);

        $filename = $request->main_image_path->store('photos');

        $products = products::find($id);
        $products->item_id = $request->get('item_id');
        $products->product_name = $request->get('product_name');
        $products->isActive = $request->get('isActive');
        $products->category_id = $request->get('category_id');
        $products->main_image_path = $filename;
        $products->product_description = $request->get('product_description');
        $products->save();

        foreach ($request->other_image_path as $photo) {
            $filename = $photo->store('photos');
            $otherImage = new OtherImage;
            $otherImage->product_id = $products->id;
            $otherImage->image_path = $filename;
            $otherImage->save();
        }

        for ($i=0; $i<count($request->price); $i++) {
            $price = new Price;
            $price->product_id = $products->id;
            $price->quantity = $request->get('quantity[i]');
            $price->price = $request->get('price[i]');
            $price->save();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(products $products)
    {
        //
    }
}
