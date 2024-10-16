<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk - Admin Dashboard</title>
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
            width: 250px; /* Sesuaikan dengan sidebar di dashboard.blade.php */
            background-color: #343a40;
            padding-top: 20px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        #sidebar .nav-link {
            font-size: 18px;
            margin: 15px 0;
            padding: 10px 15px;
            color: #adb5bd; /* Sesuaikan warna teks */
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
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand ms-3" href="#">Admin CV. Langgeng Lestari Jaya</a>
    </nav>

    <!-- Sidebar -->
    <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block sidebar">
        <div class="sidebar-logo">
            <h4>CV. Langgeng Lestari Jaya</h4>
        </div>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('produk.index') }}">
                    <i class="fas fa-boxes"></i> Produk
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-shopping-cart"></i> Orders
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-chart-line"></i> Reports
                </a>
            </li>
        </ul>
    </nav>

    <!-- Main Content -->
    <main class="main-content">
        <h1>Daftar Produk</h1>
        <a href="{{ route('produk.create') }}" class="btn btn-primary mb-3">Tambah Produk</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ number_format($product->price, 2, ',', '.') }}</td>
                    <td>
                        @if ($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="width: 50px; height: auto;">
                        @else
                        Tidak ada gambar
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('produk.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('produk.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle sidebar on mobile
        const navbarToggler = document.querySelector('.navbar-toggler');
        const sidebar = document.getElementById('sidebar');

        navbarToggler.addEventListener('click', function () {
            sidebar.classList.toggle('show');
        });
    </script>
</body>

</html>
