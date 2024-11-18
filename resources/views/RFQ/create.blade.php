@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Request For Quotation (RFQ)</h2>

    <!-- Status Section -->
    <div class="row mb-3">
        <div class="col-md-6">
            <button type="button" class="btn btn-info" onclick="changeStatus('send')">Send RFQ</button>
            <button type="button" class="btn btn-success" onclick="changeStatus('confirm_order')">Confirm Order</button>
            <button type="button" class="btn btn-danger" onclick="changeStatus('cancel')">Cancel</button>
        </div>
        <div class="col-md-6 text-end">
            <span>Status: </span>
            <span id="rfq-status">RFQ</span>
        </div>
    </div>

    <!-- Button Section -->
    <div id="action-buttons" class="mt-3">
        <!-- Buttons after Confirm Order -->
        <button type="button" class="btn btn-info" id="receive" style="display: none;" onclick="receiveProduct()">Receive</button>
        <button type="button" class="btn btn-success" id="send-po" style="display: none;" onclick="sendPO()">Send PO</button>
        <button type="button" class="btn btn-secondary" id="create-bill" style="display: none;" onclick="createBill()">Create Bill</button>
        <button type="button" class="btn btn-danger" id="cancel" style="display: none;" onclick="cancelRFQ()">Cancel</button>
    </div>

    <!-- Form RFQ -->
    <form action="" method="POST">
        @csrf

        <div class="form-group">
            <label for="vendor">Vendor</label>
            <select id="vendor" name="vendor" class="form-control">
                <option value="" selected>Pilih Vendor</option>
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
            <label for="perusahaan">Perusahaan</label>
            <input type="text" id="perusahaan" name="perusahaan" class="form-control">
        </div>

        <!-- Tabel Produk -->
        <div class="table-responsive">
            <table class="table table-bordered" id="productTable">
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
                <tbody>
                    <!-- Product rows will be appended here -->
                </tbody>
            </table>
        </div>

        <!-- Tombol Add Product -->
        <button type="button" class="btn btn-secondary" onclick="addProductRow()">Add Product</button>

        <!-- Total Section -->
        <div class="row mt-4">
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
    </form>
</div>

<script>
    let productIndex = 0;

    // Add Product Row to the table
    function addProductRow() {
        const tableBody = document.querySelector('#productTable tbody');
        const row = document.createElement('tr');
        
        row.innerHTML = `
            <td><input type="text" name="products[${productIndex}][name]" class="form-control"></td>
            <td><input type="text" name="products[${productIndex}][description]" class="form-control"></td>
            <td><input type="number" name="products[${productIndex}][quantity]" class="form-control" min="1"></td>
            <td><input type="number" name="products[${productIndex}][unit_price]" class="form-control" min="0" step="0.01"></td>
            <td><input type="number" name="products[${productIndex}][tax]" class="form-control" min="0" step="0.01"></td>
            <td><input type="number" name="products[${productIndex}][subtotal]" class="form-control" readonly></td>
            <td><button type="button" class="btn btn-danger btn-sm" onclick="removeProductRow(this)">Hapus</button></td>
        `;
        
        tableBody.appendChild(row);
        productIndex++;
    }

    // Remove a Product Row from the table
    function removeProductRow(button) {
        button.closest('tr').remove();
        updateTotals();
    }

    // Update totals when input values change
    function updateTotals() {
        const rows = document.querySelectorAll('#productTable tbody tr');
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
    }
    document.addEventListener('input', updateTotals);
    function changeStatus(status) {
        const statusText = document.getElementById('rfq-status');
        const actionButtons = document.getElementById('action-buttons');

        const buttonStates = {
            'send': {
                status: 'RFQ Sent',
                show: ['confirm-order'],
                hide: ['send-rfq', 'cancel']
            },
            'confirm_order': {
                status: 'Confirmed Order',
                show: ['receive', 'send-po', 'create-bill', 'cancel'],
                hide: ['confirm-order']
            },
            'cancel': {
                status: 'Draft',
                show: ['send-rfq', 'confirm-order'],
                hide: ['receive', 'send-po', 'create-bill', 'cancel']
            }
        };

        const state = buttonStates[status];
        statusText.textContent = state.status;
        
        state.show.forEach(id => document.getElementById(id).style.display = 'inline-block');
        state.hide.forEach(id => document.getElementById(id).style.display = 'none');
    }

    // Sample functions for action buttons
    function sendRFQ() {
        alert('RFQ Sent!');
    }

    function confirmOrder() {
        alert('Order Confirmed!');
    }

    function receiveProduct() {
        alert('Product Received!');
    }

    function sendPO() {
        alert('PO Sent!');
    }

    function createBill() {
        alert('Bill Created!');
    }

    function cancelRFQ() {
        alert('RFQ Canceled!');
    }
</script>
@endsection
