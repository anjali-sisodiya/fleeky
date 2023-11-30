<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\Size;
use Illuminate\Http\Request;
class SizeController extends Controller
{
    
//********************Add size data*******************************
public function add_sizes(){
return view('adminlte.pages.size.add_size');
}


public function add_size(Request $request)
{
$request->validate([
'size' => 'required|string|max:255',
]);
$size = new Size;
$size->size = $request->input('size');
$result = $size->save();
if ($result) {
return redirect('/size_list')->with('success', 'size added successfully');
} else {
return "Something went wrong";
}
}


//**************************size List******************************
public function size_list() {
$show = Size::all();
return view('adminlte.pages.size.size_list' , ['show' => $show]);
}
public function edit_size($id){
$show = Size::find($id);
return view('adminlte.pages.size.edit_size', ['show' => $show]);
}


public function update_size(Request $request, $id)
{
$request->validate([
'size' => 'required|string|max:255|unique:sizes,size,'.$id,

]);
$size = Size::find($id);
if (!$size) {
return redirect('/size_list')->with('error', 'size not found.');
}
$size->size = $request->input('size');
$result = $size->update(); 
if ($result) {
return redirect('/size_list')->with('success', 'size updated successfully');
} else {
return redirect('/size_list')->with('error', 'Failed to update size');
}
}


public function delete_size($id){
$show = Size::find($id);
if (!$show) {
return redirect('/size_list')->with('error', 'size not found or already deleted.');
}
$show->delete();
return redirect('/size_list')->with('success', 'size deleted successfully.');
}


public function size_status(Request $request, $status, $id){
$size = Size::find($id);
if (!$size) {
return redirect('/size_list')->with('error', 'size not found.');
}
$size->status = $status;
$size->save();
return redirect('/size_list')->with('success', 'size status updated.');
}
}