<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Menampilkan daftar products
     * Bisa diakses admin & user
     */
    public function index()
    {
        return view('products.index');
    }

    /**
     * Menampilkan form tambah product
     * HANYA admin
     */
    public function create()
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        return view('products.create');
    }

    /**
     * Menyimpan product baru
     * HANYA admin
     */
    public function store(Request $request)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        // Belum pakai database (sesuai praktikum)
        // Biasanya di sini ada Product::create(...)

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully');
    }

    /**
     * Method lain sengaja dikosongkan
     * (biar tidak error resource route)
     */
    public function show($id)
    {
        abort(404);
    }

    public function edit($id)
    {
        abort(404);
    }

    public function update(Request $request, $id)
    {
        abort(404);
    }

    public function destroy($id)
    {
        abort(404);
    }
}
