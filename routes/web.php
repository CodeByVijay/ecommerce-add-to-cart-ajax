<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/superadmin', function () {
    return view('adminLogin');
})->name('login');
Route::post('admin-login', [AdminController::class, 'adminLogin'])->name('adminLogin');

Route::group(['prefix' => 'admin',  'middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('index');
    })->name('adminDashboard');

    Route::get('product', [AdminController::class, 'addNewProduct'])->name('addProductForm');
    Route::get('all-products', [AdminController::class, 'allProduct'])->name('allProduct');
    Route::get('edit-product/{pid}', [AdminController::class, 'editProduct'])->name('editProductForm');

    Route::post('add-new-product', [AdminController::class, 'productAddEdit'])->name('addProductPost');
    Route::get('delete-products/{pid}', [AdminController::class, 'deleteProduct'])->name('deleteProduct');
    Route::post('edit-product', [AdminController::class, 'editProductPost'])->name('editProductPost');

    // Admin Logout Route
    Route::get('logout', function () {
        Auth::logout();
        return redirect()->route('login');
    })->name('adminLogout');
});




Route::get('/', function () {
    return view('users.login');
})->name('userLogin');

Route::get('/register', function () {
    return view('users.register');
});

Route::post('customer-register', [AuthController::class, 'register'])->name('customerRegister');
Route::post('customer-login', [AuthController::class, 'login'])->name('customerLogin');


Route::group(['prefix' => 'customer',  'middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('users.index');
    })->name('customerDashboard');

Route::post('add-to-cart',[HomeController::class,'addToCart'])->name('addToCart');
Route::get('cart',[HomeController::class,'cart'])->name('goToCart');
Route::get('delete-cart/{cartid}',[HomeController::class,'deleteCart'])->name('deleteCart');


    // User Logout Route
    Route::get('logout', function () {
        Auth::logout();
        return redirect()->route('userLogin');
    })->name('userLogout');;
});

Route::get('unauthorize-access', function () {
    return view('errors.401');
})->name('401');
