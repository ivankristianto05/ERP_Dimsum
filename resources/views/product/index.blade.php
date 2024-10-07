@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <input type="text" class="form-control w-25" placeholder="Search in product">
            <a href="/addProduct" class="btn btn-primary">+ Add Product</a>
        </div>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">
                        <input type="checkbox">
                    </th>
                    <th scope="col">Product</th>
                    <th scope="col">Category</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Price</th>
                    <th scope="col">Actions</th> <!-- Kolom baru untuk Actions -->
                </tr>
            </thead>
            <tbody>
                <!-- Static Sample Data -->
                <tr>
                    <td><input type="checkbox"></td>
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="path/to/image1.jpg" alt="Product 1" width="50" class="mr-2">
                            Nike Air Force 1 '07 LV8
                        </div>
                    </td>
                    <td>Shoes</td>
                    <td>220</td>
                    <td>$122.27</td>
                    <td>
                        <a href="update_product.html" class="btn btn-sm btn-warning">Update</a>
                        <a href="delete_product.html" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>

                <tr>
                    <td><input type="checkbox"></td>
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="path/to/image2.jpg" alt="Product 2" width="50" class="mr-2">
                            Nike Sportswear Heritage86 Futura Washed
                        </div>
                    </td>
                    <td>Caps</td>
                    <td>999</td>
                    <td>$15.95</td>
                    <td>
                        <a href="update_product.html" class="btn btn-sm btn-warning">Update</a>
                        <a href="delete_product.html" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>

                <tr>
                    <td><input type="checkbox"></td>
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="path/to/image3.jpg" alt="Product 3" width="50" class="mr-2">
                            Nike Air Max Penny
                        </div>
                    </td>
                    <td>Shoes</td>
                    <td>75</td>
                    <td>$182.50</td>
                    <td>
                        <a href="update_product.html" class="btn btn-sm btn-warning">Update</a>
                        <a href="delete_product.html" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>

                <tr>
                    <td><input type="checkbox"></td>
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="path/to/image4.jpg" alt="Product 4" width="50" class="mr-2">
                            Nike Windrunner D.Y.E.
                        </div>
                    </td>
                    <td>Jacket</td>
                    <td>30</td>
                    <td>$102.43</td>
                    <td>
                        <a href="update_product.html" class="btn btn-sm btn-warning">Update</a>
                        <a href="delete_product.html" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>

                <tr>
                    <td><input type="checkbox"></td>
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="path/to/image5.jpg" alt="Product 5" width="50" class="mr-2">
                            Nike Storm-FIT x Stüssy
                        </div>
                    </td>
                    <td>Jacket</td>
                    <td>50</td>
                    <td>$9.54</td>
                    <td>
                        <a href="update_product.html" class="btn btn-sm btn-warning">Update</a>
                        <a href="delete_product.html" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>

                <tr>
                    <td><input type="checkbox"></td>
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="path/to/image6.jpg" alt="Product 6" width="50" class="mr-2">
                            Nike Everyday Plus Cushioned
                        </div>
                    </td>
                    <td>Socks</td>
                    <td>999</td>
                    <td>$122.27</td>
                    <td>
                        <a href="update_product.html" class="btn btn-sm btn-warning">Update</a>
                        <a href="delete_product.html" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>

                <tr>
                    <td><input type="checkbox"></td>
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="path/to/image7.jpg" alt="Product 7" width="50" class="mr-2">
                            Nike Everyday Lightweight
                        </div>
                    </td>
                    <td>Socks</td>
                    <td>999</td>
                    <td>$14.67</td>
                    <td>
                        <a href="update_product.html" class="btn btn-sm btn-warning">Update</a>
                        <a href="delete_product.html" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    @section('scripts')
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    @endsection
@endsection
