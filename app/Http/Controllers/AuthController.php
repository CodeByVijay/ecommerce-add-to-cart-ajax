<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Customer Register
    public function register(Request $req)
    {
        $req->validate([
            'fname'=>'required',
            'lname'=>'required',
            'email'    => 'email|required|unique:users,email',
            'password' => 'required|min:6',
            'mobile'=>'required|unique:users,mobile|min:10|max:10'
        ]);
        $customer = new User();
        $customer->fname = $req->fname;
        $customer->lname = $req->lname;
        $customer->mobile = $req->mobile;
        $customer->email = $req->email;
        $customer->password = Hash::make($req->password);
        $customer->save();

        return redirect()->route('userLogin')->with('success', $req->fname.' Registration Success Please Login.');
    }

    // Customer Login
    public function login(Request $req)
    {
        $req->validate([
            'email'    => 'required',
            'password' => 'required',
        ]);
        $credentials = $req->only('email', 'password');
        if (Auth::attempt($credentials)) {
            if (Auth::user()->is_admin !== 1) {
                return redirect()->route('customerDashboard');
            }
        }
        return redirect()->route('userLogin')->with('error', 'Oppes! You have entered invalid credentials');
    }
}
