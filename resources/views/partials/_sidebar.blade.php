<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">

        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="mdi mdi-chart-bar menu-icon"></i>
                <span class="menu-title">{{__('Dashboard')}}</span>
            </a>
        </li>

        <li class="nav-item nav-category">{{__('User Management')}}</li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="mdi mdi-account-check menu-icon"></i>
                <span class="menu-title">{{__('Roles')}}</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route("users.index") }}">
                <i class="mdi mdi-account-multiple menu-icon"></i>
                <span class="menu-title">{{__('Users')}}</span>
            </a>
        </li>

        <li class="nav-item nav-category">{{__('Paper Management')}}</li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fa fa-question menu-icon"></i>
                <span class="menu-title">{{__('Examinations')}}</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="mdi mdi-book-open-page-variant menu-icon"></i>
                <span class="menu-title">{{__('Subjects')}}</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#exam-doc" aria-expanded="false" aria-controls="exam-doc">
                <i class="mdi mdi-file-document menu-icon"></i>
                <span class="menu-title">{{__('Documents')}}</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="exam-doc">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="#">{{__('Books')}}</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">{{__('Papers')}}</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item nav-category">{{__('Ressources')}}</li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fa fa-exchange menu-icon"></i>
                <span class="menu-title">{{__('Transactions')}}</span>
            </a>
        </li>
    </ul>

</nav>
