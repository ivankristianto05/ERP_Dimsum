<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Material; // Add Material model
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Menampilkan semua produk
    public function index()
    {
        $products = Product::with('materials')->get(); // Eager load materials
        return view('products.index', compact('products'));
    }

    // Menampilkan form untuk membuat produk baru
    public function create()
    {
        $materials = Material::all(); // Ambil semua material
        return view('products.create', compact('materials'));
    }

    // Menyimpan produk baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'codeprodak' => 'required|string|unique:products,codeprodak',
            'harga' => 'required|numeric',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'materials' => 'required|array', // Validate materials array
            'materials.*.id' => 'required|exists:materials,id', // Validate each material ID
            'materials.*.jumlah' => 'required|numeric', // Validate each quantity
        ]);

        // Mengelola upload foto jika ada
        if ($request->hasFile('foto')) {
            $filePath = $request->file('foto')->store('photos', 'public');
            $validatedData['foto'] = $filePath;
        }

        $product = Product::create($validatedData);

        // Attach materials to the product
        foreach ($validatedData['materials'] as $material) {
            $product->materials()->attach($material['id'], ['jumlah' => $material['jumlah']]);
        }

        return redirect()->route('products.index')->with('success', 'Produk berhasil disimpan.');
    }

    // Menampilkan form untuk mengedit produk
    public function edit(Product $product)
    {
        $materials = Material::all(); // Get all materials
        return view('products.edit', compact('product', 'materials'));
    }

    // Memperbarui produk yang sudah ada
    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'materials' => 'required|array', // Validate materials array
            'materials.*.id' => 'required|exists:materials,id', // Validate each material ID
            'materials.*.jumlah' => 'required|numeric', // Validate each quantity
        ]);

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($product->foto) {
                \Storage::disk('public')->delete($product->foto);
            }

            $filePath = $request->file('foto')->store('photos', 'public');
            $validatedData['foto'] = $filePath;
        }

        // Update product details
        $product->update($validatedData);

        // Sync materials with the product
        $materials = [];
        foreach ($validatedData['materials'] as $material) {
            $materials[$material['id']] = ['jumlah' => $material['jumlah']];
        }
        $product->materials()->sync($materials); // Sync materials

        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    // Menghapus produk
    public function destroy(Product $product)
    {
        // Hapus foto jika ada
        if ($product->foto) {
            \Storage::disk('public')->delete($product->foto);
        }

        // Detach all materials before deleting the product
        $product->materials()->detach();
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus.');
    }
}
