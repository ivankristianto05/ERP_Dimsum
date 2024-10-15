<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BOM Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Bill of Materials (BOM) Report</h2>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>BOM Number</th>
                <th>Product</th>
                <th>Material</th>
                <th>Qty</th>
                <th>Satuan</th>
                <th>Cost (Rp)</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($boms as $bom)
                <tr>
                    <td rowspan="{{ $bom->details->count() + 1 }}">{{ $loop->iteration }}</td>
                    <td rowspan="{{ $bom->details->count() + 1 }}">{{ $bom->bom_number }}</td>
                    <td rowspan="{{ $bom->details->count() + 1 }}">{{ $bom->product->name }}</td>
                </tr>
                @foreach ($bom->details as $detail)
                    <tr>
                        <td>{{ $detail->material->name }}</td>
                        <td>{{ $detail->qty }}</td>
                        <td>{{ $detail->satuan }}</td>
                        <td>{{ number_format($detail->cost, 2) }}</td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</body>
</html>
