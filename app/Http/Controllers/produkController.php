<?php

namespace App\Http\Controllers;

use App\Models\Produk; // Pastikan model Product sudah ada
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class produkController extends Controller
{
    // Menampilkan daftar produk
    public function index(Request $request)
    {
        $pages = 'products';
        $items = Produk::orderBy('name', 'asc')->paginate();
        return view('admin.produk.index', compact('request', 'pages', 'items'));
    }

    // Menampilkan form untuk membuat produk baru
    public function create()
    {
        $pages = 'products';
        return view('admin.produk.create', compact('pages'));
    }

    // Menyimpan produk baru
    public function store(Request $request)
    {
        try {
            // Validate the request
            $request->validate([
                'name' => 'required|string|max:255',
                'price' => 'required|numeric',
                'jenis' => 'required|string|max:255',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Handle the image upload if there's any
            $photoPath = null;
            if ($request->hasFile('image')) {
                $photoPath = $request->file('image')->store('photos', 'public');
            }

            // Create the product
            Produk::create([
                'name' => $request->name,
                'price' => $request->price,
                'jenis' => $request->jenis,
                'image' => $photoPath,
            ]);

            // Redirect or return response with success message
            return redirect()->route('admin.produk')->with('status', 'Data berhasil tambahkan!')->with('tipe', 'success')->with('icon', 'fas fa-feather');
        } catch (\Exception $e) {
            // Log the error message
            Log::error('Error creating product: ' . $e->getMessage());

            // Redirect or return with an error message
            return redirect()->back()->with('error', 'Terjadi kesalahan saat membuat produk.');
        }
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
        try {
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

            return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui.');
        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('Error updating product: ' . $e->getMessage());

            // Redirect with an error message
            return redirect()->back()->with('error', 'Failed to create product, please try again.');
        }
    }


    // Menghapus produk
    public function destroy(Produk $item)
    {
        Produk::destroy($item->id);

        return redirect()->route('admin.produk')->with('status', 'Data berhasil Dihapus!')->with('tipe', 'success')->with('icon', 'fas fa-feather');
    }
}
