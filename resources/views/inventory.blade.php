@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Inventory</h1>
        <div class="text-right mb-3">
            <a href="add_product.html" class="btn btn-primary">Add Product</a>
        </div>

        <div class="row">
            <!-- Static Sample Data -->
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Sample Product 1</h5>
                        <p class="card-text">Quantity: 10</p>
                        <p class="card-text">Price: $29.99</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Sample Product 2</h5>
                        <p class="card-text">Quantity: 5</p>
                        <p class="card-text">Price: $15.49</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Sample Product 3</h5>
                        <p class="card-text">Quantity: 20</p>
                        <p class="card-text">Price: $45.00</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('scripts')
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <script>
            $(document).ready(function() {
                // Example success message; remove this if not needed
                // $('#successMessage').show().delay(3000).fadeOut();
            });
        </script>
    @endsection
@endsection
