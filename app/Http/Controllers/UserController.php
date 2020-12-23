<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Session;

class UserController extends Controller
{
    /*login function */
    public function login(Request $request){
        $invalid = '';
        return view('login',['invalid'=>$invalid]);
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
        $user = User::where(['email'=>$request->email])->first();
        if(!$user || !Hash::check($request->password, $user->password)){
            $invalid = "Invalid Email id or password";
            return view('login',['invalid'=>$invalid]);
        }else{
            $request->session()->put('user',$user);
            return redirect('home');
        }
        
        //return $request->input();
    }

    /* Registration Function */
    public function register(){
        return view('register');
    }
    public function registerUser(Request $request){
        $validatedData = $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6'
        ],[
            'name.required' => 'Name is Required',
            'email.required'=> 'Email is Required',
            'email.unique'  => 'This email is already exists',
            'password.required' => 'Password is required'
        ]);
        DB::table('users')->insert([
            'name'    =>$request->name,
            'email'   =>$request->email,
            'password'=>Hash::make($request->password)
        ]);
        return redirect('login');
    }
    public function logout(){
        Session::flush();
        Session::forget('user');
        return redirect('home');
    } 
}
