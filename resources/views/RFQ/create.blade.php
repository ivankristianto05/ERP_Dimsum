@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Request For Quotation (RFQ)</h2>
    
    <!-- Form RFQ -->
    <form action="" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="vendor">Vendor</label>
            <select id="vendor" name="vendor" class="form-control">
                <option value="" selected>Pilih Vendor</option>
                <!-- Daftar vendor diisi manual -->
                <option value="1">Vendor A</option>
                <option value="2">Vendor B</option>
                <option value="3">Vendor C</option>
                <option value="4">Vendor D</option>
                <option value="5">Vendor E</option>
            </select>
        </div>        
        
        <div class="form-group">
            <label for="vendor_code">Kode Vendor</label>
            <input type="text" id="vendor_code" name="vendor_code" class="form-control" placeholder="Kode Vendor">
        </div>

        <div class="form-group">
            <label for="date">Tanggal</label>
            <input type="date" id="date" name="date" class="form-control">
        </div>
        
        <div class="form-group">
            <label for="perusahaan">perusahaan</label>
            <input type="text" id="perusahaan" name="perusahaan" class="form-control">
        </div>
        
        <!-- Tabel Produk -->
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Deskripsi</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Taxes</th>
                        <th>Sub Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>                
            </table>
        </div>

        <!-- Tombol Add Product -->
        <button type="button" class="btn btn-secondary" onclick="addProductRow()">Add Product</button>


        <!-- Total Section -->
        <div class="row">
            <div class="col-md-6 offset-md-6">
                <div class="form-group">
                    <label>Total Amount</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp</span>
                        <input type="number" id="total_amount" name="total_amount" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label>Taxes</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp</span>
                        <input type="number" id="total_taxes" name="total_taxes" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label>Grand Total</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp</span>
                        <input type="number" id="grand_total" name="grand_total" class="form-control" readonly>
                    </div>
                </div>
            </div>
        </div>        

        <!-- Button Simpan -->
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<script>
    let productIndex = 0; 

    function addProductRow() {
    const tableBody = document.getElementById('productTable');
    const row = document.createElement('tr');
    
    row.innerHTML = `
        <td><input type="text" name="products[${productIndex}][name]" class="form-control"></td>
        <td><input type="text" name="products[${productIndex}][description]" class="form-control"></td>
        <td><input type="number" name="products[${productIndex}][quantity]" class="form-control" min="1"></td>
        <td>
            <div class="input-group">
                <span class="input-group-text">Rp</span>
                <input type="number" name="products[${productIndex}][unit_price]" class="form-control" min="0" step="0.01">
            </div>
        </td>
        <td>
            <div class="input-group">
                <span class="input-group-text">Rp</span>
                <input type="number" name="products[${productIndex}][tax]" class="form-control" min="0" step="0.01">
            </div>
        </td>
        <td>
            <div class="input-group">
                <span class="input-group-text">Rp</span>
                <input type="number" name="products[${productIndex}][subtotal]" class="form-control" readonly>
            </div>
        </td>
        <td><button type="button" class="btn btn-danger btn-sm" onclick="removeProductRow(this)">Hapus</button></td>
    `;

    tableBody.appendChild(row);
    productIndex++;
}

function removeProductRow(button) {
    const row = button.closest('tr');
    row.remove();
}


    document.addEventListener('input', function () {
    const rows = document.querySelectorAll('#productTable tr');
    let totalAmount = 0;
    let totalTaxes = 0;

    rows.forEach((row) => {
        const quantity = parseFloat(row.querySelector('[name$="[quantity]"]').value) || 0;
        const unitPrice = parseFloat(row.querySelector('[name$="[unit_price]"]').value) || 0;
        const tax = parseFloat(row.querySelector('[name$="[tax]"]').value) || 0;

        const subtotal = quantity * unitPrice;
        row.querySelector('[name$="[subtotal]"]').value = subtotal.toFixed(2);

        totalAmount += subtotal;
        totalTaxes += tax;
    });

    document.getElementById('total_amount').value = totalAmount.toFixed(2);
    document.getElementById('total_taxes').value = totalTaxes.toFixed(2);
    document.getElementById('grand_total').value = (totalAmount + totalTaxes).toFixed(2);
});

</script>
@endsection
