<x-app-layout>

    <div class="row">

        @if(session('status'))
            <script>
                window.addEventListener("load", function () {
                    Toastify({
                        text: "{{ session('status') }}",
                        duration: 5000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        backgroundColor: "#198754",
                    }).showToast();
                });
            </script>
        @endif

        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-5">
                        <div class="col">
                            <h6 class="card-title">Table of Documents</h6>
                            <p class="text-muted mb-3">{{$dataPaper}} {{__('paper(s)')}} {{__('and')}} {{$dataBook}} {{__('book(s)')}}</p>
                        </div>
                        <div class="col text-end">
                            @can('document_create')
                            <a class="btn btn-outline-primary" href="{{ route('documents.create')}}" document="button">
                                <i class="link-icon" data-feather="plus"></i>
                                {{__('Add new document')}}
                            </a>
                            @endcan
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="dataTableExample" class="table table-hover text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{__('Type')}}</th>
                                    <th>{{__('Exam')}}</th>
                                    <th>{{__('Subject')}}</th>
                                    <th>{{__('Title')}}</th>
                                    <th>{{__('Serie')}}</th>
                                    <th>{{__('Price')}}</th>
                                    <th>{{__('Updated at')}}</th>
                                    <th>{{__('Actions')}}</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($documents as $key => $document)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $document->document_type ?? '' }}</td>
                                    <td>{{ $document->exam->exam_name ?? '' }}</td>
                                    <td lass="text-wrap" width="10%">
                                        @foreach ($document->subjects as $key => $item)
                                        {{ $item->subject_name ?? '' }}
                                        @endforeach
                                    </td>
                                    <td class="text-wrap" width="15%">{{ $document->document_title ?? '' }}</td>
                                    <td class="text-wrap" width="15%">
                                        @foreach(explode(', ', $document->document_serie) as $serie)
                                        <span class="badge bg-dark">{{ $serie }}</span>
                                        @endforeach
                                    </td>
                                    <td>{{ $document->document_price ?? '' }}</td>
                                    <td>{{ $document->updated_at ?? '' }}</td>
                                    <td>
                                        <div class="dropdown mb-2">
                                            <button class="btn p-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                @can('document_show')
                                                <a class="dropdown-item d-flex align-items-center" href="{{ route('documents.show', $document->id) }}">
                                                    <i data-feather="eye" class="icon-sm me-2"></i>
                                                    <span class="">{{__(' Show')}}</span>
                                                </a>

                                                @endcan
                                                @can('document_edit')
                                                <a class="dropdown-item d-flex align-items-center" href="{{ route('documents.edit', $document->id) }}">
                                                    <i data-feather="edit-2" class="icon-sm me-2"></i>
                                                    <span class="">{{__(' Edit')}}</span>
                                                </a>
                                                @endcan

                                                @can('document_delete')
                                                <a role="button" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#modal{{ $document->id }}">
                                                    <i data-feather="trash" class="icon-sm me-2"></i>
                                                    <span class="">{{__(' Delete')}}</span>
                                                </a>
                                                @endcan
                                            </div>
                                        </div>

                                        <!-- Modal -->
                                        <div class="modal fade" id="modal{{ $document->id }}" tabindex="-1" aria-labelledby="ModalDeleteUser" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{ route( 'documents.destroy', $document->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="ModalDeleteUser">{{__('Confirm Deletion')}}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            {{__('Do you want to delete the document ')}}<span class="fw-bold">{{ $document->document_title }}</span> ?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('Close')}}</button>
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                            <button type="submit" class="btn btn-primary">{{ __('Confirm') }}</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
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
