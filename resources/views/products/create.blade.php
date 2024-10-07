@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Tambah Produk</h2>

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <div class="col-md-6">
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
                </div>

                <div class="col-md-6">
                    <h4>Tambah Bahan</h4>
                    <div class="row mb-3">
                        <div class="col-md-8">
                            <label for="material" class="form-label">Material:</label>
                            <select name="material" id="material" class="form-control">
                                @foreach($materials as $material)
                                    <option value="{{ $material->id }}" data-satuan="{{ $material->satuan }}">
                                        {{ $material->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="jumlah" class="form-label">Jumlah:</label>
                            <input type="number" name="jumlah" id="jumlah" class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="satuan" class="form-label">Satuan:</label>
                        <input type="text" name="satuan" id="satuan" class="form-control" readonly>
                    </div>

                    <button type="button" id="add-material" class="btn btn-primary mb-3">Tambah Bahan</button>

                    <h5>Daftar Bahan yang Ditambahkan:</h5>
                    <ul id="material-list" class="list-group mb-3"></ul>
                </div>
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>

    @section('scripts')
    <script>
        // Update satuan ketika memilih material
        document.getElementById('material').addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const satuanInput = document.getElementById('satuan');
            satuanInput.value = selectedOption.getAttribute('data-satuan');
        });

        // Tambahkan bahan ke daftar
        document.getElementById('add-material').addEventListener('click', function() {
            const materialSelect = document.getElementById('material');
            const materialId = materialSelect.value;
            const materialName = materialSelect.options[materialSelect.selectedIndex].text;
            const jumlah = document.getElementById('jumlah').value;
            const satuan = document.getElementById('satuan').value;

            if (materialId && jumlah) {
                const listItem = document.createElement('li');
                listItem.className = 'list-group-item d-flex justify-content-between align-items-center';
                listItem.textContent = `${materialName} - ${jumlah} ${satuan}`;
                
                // Buat tombol hapus
                const removeButton = document.createElement('button');
                removeButton.className = 'btn btn-danger btn-sm';
                removeButton.textContent = 'x';
                removeButton.addEventListener('click', function() {
                    listItem.remove();
                });

                listItem.appendChild(removeButton);
                document.getElementById('material-list').appendChild(listItem);

                // Reset input jumlah
                document.getElementById('jumlah').value = '';
            } else {
                alert('Silakan pilih material dan masukkan jumlah!');
            }
        });
    </script>
    @endsection
@endsection
