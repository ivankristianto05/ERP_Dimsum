<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;
use Illuminate\Support\Facades\Storage;

class VendorController extends Controller
{
    // Menampilkan daftar semua vendor
    public function index()
    {
        $vendors = Vendor::all(); // Mengambil semua data vendor
        return view('vendor.index', compact('vendors'));
    }

    // Menampilkan form tambah vendor baru
    public function create()
    {
        return view('vendor.create'); // Tampilkan form create
    }

    // Menyimpan data vendor baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'email' => 'required|email|unique:vendors,email',
            'phone' => 'required|string',
            'notes' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/vendor_images');
        }

        Vendor::create([
            'name' => $request->name,
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
            'notes' => $request->notes,
            'image_path' => $path,
        ]);

        return redirect()->route('vendor.index')->with('success', 'Vendor added successfully');
    }

    // Menampilkan form edit vendor
    public function edit(Vendor $vendor)
    {
        return view('vendor.edit', compact('vendor'));
    }

    // Memperbarui data vendor di database
    public function update(Request $request, Vendor $vendor)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'email' => 'required|email|unique:vendors,email,' . $vendor->id,
            'phone' => 'required|string',
            'notes' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $path = $vendor->image_path;
        if ($request->hasFile('image')) {
            if ($path) {
                Storage::delete($path); // Hapus gambar lama jika ada
            }
            $path = $request->file('image')->store('public/vendor_images');
        }

        $vendor->update([
            'name' => $request->name,
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
            'notes' => $request->notes,
            'image_path' => $path,
        ]);

        return redirect()->route('vendor.index')->with('success', 'Vendor updated successfully');
    }

    // Menghapus data vendor dari database
    public function destroy(Vendor $vendor)
    {
        if ($vendor->image_path) {
            Storage::delete($vendor->image_path); // Hapus gambar jika ada
        }

        $vendor->delete();
        return redirect()->route('vendor.index')->with('success', 'Vendor deleted successfully');
    }
}
