<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard - NiceAdmin Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets_dashboard/img/favicon.png" rel="icon">
    <link href="assets_dashboard/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets_dashboard/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_dashboard/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_dashboard/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_dashboard/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_dashboard/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_dashboard/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_dashboard/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <link href="{{ asset('assets_dashboard/css/style.css') }}" rel="stylesheet">
</head>

<body>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="/" class="logo d-flex align-items-center">
                <img src="{{ asset('images/logo.png') }}" style="width: 35px; height: 35px;" alt="Logo"
                    class="logo">
                <span class="d-none d-lg-block">DIMSUM</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div><!-- End Search Bar -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown">
                        <img src="assets_dashboard/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">Admin</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>Kevin Anderson</h6>
                            <span>Web Designer</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- Sidebar -->
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <!-- Inventori dan Produksi -->
            <li class="nav-item">
                <a class="nav-link {{ request()->is('products*', 'materials*', 'bom*', 'manufacturing*') ? '' : 'collapsed' }}"
                    data-bs-target="#inventory-production-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Inventori dan Produksi</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="inventory-production-nav"
                    class="nav-content collapse {{ request()->is('products*', 'materials*', 'bom*', 'manufacturing*') ? 'show' : '' }}"
                    data-bs-parent="#sidebar-nav">
                    <li>
                        <a class="{{ request()->is('products*') ? 'active' : '' }}" href="/products">
                            <i class="bi bi-circle"></i>Produk
                        </a>
                    </li>
                    <li>
                        <a class="{{ request()->is('materials*') ? 'active' : '' }}" href="/materials">
                            <i class="bi bi-circle"></i>Material
                        </a>
                    </li>
                    <li>
                        <a class="{{ request()->is('bom*') ? 'active' : '' }}" href="/bom">
                            <i class="bi bi-circle"></i>BoM
                        </a>
                    </li>
                    <li>
                        <a class="{{ request()->is('manufacturing*') ? 'active' : '' }}" href="/manufacturing">
                            <i class="bi bi-circle"></i>Manufacturing
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Pemasok dan Permintaan Pembelian -->
            <li class="nav-item">
                <a class="nav-link {{ request()->is('rfq*', 'vendor*') ? '' : 'collapsed' }}"
                    data-bs-target="#supplier-rfq-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-file-earmark-plus"></i><span>Pemasok dan Permintaan Pembelian</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="supplier-rfq-nav"
                    class="nav-content collapse {{ request()->is('rfq*', 'vendor*') ? 'show' : '' }}"
                    data-bs-parent="#sidebar-nav">
                    <li>
                        <a class="{{ request()->is('rfq*') ? 'active' : '' }}" href="/rfq">
                            <i class="bi bi-circle"></i>RFQ
                        </a>
                    </li>
                    <li>
                        <a class="{{ request()->is('vendor*') ? 'active' : '' }}" href="/vendor">
                            <i class="bi bi-circle"></i>Vendor
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </aside>


    <main id="main" class="main">
        <section class="section dashboard">
            <div class="card recent-sales overflow-auto py-4">

                <div class="card-body">
                    @yield('content')
                </div>
            </div>
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>InformatikaITN</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets_dashboard/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets_dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets_dashboard/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('assets_dashboard/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('assets_dashboard/vendor/quill/quill.js') }}"></script>
    <script src="{{ asset('assets_dashboard/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets_dashboard/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets_dashboard/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets_dashboard/js/main.js') }}"></script>

</body>

</html>
