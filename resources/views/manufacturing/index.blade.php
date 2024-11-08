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
@endsection
