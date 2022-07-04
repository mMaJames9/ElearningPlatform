<div class="collapse navbar-collapse scrollbar" id="navbarStandard">
    <ul class="navbar-nav" data-top-nav-dropdowns="data-top-nav-dropdowns">
        <li class="nav-item dropdown">
            <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}" role="button" id="dashboards">{{__('Dashboard')}}</a>
        </li>

        @can('user_management_access')
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="apps">{{__('User Management ')}}</a>

            <div class="dropdown-menu dropdown-menu-card border-0 mt-0" aria-labelledby="apps">
                <div class="card navbar-card-app shadow-none dark__bg-1000">
                    <div class="card-body scrollbar max-h-dropdown">
                        <img class="img-dropdown" src="{{ asset('assets/img/icons/spot-illustrations/authentication-corner.png') }}" width="130" alt="" />
                        <div class="nav flex-column">

                            @can('role_access')
                            <a class="nav-link py-1 link-600 fw-medium" href="{{ route('roles.index') }}">{{__('Roles')}}</a>
                            @endcan

                            @can('user_access')
                            <a class="nav-link py-1 link-600 fw-medium" href="{{ route('users.index') }}">{{__('Users')}}</a>
                            @endcan

                        </div>
                    </div>
                </div>
            </div>
        </li>
        @endcan

        @can('exam_access')
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="apps">{{__('Exam Management ')}}</a>

            <div class="dropdown-menu dropdown-menu-card border-0 mt-0" aria-labelledby="apps">
                <div class="card navbar-card-app shadow-none dark__bg-1000">
                    <div class="card-body scrollbar max-h-dropdown">
                        <img class="img-dropdown" src="{{ asset('assets/img/icons/spot-illustrations/authentication-corner.png') }}" width="130" alt="" />
                        <div class="nav flex-column">

                            <a class="nav-link py-1 link-600 fw-medium" href="{{ route('exams.index') }}">{{__('Exams')}}</a>

                            @can('classroom_access')
                            <a class="nav-link py-1 link-600 fw-medium" href="{{ route('classrooms.index') }}">{{__('Classrooms')}}</a>
                            @endcan

                            @can('subject_access')
                            <a class="nav-link py-1 link-600 fw-medium" href="{{ route('subjects.index') }}">{{__('Subjects')}}</a>
                            @endcan

                            @can('document_access')
                            <a class="nav-link py-1 link-600 fw-medium" href="{{ route('documents.index') }}">{{__('Documents')}}</a>
                            @endcan

                        </div>
                    </div>
                </div>
            </div>
        </li>
        @endcan

        @can('transaction_access')
        <li class="nav-item dropdown">
            <a class="nav-link {{ request()->is('admin/ressources/transactions') || request()->is('admin/ressources/transactions/*') ? 'active' : '' }}" href="{{ route('transactions.index') }}" role="button" >{{__('Transactions')}}</a>
        </li>
        @endcan
    </ul>
</div>

@include('partials._control-panel')
