<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

Route::get('/', function () {
    return view('dashboard');
});

Route::resource('users', UserController::class)
->missing(function () {
    return Redirect::route('users.index');
});

Route::resource('products', ProductController::class)
->missing(function () {
    return Redirect::route('products.view');
});

Route::get('login', function () {
    return view('users.login');
});

Route::post('post-login', 'App\Http\Controllers\AuthController@postLogin'); 

?>