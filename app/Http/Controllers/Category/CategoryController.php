<?php

namespace App\Http\Controllers\Category;

use App\Category;
use App\Http\Controllers\Controller;
use App\Transformers\CategoryTransformer;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::all();

        if($request->wantsJson()){
            return  fractal()
                ->collection($categories)
                ->parseIncludes(['products'])
                ->transformWith(new CategoryTransformer())
                ->toArray();
        }

        return view('categories', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('newCategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category;
        $category->ar_name = $request->ar_name;
        $category->en_name = $request->en_name;
        $category->save();
        /*
         * Here stands logo upload function
         * */
        $category->uploadImage($request);



        if($request->wantsJson()){
            return  fractal()
                ->item($category)
                ->parseIncludes(['products'])
                ->transformWith(new CategoryTransformer())
                ->toArray();
        }

        return redirect()->route('categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category, Request $request)
    {
        if($request->wantsJson()){
            return  fractal()
                ->item($category)
                ->parseIncludes(['products'])
                ->transformWith(new CategoryTransformer())
                ->toArray();
        }

        return null;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('editCategory', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->ar_name = $request->ar_name;
        $category->en_name = $request->en_name;
        $category->save();
        /*
         * Here stands logo upload function
         * */
        $category->uploadImage($request);




        if($request->wantsJson()){
            return  fractal()
                ->item($category)
                ->parseIncludes(['products'])
                ->transformWith(new CategoryTransformer())
                ->toArray();
        }

        return redirect()->route('categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();


        return redirect()->route('categories');
    }
}
