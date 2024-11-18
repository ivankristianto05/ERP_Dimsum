<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RFQController extends Controller
{
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

    public function index()
    {
        $rfqs = $this->rfqs;
        return view('rfq.index', compact('rfqs'));
    }

    public function create()
    {
        return view('rfq.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'vendor' => 'required|string|max:255',
            'perusahaan' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'produk' => 'required|array',
            'produk.*.nama' => 'required|string|max:255',
            'produk.*.qty' => 'required|integer|min:1',
            'produk.*.harga' => 'required|integer|min:0',
        ]);

        return redirect()->route('rfq.index')->with('success', 'RFQ berhasil dibuat!');
    }

    public function show($id)
    {
        $rfq = $this->rfqs[$id] ?? abort(404, 'RFQ not found');
        return view('rfq.detail', compact('rfq'));
    }

    public function send($id)
    {
        return redirect()->route('rfq.show', $id)->with('success', 'RFQ berhasil dikirim!');
    }
}
