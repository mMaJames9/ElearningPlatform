{{-- partial:partials/_sidebar --}}
<nav class="sidebar">
    <div class="sidebar-header">
        <a href="{{ route('dashboard') }}" class="sidebar-brand">
            <img src="{{ asset('assets/images/logo.svg') }}" alt="logo" width="50%">
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
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">{{__('Dashboard')}}</span>
                </a>
            </li>
            
            @can('user_management_access')
            <li class="nav-item nav-category">{{__('User Management')}}</li>
            @can('role_access')
            <li class="nav-item">
                <a href="{{ route('roles.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="user-check"></i>
                    <span class="link-title">{{__('Roles')}}</span>
                </a>
            </li>
            @endcan
            @can('user_access')
            <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="user"></i>
                    <span class="link-title">{{__('Users')}}</span>
                </a>
            </li>
            @endcan
            @endcan
            
            @can('exam_access')
            <li class="nav-item nav-category">{{__('Exam Management')}}</li>
            <li class="nav-item">
                <a href="{{ route('exams.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="folder"></i>
                    <span class="link-title">{{__('Exams')}}</span>
                </a>
            </li>
            @can('subject_access')
            <li class="nav-item">
                <a href="{{ route('subjects.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="book-open"></i>
                    <span class="link-title">{{__('Subjects')}}</span>
                </a>
            </li>
            @endcan
            @can('document_access')
            <li class="nav-item">
                <a href="{{ route('documents.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="file-text"></i>
                    <span class="link-title">{{__('Documents')}}</span>
                </a>
            </li>
            @endcan
            @endcan
            
            @can('transaction_access')
            <li class="nav-item nav-category">{{__('Ressources')}}</li>
            <li class="nav-item">
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