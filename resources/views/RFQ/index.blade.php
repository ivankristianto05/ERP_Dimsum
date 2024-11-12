@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="my-4">Daftar RFQ</h2>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('rfq.create') }}" class="btn btn-primary">+ Add Materials</a>
    </div>
    @php
        // Data dummy sebagai array
        $rfqs = [
            [
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
                'total' => 225000
            ],
            [
                'id' => 'RFQ002',
                'vendor' => 'SSY Vendor',
                'perusahaan' => 'PT IKAN SEGAR',
                'tanggal' => '2024-11-13',
                'produk' => [
                    ['nama' => 'Udang', 'qty' => 8, 'harga' => 20000],
                ],
                'qty_barang' => 8,
                'taxes' => 4000,
                'total' => 24000
            ],
        ];
    @endphp

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID (Code)</th>
                <th>Vendor</th>
                <th>Perusahaan</th>
                <th>Tanggal</th>
                <th>Produk</th>
                <th>Qty Barang</th>
                <th>Taxes</th>
                <th>Total (Rp)</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rfqs as $rfq)
            <tr>
                <td>{{ $rfq['id'] }}</td>
                <td>{{ $rfq['vendor'] }}</td>
                <td>{{ $rfq['perusahaan'] }}</td>
                <td>{{ $rfq['tanggal'] }}</td>
                <td>
                    @foreach($rfq['produk'] as $produk)
                        -{{ $produk['nama'] }}-
                    @endforeach
                </td>
                <td>{{ $rfq['qty_barang'] }}</td>
                <td>{{ number_format($rfq['taxes'], 2, ',', '.') }}</td>
                <td>{{ number_format($rfq['total'], 2, ',', '.') }}</td>
                <td>
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal-{{ $rfq['id'] }}">
                        Detail
                    </button>
                </td>
            </tr>

            <!-- Modal Detail Produk -->
            <div class="modal fade" id="detailModal-{{ $rfq['id'] }}" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="detailModalLabel">Detail Produk RFQ {{ $rfq['id'] }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <ul>
                                @foreach($rfq['produk'] as $produk)
                                    <li>{{ $produk['nama'] }} - Qty: {{ $produk['qty'] }} - Harga: Rp {{ number_format($produk['harga'], 2, ',', '.') }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
