<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        /* Sidebar Styling */
        #sidebar {
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            width: 250px;
            background-color: #343a40;
            padding-top: 20px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        #sidebar .nav-link {
            font-size: 18px;
            margin: 15px 0;
            padding: 10px 15px;
            color: #adb5bd;
            border-radius: 5px;
            transition: background 0.3s ease;
        }

        #sidebar .nav-link:hover {
            background-color: #495057;
            color: #fff;
        }

        #sidebar .nav-link.active {
            background-color: #007bff;
            color: white;
        }

        /* Main Content Styling */
        .main-content {
            margin-left: 250px;
            padding: 20px;
            background-color: #f8f9fa;
            min-height: 100vh;
        }

        /* Navbar Styling */
        .navbar {
            background-color: #007bff;
            color: white;
            margin-left: 250px;
            width: calc(100% - 250px);
        }

        .navbar-toggler {
            display: none;
        }

        @media (max-width: 992px) {
            #sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .navbar {
                margin-left: 0;
                width: 100%;
            }

            .main-content {
                margin-left: 0;
            }

            .navbar-toggler {
                display: block;
            }

            #sidebar {
                display: none;
            }

            #sidebar.show {
                display: block;
                width: 100%;
            }
        }

        /* Logo Styling */
        .sidebar-logo {
            padding: 15px;
            text-align: center;
            color: white;
            font-size: 1.5rem;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar brand atau judul -->
        <a class="navbar-brand ms-3" href="#">Admin CV. Langgeng Lestari Jaya</a>

        <!-- Navbar items -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <!-- User Account Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user-circle"></i> {{ Auth::user() ? Auth::user()->name : 'Belum Login' }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <!-- Link untuk logout -->
                            <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <!-- Form Logout (perhatikan ini sesuai dengan rute logout Laravel Anda) -->
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar -->
                <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block sidebar">
                    <div class="sidebar-sticky">
                        <!-- Logo or Store Name -->
                        <div class="sidebar-logo">
                            <h4>CV. Langgeng Lestari Jaya</h4>
                            <!-- Jika ada logo, gunakan <img src="path/to/logo.png" alt="Logo" class="img-fluid"> -->
                        </div>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" id="dashboard-link" href="#" onclick="loadContent('dashboard')">
                                    <i class="fas fa-tachometer-alt"></i> Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="products-link" href="{{ route('produk.index') }}">
                                    <i class="fas fa-boxes"></i> Produk
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="orders-link" href="#" onclick="loadContent('orders')">
                                    <i class="fas fa-shopping-cart"></i> Orders
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="reports-link" href="#" onclick="loadContent('reports')">
                                    <i class="fas fa-chart-line"></i> Reports
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>

                <!-- Main Content -->
                <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 main-content" id="main-content">
                    <!-- Konten akan dimuat di sini -->
                    
                </main>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Font Awesome Icons -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <script>
        function loadContent(page) {
            const contentMap = {
                dashboard: '<h1>Dashboard</h1><p>Ini adalah halaman dashboard.</p>',
                products: '<h1>Products</h1><p>Ini adalah halaman produk.</p>',
                orders: '<h1>Orders</h1><p>Ini adalah halaman pesanan.</p>',
                reports: '<h1>Reports</h1><p>Ini adalah halaman laporan.</p>',
            };

            // Mengubah konten
            document.getElementById('main-content').innerHTML = contentMap[page];

            // Menghapus kelas 'active' dari semua link
            const links = document.querySelectorAll('#sidebar .nav-link');
            links.forEach(link => {
                link.classList.remove('active');
            });

            // Menambahkan kelas 'active' ke link yang dipilih
            document.getElementById(`${page}-link`).classList.add('active');
        }

        // Memuat konten dashboard saat halaman dimuat
        document.addEventListener('DOMContentLoaded', function() {
            loadContent('dashboard'); // Memuat konten dashboard secara default
        });

        // Toggle sidebar on mobile
        const navbarToggler = document.querySelector('.navbar-toggler');
        const sidebar = document.getElementById('sidebar');

        navbarToggler.addEventListener('click', function() {
            sidebar.classList.toggle('show');
        });
    </script>
</body>

</html>