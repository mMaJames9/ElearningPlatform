<x-app-layout>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-5">
                        <div class="col">
                            <h6 class="card-title">Table of Subjects</h6>
                            <p class="text-muted mb-3">{{$data}} {{__('subject(s)')}}</p>
                        </div>
                        <div class="col text-end">
                            @can('subject_create')
                            <a class="btn btn-outline-primary" href="{{ route('subjects.create')}}" subject="button">
                                <i class="link-icon" data-feather="plus"></i>
                                {{__('Add new subject')}}
                            </a>
                            @endcan
                        </div>
                    </div>
                    
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table table-hover text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{__('Name')}}</th>
                                    <th>{{__('Updated at')}}</th>
                                    <th>{{__('Actions')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach($subjects as $key => $subject)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $subject->subject_name ?? '' }}</td>
                                    <td>{{ $subject->updated_at }}</td>
                                    <td>
                                        <div class="dropdown mb-2">
                                            <button class="btn p-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                @can('subject_edit')
                                                <a class="dropdown-item d-flex align-items-center" href="{{ route('subjects.edit', $subject->id) }}">
                                                    <i data-feather="edit-2" class="icon-sm me-2"></i>
                                                    <span class="">{{__(' Edit')}}</span>
                                                </a>
                                                @endcan

                                                @can('subject_delete')
                                                <a role="button" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#modal{{ $subject->id }}">
                                                    <i data-feather="trash" class="icon-sm me-2"></i>
                                                    <span class="">{{__(' Delete')}}</span>
                                                </a>
                                                @endcan
                                            </div>
                                        </div>

                                        <!-- Modal -->
                                        <div class="modal fade" id="modal{{ $subject->id }}" tabindex="-1" aria-labelledby="ModalDeleteUser" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{ route('subjects.destroy', $subject->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="ModalDeleteUser">{{__('Confirm Deletion')}}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            {{__('Do you want to delete subject ')}}<span class="fw-bold">{{ $subject->subject_name }}</span> ?
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
