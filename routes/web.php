<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


// UI routes
Route::get('/', function () {
    return view('auth');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/products', function () {
    return view('products');
});

Route::get('/members', function () {
    return view('members');
});
Route::get('/categories', function () {
    return view('categories');
    });

// API routes
Route::post('/register', [userController::class, 'register']);

Route::post('/login', [userController::class, 'login']);



// routes/web.php
Route::get('/test', function () {
    return 'Test route is working!';
});
