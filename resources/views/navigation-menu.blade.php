<nav class="navbar navbar-light navbar-glass navbar-top navbar-expand-xl" style="display: none;">
    <button class="btn navbar-toggler-humburger-icon navbar-toggler me-1 me-sm-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarStandard" aria-controls="navbarStandard" aria-expanded="false" aria-label="Toggle Navigation">
        <span class="navbar-toggle-icon">
            <span class="toggle-line"></span>
        </span>
    </button>
    <a class="navbar-brand me-1 me-sm-3" href="index.html">
        <div class="d-flex align-items-center">
            {{-- <img class="me-2" src="{{ asset('assets/img/icons/spot-illustrations/falcon.png') }}" alt="" width="40" /> --}}
            <img class="me-2" src="{{ asset('images/logo.png') }}" alt="logo" width="120">
            {{-- <span class="font-sans-serif">falcon</span> --}}
        </div>
    </a>

    @include('partials._navbar-standard')

</nav>
