@extends('layouts.app')

@section('content')
<div class="container">
    <div class="header">
        <div><strong>BOM Item Number:</strong> {{ $bom->item_number }}</div>
        <div><strong>Description:</strong> {{ $bom->description }}</div>
        <div><strong>Unit of Measure:</strong> {{ $bom->unit_of_measure }}</div>
    </div>

    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>BOM id</th>
                <th>Item</th>
                <th>Component Items</th>
                <th>U of M</th>
                <th>Qty</th>
                <th>Cost</th>
                <th>Ext Cost</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>{{ $bom->item_number }}</td>
                <td></td>
                <td>{{ $bom->unit_of_measure }}</td>
                <td>1.0000</td>
                <td>0.0000</td>
                <td>0.0000</td>
            </tr>
            @foreach($bom->components as $component)
            <tr>
                <td>2</td>
                <td>{{ $bom->item_number }}</td>
                <td>{{ $component->component_item }}</td>
                <td>{{ $component->unit_of_measure }}</td>
                <td>{{ number_format($component->quantity, 4) }}</td>
                <td>{{ number_format($component->cost, 4) }}</td>
                <td>{{ number_format($component->quantity * $component->cost, 4) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="total mt-4 text-right">
        <strong>Total:</strong> 
        {{ $bom->components->sum('quantity') }} &nbsp;&nbsp; 
        {{ number_format($bom->components->sum(function($component) { return $component->quantity * $component->cost; }), 4) }}
    </div>
</div>
@endsection
