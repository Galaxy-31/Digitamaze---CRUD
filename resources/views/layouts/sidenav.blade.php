<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ url('/') }}"
            target="_self">
            <img src="{{ asset('master/assets/img/logo.png') }}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">Data Sekolah</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main" style="height: calc(100vh)">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" href="{{ url('/dashboard') }}">
                    <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
        @role('Admin')
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Data</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('ruangans') ? 'active' : '' }}" href="{{ url('ruangans') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-shop text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Kelas</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('gurus') ? 'active' : '' }}" href="{{ url('gurus') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Guru</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('siswas') ? 'active' : '' }}" href="{{ url('siswas') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Siswa</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('datas') ? 'active' : '' }}" href="{{ url('datas') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-archive-2 text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Data</span>
                </a>
            </li>
          
        @endrole
       
        </ul>
    </div>
</aside>
