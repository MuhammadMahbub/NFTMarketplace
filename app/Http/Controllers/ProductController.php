<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {      
        $all_products = Product::latest()->get();

        return view('admin.product.index', compact('all_products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::latest()->get();
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id'           => 'required',
            'name'                  => 'required',
            'price'                 => 'required',
            'quantity'              => 'required',
            'image'                 => 'image',
        ]);

        $product = Product::create($request->except('_token') + ['created_at' => Carbon::now(), 'image' => 'default.png']);

        if ($request->hasFile('image')) {

            $product_image  = $request->file('image');
            $filename    = uniqid() . '.' . $product_image->extension('image');
            $location    = public_path('uploads/images/product');

            $product_image->move($location, $filename);

            $product->image = $filename;
            $product->save();
        }

        return redirect()->route('product.index')->withSuccess('Product created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {   
        $categories = Category::all();
        return view('admin.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'category_id'           => 'required',
            'name'                  => 'required',
            'price'                 => 'required',
            'quantity'              => 'required',
            'image'                 => 'image',
        ]);

        $product->update($request->except('_token') + ['created_at' => Carbon::now()]);

        if ($request->hasFile('image')) {

            $product_image  = $request->file('image');
            $filename    = uniqid() . '.' . $product_image->extension('image');
            $location    = public_path('uploads/images/product');

            $product_image->move($location, $filename);

            $product->image = $filename;
            $product->save();
        }

        return redirect()->route('product.index')->withSuccess('Product update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')->with('warning', 'Product deleted');
    }
}
