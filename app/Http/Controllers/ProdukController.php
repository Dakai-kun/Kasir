<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdukController extends Controller
{
    public function create()
    {
        $products = Produk::all();
        return view('pages.product.good', compact('products'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'product_name' => ['required'],
            'price' => ['required'],
            'stock' => ['required'],
        ]);
        $product = Produk::create($data);

        Stock::create([
            'user_id' => Auth::user()->id,
            'product_id' => $product->id,
            'total_stock' => $product->stock,
        ]);
        return redirect()->back()->with('success', 'Produk Berhasil di Tambahkan!');
    }

    public function edit(Produk $product)
    {
        return view('pages.product.good.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'product_name' => ['required'],
            'price' => ['required'],
        ]);
        $product = Produk::find($id);
        $product->update($data);
        return redirect()->back()->with('success', 'Produk Berhasil di Update!');
    }
    
    public function UpdateStock(Request $request, $id)
    {
        $request->validate([
            'stock' => ['required']
        ]);

        if($request->stock < 1){
            return back()->with('err', 'Silahkan input stock yang lebih dari 0');
        }
        
        $stock = Produk::find($id);
        $stock->update([
            'stock' => $stock->stock + $request->stock,
        ]);

        return back()->with('success', 'Stock Berhasil di Update!');
    }

    public function delete($id)
    {
        $product = Produk::find($id);
        $product->delete();
        return redirect()->back()->with('success', 'Produk Berhasil di Hapus!');
    }
}
