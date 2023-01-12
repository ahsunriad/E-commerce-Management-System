<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::all();
//        $category = Category::all();
        return view('admin.product.productList', compact('data'));
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
//        dd($request);
//        return $request;
        $request->validate([
            'category_id',
            'name',
            'small_description',
            'description',
            'original_price',
            'selling_price',
            'image',
            'quantity',
            'tax',
            'status',
            'trending',
            'meta_title',
            'meta_description',
            'meta_keywords'
        ]);
        $product = new Product();
        $product->category_id = $request->input('category_id');
        $product->name = $request->input('name');
        $product->small_description = $request->input('small_description');
        $product->description = $request->input('description');
        $product->original_price = $request->input('original_price');
        $product->selling_price = $request->input('selling_price');
        $product->quantity = $request->input('quantity');
        $product->tax = $request->input('tax');
        $product->status = $request->input('status')?'1':'0';
        $product->trending = $request->input('trending')?'1':'0';
        $product->meta_title = $request->input('meta_title');
        $product->meta_description = $request->input('meta_description');
        $product->meta_keywords = $request->input('meta_keywords');
        if ($request->has('image')){
            $file = $request->image;
            //dd($file);
            $fileExtension = $file->getClientOriginalExtension();
            $fileName = time().'.'.$fileExtension;
            $file->move('assets/uploads/product/',$fileName);
            $product->image=$fileName;
        }
//        return $product;
        $product->save();
        session()->flash('added', $product->name);
        return redirect('addProduct');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $category = Category::all();
        return view('admin.product.addProduct', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Product::find($id);
//        $category = Category::find($data->category_id);
//        return $category;
        return view('admin.product.editProduct', compact('data'));
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
        $request->validate([
            'category_id',
            'name',
            'small_description',
            'description',
            'original_price',
            'selling_price',
//            'image',
            'quantity',
            'tax',
            'status',
            'trending',
            'meta_title',
            'meta_description',
            'meta_keywords'
        ]);
        $product=Product::find($id);
//        $product->category_id = $request->input('category_id');
        $product->name = $request->input('name');
        $product->small_description = $request->input('small_description');
        $product->description = $request->input('description');
        $product->original_price = $request->input('original_price');
        $product->selling_price = $request->input('selling_price');
        $product->quantity = $request->input('quantity');
        $product->tax = $request->input('tax');
        $product->status = $request->input('status')?'1':'0';
        $product->trending = $request->input('trending')?'1':'0';
        $product->meta_title = $request->input('meta_title');
        $product->meta_description = $request->input('meta_description');
        $product->meta_keywords = $request->input('meta_keywords');
        if ($request->has('image')){
            $file = $request->image;
            //dd($file);
            $fileExtension = $file->getClientOriginalExtension();
            $fileName = time().'.'.$fileExtension;
            $file->move('assets/uploads/product/',$fileName);
            $product->image=$fileName;
        }
        session()->flash('updated', $product->name);
        $product->update();
        $data = $product;
        $category = Category::find($data->category_id);
        return view('admin.product.editProduct', compact('data', 'category'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Product::find($id);
        if ($data->image){
            $path = 'assets/uploads/product/'.$data->image;
            if(File::exists($path)){
                File::delete($path);
            }
        }
        $status = $data->name;
        session()->flash('deleted', 'status');
        $data->delete();
        return redirect('productList');
    }
}
