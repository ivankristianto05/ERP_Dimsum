<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            height: 100vh;
            background-color: #ff9800; 
            width: 250px;
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
            background-color: white; 
            transition: margin-left 0.3s ease;
        }
        .collapsed-sidebar {
            margin-left: 0;
        }
        .toggle-btn {
            position: absolute;
            top: 20px;
            left: 10px;
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            outline: none;
        }
        .logo {
            width: 100%;
            max-width: 150px; 
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar collapse show" id="sidebarMenu">
            <div class="text-center p-3">
                <img src="logo.png" alt="Logo" class="logo">
            </div>

            <h3 class="text-white p-3">Menu</h3>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="/Product" class="nav-link">Product</a>
                </li>
                <li class="nav-item">
                    <a href="/Materials" class="nav-link">Materials</a>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="content flex-grow-1 collapsed-sidebar" id="mainContent">
            <button class="toggle-btn" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-expanded="true" aria-controls="sidebarMenu">
                &#x22EE; 
            </button>
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const sidebar = document.getElementById('sidebarMenu');
        const content = document.getElementById('mainContent');

        sidebar.addEventListener('hidden.bs.collapse', function () {
            content.classList.remove('expanded-sidebar');
            content.classList.add('collapsed-sidebar');
        });

        sidebar.addEventListener('shown.bs.collapse', function () {
            content.classList.remove('collapsed-sidebar');
            content.classList.add('expanded-sidebar');
        });
    </script>
</body>
</html>
