<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Session;
class ProductController extends Controller
{
    public function product(){
        $data = Product::all();
        return view('product',['products'=>$data]);
    }
    public function productDetails($id){
        $details = Product::find($id);
        return view('productDetail',['productDetail'=>$details]);
    }
    public function productSearch(Request $request){
        $details = Product::where('name','like','%'.$request->search.'%')->get();
        return view('productSearch',['products'=>$details]);
    }
    public function addToCart(Request $request){
        if($request->session()->has('user')){
            $cart = new Cart;
            $cart->product_id = $request->product_id;
            $cart->user_id = $request->session()->get('user')['id'];
            $cart->save();
            return redirect('/home');
        }else{
            return redirect('/login');
        }
    }
    public static function cartItemCount(){
        $userId = Session::get('user')['id'];
        return Cart::where('user_id',$userId)->count();
    }
}
