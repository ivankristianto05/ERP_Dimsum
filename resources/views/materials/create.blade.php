@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Add New Manufacturing</h2>

        <!-- Form hanya untuk tampilan, tidak akan mengirim ke server -->
        <form>
            <!-- Dropdown Product -->
            <div class="form-group">
                <label for="product">Product</label>
                <select class="form-control" id="product" name="product">
                    <option value="product_a">Product A</option>
                    <option value="product_b">Product B</option>
                    <option value="product_c">Product C</option>
                </select>
            </div>

            <!-- Quantity Input -->
            <div class="form-group">
                <label for="qty">Quantity</label>
                <input type="number" class="form-control" id="qty" name="qty" min="1" required>
            </div>

            <!-- Dropdown Bill of Materials (BOM) -->
            <div class="form-group">
                <label for="bom">Bill of Materials (BOM)</label>
                <select class="form-control" id="bom" name="bom">
                    <option value="bom_a">BOM A</option>
                    <option value="bom_b">BOM B</option>
                    <option value="bom_c">BOM C</option>
                </select>
            </div>

            <!-- Start Date Input -->
            <div class="form-group">
                <label for="start_date">Start Date</label>
                <input type="date" class="form-control" id="start_date" name="start_date" required>
            </div>

            <!-- End Date Input -->
            <div class="form-group">
                <label for="end_date">End Date</label>
                <input type="date" class="form-control" id="end_date" name="end_date" required>
            </div>

            <!-- Submit Button (Tidak melakukan aksi) -->
            <button type="button" class="btn btn-success">Add Manufacturing</button>
        </form>
    </div>
@endsection
