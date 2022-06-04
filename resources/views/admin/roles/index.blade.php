<x-app-layout>

    @section('navbar-info')
    <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
        <h1 class="welcome-text mb-0">{{__('Roles')}}</h1>
        <h3 class="welcome-sub-text">{{$data}} {{__('role(s)')}} </h3>
    </li>
    @endsection

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="mt-4 col-12">
                            <div class="d-sm-flex justify-content-between align-items-start mb-5">
                                <div>
                                    {{-- <a type="button" class="btn btn-primary btn-icon-text" href="{{ route('roles.create')}}">
                                        <i class="mdi mdi-account-plus btn-icon-prepend"></i>
                                        {{__('Add new Role')}}
                                    </a> --}}
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table id="order-listing" class="table text-center select-table table-responsive">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{__('Name')}}</th>
                                            <th>{{__('Permissions')}}</th>
                                            <th>{{__('Created at')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($roles as $key => $role)
                                        <tr class="">
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="">{{ $role->name ?? '' }}</td>
                                            <td class="">
                                                @foreach($role->permissions as $key => $item)
                                                <div class="badge badge-opacity-warning mb-2">{{ $item->name }}</div>
                                                @endforeach
                                            </td>
                                            <td class="">{{ $role->created_at ?? '' }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2022. All rights reserved.</span>
            </div>
        </footer>
    </div>
</x-app-layout>
