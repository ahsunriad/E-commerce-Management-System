<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $featured_products = Product::where('trending', '1')->take(5)->get();
        $trending_category = Category::where('popular', '1')->take(5)->get();
        return view('frontend.index',compact('featured_products','trending_category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return view();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return view();
    }
    public function category()
    {
        $categories = Category::where('status','1')->get();
        return view('frontend.category', compact('categories'));
    }
    public function viewCategory($slug){
        if(Category::where('slug',$slug)->exists()){
            $category = Category::where('slug',$slug)->first();
//            return $category;
            $products = Product::where('category_id', $category->id)->get();
//            return $products;
            return view('frontend.products.index', compact('category','products'));
        }
        else{
            redirect('categories');
        }
    }
    public function viewProduct($categorySlug, $productSlug){
        if(Category::where('slug',$categorySlug)->exists()){
            if(Product::where('slug',$productSlug)->exists()){
                $products = Product::where('category_id', $category->id)->get();
                return view('frontend.products.index', compact('',''));
            }
            else{
                redirect('');
            }
        }
        else{
            redirect('categories');
        }
    }

}
