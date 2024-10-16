<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('/') }}assets/template/sneat/assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>{{Fungsi::app_namapendek()}}</title>

    <meta name="description" content="" />

    @stack('before-style')
    @include('includes.style')
    @stack('after-style')
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="{{url('/')}}" class="app-brand-link" target="_blank">
              <span class="app-brand-logo demo">
                <img src="{{ asset('assets/img/original_satnikk.png') }}" alt="Brand Logo" width="25">
              </span>
              <span class="app-brand-text demo menu-text fw-bolder ms-2">{{Fungsi::app_nama()}}</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              {{-- <i class="bx bx-chevron-left bx-sm align-middle"></i> --}}
              <i class="fa-solid fa-circle-chevron-left pt-1 text-center align-middle"></i>

            </a>
          </div>

          <div class="menu-inner-shadow"></div>

            {{-- sidebar --}}
            @include('includes.sidebar')

        </aside>
        <!-- / Menu -->




        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                {{-- <i class="bx bx-menu bx-sm"></i> --}}
                <i class="fa-solid fa-bars"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              {{-- <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <i class="bx bx-search fs-4 lh-0"></i>
                  <input
                    type="text"
                    class="form-control border-0 shadow-none"
                    placeholder="Search..."
                    aria-label="Search..."
                  />
                </div>
              </div> --}}
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
                {{-- <li class="nav-item lh-1 me-3">
                  <a
                    class="github-button"
                    href="https://github.com/themeselection/sneat-html-admin-template-free"
                    data-icon="octicon-star"
                    data-size="large"
                    data-show-count="true"
                    aria-label="Star themeselection/sneat-html-admin-template-free on GitHub"
                    >Star</a
                  >
                </li> --}}

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      {{-- <img src="{{ asset('/') }}assets/template/sneat/assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" /> --}}
                      <img src="https://ui-avatars.com/api/?name={{Auth::user()?Auth::user()->name:'Belum Login'}}&color=7F9CF5&background=EBF4FF" class="w-px-40 h-auto rounded-circle"  style="display: block;max-width: 100%;height: 200px;object-fit: cover">

                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="https://ui-avatars.com/api/?name={{Auth::user()?Auth::user()->name:'Belum Login'}}&color=7F9CF5&background=EBF4FF" class="w-px-40 h-auto rounded-circle"  style="display: block;max-width: 100%;height: 200px;object-fit: cover">
                              {{-- <img src="{{ asset('/') }}assets/template/sneat/assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" /> --}}
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block">{{Auth::user()?Auth::user()->name:'Belum Login'}}</span>
                            <small class="text-muted">{{Auth::user()?Auth::user()->tipeuser:'Guest'}}</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    {{-- <li>
                      <div class="dropdown-divider"></div>
                    </li> --}}
                    {{-- <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                      </a>
                    </li> --}}
                    {{-- <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-cog me-2"></i>
                        <span class="align-middle">Settings</span>
                      </a>
                    </li> --}}
                    {{-- <li>
                      <a class="dropdown-item" href="#">
                        <span class="d-flex align-items-center align-middle">
                          <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                          <span class="flex-grow-1 align-middle">Billing</span>
                          <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                        </span>
                      </a>
                    </li> --}}
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf


                                <a href="{{ route('logout') }}" class="dropdown-item "
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                    <i class="fas fa-sign-out-alt">
                                    </i>
                                    <span class="align-middle">LogOut</span>
                                </a>
                        </form>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->



          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
        @yield('content')
        @yield('containermodal')
</div>

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  SATNIK IT SOLUTIONS - Sahabat Teknik
                  
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

 <script src="{{ mix('js/app.js') }}" defer></script>
    {{-- script --}}
    @stack('before-script')
    @include('includes.script')
    @stack('after-script')
  </body>
</html>
