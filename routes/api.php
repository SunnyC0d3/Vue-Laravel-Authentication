<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'prefix' => 'admin'

], function ($router) {
    Route::post('/login', [AdminController::class, 'login']);
    Route::post('/register', [AdminController::class, 'register']);
    Route::post('/logout', [AdminController::class, 'logout']);
    Route::post('/refresh', [AdminController::class, 'refresh']);
    Route::get('/user-profile', [AdminController::class, 'userProfile']); 
});

Route::group([
    'prefix' => 'customer'

], function ($router) {
    Route::post('/login', [CustomerController::class, 'login']);
    Route::post('/register', [CustomerController::class, 'register']);
    Route::post('/logout', [CustomerController::class, 'logout']);
    Route::post('/refresh', [CustomerController::class, 'refresh']);
    Route::get('/user-profile', [CustomerController::class, 'userProfile']); 
});

Route::group([
    'prefix' => 'products'

], function ($router) {
    Route::get('/get-products', [ProductController::class, 'getProducts']);
});

Route::redirect('/api/admin/user-profile', '/api/admin/login');
