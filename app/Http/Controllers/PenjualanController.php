<?php

namespace App\Http\Controllers;

use App\Models\DetailPenjualan;
use App\Models\Pelanggan;
use App\Models\Penjualan;
use App\Models\Produk;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function create()
    {
        return view('pages.penjualan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'address' => 'required',
            'phone_number' => 'required',
        ]);

        $totalPrice = 0;
        foreach ($request->products as $productId) {
            $product = Produk::findOrFail($productId);
            $index = array_search($productId, $request->products);
            $totalPrice += $product->price * $request->quantities[$index];
        }

        $newCustomer = Pelanggan::create([
            'customer_name' => $request->customer_name,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
        ]);

        $newSale = Penjualan::create([
            'pelanggan_id' => $newCustomer->id,
            'sale_date' => date('Y-m-d'),
            'total_price' => $totalPrice,
        ]);

        foreach ($request->products as $productId) {
            $product = Produk::findOrFail($productId);
            $product->update([
                'stock' => $product->stock - $request->quantities[array_search($productId, $request->products)],
            ]);
        }

        foreach ($request->products as $productId) {
            $product = Produk::findOrFail($productId);
            DetailPenjualan::create([
                'penjualan_id' => $newSale->id,
                'barang_id' => $product->id,
                'total_products' => $request->quantities[array_search($productId, $request->products)],
                'subtotal' => $product->price * $request->quantities[array_search($productId, $request->products)],
            ]);
        }

        return redirect('/product/detail')->with('success', 'Sale created successfully');
    }

    public function destroy($id)
    {
        $detail = DetailPenjualan::find($id);
        $detail->delete();

        return redirect('/product/detail')->with('success', 'Sale deleted successfully');
    }
}
