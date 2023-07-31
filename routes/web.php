<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('start');

Route::get('shop_keeper', function () {
    return view('admin.index');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->prefix('dashboard')->group(function () {
    Route::get('/', [HomeController::class, 'redirect'])->name('dashboard');
    Route::get('/2', function () {
        return view('dashboard');
    })->name('dashboard2');
    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);
});

