@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">{{ isset($material) ? 'Edit Material' : 'Tambah Material' }}</h2>

    <form action="{{ isset($material) ? route('materials.update', $material->id) : route('materials.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
        @if (isset($material))
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="nama">Nama Bahan:</label>
            <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama bahan" value="{{ old('nama', $material->nama ?? '') }}" required>
            <div class="invalid-feedback">
                Nama bahan diperlukan.
            </div>
        </div>

        <div class="form-group">
            <label for="jumlah">Jumlah:</label>
            <input type="number" name="jumlah" id="jumlah" class="form-control" placeholder="Masukkan jumlah" value="{{ old('jumlah', $material->jumlah ?? '') }}" required>
            <div class="invalid-feedback">
                Jumlah bahan diperlukan.
            </div>
        </div>

        <div class="form-group">
            <label for="satuan">Satuan:</label>
            <input type="text" name="satuan" id="satuan" class="form-control" placeholder="Masukkan satuan" value="{{ old('satuan', $material->satuan ?? '') }}" required>
            <div class="invalid-feedback">
                Satuan diperlukan.
            </div>
        </div>

        <div class="form-group">
            <label for="supplier">Supplier:</label>
            <input type="text" name="supplier" id="supplier" class="form-control" placeholder="Masukkan nama supplier" value="{{ old('supplier', $material->supplier ?? '') }}" required>
            <div class="invalid-feedback">
                Supplier diperlukan.
            </div>
        </div>

        <div class="form-group">
            <label for="harga">Harga:</label>
            <input type="number" step="0.01" name="harga" id="harga" class="form-control" placeholder="Masukkan harga" value="{{ old('harga', $material->harga ?? '') }}" required>
            <div class="invalid-feedback">
                Harga diperlukan.
            </div>
        </div>

        <div class="form-group mt-4">
            <label for="foto">Foto:</label>
            @if (isset($material) && $material->foto)
                <img src="{{ asset($material->foto) }}" alt="{{ $material->nama }}" width="100" class="img-thumbnail">
            @endif
            <input type="file" name="foto" id="foto" class="form-control-file">
        </div>

        <button type="submit" class="btn btn-primary mt-3">{{ isset($material) ? 'Update' : 'Simpan' }}</button>
    </form>
</div>
@endsection
