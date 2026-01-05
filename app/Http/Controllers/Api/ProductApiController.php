<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductApiController extends Controller
{
    /**
     * Menampilkan semua data product
     * GET /api/products
     */
    public function index()
    {
        $products = Product::all();

        return response()->json([
            'success' => true,
            'data' => $products
        ]);
    }

    /**
     * Menyimpan product baru
     * POST /api/products
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'price' => 'required|integer',
        ]);

        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Product berhasil ditambahkan',
            'data' => $product
        ], 201);
    }

    /**
     * Menampilkan detail product
     * GET /api/products/{id}
     */
    public function show($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $product
        ]);
    }

    /**
     * Update data product
     * PUT /api/products/{id}
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product tidak ditemukan'
            ], 404);
        }

        $product->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Product berhasil diupdate',
            'data' => $product
        ]);
    }

    /**
     * Menghapus product
     * DELETE /api/products/{id}
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product tidak ditemukan'
            ], 404);
        }

        $product->delete();

        return response()->json([
            'success' => true,
            'message' => 'Product berhasil dihapus'
        ]);
    }
}
