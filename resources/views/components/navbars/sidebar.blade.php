@props(['activePage'])

<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0 d-flex text-wrap align-items-center" href="{{ route('dashboard') }}">
            <img src="{{ asset('assets') }}/img/logo_peka.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-2 font-weight-bold text-white">Dashboard | Si-PEKA 2024</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Administrator </h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'dashboard' ? ' active bg-gradient-primary' : '' }}" href="{{ route('dashboard') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1rem;" class="fas fa-lg fa-tachometer-alt ps-2 pe-2 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'pendaftar' ? ' active bg-gradient-primary' : '' }}" href="{{ route('pendaftar.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1rem;" class="fas fa-lg fa-users ps-2 pe-2 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-1">Pendaftar</span>
                </a>
            </li>


            <li class="nav-item">
                <li class="nav-item">
                    <a class="nav-link text-white {{ $activePage == 'logout' ? ' active bg-gradient-primary' : '' }}" href="{{ route('login') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i style="font-size: 1rem;" class="fas fa-lg fa-sign-out-alt ps-2 pe-2 text-center"></i>
                        </div>
                        <span class="nav-link-text ms-1">Logout</span>
                    </a>
                </li>

    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">

    </div>
</aside>
