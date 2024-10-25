@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Vendor</h2>

        <form action="{{ route('vendor.update', $vendor->id) }}" method="POST" enctype="multipart/form-data" class="vendor-form">
            @csrf
            @method('PUT')

            <div class="form-left">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{ $vendor->name }}" required>

                <label for="address">Address:</label>
                <textarea id="address" name="address" required>{{ $vendor->address }}</textarea>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ $vendor->email }}" required>

                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" value="{{ $vendor->phone }}" required>

                <label for="notes">Notes:</label>
                <textarea id="notes" name="notes">{{ $vendor->notes }}</textarea>

                <button type="submit" class="btn-submit">Update Vendor</button>
            </div>

            <div class="form-right">
                <label for="image">Vendor Image/Logo:</label>
                <input type="file" id="image" name="image" accept="image/*" onchange="previewImage(event)">

                <div class="image-preview">
                    <img id="imagePreview" src="{{ $vendor->image_path ? Storage::url($vendor->image_path) : '#' }}"
                        alt="Image Preview" style="max-width: 150px;">
                </div>
            </div>
        </form>
    </div>

    <style>
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 8px;
        }

        h2 {
            color: #343a40;
            text-align: center;
            margin-bottom: 20px;
        }

        .vendor-form {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 20px;
        }

        .form-left,
        .form-right {
            width: 48%;
        }

        .form-left label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
            color: #495057;
        }

        .form-left input[type="text"],
        .form-left input[type="email"],
        .form-left textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border-radius: 4px;
            border: 1px solid #ced4da;
            box-sizing: border-box;
        }

        .form-left textarea {
            resize: vertical;
            height: 80px;
        }

        .btn-submit {
            display: block;
            margin-top: 15px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-submit:hover {
            background-color: #0056b3;
        }

        .form-right label {
            font-weight: bold;
            color: #495057;
        }

        .form-right input[type="file"] {
            display: block;
            margin-top: 10px;
        }

        .image-preview {
            margin-top: 10px;
            text-align: center;
        }

        .image-preview img {
            max-width: 150px;
            max-height: 150px;
            border: 1px solid #ced4da;
            border-radius: 4px;
        }
    </style>

    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('imagePreview');
                output.src = reader.result;
                output.style.display = 'block';
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endsection
