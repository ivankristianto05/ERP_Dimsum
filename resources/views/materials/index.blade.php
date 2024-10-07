@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <input type="text" class="form-control w-25" placeholder="Search materials">
            <a href="{{ route('materials.create') }}" class="btn btn-primary">+ Add Materials</a>
        </div>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">
                        <input type="checkbox">
                    </th>
                    <th scope="col">Material</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Price</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($materials as $material)
                <tr>
                    <td><input type="checkbox"></td>
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('storage/' . $material->foto) }}" alt="{{ $material->nama }}" width="50" class="mr-2">
                            {{ $material->nama }}
                        </div>
                    </td>
                    <td>{{ $material->jumlah }}</td>
                    <td>Rp.{{ number_format($material->harga, 2) }}</td>
                    <td>
                        <a href="{{ route('materials.edit', $material->id) }}" class="btn btn-sm btn-warning">Update</a>
                        <form action="{{ route('materials.destroy', $material->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">No materials found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @section('scripts')
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    @endsection
@endsection
