<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Product;
use App\Models\ProductMaterial;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Menampilkan semua produk
    public function index()
    {
        $products = Product::with('materials')->get();
        return view('products.index', compact('products'));
    }

    // Menampilkan form untuk membuat produk baru
    public function create()
    {
        $materials = Material::all();
        return view('products.create',compact('materials'));
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
        ]);

        // Mengelola upload foto jika ada
        if ($request->hasFile('foto')) {
            $fileName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('uploads'), $fileName);
            $validatedData['foto'] = 'uploads/' . $fileName;
        }

        $insert = Product::create($validatedData);

        $bahan = array_map(function($item) use ($insert) {
            $item['product_id'] = $insert->id; // Menambahkan key 'id' dengan nilai 1
            return $item;
        }, $request->post('item'));
        ProductMaterial::insert($bahan);

        return redirect()->route('products.index')->with('success', 'Produk berhasil disimpan.');
    }

    // Menampilkan form untuk mengedit produk
    public function edit(Product $product)
    {
        $materials = Material::all();
        $productMaterial = ProductMaterial::where('product_id',$product->id)->get();
        return view('products.edit', compact('materials','product','productMaterial'));
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
        ]);

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($product->foto) {
                \Storage::disk('public')->delete($product->foto);
            }
            $fileName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('uploads'), $fileName);
            $validatedData['foto'] = 'uploads/' . $fileName;
        }

        ProductMaterial::where('product_id',$product->id)->delete();

        $bahan = array_map(function($item) use ($product) {
            $item['product_id'] = $product->id; // Menambahkan key 'id' dengan nilai 1
            return $item;
        }, $request->post('item'));
        ProductMaterial::insert($bahan);

        $product->update($validatedData);

        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    // Menghapus produk
    public function destroy(Product $product)
    {
        // Hapus foto jika ada
        if ($product->foto) {
            \Storage::disk('public')->delete($product->foto);
        }

        ProductMaterial::where('product_id',$product->id)->delete();

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus.');
    }
}
