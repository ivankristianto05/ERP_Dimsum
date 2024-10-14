<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BoM;
use App\Models\Material;

class BoMController extends Controller
{
    // Menampilkan halaman BoM
    public function index()
    {
        $boms = BoM::with('materials')->get();
        return view('bom.index', compact('boms'));
    }

    // Menyimpan data BoM baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required',
            'kode' => 'required',
            'qty' => 'required|integer',
            'cost' => 'required|numeric',
            'material_nama.*' => 'required|string',
            'material_qty.*' => 'required|integer',
            'material_satuan.*' => 'required|string',
            'material_cost.*' => 'required|numeric',
        ]);

        // Simpan data BoM
        $bom = BoM::create([
            'nama' => $request->nama,
            'kode' => $request->kode,
            'qty' => $request->qty,
            'cost' => $request->cost,
        ]);

        // Simpan materials terkait
        for ($i = 0; $i < count($request->material_nama); $i++) {
            $bom->materials()->create([
                'nama' => $request->material_nama[$i],
                'qty' => $request->material_qty[$i],
                'satuan' => $request->material_satuan[$i],
                'cost' => $request->material_cost[$i],
            ]);
        }

        return redirect()->route('bom.index')->with('success', 'BoM berhasil ditambahkan!');
    }

    // Mengedit data BoM
    public function edit($id)
    {
        $bom = BoM::with('materials')->findOrFail($id);
        return view('bom.edit', compact('bom'));
    }

    // Memperbarui data BoM
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required',
            'kode' => 'required',
            'qty' => 'required|integer',
            'cost' => 'required|numeric',
            'material_nama.*' => 'required|string',
            'material_qty.*' => 'required|integer',
            'material_satuan.*' => 'required|string',
            'material_cost.*' => 'required|numeric',
        ]);

        // Update data BoM
        $bom = BoM::findOrFail($id);
        $bom->update([
            'nama' => $request->nama,
            'kode' => $request->kode,
            'qty' => $request->qty,
            'cost' => $request->cost,
        ]);

        // Hapus materials lama
        $bom->materials()->delete();

        // Simpan materials baru
        for ($i = 0; $i < count($request->material_nama); $i++) {
            $bom->materials()->create([
                'nama' => $request->material_nama[$i],
                'qty' => $request->material_qty[$i],
                'satuan' => $request->material_satuan[$i],
                'cost' => $request->material_cost[$i],
            ]);
        }

        return redirect()->route('bom.index')->with('success', 'BoM berhasil diperbarui!');
    }

    // Menghapus data BoM
    public function destroy($id)
    {
        $bom = BoM::findOrFail($id);
        $bom->materials()->delete(); // Hapus materials terkait
        $bom->delete(); // Hapus BoM

        return redirect()->route('bom.index')->with('success', 'BoM berhasil dihapus!');
    }
}
