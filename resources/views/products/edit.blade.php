@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tambah Produk</h2>

        <form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Produk:</label>
                        <input type="text" value="{{$product->nama}}" name="nama" id="nama" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori:</label>
                        <input type="text" value="{{$product->kategori}}" name="kategori" id="kategori" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="codeprodak" class="form-label">Kode Produk:</label>
                        <input type="text" value="{{$product->codeprodak}}" name="codeprodak" id="codeprodak" class="form-control" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga:</label>
                        <input type="number" value="{{$product->harga}}" name="harga" id="harga" class="form-control" step="0.01" required>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi:</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control" required>{{$product->deskripsi}}</textarea>
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label">Foto Produk:</label>
                <input type="file" name="foto" id="foto" class="form-control" accept="image/*">
            </div>

            <hr>

            <h4>Tambah bahan bahan</h4>

            <div onclick="addRow()" class="btn btn-danger btn-sm">+ Add row</div>
                <div id="rowContainer">
                    @forelse ($productMaterial as $material)
        
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="codeprodak" class="form-label">Bahan</label>
                                <select name="item[{{ $loop->index }}][material_id]" class="form-select">
                                    @forelse ($materials as $item)
                                        <option value="{{$item->id}}" {{$material->material_id == $item->id ? 'selected' : ''}}>{{$item->nama}}</option>
                                    @empty
                                        
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="harga" class="form-label">Jumlah:</label>
                                <input type="number" value="{{$material->jumlah}}" name="item[{{ $loop->index }}][jumlah]" id="harga" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    @empty
                        
                    @endforelse
                    
                
                </div>


            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection

<script>
    let idx = {{count($productMaterial) == 0 ? 0 : count($productMaterial)}}
    console.log(idx)
    function addRow(){
        let newRow = document.createElement('div');
        newRow.classList.add('row');

        // Create the first column (Bahan)
        let col1 = document.createElement('div');
        col1.classList.add('col-6');
        col1.innerHTML = `
            <div class="mb-3">
                <label for="codeprodak" class="form-label">Bahan</label>
                <select name="item[${idx}][material_id]" class="form-select">
                                    <option value="" selected disabled>Pilih bahan</option>
                                    @forelse ($materials as $item)
                                        <option value="{{$item->id}}">{{$item->nama}}</option>
                                    @empty
                                        
                                    @endforelse
                                </select>
            </div>
        `;

        // Create the second column (Jumlah)
        let col2 = document.createElement('div');
        col2.classList.add('col-6');
        col2.innerHTML = `
            <div class="mb-3">
                <label for="harga" class="form-label">Jumlah:</label>
                <input type="number" name="item[${idx}][jumlah]" id="harga" class="form-control" required>
            </div>
        `;

        // Append columns to the new row
        newRow.appendChild(col1);
        newRow.appendChild(col2);

        // Append the new row to the container
        document.getElementById('rowContainer').appendChild(newRow);
        idx++
    }
</script>