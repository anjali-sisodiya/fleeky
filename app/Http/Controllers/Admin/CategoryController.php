<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Admin\Category;
use Illuminate\Support\Facades\DB;



class CategoryController extends Controller
{

    //********************Add Category data*******************************

    public function add_cat(){
    $categories = DB::table('categories')->where('status', 1)->where(['parent_category_id'=>0])->get();
    return view('adminlte.pages.category.add_cat', ['categories' => $categories]);
     }

   public function add_category(Request $request)
{
    $request->validate([
        'category_name' => 'required|string|max:255',
        'category_slug' => 'required|string|max:255|unique:categories',
        'category_image' => 'required|image',

    ]);

    $category = new Category;
    $category->category_name = $request->input('category_name');
    $category->category_slug = $request->input('category_slug');
    $category->parent_category_id = $request->input('parent_category_id');
    $category->is_home =0;

    if($request->post('is_home')!==null){
    $category->is_home =1;

    }

    if ($request->hasFile('category_image') && $request->file('category_image')->isValid()) {
        $file = $request->file('category_image');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('adminlte/upload/', $filename);
        $category->category_image = 'adminlte/upload/' . $filename;
    }
    $result = $category->save();
    
    if ($result) {
        return redirect('/cat_list')->with('success', 'Category added successfully');
    } else {
        return "Something went wrong";
    }
}


//**************************Category List******************************

     
     public function cat_list() {
        $show = Category::all();
       return view('adminlte.pages.category.cat_list' , ['show' => $show]);

       }

       public function edit_category($id){
        $show = Category::find($id);
        $categories = DB::table('categories')->where('status', 1)->where(['parent_category_id'=>0])->get();

        return view('adminlte.pages.category.edit_cat', ['show' => $show, 'categories' => $categories]);
    }

   public function update_category(Request $request, $id)
{
    $request->validate([
        'category_name' => 'required|string|max:255',
        'category_slug' => 'required|string|max:255|unique:categories,category_slug,'.$id,
        'category_image' => 'image',
    ]);

    $category = Category::find($id);

    if (!$category) {
        return redirect('/cat_list')->withErrors(['error' => 'Category not found.']);
    }

    $category->category_name = $request->input('category_name');
    $category->category_slug = $request->input('category_slug');
    $category->parent_category_id = $request->input('parent_category_id');
    
    // Set is_home based on the checkbox
    $isHome = $request->has('is_home') ? 1 : 0;
    $category->is_home = $isHome;
    
    if ($request->hasFile('category_image') && $request->file('category_image')->isValid()) {
        // Handle file upload
        $file = $request->file('category_image');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('adminlte/upload/', $filename);
        $category->category_image = 'adminlte/upload/' . $filename;
    }

    $result = $category->update();

    if ($result) {
        return redirect('/cat_list')->with('success', 'Category updated successfully');
    } else {
        return redirect('/cat_list')->withErrors(['error' => 'Failed to update category']);
    }
}



    public function delete_category($id){
        $show = Category::find($id);
        
        if (!$show) {
            return redirect('/cat_list')->with('error', 'Category not found or already deleted.');
        }
    
        $show->delete();
        return redirect('/cat_list')->with('success', 'Category deleted successfully.');
    }

    public function category_status(Request $request, $status, $id){
        $category = Category::find($id);
    
        if (!$category) {
            return redirect('/cat_list')->with('error', 'Category not found.');
        }
    
        $category->status = $status;
        $category->save();
    
        return redirect('/cat_list')->with('success', 'Category status updated.');
    }
    
    
    

}
