<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
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
            $cartCount = Cart::where('user_id',$userId)->count();
            //$cartList = Cart::where('user_id',$userId)->get();
            //$products = Product::all();
            $cartList = DB::table('cart')
                        ->join('products','products.id','=','cart.product_id')
                        ->where('cart.user_id',$userId)
                        ->select('products.*', 'cart.id as cart_id')
                        ->get();
            //return view('productCart',['CartLists'=>$cartList,'Products'=>$products]);
            return view('productCart',['CartLists'=>$cartList,'cartCount'=>$cartCount]);
        }else{
            return view('productCart');
        }
    }
    public function removeToCart(Request $request){
        $cart = Cart::find($request->cart_id);
        $cart->delete();
        return redirect('cart-list');
    }
    public function orderList(){
        $userId = Session::get('user')['id'];
        $total = DB::table('cart')
                    ->join('products','products.id','=','cart.product_id')
                    ->where('cart.user_id',$userId)
                    ->select('products.*', 'cart.id as cart_id')
                    ->sum('products.price');
        $cartList = DB::table('cart')
                    ->join('products','products.id','=','cart.product_id')
                    ->where('cart.user_id',$userId)
                    ->select('products.*', 'cart.id as cart_id')
                    ->get();
        return view('productOrder',['total'=>$total,'CartLists'=>$cartList]);
    }
    public function buyNow(Request $request){
        $userId = Session::get('user')['id'];
        $allCart = Cart::where('user_id',$userId)->get(); 
        foreach($allCart as $cart){
            $order = new Order;
            $order->product_id = $cart->product_id;
            $order->user_id = $cart->user_id;
            $order->status = 'Pending';
            $order->address = $request->address;
            $order->payment_method = $request->method;
            $order->payment_status = 'Pending';
            $order->save();
            Cart::where('user_id',$userId)->delete();
        }
        return redirect("/");
    }
    public function orderedListed(){
        $userId = Session::get('user')['id'];
        $orderList = DB::table('orders')
                    ->join('products','products.id','=','orders.product_id')
                    ->where('orders.user_id',$userId)
                    ->get();
        return view('orderList',['OrderLists'=>$orderList]);
    }
    public function viewProducts(){
        $data = Product::all();
        return view('admin.productView',['products'=>$data]);
    }
    public function addProduct(){
        return view('admin.productAdd',['successmsg'=>'']);
    }
    public function addingProduct(Request $request){
        $validatedData = $request->validate([
            'name'        => 'required',
            'price'       => 'required',
            'category'    => 'required',
            'description' => 'required',
            'gallery'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],[
            'name.required'=> 'Name is Required',
            'price.required'=> 'Price is Required',
            'category.required'=> 'Category is Required',
            'description.required'=> 'Description is Required',
            'gallery.required'=> 'Image is Required'
        ]);
        $imageName = time().'.'.$request->gallery->extension();  
        $request->gallery->storeAs('images', $imageName);
        /*DB::table('users')->insert([
            'name'    =>$request->name,
            'email'   =>$request->email,
            'password'=>Hash::make($request->password)
        ]);*/
        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->description = $request->description;
        $product->gallery = $imageName;
        $product->save();
        return view('admin.productAdd',['successmsg'=>'Product Added Successfully']);
    }
}
