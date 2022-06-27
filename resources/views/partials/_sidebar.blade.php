{{-- partial:partials/_sidebar --}}
<nav class="sidebar">
    <div class="sidebar-header">
        <a href="{{ route('dashboard') }}" class="sidebar-brand">
            <img src="{{ asset('images/logo.png') }}" alt="logo" width="50%">
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">

            <li class="nav-item nav-category">{{__('Main')}}</li>
            <li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">{{__('Dashboard')}}</span>
                </a>
            </li>

            @can('user_management_access')
            <li class="nav-item nav-category">{{__('User Management')}}</li>
            @can('role_access')
            <li class="nav-item {{ request()->is('admin/usermanagement/roles') || request()->is('admin/usermanagement/roles/*') ? 'active' : '' }}">
                <a href="{{ route('roles.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="user-check"></i>
                    <span class="link-title">{{__('Roles')}}</span>
                </a>
            </li>
            @endcan
            @can('user_access')
            <li class="nav-item {{ request()->is('admin/usermanagement/users') || request()->is('admin/usermanagement/users/*') ? 'active' : '' }}">
                <a href="{{ route('users.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="user"></i>
                    <span class="link-title">{{__('Users')}}</span>
                </a>
            </li>
            @endcan
            @endcan

            @can('exam_access')
            <li class="nav-item nav-category">{{__('Exam Management')}}</li>
            <li class="nav-item {{ request()->is('admin/exammanagement/exams') || request()->is('admin/exammanagement/exams/*') ? 'active' : '' }}">
                <a href="{{ route('exams.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="folder"></i>
                    <span class="link-title">{{__('Exams')}}</span>
                </a>
            </li>

            @can('classroom_access')
            <li class="nav-item {{ request()->is('admin/exammanagement/classrooms') || request()->is('admin/exammanagement/classrooms/*') ? 'active' : '' }}">
                <a href="{{ route('classrooms.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="grid"></i>
                    <span class="link-title">{{__('Classroom')}}</span>
                </a>
            </li>
            @endcan

            @can('subject_access')
            <li class="nav-item {{ request()->is('admin/exammanagement/subjects') || request()->is('admin/exammanagement/subjects/*') ? 'active' : '' }}">
                <a href="{{ route('subjects.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="book-open"></i>
                    <span class="link-title">{{__('Subjects')}}</span>
                </a>
            </li>
            @endcan
            @can('document_access')
            <li class="nav-item {{ request()->is('admin/exammanagement/documents') || request()->is('admin/exammanagement/documents/*') ? 'active' : '' }}">
                <a href="{{ route('documents.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="file-text"></i>
                    <span class="link-title">{{__('Documents')}}</span>
                </a>
            </li>
            @endcan
            @endcan

            @can('transaction_access')
            <li class="nav-item nav-category">{{__('Ressources')}}</li>
            <li class="nav-item {{ request()->is('admin/ressources/transactions') || request()->is('admin/ressources/transactions/*') ? 'active' : '' }}">
                <a href="{{ route('transactions.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="dollar-sign"></i>
                    <span class="link-title">{{__('Transactions')}}</span>
                </a>
            </li>
            @endcan
        </ul>
    </div>
</nav>
{{-- partial --}}
