@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar BoM</h2>
    <a href="{{ route('bom.create') }}" class="btn btn-primary mb-3">Add BOM</a>
    <a href="{{ route('bom.report') }}" class="btn btn-secondary">Export Report</a> <!-- Tambahkan Button Report -->
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>BoM Number</th>
                <th>Nama Produk</th>
                <th>Details</th>
            </tr>
        </thead>
        <tbody>
            @foreach($boms as $bom)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $bom->bom_number }}</td>
                <td>{{ $bom->product->nama }}</td>
                <td>
                    <ul>
                        @foreach($bom->details as $detail)
                        <li>{{ $detail->material->nama_material }} - Qty: {{ $detail->qty }} {{ $detail->satuan }}, Cost: Rp {{ number_format($detail->cost, 2) }}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
