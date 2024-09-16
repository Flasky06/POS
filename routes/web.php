<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/products', function () {
    return view('products');
});

Route::get('/customers', function () {
    return view('customers');
});
Route::get('/categories', function () {
    return view('categories');
});
