<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use Session;

class AdminController extends Controller
{
    public function login(){
        $invalid = '';
        return view('admin.login',['invalid'=>$invalid]);
    }
    public function loginUser(Request $request){
        $validatedData = $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:6'
        ],[
            'email.required'=> 'Email is Required',
            'email.unique'  => 'This email is already exists',
            'password.required' => 'Password is required'
        ]);
        $admin = Admin::where(['email'=>$request->email])->first();
        if(!$admin || !Hash::check($request->password, $admin->password)){
            $invalid = "Invalid Email id or password";
            return view('admin.login',['invalid'=>$invalid]);
        }else{
            $request->session()->put('admin',$admin);
            return redirect('admin-home');
        }
        //return $request->input();
    }
    public function home(){
        return view("admin.home");
    }
    public function logout(){
        Session::flush();
        Session::forget('admin');
        return redirect('home');
    } 
}
