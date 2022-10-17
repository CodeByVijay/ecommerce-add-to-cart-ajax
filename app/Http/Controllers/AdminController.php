<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function adminLogin(Request $req)
    {
        $req->validate([
            'email'    => 'required',
            'password' => 'required',
        ]);
        $credentials = $req->only('email', 'password');
        if (Auth::attempt($credentials)) {
            if (Auth::user()->is_admin !== 0) {
                return redirect()->route('adminDashboard');
            }
        }
        return redirect()->route('login')->with('error', 'Oppes! You have entered invalid credentials');
    }

    public function addNewProduct()
    {
        return view('add-product');
    }
    public function allProduct()
    {
        $products = Product::get();
        return view('products',compact('products'));
    }
    public function editProduct($pid)
    {
        $product= Product::find($pid);
        return view('edit-product',compact('product'));
    }

    public function productAddEdit(Request $req)
    {

        if ($req->pid) {
            $product = Product::find($req->pid);
            $req->validate([
                'product_name' => 'required',
                'qty' => 'required',
                'desc' => 'required'
            ]);
            $msg = "Product Edited.";
        } else {
            $product = new Product();
            $req->validate([
                'product_name' => 'required',
                'image' => 'required|mimes:png,jpg,jpeg',
                'qty' => 'required',
                'desc' => 'required'
            ], [
                'image.mimes' => 'Please choose only png,jpg,jpeg image.',
            ]);
            $msg = "Product Added successfully.";
        }
        if ($req->file('image')) {
            $imageName = time() . '.' . $req->image->extension();
            $req->image->move(public_path('product_images'), $imageName);
            $product->image = $imageName;
        }
        $product->product_name = $req->product_name;
        $product->qty = $req->qty;
        $product->desc = $req->desc;
        $product->save();

        return redirect()->route('allProduct')->with('success', $msg);
    }

    public function deleteProduct($pid)
    {
        Product::find($pid)->delete();
        return redirect()->route('allProduct')->with('success', "Product Successfully Delete.");
    }
}
