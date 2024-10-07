@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Tambah Produk</h2>

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Produk:</label>
                <input type="text" name="nama" id="nama" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori:</label>
                <input type="text" name="kategori" id="kategori" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="codeprodak" class="form-label">Kode Produk:</label>
                <input type="text" name="codeprodak" id="codeprodak" class="form-control" value="DIM{{ time() }}" readonly>
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label">Harga:</label>
                <input type="number" name="harga" id="harga" class="form-control" step="0.01" required>
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi:</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label">Foto Produk:</label>
                <input type="file" name="foto" id="foto" class="form-control" accept="image/*">
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
@endsection
