<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function create()
    {
        return view('pages.pelanggan.create');
    }

    public function store(Request $request)
    {
        $costumer = $request->validate([
            'costumer_name' => ['required'],
            'address' => ['required'],
            'phone_number' => ['required'],
        ]);
        Pelanggan::create($costumer);
        return redirect()->back()->with('success', 'Pelanggan Berhasil di Tambahkan!');

    }
}
