<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\HomeBanner;
use Illuminate\Support\Facades\DB;



class HomeBannerController extends Controller
{
    //********************Add home_banner data*******************************

    public function add_home_banners(){
    return view('adminlte.pages.banner.add_home_banner');
     }

   public function add_home_banner(Request $request)
{
    $request->validate([
        'btn_txt' => 'required|string',
        'btn_link' => 'required|string',
        'home_banner_image' => 'required|image',

    ]);

    $home_banner = new HomeBanner;
    $home_banner->btn_txt = $request->input('btn_txt');
    $home_banner->btn_link = $request->input('btn_link');
    $home_banner->desc = $request->input('desc');
    $home_banner->short_desc = $request->input('short_desc');

    if ($request->hasFile('home_banner_image') && $request->file('home_banner_image')->isValid()) {
        $file = $request->file('home_banner_image');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('adminlte/upload/', $filename);
        $home_banner->image = 'adminlte/upload/' . $filename;
    }
    $result = $home_banner->save();
    
    if ($result) {
        return redirect('/home_banner_list')->with('success', 'Banner added successfully');
    } else {
        return "Something went wrong";
    }
}


//**************************home_banner List******************************

     
    public function home_banner_list() {
    $show = HomeBanner::all();
    return view('adminlte.pages.banner.home_banner_list', ['show' => $show]);
}



      public function edit_home_banner($id){
    $show = HomeBanner::find($id);

    if (!$show) {
        return redirect('/home_banner_list')->withErrors(['error' => 'Banner not found.']);
    }


    return view('adminlte.pages.banner.edit_home_banner', ['show' => $show]);
}


   public function update_home_banner(Request $request, $id)
{
     $request->validate([
        'btn_txt' => 'required|string',
        'btn_link' => 'required|string',
        'home_banner_image' => 'required|image',

    ]);

    $home_banner = HomeBanner::find($id);

    if (!$home_banner) {
        return redirect('/home_banner_list')->withErrors(['error' => 'home_banner not found.']);
    }

    $home_banner->btn_txt = $request->input('btn_txt');
    $home_banner->btn_link = $request->input('btn_link');
    $home_banner->desc = $request->input('desc');
    $home_banner->short_desc = $request->input('short_desc');
    
    if ($request->hasFile('home_banner_image') && $request->file('home_banner_image')->isValid()) {
        // Handle file upload
        $file = $request->file('home_banner_image');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('adminlte/upload/', $filename);
        $home_banner->image = 'adminlte/upload/' . $filename;
    }

    $result = $home_banner->update();

    if ($result) {
        return redirect('/home_banner_list')->with('success', 'Banner updated successfully');
    } else {
        return redirect('/home_banner_list')->withErrors(['error' => 'Failed to update home_banner']);
    }
}



    public function delete_home_banner($id){
        $show = HomeBanner::find($id);
        
        if (!$show) {
            return redirect('/home_banner_list')->with('error', 'Banner not found or already deleted.');
        }
    
        $show->delete();
        return redirect('/home_banner_list')->with('success', 'Banner deleted successfully.');
    }

    public function home_banner_status(Request $request, $status, $id){
        $home_banner = HomeBanner::find($id);
    
        if (!$home_banner) {
            return redirect('/home_banner_list')->with('error', 'Banner not found.');
        }
    
        $home_banner->status = $status;
        $home_banner->save();
    
        return redirect('/home_banner_list')->with('success', 'Banner status updated.');
    }
    

}
