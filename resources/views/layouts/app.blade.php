<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            height: 100vh;
            background-color: #ff9800; /* Warna sekunder (orange) */
        }
        .sidebar a {
            color: white;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #ff5722;
        }
        .content {
            padding: 20px;
            background-color: white; /* Warna primer (putih) */
        }
    </style>
</head>
<body>

    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar d-flex flex-column p-3">
            <h3 class="text-white">Menu</h3>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="#" class="nav-link">Produk</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Bahan Baku</a>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="content flex-grow-1">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
