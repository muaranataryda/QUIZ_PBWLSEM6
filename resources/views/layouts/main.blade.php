<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('img/ikon-listrik.jpeg') }}">
    <title>{{ $title }} | E-PLN</title>

    {{-- my style --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    
</head>

<body class="sb-nav-fixed">
    {{-- Notifikasi Berhasil --}}
    @if (session()->has('berhasilLogin'))
    {!! session('berhasilLogin') !!}
    @endif

    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="/home">
            <img src="{{ asset('img/ikon-listrik.jpeg') }}" class="rounded-circle" width="30px"> SI-PLN
        </a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 m-elg-4 w-100">
            <li class="nav-item dropdown ms-auto">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ auth()->user()->user_nama }} </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    {{-- <li><a class="dropdown-item" href="/user/{{ auth()->user()->user_email }}/edit">Settings</a></li> --}}
                    {{-- <li><hr class="dropdown-divider" /></li> --}}
                    <li><a class="dropdown-item" href="/logout" onclick="return confirm('Yakin ingin logout?')">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="/home">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        
                        <div class="sb-sidenav-menu-heading">Addons</div>
                        <a class="nav-link" href="/golongan">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Golongan
                        </a>
                        <a class="nav-link" href="/pelanggan">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Pelanggan
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    {{ auth()->user()->user_nama }}
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    
                    @yield('main-body')
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy;2023 by Muara Nataryda</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
</body>
</html>


