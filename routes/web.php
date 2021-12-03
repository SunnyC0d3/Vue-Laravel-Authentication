<?php

use Illuminate\Support\Facades\Route;
use App\Models\Order;
use App\Http\Controllers\MainController;

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

Route::get('/', [ MainController::class, 'index' ]);
Route::get('/login', [ MainController::class, 'login' ])->name('login');
Route::get('/register', [ MainController::class, 'register' ]);
