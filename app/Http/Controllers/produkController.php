<?php

namespace App\Http\Controllers;

use App\Models\Produk; // Pastikan model Product sudah ada
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class produkController extends Controller
{
    // Menampilkan daftar produk
    public function index()
    {
        $products = Produk::all(); // Mengambil semua produk
        return view('admin.produk.index', compact('products'));
    }

    // Menampilkan form untuk membuat produk baru
    public function create()
    {
        return view('admin.produk.create');
    }

    // Menyimpan produk baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        ]);

        $product = new Produk();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;

        // Menyimpan gambar jika ada
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public'); // Simpan ke storage/app/public/images
            $product->image = $path;
        }

        $product->save(); // Menyimpan produk ke database

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit produk
    public function edit($id)
    {
        $product = Produk::findOrFail($id); // Mencari produk berdasarkan ID
        return view('admin.produk.edit', compact('product'));
    }

    // Memperbarui data produk
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        ]);

        $product = Produk::findOrFail($id); // Mencari produk berdasarkan ID
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;

        // Mengupdate gambar jika ada
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }

            $path = $request->file('image')->store('images', 'public'); // Simpan gambar baru
            $product->image = $path;
        }

        $product->save(); // Menyimpan produk yang sudah diperbarui

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil diperbarui.');
    }

    // Menghapus produk
    public function destroy($id)
    {
        $product = Produk::findOrFail($id);
        
        // Hapus gambar dari storage jika ada
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete(); // Menghapus produk dari database

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil dihapus.');
    }
}
