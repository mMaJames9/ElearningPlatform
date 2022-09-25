<ul class="navbar-nav navbar-nav-icons ms-auto flex-row align-items-center">

    {{-- @include('partials._search-bar') --}}

    <li class="nav-item dropdown">
        <a class="nav-link pe-0" id="navbarDropdownUser" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="avatar avatar-xl">
                <img class="rounded-circle" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
            </div>
        </a>
        <div class="dropdown-menu dropdown-menu-end py-0" aria-labelledby="navbarDropdownUser">
            <div class="bg-white dark__bg-1000 rounded-2 py-2">
                <div class="d-flex flex-column align-items-center px-5 py-3">
                    <div class="avatar avatar-4xl mb-3">
                        <img class="h-100 w-100 rounded-circle" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </div>
                    <div class="text-center text-dark">
                        <h5 class="text-dark fw-bold mb-0">{{ Auth::user()->name }}</h5>
                        <h6 class="text-dark fs--1 mb-0">{{ Auth::user()->email }}</h6>
                    </div>
                </div>
                <div class="dropdown-divider"></div>

                <a class="dropdown-item" href="{{ route('profile.show') }}">{{ __('My Profile') }}</a>

                @role('Member')
                <a class="dropdown-item" href="{{ route('plans.index') }}">{{ __('My Plan') }}</a>
                @endrole

                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                    <form method="POST" id="logout-form" action="{{ route('logout') }}">
                        @csrf
                    </form>
                </a>
            </div>
        </div>
    </li>
</ul>
