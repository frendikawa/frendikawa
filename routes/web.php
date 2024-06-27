<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::name('home.')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});


Route::prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index.');
    Route::prefix('categories')->name('categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index']);
        Route::post('/', [CategoryController::class, 'store']);
        Route::patch('/', [CategoryController::class, 'update']);
        Route::delete('/', [CategoryController::class, 'destroy']);
    });
    Route::prefix('products')->name('products.')->group(function () {
        Route::resource('/', ProductController::class);
    });

    Route::prefix('users')->name('users.')->group(function () {
        Route::prefix('admin')->name('admin')->group(function () {
            Route::get('admin', [UserController::class, 'admin']);
        });
        Route::prefix('cashier')->name('cashier.')->group(function () {
            Route::get('cashier', [UserController::class, 'cashier']);
        });
    });
});


