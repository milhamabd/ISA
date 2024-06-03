{{-- navbar --}}
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container-fluid">
        {{-- <a class="navbar-brand  fs-5 fw-5" href="{{ route('home') }}" wire:navigate>{{ $kantor->nama }}</a> --}}
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#mobil-section">Mobil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#pelayanan-section">Pelayanan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Download App</a>
                </li>
            </ul>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="btn btn-orange me-3" wire:navigate href="{{ route('auth-signin') }}">
                        MASUK
                    </a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-primary" wire:navigate href="{{ route('auth-signup') }}">
                        DAFTAR
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
{{-- end navbar --}}
