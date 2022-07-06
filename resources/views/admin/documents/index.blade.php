<x-app-layout>

    <div class="card mb-3">
        <div class="card-header border-bottom">
            <div class="row flex-between-end">
                <div class="col-auto align-self-center">
                    <h5 class="mb-0 fw-bold">{{__('Table of Documents')}}</h5>
                    <p class="mb-0 fs--1 fw-medium">{{$dataPaper}} {{__('paper(s)')}} {{__('and')}} {{$dataBook}} {{__('book(s)')}}</p>
                </div>
            </div>
        </div>
        <div class="card-body pt-0">
            <div class="tab-content">

                <div id="bulk-select-replace-element" class="mt-4">
                    <a class="btn btn-falcon-success btn-sm" type="button" href="{{ route('documents.create') }}">
                        <span class="fas fa-plus" data-fa-transform="shrink-3 down-2"></span>
                        <span class="ms-1">{{__('Add New Document')}}</span>
                    </a>
                </div>

                <div class="tab-pane preview-tab-pane active mt-4" role="tabpanel">
                    <div id="tableRoles" data-list='{"valueNames":["type", "exam", "subject", "serie", "price", "updated_at"], "page":10, "pagination":true}'>
                        <div class="table-responsive scrollbar">
                            <table class="table table-striped fs--1 mb-0">
                                <thead class="bg-200 fw-bold">
                                    <tr class="align-middle py-3">
                                        <th class="text-start">#</th>
                                        <th class="sort" data-sort="type">{{__('Type')}}</th>
                                        <th class="sort" data-sort="exam">{{__('Exam')}}</th>
                                        <th class="sort" data-sort="subject">{{__('Subject')}}</th>
                                        <th class="sort" data-sort="serie">{{__('Serie')}}</th>
                                        <th class="sort" data-sort="price">{{__('Price')}}</th>
                                        <th class="sort" data-sort="updated_at">{{__('Updated at')}}</th>
                                        <th class="sort text-center">{{__('Actions')}}</th>
                                    </tr>
                                </thead>
                                <tbody class="list align-middle text-nowrap" id="table-recent-leads-body">
                                    @foreach($documents as $key => $document)
                                    <tr class="hover-actions-trigger btn-reveal-trigger hover-bg-100">
                                        <td class="text-start">{{ $loop->iteration }}</td>

                                        <td class="type">
                                            {{ ucwords($document->document_type) ?? '' }}
                                        </td>

                                        <td class="exam">
                                            {{ ucwords($document->exam->exam_name) ?? '' }}
                                        </td>

                                        <td class="subject text-wrap" width="15%">
                                            @foreach ($document->subjects as $key => $item)
                                            <small class="badge fw-semi-bold rounded-pill status badge-soft-primary">
                                            {{ ucwords($item->subject_name) ?? '' }}
                                            </small>
                                            @endforeach
                                        </td>

                                        <td class="serie text-wrap" width="20%">
                                            @foreach ($document->classrooms as $key => $item)
                                            <small class="badge fw-semi-bold rounded-pill status badge-soft-secondary">
                                            {{ ucwords($item->classroom_name) ?? '' }}
                                            </small>
                                            @endforeach
                                        </td>

                                        <td class="price">
                                            {{ ucwords($document->document_price) ?? '' }}
                                        </td>

                                        <td class="updated_at">
                                            {{ $document->created_at }}
                                        </td>

                                        <td class="text-wrap" width="15%">
                                            <div class="d-none d-lg-block">
                                                <div class="hover-actions bg-100 justify-content-center">
                                                    @can('document_show')
                                                    <a role="button" type="button" class="btn icon-item rounded-3 me-2 fs--2 icon-item-sm" href="{{ route('documents.show', $document->id) }}">
                                                        <span class="far fa-eye"></span>
                                                    </a>
                                                    @endcan

                                                    @can('document_edit')
                                                    <a role="button" type="button" class="btn icon-item rounded-3 me-2 fs--2 icon-item-sm" href="{{ route('documents.edit', $document->id) }}">
                                                        <span class="far fa-edit"></span>
                                                    </a>
                                                    @endcan

                                                    @can('document_delete')
                                                    <button class="btn icon-item rounded-3 me-2 fs--2 icon-item-sm" data-bs-toggle="modal" data-bs-target="#modal{{ $document->id }}">
                                                        <span class="far fa-trash-alt"></span>
                                                    </button>
                                                    @endcan
                                                </div>
                                            </div>

                                            <div class="dropdown font-sans-serif btn-reveal-trigger d-lg-none">
                                                <button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal-sm transition-none" type="button" id="crm-recent-leads-4" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
                                                    <span class="fas fa-ellipsis-h fs--2"></span>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="crm-recent-leads-4">
                                                    @can('document_show')
                                                    <a class="dropdown-item" href="{{ route('documents.show', $document->id) }}">{{__('View')}}</a>
                                                    @endcan

                                                    @can('document_edit')
                                                    <a class="dropdown-item" href="{{ route('documents.edit', $document->id) }}">{{__('Edit')}}</a>
                                                    @endcan

                                                    @can('document_delete')
                                                    <div class="dropdown-divider"></div>

                                                    <a class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#modal{{ $document->id }}">{{__('Delete')}}</a>
                                                    @endcan
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="modal{{ $document->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px">
                                            <form action="{{ route('documents.destroy', $document->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-content position-relative">
                                                    <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                                                        <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body p-0">
                                                        <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
                                                            <h4 class="mb-1" id="modalDeleteDocument">{{__('Confirm Deletion')}}</h4>
                                                        </div>
                                                        <div class="p-4 pb-0">

                                                            <div class="mb-3">
                                                                <p class="fs--1">
                                                                    {{__('Do you want to delete document ')}}<span class="fw-bold">{{ ucwords($document->document_type) }}</span> ?
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
