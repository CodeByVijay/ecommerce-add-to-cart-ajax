<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cartIncrement(Request $request)
    {
        if($request->qty != ""){
            if($request->qty == 0){
                Cart::find($request->cart_id)->delete();
                return response()->json(["success"=>"Cart Delete"]);
            }
            $price = Product::find($request->pid);
            $cartPrice = Cart::find($request->cart_id);
            $cartPrice->qty = $request->qty;
            $cartPrice->price = $price->price * $request->qty;
            $cartPrice->update();
            return response()->json(["success"=>"Cart Update","price"=>$cartPrice->price]);
        }
    }
}
