<x-app-layout>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-5">
                        <div class="col">
                            <h6 class="card-title">Table of Roles</h6>
                            <p class="text-muted mb-3">{{$data}} {{__('role(s)')}}</p>
                        </div>
                        <!-- <div class="col text-end">
                            @can('role_create')
                            <a class="btn btn-outline-primary" href="{{ route('roles.create')}}" role="button">
                                <i class="link-icon" data-feather="plus"></i>
                                {{__('Add new role')}}
                            </a>
                            @endcan
                        </div> -->
                    </div>

                    <div class="table-responsive">
                        <table id="dataTableExample" class="table table-hover text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{__('Name')}}</th>
                                    <th>{{__('Permissions')}}</th>
                                    <th>{{__('Updated at')}}</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($roles as $key => $role)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $role->name ?? '' }}</td>
                                    <td class="text-center text-wrap" width="40%">
                                        @foreach($role->permissions as $key => $item)
                                        <span class="badge bg-dark">{{ $item->name }}</span>
                                        @endforeach
                                    </td>
                                    <td>{{ $role->created_at }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
