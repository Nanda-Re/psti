<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

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
    </style>
</head>
<body>
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <button class="navbar-toggler" type="button">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar -->
                <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block sidebar">
                    <div class="sidebar-sticky">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" id="dashboard-link" href="#" onclick="loadContent('dashboard')">
                                    <i class="fas fa-tachometer-alt"></i> Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="products-link" href="#" onclick="loadContent('products')">
                                    <i class="fas fa-boxes"></i> Products
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
                    <h1>Welcome to Admin Dashboard</h1>
                </main>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Font Awesome Icons -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
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

        // Toggle sidebar on mobile
        const navbarToggler = document.querySelector('.navbar-toggler');
        const sidebar = document.getElementById('sidebar');

        navbarToggler.addEventListener('click', function () {
            sidebar.classList.toggle('show');
        });
    </script>
</body>
</html>
