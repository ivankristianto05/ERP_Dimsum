@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <!-- Header RFQ -->
        <div class="col-12 mb-4">
            <h1>Purchase Order</h1>
            <p class="text-muted">Request for Quotation - {{ $rfq['id'] }}</p>
        </div>

        <!-- Bagian Detail Informasi -->
        <div class="col-12 col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Informasi Purchase Order</h4>
                </div>
                <div class="card-body">
                    <p><strong>Vendor:</strong> {{ $rfq['vendor'] }}</p>
                    <p><strong>Perusahaan:</strong> {{ $rfq['perusahaan'] }}</p>
                    <p><strong>Tanggal:</strong> {{ $rfq['tanggal'] }}</p>
                    <p><strong>Jumlah Barang:</strong> {{ $rfq['qty_barang'] }}</p>
                    <p><strong>Taxes:</strong> Rp {{ number_format($rfq['taxes'], 2, ',', '.') }}</p>
                    <p><strong>Total:</strong> Rp {{ number_format($rfq['total'], 2, ',', '.') }}</p>
                </div>
            </div>
        </div>

        <!-- Produk -->
        <div class="col-12 col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4>Produk</h4>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($rfq['produk'] as $produk)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $produk['nama'] }}
                                <span class="badge bg-primary rounded-pill">Qty: {{ $produk['qty'] }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <!-- Tombol Aksi -->
        <div class="col-12 mt-4">
            <div class="d-flex justify-content-between align-items-center">
                <form method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success">Create Purchase Order</button>
                </form>
                <form method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Send PO by Email</button>
                </form>
                <form method="POST">
                    @csrf
                    <button type="submit" class="btn btn-secondary">Lock</button>
                </form>
                <form method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Create Bill</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
