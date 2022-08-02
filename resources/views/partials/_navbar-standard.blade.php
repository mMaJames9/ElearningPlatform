<div class="collapse navbar-collapse scrollbar" id="navbarStandard">
    <ul class="navbar-nav" data-top-nav-dropdowns="data-top-nav-dropdowns">
        <li class="nav-item dropdown">
            <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}" role="button" id="dashboards">{{__('Home')}}</a>
        </li>

        @can('document_access')
        <li class="nav-item dropdown">
            <a class="nav-link {{ request()->routeIs('papers.index*') || request()->routeIs('books.index*')  ? 'active' : '' }} dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="apps">{{__('Documents')}}</a>

            <div class="dropdown-menu dropdown-menu-card border-0 mt-0" aria-labelledby="apps">
                <div class="card navbar-card-app shadow-none dark__bg-1000">
                    <div class="card-body scrollbar max-h-dropdown">
                        <img class="img-dropdown" src="{{ asset('assets/img/icons/spot-illustrations/authentication-corner.png') }}" width="100" alt="" />
                        <div class="nav flex-column">

                            <a class="nav-link py-1 link-600 fw-medium" href="{{ route('books.index') }}">{{__('Books')}}</a>

                            <a class="nav-link py-1 link-600 fw-medium" href="{{ route('papers.index') }}">{{__('Papers')}}</a>

                        </div>
                    </div>
                </div>
            </div>
        </li>
        @endcan
    </ul>
</div>

@include('partials._control-panel')
