@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create BOM</h2>

    <form action="{{ route('bom.store') }}" method="POST">
        @csrf
        <div class="row">
            <!-- BoM ID (Auto-filled field) -->
            <div class="form-group col-md-6">
                <label for="bom_number">BoM ID:</label>
                <input type="text" name="bom_number" class="form-control" value="{{ old('bom_number') }}" required readonly>
            </div>

            <!-- Nama Produk -->
            <div class="form-group col-md-6">
                <label for="product_id">Nama Produk:</label>
                <select name="product_id" class="form-control" required>
                    <option value="">-- Select Product --</option>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->nama }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row">
            <!-- Quantity -->
            <div class="form-group col-md-6">
                <label for="quantity">Quantity:</label>
                <input type="text" name="quantity" class="form-control" value="{{ old('quantity') }}" required>
            </div>

            <!-- Cost -->
            <div class="form-group col-md-6">
                <label for="cost">Cost:</label>
                <input type="text" name="cost" class="form-control" value="{{ old('cost') }}" required>
            </div>
        </div>
        
        <hr>

        <!-- Daftar Material -->
        <h4>Materials</h4>
        <div id="material-wrapper">
            <div class="material-item row">
                <!-- Nama Material -->
                <div class="form-group col-md-3">
                    <label for="material_id[]">Nama Material:</label>
                    <select name="material_id[]" class="form-control" required>
                        <option value="">-- Select Material --</option>
                        @foreach($materials as $material)
                            <option value="{{ $material->id }}">{{ $material->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Quantity -->
                <div class="form-group col-md-2">
                    <label for="qty[]">Quantity:</label>
                    <input type="number" name="qty[]" class="form-control" required>
                </div>

                <!-- Satuan -->
                <div class="form-group col-md-2">
                    <label for="satuan[]">Satuan:</label>
                    <input type="text" name="satuan[]" class="form-control" required>
                </div>

                <!-- Cost -->
                <div class="form-group col-md-3">
                    <label for="cost[]">Cost (Rp):</label>
                    <input type="number" name="cost[]" step="0.01" class="form-control" required>
                </div>

                <!-- Remove button -->
                <div class="form-group col-md-2 d-flex align-items-end">
                    <button type="button" class="btn btn-danger remove-material">Remove</button>
                </div>
            </div>
        </div>

        <!-- Add more material button -->
        <button type="button" id="add-material" class="btn btn-secondary mt-3">Add Material</button>

        <br><br>

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary">Save BOM</button>
    </form>
</div>

<script>
    document.getElementById('add-material').addEventListener('click', function() {
        var materialWrapper = document.getElementById('material-wrapper');
        var newMaterial = document.querySelector('.material-item').cloneNode(true);
        newMaterial.querySelectorAll('input').forEach(input => input.value = ''); // Clear input fields
        materialWrapper.appendChild(newMaterial);

        // Attach remove event listener to new remove buttons
        newMaterial.querySelector('.remove-material').addEventListener('click', function() {
            newMaterial.remove();
        });
    });

    // Attach remove event listener to existing remove button
    document.querySelectorAll('.remove-material').forEach(function(button) {
        button.addEventListener('click', function() {
            button.closest('.material-item').remove();
        });
    });
</script>
@endsection
