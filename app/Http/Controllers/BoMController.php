<?php

namespace App\Http\Controllers;

use App\Models\Bom;
use App\Models\BomDetail;
use App\Models\Product;
use App\Models\Material;
use Illuminate\Http\Request;

class BomController extends Controller
{
    /**
     * Menampilkan halaman daftar BoM.
     */
    public function index()
    {
        // Ambil semua BoM beserta detailnya (produk dan material terkait)
        $boms = Bom::with('product', 'details.material')->get();
        return view('bom.index', compact('boms'));
    }

    /**
     * Menampilkan form untuk membuat BoM baru.
     */
    public function create()
    {
        // Ambil semua produk dan material yang tersedia untuk dipilih
        $products = Product::all();
        $materials = Material::all();
        return view('bom.create', compact('products', 'materials'));
    }

    /**
     * Menyimpan BoM baru beserta detail materialnya.
     */
    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'bom_number' => 'required|unique:boms,bom_number', // BoM harus unik
            'product_id' => 'required|exists:products,id', // Produk harus ada di database
            'material_id.*' => 'required|exists:materials,id', // Material harus valid
            'qty.*' => 'required|integer', // Quantity harus integer
            'satuan.*' => 'required|string', // Satuan harus string
            'cost.*' => 'required|numeric' // Cost harus numerik
        ]);

        // Buat BoM baru dengan data yang diinput
        $bom = Bom::create([
            'bom_number' => $request->bom_number,
            'product_id' => $request->product_id
        ]);

        // Loop melalui setiap material yang ditambahkan
        foreach ($request->material_id as $key => $material_id) {
            BomDetail::create([
                'bom_id' => $bom->id, // Id BoM yang baru dibuat
                'material_id' => $material_id, // Id material
                'qty' => $request->qty[$key], // Jumlah material
                'satuan' => $request->satuan[$key], // Satuan material
                'cost' => $request->cost[$key] // Biaya material
            ]);
        }

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('bom.index')->with('success', 'BOM berhasil disimpan');
    }

    /**
     * Menampilkan form edit untuk BoM yang sudah ada.
     */
    public function edit($id)
    {
        // Cari BoM berdasarkan ID
        $bom = Bom::with('details.material')->findOrFail($id);
        $products = Product::all();
        $materials = Material::all();

        // Tampilkan form edit beserta data BoM yang ada
        return view('bom.edit', compact('bom', 'products', 'materials'));
    }

    /**
     * Mengupdate data BoM beserta materialnya.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'bom_number' => 'required|unique:boms,bom_number,' . $id, // Harus unik kecuali ID ini
            'product_id' => 'required|exists:products,id',
            'material_id.*' => 'required|exists:materials,id',
            'qty.*' => 'required|integer',
            'satuan.*' => 'required|string',
            'cost.*' => 'required|numeric'
        ]);

        // Temukan BoM yang akan diupdate
        $bom = Bom::findOrFail($id);

        // Update BoM
        $bom->update([
            'bom_number' => $request->bom_number,
            'product_id' => $request->product_id
        ]);

        // Hapus detail material lama yang terkait dengan BoM ini
        $bom->details()->delete();

        // Masukkan detail material yang baru
        foreach ($request->material_id as $key => $material_id) {
            BomDetail::create([
                'bom_id' => $bom->id,
                'material_id' => $material_id,
                'qty' => $request->qty[$key],
                'satuan' => $request->satuan[$key],
                'cost' => $request->cost[$key]
            ]);
        }

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('bom.index')->with('success', 'BOM berhasil diupdate');
    }

    /**
     * Menghapus BoM beserta materialnya.
     */
    public function destroy($id)
    {
        // Cari BoM berdasarkan ID dan hapus
        $bom = Bom::findOrFail($id);
        $bom->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('bom.index')->with('success', 'BOM berhasil dihapus');
    }
    public function report()
    {
        // Ambil semua BoM dengan relasi product dan detail material
        $boms = Bom::with('product', 'details.material')->get();

        // Generate PDF dengan view yang berisi data BoM
        $pdf = PDF::loadView('bom.report', compact('boms'));

        // Return PDF file sebagai download
        return $pdf->download('bom_report.pdf');
    }
}
