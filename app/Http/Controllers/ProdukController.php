<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
     // Tampilkan semua produk
    public function listProduk()
    {
        $products = Product::all();
        return view('pages.produk.index', compact('products'));
    }

    // Tampilkan form tambah produk
    public function createProduk(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'price' => 'required|numeric|min:0',
        ]);

        Product::create([
            'name' => $request->name,
            'category' => $request->category,
            'price' => $request->price,
        ]);

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan.');
    }

    // Update produk
    public function updateProduk(Request $request, $id)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'price'    => 'required|numeric|min:0',
        ]);

        $product = Product::findOrFail($id);
        $product->update([
            'name'     => $request->name,
            'category' => $request->category,
            'price'    => $request->price,
        ]);

        return redirect()->back()->with('success', 'Produk berhasil diperbarui.');
    }

    // Hapus produk
    public function deleteProduk($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->back()->with('success', 'Produk berhasil dihapus.');
    }
}
