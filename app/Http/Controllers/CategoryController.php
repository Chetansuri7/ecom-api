<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->input('categoryName');
        $category->keyword = $request->input('merchandisingKeyword');
        $category->icon = "";
        $category->top_category_banner = $request->input('isTopBanner') ? true : false;
        $category->user_id = 0;
        if($category->save()){
            $photo = $request->file('categoryIcon');
            if($photo != null){
                $ext = $photo->getClientOriginalExtension();
                $fileName = rand(1, 500000000) . '.' . $ext;
                if($ext == 'jpg' || $ext == 'png'){
                    if($photo->move(public_path(), $fileName)){
                        $category = Category::find($category->id);
                        $category->icon = url('/') . '/images/' . $fileName;
                        $category->save();
                    }
                }
            }
            return redirect()->back()->with('success', 'Saved successfully!');
        }
        return redirect()->back()->with('failed', 'Could not save!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category=category::find($id);
        return view('category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->input('categoryName');
        $category->keyword = $request->input('merchandisingKeyword');
        $category->icon = "";
        $product->top_category_banner = $request->input('isTopBanner') ? true : false;
        $category->user_id = 0;
        if($category->save()){
            $photo = $request->file('categoryIcon');
            if($photo != null){
                $ext = $photo->getClientOriginalExtension();
                $fileName = rand(1, 500000000) . '.' . $ext;
                if($ext == 'jpg' || $ext == 'png'){
                    if($photo->move(public_path(), $fileName)){
                        $category = Category::find($category->id);
                        $category->icon = url('/') . '/images/' . $fileName;
                        $category->save();
                    }
                }
            }
            return redirect()->back()->with('success', 'Saved successfully!');
        }
        return redirect()->back()->with('failed', 'Could not save!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    
    {
        if(Category::destroy($id))
        {
            return redirect()->back()->with('deleted',"Deleted Successfully");
        }
        return redirect()->back()->with('deleted-failed',"Could Not Delete");
    }
}














