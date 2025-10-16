<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Admin\Tax;
use Illuminate\Http\Request;

class TaxController extends Controller
{
   //********************Add tax page*******************************
public function add_taxs(){
return view('adminlte.pages.tax.add_tax');
}

//********************Add tax data*******************************

public function add_tax(Request $request)
{
$request->validate([
'tax_value' => 'required|string|max:255|unique:taxes,tax_value',
]);
$tax = new Tax;
$tax->tax_value = $request->input('tax_value');
$tax->tax_desc = $request->input('tax_desc');
$result = $tax->save();
if ($result) {
return redirect('/tax_list')->with('success', 'tax added successfully');
} else {
return "Something went wrong";
}
}


//**************************taxs List******************************
public function tax_list() {
$show = Tax::all();
return view('adminlte.pages.tax.tax_list' , ['show' => $show]);
}

//********************Edit tax data*******************************

public function edit_tax($id){
$show = Tax::find($id);
return view('adminlte.pages.tax.edit_tax', ['show' => $show]);
}

//********************Update taxs data*******************************

public function update_tax(Request $request, $id)
{
$request->validate([
'tax_value' => 'required|string|max:255|unique:taxes,tax_value,'.$id,

]);
$tax = Tax::find($id);
if (!$tax) {
return redirect('/tax_list')->with('error', 'tax not found.');
}
$tax->tax_value = $request->input('tax_value');
$tax->tax_desc = $request->input('tax_desc');
$result = $tax->update(); 
if ($result) {
return redirect('/tax_list')->with('success', 'tax updated successfully');
} else {
return redirect('/tax_list')->with('error', 'Failed to update tax');
}
}

//********************Delete taxs data*******************************

public function delete_tax($id){
$show = Tax::find($id);
if (!$show) {
return redirect('/tax_list')->with('error', 'tax not found or already deleted.');
}
$show->delete();
return redirect('/tax_list')->with('success', 'tax deleted successfully.');
}

//********************taxs Status Fetch*******************************

public function tax_status(Request $request, $status, $id){
$tax = Tax::find($id);
if (!$tax) {
return redirect('/tax_list')->with('error', 'tax not found.');
}
$tax->status = $status;
$tax->save();
return redirect('/tax_list')->with('success', 'tax status updated.');
}
}
