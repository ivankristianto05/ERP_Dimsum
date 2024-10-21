@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <a href="{{ route('materials.create') }}" class="btn btn-primary">+ Add Materials</a>
        </div>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th></th>
                    <th scope="col">Material</th>
                    <th scope="col">Stock</th>
                    <th scope="col">UoM</th>
                    <th scope="col">Price</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($materials as $material)
                    <tr>
                        <td>
                            <img src="{{ asset($material->foto) }}" alt="{{ $material->nama }}" width="50"
                                class="mr-2">
                        </td>
                        <td>
                            <div class="d-flex align-items-center">

                                {{ $material->nama }}
                            </div>
                        </td>
                        <td>{{ $material->jumlah }}</td>
                        <td>{{ $material->satuan }}</td>
                        <td>Rp.{{ number_format($material->harga) }}</td>
                        <td>
                            <a href="{{ route('materials.edit', $material) }}" class="btn btn-sm btn-warning">Update</a>
                            <form action="{{ route('materials.destroy', $material) }}" method="POST"
                                style="display:inline;">
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
