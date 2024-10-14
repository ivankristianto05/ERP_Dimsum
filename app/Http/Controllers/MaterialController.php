<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    // Menampilkan form untuk menambah material
    public function create()
    {
        return view('materials.create');
    }

    // Menyimpan material baru ke database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'jumlah' => 'required',
            'satuan' => 'required|string|max:100',
            'supplier' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Menyimpan foto jika ada
        if ($request->hasFile('foto')) {
            $fileName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('uploads'), $fileName);
            $validatedData['foto'] = 'uploads/' . $fileName;
        }

        Material::create($validatedData);

        return redirect()->route('materials.index')->with('success', 'Material berhasil ditambahkan.');
    }

    // Menampilkan daftar material
    public function index()
    {
        $materials = Material::all();
        return view('materials.index', compact('materials'));
    }

    // Menampilkan detail material tertentu
    public function show(Material $material)
    {
        return view('materials.show', compact('material'));
    }

    // Menampilkan form edit material
    public function edit($id)
{
    $material = Material::findOrFail($id);
    return view('materials.edit', compact('material'));
}
    // Mengupdate material ke database
public function update(Request $request, Material $material)
{
    $validatedData = $request->validate([
        'nama' => 'required|string|max:255',
        'jumlah' => 'required|integer',
        'satuan' => 'required|string|max:100',
        'supplier' => 'required|string|max:255',
        'harga' => 'required|numeric',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Update foto jika ada
    if ($request->hasFile('foto')) {
        $fileName = time() . '.' . $request->foto->extension();
        $request->foto->move(public_path('uploads'), $fileName);
        $validatedData['foto'] = 'uploads/' . $fileName;
    }

    $material->update($validatedData);

    return redirect()->route('materials.index')->with('success', 'Material berhasil diupdate.');
}

    // Menghapus material
    public function destroy(Material $material)
    {
        if ($material->foto) {
            unlink(public_path($material->foto));
        }

        $material->delete();
        return redirect()->route('materials.index')->with('success', 'Material berhasil dihapus.');
    }
}
