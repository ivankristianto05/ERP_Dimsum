@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Tambah Material</h2>

    <form action="{{ route('materials.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
        @csrf
        <div class="form-group">
            <label for="nama">Nama Bahan:</label>
            <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama bahan" required>
            <div class="invalid-feedback">
                Nama bahan diperlukan.
            </div>
        </div>

        <div class="form-group">
            <label for="jumlah">Jumlah:</label>
            <input type="number" name="jumlah" id="jumlah" class="form-control" placeholder="Masukkan jumlah" required>
            <div class="invalid-feedback">
                Jumlah bahan diperlukan.
            </div>
        </div>

        <div class="form-group">
            <label for="satuan">Satuan:</label>
            <input type="text" name="satuan" id="satuan" class="form-control" placeholder="Masukkan satuan" required>
            <div class="invalid-feedback">
                Satuan diperlukan.
            </div>
        </div>

        <div class="form-group">
            <label for="supplier">Supplier:</label>
            <input type="text" name="supplier" id="supplier" class="form-control" placeholder="Masukkan nama supplier" required>
            <div class="invalid-feedback">
                Supplier diperlukan.
            </div>
        </div>

        <div class="form-group">
            <label for="harga">Harga:</label>
            <input type="number" step="0.01" name="harga" id="harga" class="form-control" placeholder="Masukkan harga" required>
            <div class="invalid-feedback">
                Harga diperlukan.
            </div>
        </div>

        <div class="form-group mt-4">
            <label for="foto">Foto:</label>
            <input type="file" name="foto" id="foto" class="form-control-file">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    </form>
</div>

@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Bootstrap Form Validation Script -->
<script>
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            var forms = document.getElementsByClassName('needs-validation');
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
@endsection
@endsection
