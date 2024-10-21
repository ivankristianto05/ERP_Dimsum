@extends('layouts.app')

@section('content')
    <!-- Add Manufacturing Button -->
    <div class="row mb-4">
        <div class="col-md-12 text-right">
            <a href="{{ route('manufacturing.create') }}" class="btn btn-primary">Add Manufacturing</a>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-12">
            <p class="lead">Overview of manufacturing process</p>
        </div>
    </div>

    <div class="row">
        <!-- Orders Card -->
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Total Orders</h5>
                    <p class="card-text display-4">120</p>
                    <a href="#" class="btn btn-primary">View Orders</a>
                </div>
            </div>
        </div>

        <!-- Production Card -->
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">In Production</h5>
                    <p class="card-text display-4">80</p>
                    <a href="#" class="btn btn-success">View Production</a>
                </div>
            </div>
        </div>

        <!-- Inventory Card -->
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Inventory</h5>
                    <p class="card-text display-4">1500</p>
                    <a href="#" class="btn btn-warning">View Inventory</a>
                </div>
            </div>
        </div>

        <!-- Reports Card -->
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Reports</h5>
                    <p class="card-text display-4">25</p>
                    <a href="#" class="btn btn-danger">View Reports</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <!-- Charts (Placeholder) -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Production Progress</h5>
                    <div class="chart-placeholder" style="height: 200px; background-color: #f4f4f4;"></div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Inventory Levels</h5>
                    <div class="chart-placeholder" style="height: 200px; background-color: #f4f4f4;"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
