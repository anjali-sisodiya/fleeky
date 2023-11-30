<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
   //********************Add brand page*******************************
public function add_brands(){
    return view('adminlte.pages.brand.add_brand');
    }
    
    //********************Add brand data*******************************
    
    public function add_brand(Request $request)
    {
        $request->validate([
            'brand' => 'required|string|max:255|unique:brands,name',
            'image' => 'image',
        ]);
    
        $brand = new Brand;
        $brand->name = $request->input('brand');
        $brand->is_home =0;

        if($request->post('is_home')!==null){
        $brand->is_home =1;

        }

    if ($request->hasFile('image') && $request->file('image')->isValid()) {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('adminlte/upload/', $filename);
        $brand->image = 'adminlte/upload/' . $filename;
        }
    $result = $brand->save();
    if ($result) {
    return redirect('/brand_list')->with('success', 'Brand added successfully');
    } else {
    return "Something went wrong";
    }
    }
    
    
    //**************************brands List******************************
    public function brand_list() {
    $show = Brand::all();
    return view('adminlte.pages.brand.brand_list' , ['show' => $show]);
    }
    
    //********************Edit brand data*******************************
    
    public function edit_brand($id){
    $show = Brand::find($id);
    return view('adminlte.pages.brand.edit_brand', ['show' => $show]);
    }
    
    //********************Update brands data*******************************
    
    public function update_brand(Request $request, $id)
    {
    $request->validate([
    'brand' => 'required|string|max:255|unique:brands,name,'.$id,
    ]);
    $brand = Brand::find($id);
    if (!$brand) {
    return redirect('/brand_list')->with('error', 'brand not found.');
    }
    $brand->name = $request->input('brand');
    $isHome = $request->has('is_home') ? 1 : 0;
    $brand->is_home = $isHome;
     if ($request->hasFile('image') && $request->file('image')->isValid()) {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('adminlte/upload/', $filename);
        $brand->image = 'adminlte/upload/' . $filename;
        }
    $result = $brand->update(); 
    if ($result) {
    return redirect('/brand_list')->with('success', 'brand updated successfully');
    } else {
    return redirect('/brand_list')->with('error', 'Failed to update brand');
    }
    }
    
    //********************Delete brands data*******************************
    
    public function delete_brand($id){
    $show = Brand::find($id);
    if (!$show) {
    return redirect('/brand_list')->with('error', 'brand not found or already deleted.');
    }
    $show->delete();
    return redirect('/brand_list')->with('success', 'brand deleted successfully.');
    }
    
    //********************brands Status Fetch*******************************
    
    public function brand_status(Request $request, $status, $id){
    $brand = Brand::find($id);
    if (!$brand) {
    return redirect('/brand_list')->with('error', 'brand not found.');
    }
    $brand->status = $status;
    $brand->save();
    return redirect('/brand_list')->with('success', 'brand status updated.');
    }
}
