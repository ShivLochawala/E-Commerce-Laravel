<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
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
}
