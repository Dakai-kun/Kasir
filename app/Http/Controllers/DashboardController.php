<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Stock;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('pages.dashboard');
    }

    public function account()
    {
        $users = User::all();
        return view('pages.account', compact('users'));
    }

    public function product()
    {
        $products = Produk::all();
        return view('pages.product.good', compact('products'));
    }

    public function stock()
    {
        $stocks = Stock::all();
        return view('pages.product.stock', compact('stocks'));
    }

    public function purchase()
    {
        return view('pages.product.purchase');
    }
}
