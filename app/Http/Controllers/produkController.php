<?php

namespace App\Http\Controllers;

use App\Models\Produk; // Pastikan model Product sudah ada
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class produkController extends Controller
{
    // Menampilkan daftar produk
    public function index()
    {
        $pages = 'products';
        $items = Produk::orderBy('name', 'asc')->paginate();
        return view('admin.produk.index', compact('pages', 'items'));
    }

    public function indexTop()
    {
        $topProducts = Produk::where('top', true)->get();
        return view('index', compact('topProducts'));
    }

    public function getProduk()
    {
        $pages = 'products';
        $items = Produk::orderBy('name', 'asc')->paginate();
        $topProducts = Produk::where('top', true)->take(5)->get();
        return view('index', compact('pages', 'items', 'topProducts'));
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
                'stok' => 'required|numeric',
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
                'stok' => $request->stok,
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

    public function edit(Produk $item)
    {
        $pages = 'products';
        return view('admin.produk.edit', compact('pages', 'item'));
    }

    // Mengubah parameter update
    public function update(Request $request, $id)
    {
        try {
            // Validating the incoming request
            $request->validate([
                'name' => 'required|string|max:255',
                'jenis' => 'required|string|max:255',
                'price' => 'nullable|numeric',
                'stok' => 'nullable|numeric',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'top' => 'nullable|boolean',
                'description' => 'nullable|string|max:255',
            ]);

            // Find the product by ID
            $produk = Produk::findOrFail($id);

            // Update fields
            $produk->name = $request->name;
            $produk->jenis = $request->jenis;
            $produk->stok = $request->stok;
            $produk->price = $request->price;

            // Handle image upload if it exists
            if ($request->hasFile('image')) {
                // Delete old image if it exists
                if ($produk->image) {
                    Storage::disk('public')->delete($produk->image);
                }

                // Store the new image and update the path
                $path = $request->file('image')->store('images', 'public');
                $produk->image = $path;
            }
            $produk->top = $request->has('top') ? 1 : 0;
            $produk->desc = $request->desc;

            // Save the updated product
            $produk->save();

            // Redirect back with success message
            return redirect()->route('admin.produk')->with('status', 'Data berhasil diperbarui')->with('tipe', 'success')->with('icon', 'fas fa-feather');
        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('Error updating product: ' . $e->getMessage());

            // Redirect with error message
            return redirect()->back()->with('status', $e->getMessage())
                ->with('tipe', 'error')
                ->with('icon', 'fas fa-feather');
        }
    }

    // Menghapus produk
    public function destroy(Produk $item)
    {
        Produk::destroy($item->id);

        return redirect()->route('admin.produk')->with('status', 'Data berhasil Dihapus!')->with('tipe', 'success')->with('icon', 'fas fa-feather');
    }
}
