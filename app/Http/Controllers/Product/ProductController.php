<?php

namespace App\Http\Controllers\Product;

use App\Category;
use App\Product;
use App\Http\Requests\StoreProductRequest;
use App\Transformers\CategoryTransformer;
use App\Transformers\ProductTransformer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request)
    {
        $products = Product::all();

        if($request->wantsJson()){
            return  fractal()
                    ->collection($products)
                    ->transformWith(new ProductTransformer)
                    ->toArray();
        }

        return view('products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('newProduct', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $product = new Product;
        $product->ar_name = $request->ar_name;
        $product->en_name = $request->en_name;
        $product->ar_description = $request->ar_description;
        $product->en_description = $request->en_description;
        $product->category_id = $request->category_id;
        $product->save();
        /*
         * Here stands logo upload function
         * */
        $product->uploadImage($request);



        if($request->wantsJson()){
            return  fractal()
                ->item($product)
                ->transformWith(new ProductTransformer)
                ->toArray();
        }

        return redirect()->route('products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product, Request $request)
    {
        if($request->wantsJson()){
            return  fractal()
                ->item($product)
                ->transformWith(new ProductTransformer)
                ->toArray();
        }

        return null;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('editProduct', compact(['product', 'categories']));
    }

    /**
     * Show product gallery
     *
     * @param int $product
     * @return \Illuminate\Http\Response
     */
    public function gallery(Product $product)
    {
        $images = $product->images;
        return view('productImages', compact(['images', 'product']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->ar_name = $request->ar_name;
        $product->en_name = $request->en_name;
        $product->ar_description = $request->ar_description;
        $product->en_description = $request->en_description;
        $product->category_id = $request->category_id;
        $product->save();
        /*
         * Here stands logo upload function
         * */
        $product->uploadImage($request);




        if($request->wantsJson()){
            return  fractal()
                ->item($product)
                ->transformWith(new ProductTransformer)
                ->toArray();
        }

        return redirect()->route('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->clients()->detach();
        File::delete($product->logo);
        $product->delete();


        return redirect()->route('products');
    }
}
