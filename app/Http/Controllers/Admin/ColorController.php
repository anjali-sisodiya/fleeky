<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
  
//********************Add color page*******************************
public function add_colors(){
return view('adminlte.pages.color.add_color');
}

//********************Add color data*******************************

public function add_color(Request $request)
{
$request->validate([
'color' => 'required|string|max:255|unique:colors',
]);
$color = new Color;
$color->color = $request->input('color');
$result = $color->save();
if ($result) {
return redirect('/color_list')->with('success', 'color added successfully');
} else {
return "Something went wrong";
}
}


//**************************Colors List******************************
public function color_list() {
$show = Color::all();
return view('adminlte.pages.color.color_list' , ['show' => $show]);
}

//********************Edit Color data*******************************

public function edit_color($id){
$show = Color::find($id);
return view('adminlte.pages.color.edit_color', ['show' => $show]);
}

//********************Update Colors data*******************************

public function update_color(Request $request, $id)
{
$request->validate([
'color' => 'required|string|max:255|unique:colors,color,'.$id,

]);
$color = Color::find($id);
if (!$color) {
return redirect('/color_list')->with('error', 'color not found.');
}
$color->color = $request->input('color');
$result = $color->update(); 
if ($result) {
return redirect('/color_list')->with('success', 'color updated successfully');
} else {
return redirect('/color_list')->with('error', 'Failed to update color');
}
}

//********************Delete Colors data*******************************

public function delete_color($id){
$show = Color::find($id);
if (!$show) {
return redirect('/color_list')->with('error', 'color not found or already deleted.');
}
$show->delete();
return redirect('/color_list')->with('success', 'color deleted successfully.');
}

//********************Colors Status Fetch*******************************

public function color_status(Request $request, $status, $id){
$color = Color::find($id);
if (!$color) {
return redirect('/color_list')->with('error', 'color not found.');
}
$color->status = $status;
$color->save();
return redirect('/color_list')->with('success', 'color status updated.');
}
}