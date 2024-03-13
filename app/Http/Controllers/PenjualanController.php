<?php

namespace App\Http\Controllers;

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

    public function store(Request $request, $id)
    {
        $costumer = $request->validate([
            'costumer_name' => ['required'],
            'address' => ['required'],
            'phone_number' => ['required'],
        ]);
        Pelanggan::create($costumer);

        $products = Produk::find($id);
        $products->update([
            'stock' => $products->stock - $request->stock
        ]);
        
        return redirect()->back()->with('success', 'Penjualan Berhasil di Tambahkan!');
    }
}
