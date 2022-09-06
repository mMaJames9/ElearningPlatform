<nav class="navbar navbar-light navbar-glass navbar-top navbar-expand-xl" style="display: none;">
    <button class="btn navbar-toggler-humburger-icon navbar-toggler me-1 me-sm-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarStandard" aria-controls="navbarStandard" aria-expanded="false" aria-label="Toggle Navigation">
        <span class="fas fa-bars text-primary">
            <span class="toggle-line"></span>
        </span>
    </button>
    <a class="navbar-brand me-1 me-sm-3" href="index.html">
        <div class="d-flex align-items-center">
           <img class="my-2" src="{{ asset('assets/img/icons/spot-illustrations/falcon.png') }}" alt="logo" width="180" />
        </div>
    </a>

    @include('partials._navbar-standard')

</nav>
