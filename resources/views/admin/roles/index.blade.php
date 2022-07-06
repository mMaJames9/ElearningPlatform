<x-app-layout>

    <div class="card mb-3">
        <div class="card-header border-bottom">
            <div class="row flex-between-end">
                <div class="col-auto align-self-center">
                    <h5 class="mb-0 fw-bold">{{__('Table of Roles')}}</h5>
                    <p class="mb-0 fs--1 fw-medium">{{$data}} {{__('role(s)')}}</p>
                </div>
            </div>
        </div>
        <div class="card-body pt-0">
            <div class="tab-content">

                {{-- <div id="bulk-select-replace-element" class="mt-4">
                    <a class="btn btn-falcon-success btn-sm" type="button" href="{{ route('roles.create') }}">
                        <span class="fas fa-plus" data-fa-transform="shrink-3 down-2"></span>
                        <span class="ms-1">{{__('Add New role')}}</span>
                    </a>
                </div> --}}

                <div class="tab-pane preview-tab-pane active mt-4" role="tabpanel">
                    <div id="tableRoles" data-list='{"valueNames":["name","permissions", "updated_at"], "page":10, "pagination":true}'>
                        <div class="table-responsive scrollbar">
                            <table class="table table-striped fs--1 mb-0">
                                <thead class="bg-200 fw-bold">
                                    <tr class="align-middle py-3">
                                        <th class="text-start">#</th>
                                        <th class="sort" data-sort="name">{{__('Name')}}</th>
                                        <th class="sort" data-sort="permissions">{{__('Permissions')}}</th>
                                        <th class="sort" data-sort="updated_at">{{__('Updated at')}}</th>
                                    </tr>
                                </thead>
                                <tbody class="list align-middle text-nowrap" id="table-recent-leads-body">

                                    @foreach($roles as $key => $role)
                                    <tr class="hover-actions-trigger btn-reveal-trigger hover-bg-100">
                                        <td class="text-start">{{ $loop->iteration }}</td>

                                        <td class="name">
                                            <div class="d-flex align-items-center">
                                                <h6 class="mb-0 ps-2 text-800">{{ $role->name }}</h6>
                                            </div>
                                        </td>

                                        <td class="permissions text-wrap" width="50%">
                                            @foreach($role->permissions as $key => $item)
                                            <small class="badge fw-semi-bold rounded-pill status badge-soft-primary">{{ $item->name }}</small>
                                            @endforeach
                                        </td>

                                        <td class="updated_at">
                                            {{ $role->created_at }}
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            <button class="btn btn-sm btn-falcon-default me-1" type="button" title="Previous" data-list-pagination="prev">
                                <span class="fas fa-chevron-left"></span>
                            </button>

                            <ul class="pagination mb-0"></ul>

                            <button class="btn btn-sm btn-falcon-default ms-1" type="button" title="Next" data-list-pagination="next">
                                <span class="fas fa-chevron-right"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
