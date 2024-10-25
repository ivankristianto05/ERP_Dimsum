@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Vendor List</h2>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <a href="{{ route('vendor.create') }}" class="btn btn-primary">Add New Vendor</a>

        <table class="vendor-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Notes</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vendors as $vendor)
                    <tr>
                        <td>{{ $vendor->name }}</td>
                        <td>{{ $vendor->address }}</td>
                        <td>{{ $vendor->email }}</td>
                        <td>{{ $vendor->phone }}</td>
                        <td>{{ $vendor->notes }}</td>
                        <td>
                            <a href="{{ route('vendor.edit', $vendor->id) }}" class="btn btn-warning">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <style>
        .container {
            max-width: 900px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 8px;
        }

        h2 {
            margin-bottom: 20px;
            color: #343a40;
        }

        .btn-primary {
            margin-bottom: 15px;
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
            text-decoration: none;
        }

        .alert-success {
            margin-bottom: 15px;
            padding: 10px;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
            border-radius: 4px;
        }

        .vendor-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        .vendor-table th, .vendor-table td {
            padding: 12px;
            border: 1px solid #dee2e6;
            text-align: left;
        }

        .vendor-table th {
            background-color: #e9ecef;
            color: #495057;
        }

        .vendor-table tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
            color: #fff;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 4px;
        }

        .btn-warning:hover {
            background-color: #e0a800;
            border-color: #d39e00;
        }
    </style>
@endsection
