<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Category::all();
        return view('admin.category.categoryList', compact('data'));
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
        //return $request;
//       dd($request->image);

        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'image' => 'required',
//            'status',
//            'popular',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required'
        ]);

        $category = new Category();
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        //$category->image = $request->input('image');
        $category->status = $request->input('status') ?'1':'0';
        $category->popular = $request->input('popular')? '1':'0';
        $category->meta_title = $request->input('meta_title');
        //dd($request->meta_title);
        $category->meta_description = $request->input('meta_description');
        $category->meta_keywords = $request->input('meta_keywords');
        if($request->hasFile('image')){
            $file = $request->image;
            //dd($file);
            $fileExtension = $file->getClientOriginalExtension();
            $fileName = time().'.'.$fileExtension;
            $file->move('assets/uploads/category/',$fileName);
            $category->image=$fileName;
        }

        session()->flash('success', $data = $category->name);

        $category->save();


        return view('admin.category.addCategory');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('admin.category.addCategory');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Category::find($id);
        return view('admin.category.editCategory', compact('data'));
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
            'name' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'image' => 'required',
//            'status',
//            'popular',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required'
        ]);
        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        //$category->image = $request->input('image');
        $category->status = $request->input('status') ?'1':'0';
        $category->popular = $request->input('popular')? '1':'0';
        $category->meta_title = $request->input('meta_title');
        //dd($request->meta_title);
        $category->meta_description = $request->input('meta_description');
        $category->meta_keywords = $request->input('meta_keywords');
        if($request->hasFile('image')){
            $path = 'assets/uploads/category/'.$request->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->image;
            //dd($file);
            $fileExtension = $file->getClientOriginalExtension();
            $fileName = time().'.'.$fileExtension;
            $file->move('assets/uploads/category/',$fileName);
            $category->image=$fileName;
        }
        session()->flash('success', $category->name);
        $category->update();
        $data = $category;
        return view('admin.category.editCategory', compact('data'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Category::find($id);
//        dd($data);
        if($data->image){
            $path = 'assets/uploads/category/'.$data->image;
            if(File::exists($path)){
                File::delete($path);
            }
        }
//        session()->flash('deleted', $data->name);
        $data -> delete();
        return redirect('categoryList')->with('delete', 'The category deleted successfully');
    }





}
