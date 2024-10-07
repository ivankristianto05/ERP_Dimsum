@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Daftar Produk</h2>

        <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">+ Tambah Produk</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Kode Produk</th>
                    <th>Harga</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>
                            @if($product->foto)
                                <img src="{{ asset($product->foto) }}" alt="Foto Produk" width="50">
                            @endif
                        </td>
                        <td>{{ $product->nama }}</td>
                        <td>{{ $product->kategori }}</td>
                        <td>{{ $product->codeprodak }}</td>
                        <td>Rp.{{ number_format($product->harga, 2) }}</td>
                        <td>{{ $product->deskripsi }}</td>
                        
                        <td>
                            <a data-bs-toggle="modal" data-bs-target="#exampleModal{{$product->id}}" class="btn btn-success btn-sm">Detail</a>
                            <a href="{{ route('products.edit', $product) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>

                    <div class="modal fade" id="exampleModal{{$product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">Detail bahan</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              
                              @forelse ($product->materials()->get() as $item)
                    
                              
                              <div class="d-flex justify-content-between aling-items-center border-bottom py-2">
                                <div>{{$item->nama}}</div>
                                <div>{{$item->jumlah}} {{$item->satuan}}</div>
                              </div>
                  
                                  
                              @empty
                                  
                              @endforelse
                            </div>
                   
                          </div>
                        </div>
                      </div>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
