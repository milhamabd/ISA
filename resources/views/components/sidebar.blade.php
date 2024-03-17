<!-- Sidebar Start -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <div class="text-nowrap logo-img">
                <img src="{{ asset('images/logos/order_ride.svg') }}" width="120px" alt="" />
            </div>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>

        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">

            {{-- check user login --}}
            @if (Auth::user()->role_id == 1)
                <ul id="sidebarnav">
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">Home</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('admin-dashboard') }}" aria-expanded="false"
                            wire:navigate>
                            <span>
                                <i class="ti ti-layout-dashboard"></i>
                            </span>
                            <span class="hide-menu">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">DATA PESANAN</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('admin-pesanan') }}" wire:navigate aria-expanded="false">
                            <span>
                                <i class="ti ti-shopping-cart"></i>
                            </span>
                            <span class="hide-menu">Data Pesanan</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('admin-pengembalian') }}" wire:navigate
                            aria-expanded="false">
                            <span>
                                <i class="ti ti-table"></i>
                            </span>
                            <span class="hide-menu">Data Pengembalian</span>
                        </a>
                    </li>

                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">DATA MOBIL</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('admin-jenis-mobil') }}" aria-expanded="false"
                            wire:navigate>
                            <span>
                                <i class="ti ti-car"></i>
                            </span>
                            <span class="hide-menu">Jenis Mobil</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('admin-merek-mobil') }}" aria-expanded="false"
                            wire:navigate>
                            <span>
                                <i class="ti ti-car"></i>
                            </span>
                            <span class="hide-menu">Merek Mobil</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('admin-mobil') }}" aria-expanded="false" wire:navigate>
                            <span>
                                <i class="ti ti-car"></i>
                            </span>
                            <span class="hide-menu">Mobil</span>
                        </a>
                    </li>

                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">DATA KANTOR</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('admin-kantor') }}" aria-expanded="false" wire:navigate>
                            <span>
                                <i class="ti ti-home-hand"></i>
                            </span>
                            <span class="hide-menu">Kantor</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('admin-supir') }}" aria-expanded="false" wire:navigate>
                            <span>
                                <i class="ti ti-users"></i>
                            </span>
                            <span class="hide-menu">Supir</span>
                        </a>
                    </li>

                </ul>
            @else
                <ul id="sidebarnav">
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">Home</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('member-dashboard') }}" aria-expanded="false"
                            wire:navigate>
                            <span>
                                <i class="ti ti-layout-dashboard"></i>
                            </span>
                            <span class="hide-menu">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">DATA MOBIL</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('member-mobil') }}" wire:navigate aria-expanded="false">
                            <span>
                                <i class="ti ti-car"></i>
                            </span>
                            <span class="hide-menu">Mobil</span>
                        </a>
                    </li>


                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">DATA PESANAN</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('member-pesanan') }}" wire:navigate
                            aria-expanded="false">
                            <span>
                                <i class="ti ti-shopping-cart"></i>
                            </span>
                            <span class="hide-menu">Daftar Pesanan</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('member-pengembalian') }}" wire:navigate
                            aria-expanded="false">
                            <span>
                                <i class="ti ti-table"></i>
                            </span>
                            <span class="hide-menu">Data Pengembalian</span>
                        </a>
                    </li>

                </ul>
            @endif
            {{-- end check user login --}}

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!--  Sidebar End -->
