@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Form Bill of Materials (BoM)</h2>

    <!-- Form BoM Utama -->
    <form action="{{ route('BoM.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="nama" class="form-label">Nama BoM:</label>
                <input type="text" name="nama" id="nama" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label for="kode" class="form-label">Kode BoM:</label>
                <input type="text" name="kode" id="kode" class="form-control" required>
            </div>
            <div class="col-md-2">
                <label for="qty" class="form-label">Quantity:</label>
                <input type="number" name="qty" id="qty" class="form-control" required>
            </div>
            <div class="col-md-2">
                <label for="cost" class="form-label">Cost (Rp):</label>
                <input type="number" name="cost" id="cost" class="form-control" step="0.01" required>
            </div>
        </div>

        <!-- Tabel Input Materials -->
        <h4>Bahan/Materials</h4>
        <table class="table table-bordered" id="materialsTable">
            <thead>
                <tr>
                    <th>Nama Material</th>
                    <th>Quantity</th>
                    <th>Satuan</th>
                    <th>Cost (Rp)</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="materialsBody">
                <tr>
                    <td><input type="text" name="materials[0][nama]" class="form-control" required></td>
                    <td><input type="number" name="materials[0][qty]" class="form-control" required></td>
                    <td><input type="text" name="materials[0][satuan]" class="form-control" required></td>
                    <td><input type="number" name="materials[0][cost]" class="form-control" step="0.01" required></td>
                    <td><button type="button" class="btn btn-danger btn-sm removeMaterial">Hapus</button></td>
                </tr>
            </tbody>
        </table>

        <button type="button" id="addMaterial" class="btn btn-success mb-3">+ Add Material</button>

        <!-- Submit Button -->
        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Simpan BoM</button>
                <button type="button" class="btn btn-secondary" onclick="window.print()">Print</button>
            </div>
        </div>
    </form>

    <!-- Daftar BoM yang sudah diinput -->
    <h4 class="mt-5">Daftar BoM</h4>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Kode</th>
                <th>Qty</th>
                <th>Total Cost (Rp)</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($boms as $bom)
                <tr>
                    <td>{{ $bom->id }}</td>
                    <td>{{ $bom->nama }}</td>
                    <td>{{ $bom->kode }}</td>
                    <td>{{ $bom->qty }}</td>
                    <td>{{ number_format($bom->cost, 2) }}</td>
                    <td>
                        <a href="{{ route('BoM.edit', $bom->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('BoM.destroy', $bom->id) }}" method="POST" style="display:inline;">
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

<!-- JavaScript untuk menambahkan material -->
<script>
    let materialIndex = 1;
    document.getElementById('addMaterial').addEventListener('click', function() {
        let newRow = `<tr>
                        <td><input type="text" name="materials[${materialIndex}][nama]" class="form-control" required></td>
                        <td><input type="number" name="materials[${materialIndex}][qty]" class="form-control" required></td>
                        <td><input type="text" name="materials[${materialIndex}][satuan]" class="form-control" required></td>
                        <td><input type="number" name="materials[${materialIndex}][cost]" class="form-control" step="0.01" required></td>
                        <td><button type="button" class="btn btn-danger btn-sm removeMaterial">Hapus</button></td>
                    </tr>`;
        document.getElementById('materialsBody').insertAdjacentHTML('beforeend', newRow);
        materialIndex++;
    });

    // Hapus baris material
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('removeMaterial')) {
            e.target.closest('tr').remove();
        }
    });
</script>
@endsection
