<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProdukController;
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

Route::get('/login', [AuthController::class, "login"])->name('login');
Route::post('/login', [AuthController::class, "authenticate"])->name('auth.login');
Route::get('/logout',[ AuthController::class, 'logout']);

Route::middleware('isLogin')->group(function () {
    Route::middleware('isAdmin')->group(function (){
        Route::get('/account', [DashboardController::class, 'account'])->name('account');
    });
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/product/goods', [DashboardController::class, 'product'])->name('product.goods');

    Route::get('/product/goods', [ProdukController::class, 'create'])->name('goods.create');
    Route::post('/product/goods/create', [ProdukController::class, 'store'])->name('goods.store');
    Route::get('/product/goods/edit/{id}', [ProdukController::class, 'edit'])->name('goods.edit');
    Route::patch('/product/goods/update/{id}', [ProdukController::class, 'update'])->name('goods.update');
    Route::get('/product/goods/delete/{id}', [ProdukController::class, 'delete'])->name('goods.delete');
    Route::patch('/product/stock/{id}', [ProdukController::class, 'UpdateStock'])->name('stock');

    Route::get('/product/penjualan', [DashboardController::class, 'purchase'])->name('penjualan');
    Route::post('/product/penjualan/create', [PenjualanController::class, 'store'])->name('penjualan.store');

    Route::get('/product/detail', [DashboardController::class, 'detail'])->name('detail');
    Route::delete('/product/detail/delete/{id}', [PenjualanController::class, 'destroy'])->name('detail.delete');
});
