<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditProductRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
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
        $products = Product::with('categories')->orderBy('id', 'desc')->paginate(20);
        // dd($products);
        return view('product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cate = Category::all();
        return view('product.create', ['categories' => $cate]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->short_description = $request->short_description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->status = $request->status;
        $product->category_id = $request->category_id;

        if ($request->hasFile('thumbnail_url')) {
            $file = $request->thumbnail_url;
            $fileHasname = $file->hashName();
            $filename = $request->name . '_' . $fileHasname;
            $product->thumbnail_url = $file->storeAs('images/products', $filename);
        }

        $product->save();

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $pro)
    {
        $cate = Category::all();
        return view('product.create', ['product' => $pro, 'categories' => $cate]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditProductRequest $request, Product $pro)
    {
        // $product = Product::find($id);
        $pro->name = $request->name;
        $pro->description = $request->description;
        $pro->short_description = $request->short_description;
        $pro->price = $request->price;
        $pro->quantity = $request->quantity;
        $pro->status = $request->status;
        $pro->category_id = $request->category_id;
        $pro->thumbnail_url = $request->thumbnail_url;

        if ($request->hasFile('thumbnail_url')) {
            $file = $request->thumbnail_url;
            $fileHasname = $file->hashName();
            $filename = $request->name . '_' . $fileHasname;
            $pro->thumbnail_url = $file->storeAs('images/products', $filename);
        } else {
            $pro->thumbnail_url = $request->thumbnail_url;
        }

        $pro->save();

        $pro->update();

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Product $pro)
    {
        if ($pro->delete()) {
            return redirect()->route('products.index');
        }
    }
}
