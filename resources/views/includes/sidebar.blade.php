<ul class="menu-inner py-1">
    <!-- Dashboard -->
    <li class="menu-item {{$pages=='dashboard'?'active': ''}}">
        <a href="{{route('admin.dashboard')}}" class="menu-link">
            <i class="menu-icon tf-icons fa-solid fa-house"></i>
            <div data-i18n="Analytics">Dashboard</div>
        </a>
    </li>

    <!-- Mastering -->
    <li class="menu-header small text-uppercase"><span class="menu-header-text">Mastering</span></li>
    <li class="menu-item {{$pages=='products'?'active': ''}}">
        <a href="{{route('admin.produk')}}" class="menu-link">
            <i class="menu-icon fa-brands fa-product-hunt"></i>
            <div data-i18n="Support">Produk</div>
        </a>
    </li>


    {{-- <li class="menu-item {{$pages=='portofolio'?'active': ''}}">
    <a href="{{route('admin.portofolio')}}" class="menu-link">
        <i class="menu-icon fa-solid fa-boxes-stacked"></i>
        <div data-i18n="Support">Stok</div>
    </a>
    </li> --}}


    {{-- <li class="menu-item {{$pages=='restok'?'active': ''}}">
    <a href="{{route('admin.restok')}}" class="menu-link">
        <i class="menu-icon fa-solid fa-cubes"></i>
        <div data-i18n="Support">Re-Stok</div>
    </a>
    </li> --}}

    {{-- <li class="menu-item {{$pages=='konfirmasi'?'active': ''}}">
    <a href="{{route('admin.konfirmasi')}}" class="menu-link">
        <i class="menu-icon fa-solid fa-clipboard-check"></i>
        <div data-i18n="Support">Konfirmasi Pembayaran</div>
    </a>
    </li> --}}

    <!-- Transaksi -->
    <li class="menu-header small text-uppercase"><span class="menu-header-text">Menu Laporan</span></li>

</ul>