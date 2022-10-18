<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function cart()
    {
        $products = Cart::join('products', 'products.id', '=', 'carts.product_id')->where('carts.user_id', auth()->user()->id)->select('carts.id as cart_id', 'products.product_name', 'products.id as product_id', 'products.image','carts.price', 'carts.qty')->get();
        return view('users.cart', compact('products'));
    }
    public function addToCart(Request $req)
    {
        $product_price = Product::find($req->pid);
        $cart = new Cart();
        $cart->product_id = $req->pid;
        $cart->user_id = $req->user_id;
        $cart->qty = 1;
        $cart->price = $product_price->price;
        $cart->save();
        $qty = Cart::where('user_id', $req->user_id)->count();
        return response()->json(['success' => 'success', 'qty' => $qty]);
    }

    public function deleteCart($cartid)
    {
        Cart::find($cartid)->delete();
        return redirect()->back();
    }
}
