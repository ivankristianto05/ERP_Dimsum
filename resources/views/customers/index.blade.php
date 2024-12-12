@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Customer List</h1>
        <a href="{{ route('customers.create') }}" class="btn btn-primary mb-3">Add Customer</a>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($customers as $customer)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $customer['name'] }}</td>
                        <td>{{ $customer['address'] }}</td>
                        <td>{{ $customer['email'] }}</td>
                        <td>{{ $customer['phone'] }}</td>
                        <td>
                            <a href="{{ route('customers.edit', $customer['id']) }}" class="btn btn-warning btn-sm">Edit</a>
                            <button class="btn btn-info btn-sm"
                                onclick="showStatusModal({{ $customer['id'] }})">Status</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No customers found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Modal Popup for Status and Invoice -->
    <div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="statusModalLabel">Create Invoice</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="invoiceForm">
                        <div class="mb-3">
                            <label for="customerName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="customerName" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="customerAddress" class="form-label">Address</label>
                            <input type="text" class="form-control" id="customerAddress" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="shippingExp" class="form-label">Shipping Exp.</label>
                            <input type="text" class="form-control" id="shippingExp">
                        </div>
                        <div class="mb-3">
                            <label for="orderDetails" class="form-label">Order Details</label>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Description</th>
                                        <th>Qty</th>
                                        <th>Tax</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody id="orderDetails">
                                    <tr>
                                        <td>Product 1</td>
                                        <td>Sample Description</td>
                                        <td>1</td>
                                        <td>10%</td>
                                        <td>$100</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status">
                                <option value="Draft">Draft</option>
                                <option value="Validasi">Validasi</option>
                                <option value="Completed">Completed</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="saveInvoice()">Save</button>
                    <button type="button" class="btn btn-success" onclick="sendEmail()">Send Email</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showStatusModal(customerId) {
            // Simulated customer data fetching (replace with AJAX call as needed)
            const customer = {
                id: customerId,
                name: "John Doe",
                address: "123 Main Street",
            };

            document.getElementById('customerName').value = customer.name;
            document.getElementById('customerAddress').value = customer.address;
            const statusModal = new bootstrap.Modal(document.getElementById('statusModal'));
            statusModal.show();
        }

        function saveInvoice() {
            alert('Invoice saved successfully!');
        }

        function sendEmail() {
            alert('Email sent successfully!');
        }
    </script>
@endsection
