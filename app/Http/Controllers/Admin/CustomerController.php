<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // **************************customers List******************************
    public function customer_list()
    {
        $show = Customer::all();
        return view('adminlte.pages.customer.customer_list', ['show' => $show]);
    }

    // ********************Edit customer data*******************************
    public function show_customer($id)
    {
        $customer = Customer::find($id);
        return view('adminlte.pages.customer.show_customer', ['customer' => $customer]);
    }

    // ********************customers Status Fetch*******************************
    public function customer_status(Request $request, $status, $id)
    {
        $customer = Customer::find($id);
        if (!$customer) {
            return redirect('/customer_list')->with('error', 'customer not found.');
        }
        $customer->status = $status;
        $customer->save();
        return redirect('/customer_list')->with('success', 'customer status updated.');
    }
}
