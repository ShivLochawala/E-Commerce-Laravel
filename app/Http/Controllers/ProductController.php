<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Session;
use Illuminate\Support\Facades\DB;

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
    public function addToCartList(){
        if(Session::has('user')){
            $userId = Session::get('user')['id'];
            //$cartList = Cart::where('user_id',$userId)->get();
            //$products = Product::all();
            $cartList = DB::table('cart')
                        ->join('products','products.id','=','cart.product_id')
                        ->where('cart.user_id',$userId)
                        ->select('products.*', 'cart.id as cart_id')
                        ->get();
            //return view('productCart',['CartLists'=>$cartList,'Products'=>$products]);
            return view('productCart',['CartLists'=>$cartList]);
        }else{
            return view('productCart');
        }
    }
    public function removeToCart(Request $request){
        $cart = Cart::find($request->cart_id);
        $cart->delete();
        return redirect('cart-list');
    }
}
