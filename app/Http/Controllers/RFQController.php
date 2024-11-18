<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RFQController extends Controller
{
    // Data dummy sebagai contoh
    private $rfqs = [
        'RFQ001' => [
            'id' => 'RFQ001',
            'vendor' => 'RU Vendor',
            'perusahaan' => 'PT ABC',
            'tanggal' => '2024-11-12',
            'produk' => [
                ['nama' => 'Tepung', 'qty' => 10, 'harga' => 15000],
                ['nama' => 'Telur', 'qty' => 5, 'harga' => 30000],
            ],
            'qty_barang' => 15,
            'taxes' => 5000,
            'total' => 225000,
        ],
    ];

    /**
     * Tampilkan daftar RFQ.
     */
    public function index()
    {
        $rfqs = $this->rfqs; // Ganti dengan query database
        return view('rfq.index', compact('rfqs'));
    }

    /**
     * Tampilkan form untuk membuat RFQ baru.
     */
    public function create()
    {
        return view('rfq.create');
    }

    /**
     * Simpan RFQ baru.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'vendor' => 'required|string|max:255',
            'perusahaan' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'produk' => 'required|array',
            'produk.*.nama' => 'required|string|max:255',
            'produk.*.qty' => 'required|integer|min:1',
            'produk.*.harga' => 'required|integer|min:0',
        ]);

        // Simpan ke database (contoh, belum implementasi database)
        // RFQ::create($validated);

        // Redirect ke daftar RFQ dengan pesan sukses
        return redirect()->route('rfq.index')->with('success', 'RFQ berhasil dibuat!');
    }

    /**
     * Tampilkan detail RFQ berdasarkan ID.
     */
    public function show($id)
    {
        $rfq = $this->rfqs[$id] ?? abort(404, 'RFQ not found');
        return view('rfq.detail', compact('rfq'));
    }

    /**
     * Kirim RFQ.
     */
    public function send($id)
    {
        // Logika pengiriman RFQ
        return redirect()->route('rfq.show', $id)->with('success', 'RFQ berhasil dikirim!');
    }
}
