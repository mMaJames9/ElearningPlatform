<nav class="navbar navbar-light navbar-vertical navbar-expand-xl" style="display: none;">
    <script>
        var navbarStyle = localStorage.getItem("navbarStyle");
        if (navbarStyle && navbarStyle !== 'transparent') {
            document.querySelector('.navbar-vertical').classList.add(`navbar-${navbarStyle}`);
        }
    </script>
    <div class="d-flex align-items-center">
        <div class="toggle-icon-wrapper">
            <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Toggle Navigation">
                <span class="fas fa-bars text-primary">
                    <span class="toggle-line"></span>
                </span>
            </button>
        </div>
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <div class="d-flex align-items-center py-3">
               <img class="my-2" src="{{ asset('assets/img/icons/spot-illustrations/falcon.png') }}" alt="logo" width="180" />
            </div>
        </a>
    </div>
    <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
        <div class="navbar-vertical-content scrollbar">
            <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">

                <li class="nav-item mt-3">
                    <!-- parent pages-->
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}" role="button" aria-expanded="false">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span class="fas fa-chart-pie"></span>
                            </span>
                            <span class="nav-link-text ps-1">{{__('Dashboard')}}</span>
                        </div>
                    </a>
                </li>

                @can('user_management_access')
                <li class="nav-item">
                    <!-- label-->
                    <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                        <div class="col-auto navbar-vertical-label">{{__('User Management')}}</div>
                        <div class="col ps-0">
                            <hr class="mb-0 navbar-vertical-divider" />
                        </div>
                    </div>

                    @can('role_access')
                    <!-- parent pages-->
                    <a class="nav-link {{ request()->routeIs('roles*') ? 'active' : '' }}" href="{{ route('roles.index') }}" role="button" aria-expanded="false">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span class="fas fa-user-check"></span>
                            </span>
                            <span class="nav-link-text ps-1">{{__('Roles')}}</span>
                        </div>
                    </a>
                    @endcan

                    @can('user_access')
                    <!-- parent pages-->
                    <a class="nav-link {{ request()->routeIs('users*') ? 'active' : '' }}" href="{{ route('users.index') }}" role="button" aria-expanded="false">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span class="fas fa-user-group"></span>
                            </span>
                            <span class="nav-link-text ps-1">{{__('Users')}}</span>
                        </div>
                    </a>
                    @endcan
                </li>
                @endcan

                @can('exam_access')
                <li class="nav-item">
                    <!-- label-->
                    <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                        <div class="col-auto navbar-vertical-label">{{__('Exam Management')}}</div>
                        <div class="col ps-0">
                            <hr class="mb-0 navbar-vertical-divider" />
                        </div>
                    </div>

                    <!-- parent pages-->
                    <a class="nav-link {{ request()->routeIs('exams*') ? 'active' : '' }}" href="{{ route('exams.index') }}" role="button" aria-expanded="false">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span class="fas fa-folder"></span>
                            </span>
                            <span class="nav-link-text ps-1">{{__('Exams')}}</span>
                        </div>
                    </a>

                    @can('classroom_access')
                    <!-- parent pages-->
                    <a class="nav-link {{ request()->routeIs('classrooms*') ? 'active' : '' }}" href="{{ route('classrooms.index') }}" role="button" aria-expanded="false">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span class="fas fa-school"></span>
                            </span>
                            <span class="nav-link-text ps-1">{{__('Classrooms')}}</span>
                        </div>
                    </a>
                    @endcan

                    @can('subject_access')
                    <!-- parent pages-->
                    <a class="nav-link {{ request()->routeIs('subjects*') ? 'active' : '' }}" href="{{ route('subjects.index') }}" role="button" aria-expanded="false">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span class="fas fa-book-open"></span>
                            </span>
                            <span class="nav-link-text ps-1">{{__('Subjects')}}</span>
                        </div>
                    </a>
                    @endcan

                    @can('document_access')
                    <!-- parent pages-->
                    <a class="nav-link {{ request()->routeIs('documents*') ? 'active' : '' }}" href="{{ route('documents.index') }}" role="button" aria-expanded="false">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span class="fas fa-file-alt"></span>
                            </span>
                            <span class="nav-link-text ps-1">{{__('Documents')}}</span>
                        </div>
                    </a>
                    @endcan
                </li>
                @endcan

                @can('subscription_access')
                <li class="nav-item">
                    <!-- label-->
                    <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                        <div class="col-auto navbar-vertical-label">{{__('Ressources')}}</div>
                        <div class="col ps-0">
                            <hr class="mb-0 navbar-vertical-divider" />
                        </div>
                    </div>

                    <!-- parent pages-->
                    <a class="nav-link {{ request()->routeIs('subscriptions*') ? 'active' : '' }}" href="{{ route('subscriptions.index') }}" role="button" aria-expanded="false">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span class="fas fa-rocket"></span>
                            </span>
                            <span class="nav-link-text ps-1">{{__('Subscriptions')}}</span>
                        </div>
                    </a>
                </li>
                @endcan
            </ul>
        </div>
    </div>
</nav>
