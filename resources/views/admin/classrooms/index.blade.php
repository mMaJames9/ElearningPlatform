<x-app-layout>

    <div class="card mb-3">
        <div class="card-header border-bottom">
            <div class="row flex-between-end">
                <div class="col-auto align-self-center">
                    <h5 class="mb-0 fw-bold">{{__('Table of Classrooms')}}</h5>
                    <p class="mb-0 mt-2 mb-0 fs--1 fw-medium">{{$data}} {{__('classroom(s)')}}</p>
                </div>
            </div>
        </div>
        <div class="card-body pt-0">
            <div class="tab-content">

                <div id="bulk-select-replace-element" class="mt-4">
                    <a class="btn btn-falcon-success btn-sm" type="button" href="{{ route('classrooms.create') }}">
                        <span class="fas fa-plus" data-fa-transform="shrink-3 down-2"></span>
                        <span class="ms-1">{{__('Add New Classroom')}}</span>
                    </a>
                </div>

                <div class="tab-pane preview-tab-pane active mt-4" role="tabpanel">
                    <div id="tableRoles" data-list='{"valueNames":["name", "updated_at"], "page":10, "pagination":true}'>
                        <div class="table-responsive scrollbar">
                            <table class="table table-striped overflow-hidden fs--1 mb-0">
                                <thead class="bg-200 fw-bold">
                                    <tr class="align-middle py-3">
                                        <th class="text-start">#</th>
                                        <th class="sort" data-sort="name">{{__('Name')}}</th>
                                        <th class="sort" data-sort="updated_at">{{__('Updated at')}}</th>
                                        <th class="sort">{{__('Actions')}}</th>
                                    </tr>
                                </thead>
                                <tbody class="list align-middle text-nowrap" id="table-recent-leads-body">
                                    @foreach($classrooms as $key => $classroom)
                                    <tr class="hover-actions-trigger btn-reveal-trigger hover-bg-100">
                                        <td class="text-start">{{ $loop->iteration }}</td>

                                        <td class="name">
                                            <div class="d-flex align-items-center">
                                                <h6 class="mb-0 ps-2 text-800">{{ ucwords($classroom->classroom_name) ?? '' }}</h6>
                                            </div>
                                        </td>

                                        <td class="updated_at">
                                            {{ $classroom->created_at }}
                                        </td>

                                        <td class="">
                                            <div class="d-none d-md-block mb-4">
                                                <div class="hover-actions bg-100">
                                                    @can('classroom_edit')
                                                    <a role="button" type="button" class="btn icon-item rounded-3 me-2 fs--2 icon-item-sm" href="{{ route('classrooms.edit', $classroom->id) }}">
                                                        <span class="far fa-edit"></span>
                                                    </a>
                                                    @endcan

                                                    @can('classroom_delete')
                                                    <button class="btn icon-item rounded-3 me-2 fs--2 icon-item-sm" data-bs-toggle="modal" data-bs-target="#modal{{ $classroom->id }}">
                                                        <span class="far fa-trash-alt"></span>
                                                    </button>
                                                    @endcan
                                                </div>
                                            </div>

                                            <div class="dropdown font-sans-serif btn-reveal-trigger 	d-md-none">
                                                <button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal-sm transition-none" type="button" id="crm-recent-leads-4" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
                                                    <span class="fas fa-ellipsis-h fs--2"></span>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="crm-recent-leads-4">
                                                    @can('classroom_edit')
                                                    <a class="dropdown-item" href="{{ route('classrooms.edit', $classroom->id) }}">{{__('Edit')}}</a>
                                                    <div class="dropdown-divider"></div>
                                                    @endcan

                                                    @can('classroom_delete')
                                                    <a class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#modal{{ $classroom->id }}">{{__('Delete')}}</a>
                                                    @endcan
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="modal{{ $classroom->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px">
                                            <form action="{{ route('classrooms.destroy', $classroom->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-content position-relative">
                                                    <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                                                        <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body p-0">
                                                        <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
                                                            <h4 class="mb-1" id="modalDeleteClassroom">{{__('Confirm Deletion')}}</h4>
                                                        </div>
                                                        <div class="p-4 pb-0">

                                                            <div class="mb-3">
                                                                <p class="fs--1">
                                                                    {{__('Do you want to delete classroom ')}}<span class="fw-bold">{{ ucwords($classroom->classroom_name) }}</span> ?
                                                                </p>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">{{__('Close')}}</button>
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <button class="btn btn-falcon-danger" type="submmit">{{ __('Confirm') }}</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

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
