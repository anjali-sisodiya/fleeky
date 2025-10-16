<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin\User;



class Adminlte extends Controller
{
   // **************************Dashboard******************************

    public function index(){
           return view('adminlte.index');
    }
   // **************************Registration******************************

    public function register(){
        return view('adminlte.pages.examples.register');
    }


  public function store_register_info(Request $request)
    {
        
        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed',
        ]);

       
        User::create([
            'name' => $validated['username'],
            'email' => $validated['email'],
            'password' => $validated['password'],
        ]);

        return redirect()->route('login')->with('success', 'Registration Successfully.');

    }
    
   //  ***********************Login************************************
    
    public function login(){
        return view('adminlte.pages.examples.login');
     }


 public function store_login_info(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
        if(Auth::attempt($credentials))
        {
         return redirect()->intended('admin_2')->with('success','Login Sucessfull');
        }
         return back()->withErrors([
             'email' => 'The provided credentials do not match our records.',
         ]);
    }

     
   //  ***********************Logout************************************


    public function logout()
{
    session()->forget('User_name');
    return redirect('/login');
}

   //  ***************Password Recovery******************************

     public function recov_pass(){
        return view('adminlte.pages.examples.recover-password');
     }

}
