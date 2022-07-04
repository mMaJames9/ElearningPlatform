<ul class="navbar-nav navbar-nav-icons ms-auto flex-row align-items-center">

    @include('partials._search-bar')

    <li class="nav-item">
        <div class="theme-control-toggle fa-icon-wait px-2">
            <input class="form-check-input ms-0 theme-control-toggle-input" id="themeControlToggle" type="checkbox" data-theme-control="theme" value="dark" />
            <label class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch to light theme">
                <span class="fas fa-sun fs-0">

                </span>
            </label>
            <label class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch to dark theme">
                <span class="fas fa-moon fs-0">

                </span>
            </label>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link px-0 notification-indicator notification-indicator-warning notification-indicator-fill fa-icon-wait" href="app/e-commerce/shopping-cart.html">
            <span class="fas fa-shopping-cart" data-fa-transform="shrink-7" style="font-size: 33px;">

            </span>
            <span class="notification-indicator-number">1</span>
        </a>
    </li>

    <li class="nav-item dropdown">
        <a class="nav-link notification-indicator notification-indicator-primary px-0 fa-icon-wait" id="navbarDropdownNotification" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="fas fa-bell" data-fa-transform="shrink-6" style="font-size: 33px;"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-end dropdown-menu-card dropdown-menu-notification" aria-labelledby="navbarDropdownNotification">
            <div class="card card-notification shadow-none">
                <div class="card-header">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                            <h6 class="card-header-title mb-0">Notifications</h6>
                        </div>
                        <div class="col-auto ps-0 ps-sm-3">
                            <a class="card-link fw-normal" href="#">Mark all as read</a>
                        </div>
                    </div>
                </div>
                <div class="scrollbar-overlay" style="max-height:19rem">
                    <div class="list-group list-group-flush fw-normal fs--1">
                        <div class="list-group-title border-bottom">NEW</div>
                        <div class="list-group-item">
                            <a class="notification notification-flush notification-unread" href="#!">
                                <div class="notification-avatar">
                                    <div class="avatar avatar-2xl me-3">
                                        <img class="rounded-circle" src="{{ asset('assets/img/team/1-thumb.png') }}" alt="" />
                                    </div>
                                </div>
                                <div class="notification-body">
                                    <p class="mb-1">
                                        <strong>Emma Watson</strong> replied to your comment : "Hello world 😍"
                                    </p>
                                    <span class="notification-time">
                                        <span class="me-2" role="img" aria-label="Emoji">💬</span>Just now
                                    </span>
                                </div>
                            </a>
                        </div>
                        <div class="list-group-item">
                            <a class="notification notification-flush notification-unread" href="#!">
                                <div class="notification-avatar">
                                    <div class="avatar avatar-2xl me-3">
                                        <div class="avatar-name rounded-circle">
                                            <span>AB</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="notification-body">
                                    <p class="mb-1">
                                        <strong>Albert Brooks</strong> reacted to <strong>Mia Khalifa's</strong> status
                                    </p>
                                    <span class="notification-time">
                                        <span class="me-2 fab fa-gratipay text-danger">

                                        </span>9hr
                                    </span>
                                </div>
                            </a>
                        </div>
                        <div class="list-group-title border-bottom">EARLIER</div>
                        <div class="list-group-item">
                            <a class="notification notification-flush" href="#!">
                                <div class="notification-avatar">
                                    <div class="avatar avatar-2xl me-3">
                                        <img class="rounded-circle" src="{{ asset('assets/img/icons/weather-sm.jpg') }}" alt="" />
                                    </div>
                                </div>
                                <div class="notification-body">
                                    <p class="mb-1">The forecast today shows a low of 20&#8451; in California. See today's weather.</p>
                                    <span class="notification-time">
                                        <span class="me-2" role="img" aria-label="Emoji">🌤️</span>1d
                                    </span>
                                </div>
                            </a>
                        </div>
                        <div class="list-group-item">
                            <a class="border-bottom-0 notification-unread  notification notification-flush" href="#!">
                                <div class="notification-avatar">
                                    <div class="avatar avatar-xl me-3">
                                        <img class="rounded-circle" src="{{ asset('assets/img/logos/oxford.png') }}" alt="" />
                                    </div>
                                </div>
                                <div class="notification-body">
                                    <p class="mb-1">
                                        <strong>University of Oxford</strong> created an event : "Causal Inference Hilary 2019"
                                    </p>
                                    <span class="notification-time">
                                        <span class="me-2" role="img" aria-label="Emoji">✌️</span>1w
                                    </span>
                                </div>
                            </a>
                        </div>
                        <div class="list-group-item">
                            <a class="border-bottom-0 notification notification-flush" href="#!">
                                <div class="notification-avatar">
                                    <div class="avatar avatar-xl me-3">
                                        <img class="rounded-circle" src="{{ asset('assets/img/team/10.jpg') }}" alt="" />
                                    </div>
                                </div>
                                <div class="notification-body">
                                    <p class="mb-1">
                                        <strong>James Cameron</strong> invited to join the group: United Nations International Children's Fund
                                    </p>
                                    <span class="notification-time">
                                        <span class="me-2" role="img" aria-label="Emoji">🙋‍</span>2d
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center border-top">
                    <a class="card-link d-block" href="app/social/notifications.html">View all</a>
                </div>
            </div>
        </div>
    </li>

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
