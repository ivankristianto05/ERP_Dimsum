@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Daftar Produk</h2>

        <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">+ Tambah Produk</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Kode Produk</th>
                    <th>Harga</th>
                    <th>Deskripsi</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->nama }}</td>
                        <td>{{ $product->kategori }}</td>
                        <td>{{ $product->codeprodak }}</td>
                        <td>Rp.{{ number_format($product->harga, 2) }}</td>
                        <td>{{ $product->deskripsi }}</td>
                        <td>
                            @if($product->foto)
                                <img src="{{ asset('storage/' . $product->foto) }}" alt="Foto Produk" width="50">
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('products.edit', $product) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
