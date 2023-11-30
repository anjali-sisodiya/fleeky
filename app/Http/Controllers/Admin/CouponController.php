<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Admin\Coupon;


class CouponController extends Controller
{
    //********************Add coupon data*******************************

    public function add_coupons(){
        return view('adminlte.pages.coupon.add_coupon');
     }

   public function add_coupon(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'code' => 'required|string|max:255|unique:coupons',
        'value' => 'required|string|max:255',
        'type' => 'required|in:Value,Per',
        'is_one_time' => 'required|in:1,0',
        'min_order_amt' => 'required|numeric',

    ]);

    $coupon = new Coupon;
    $coupon->title = $request->input('title');
    $coupon->code = $request->input('code');
    $coupon->value = $request->input('value');
    $coupon->type = $request->input('type');
    $coupon->min_order_amt = $request->input('min_order_amt');
    $coupon->is_one_time = $request->input('is_one_time');
    
    $result = $coupon->save();
    
    if ($result) {
        return redirect('/coupon_list')->with('success', 'Coupon added successfully');
    } else {
        return "Something went wrong";
    }
}


//**************************coupon List******************************

     
     public function coupon_list() {
        $show = Coupon::all();
       return view('adminlte.pages.coupon.coupon_list' , ['show' => $show]);

       }

       public function edit_coupon($id){
        $show = Coupon::find($id);
        return view('adminlte.pages.coupon.edit_coupon', ['show' => $show]);
    }

    public function update_coupon(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'code' => 'required|string|max:255|unique:coupons,code,'.$id,
            'value' => 'required|string|max:255',
            'type' => 'required|in:Value,Per',
            'is_one_time' => 'required|in:1,0',
            'min_order_amt' => 'required|numeric',


        ]);
    
        $coupon = Coupon::find($id);
    
        if (!$coupon) {
            return redirect('/coupon_list')->with('error', 'Coupon not found.');
        }
    
        $coupon->title = $request->input('title');
        $coupon->code = $request->input('code');
        $coupon->value = $request->input('value');
        $coupon->type = $request->input('type');
        $coupon->min_order_amt = $request->input('min_order_amt');
        $coupon->is_one_time = $request->input('is_one_time');
        $result = $coupon->update(); 
    
        if ($result) {
            return redirect('/coupon_list')->with('success', 'Coupon updated successfully');
        } else {
            return redirect('/coupon_list')->with('error', 'Failed to update coupon');
        }
    }
    


    public function delete_coupon($id){
        $show = Coupon::find($id);
        
        if (!$show) {
            return redirect('/coupon_list')->with('error', 'Coupon not found or already deleted.');
        }
    
        $show->delete();
        return redirect('/coupon_list')->with('success', 'coupon deleted successfully.');
    }

    public function coupon_status(Request $request, $status, $id){
        $coupon = Coupon::find($id);
    
        if (!$coupon) {
            return redirect('/coupon_list')->with('error', 'Coupon not found.');
        }
    
        $coupon->status = $status;
        $coupon->save();
    
        return redirect('/coupon_list')->with('success', 'Coupon status updated.');
    }
    
}
