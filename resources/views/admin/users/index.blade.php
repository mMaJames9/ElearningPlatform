<x-app-layout>

    <div class="card mb-3">
        <div class="card-header border-bottom">
            <div class="row flex-between-end">
                <div class="col-auto align-self-center">
                    <h5 class="mb-0 fw-bold">{{__('Table of Users')}}</h5>
                    <p class="mb-0 mt-2 mb-0 fs--1 fw-medium">{{$data}} {{__('user(s)')}}</p>
                </div>
            </div>
        </div>
        <div class="card-body pt-0">
            <div class="tab-content">

                <div id="bulk-select-replace-element" class="mt-4">
                    <a class="btn btn-falcon-success btn-sm" type="button" href="{{ route('users.create') }}">
                        <span class="fas fa-plus" data-fa-transform="shrink-3 down-2"></span>
                        <span class="ms-1">{{__('Add New User')}}</span>
                    </a>
                </div>

                <div class="tab-pane preview-tab-pane active mt-4" role="tabpanel" aria-labelledby="tab-dom-f1f635ad-27f6-4e4f-8ac8-ea1fd3f4edd8" id="dom-f1f635ad-27f6-4e4f-8ac8-ea1fd3f4edd8">
                    <div id="tableRoles" data-list='{"valueNames":["name","email", "phone_number", "role", "updated_at"], "page":10, "pagination":true}'>
                        <div class="table-responsive scrollbar">
                            <table class="table table-striped overflow-hidden fs--1 mb-0">
                                <thead class="bg-200 fw-bold">
                                    <tr class="align-middle py-3">
                                        <th class="text-start">#</th>
                                        <th class="sort" data-sort="name">{{__('Name')}}</th>
                                        <th class="sort" data-sort="email">{{__('Email')}}</th>
                                        <th class="sort" data-sort="phone_number">{{__('Phone Number')}}</th>
                                        <th class="sort" data-sort="role">{{__('Role')}}</th>
                                        <th class="sort" data-sort="updated_at">{{__('Updated at')}}</th>
                                        <th class="sort">{{__('Actions')}}</th>
                                    </tr>
                                </thead>
                                <tbody class="list align-middle text-nowrap" id="table-recent-leads-body">
                                    <tr class="hover-actions-trigger btn-reveal-trigger hover-bg-100">
                                        <td class="text-start">0</td>

                                        <td class="name">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar avatar-xl">
                                                    <img class="rounded-circle" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->username }}" />
                                                </div>
                                                <h6 class="mb-0 ps-2 text-800">{{ ucwords(Auth::user()->name) }}</h6>
                                            </div>
                                        </td>

                                        <td class="text-primary email">
                                            <a href="mailto:{{ Auth::user()->email }}">{{ Auth::user()->email }}</a>
                                        </td>
                                        <td class="phone_number">
                                            {{ Auth::user()->phone_number }}
                                        </td>

                                        <td class="role">
                                            @foreach(Auth::user()->roles as $key => $item)
                                            @if($item->name == "Super Admin")
                                            <small class="badge fw-semi-bold rounded-pill status badge-soft-primary">{{ $item->name }}</small>
                                            @elseif ($item->name == "Admin")
                                            <small class="badge fw-semi-bold rounded-pill status badge-soft-info">{{ $item->name }}</small>
                                            @else
                                            <small class="badge fw-semi-bold rounded-pill status badge-soft-success">{{ $item->name }}</small>
                                            @endif
                                            @endforeach
                                        </td>

                                        <td class="updated_at">
                                            {{ Auth::user()->created_at }}
                                        </td>

                                        <td class="position-relative">

                                        </td>
                                    </tr>

                                    @foreach($users as $key => $user)
                                    <tr class="hover-actions-trigger btn-reveal-trigger hover-bg-100">
                                        <td class="text-start">{{ $loop->iteration }}</td>

                                        <td class="name">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar avatar-xl">
                                                    <img class="rounded-circle" src="{{ $user->profile_photo_url }}" alt="{{ $user->username }}" />
                                                </div>
                                                <h6 class="mb-0 ps-2 text-800">{{  ucwords($user->name) }}</h6>
                                            </div>
                                        </td>

                                        <td class="text-primary email">
                                            <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                                        </td>
                                        <td class="phone_number">
                                            {{ $user->phone_number }}
                                        </td>

                                        <td class="role">
                                            @foreach($user->roles as $key => $item)
                                            @if($item->name == "Super Admin")
                                            <small class="badge fw-semi-bold rounded-pill status badge-soft-primary">{{ $item->name }}</small>
                                            @elseif ($item->name == "Admin")
                                            <small class="badge fw-semi-bold rounded-pill status badge-soft-info">{{ $item->name }}</small>
                                            @else
                                            <small class="badge fw-semi-bold rounded-pill status badge-soft-success">{{ $item->name }}</small>
                                            @endif
                                            @endforeach
                                        </td>

                                        <td class="updated_at">
                                            {{ $user->created_at }}
                                        </td>

                                        <td class="">
                                            @foreach($user->roles as $key => $item)
                                            @if($item->name != "Super Admin")
                                            <div class="d-none d-md-block mb-4">
                                                <div class="hover-actions bg-100">

                                                    @foreach($user->roles as $key => $item)
                                                    @if($item->name == "Member")
                                                    @can('user_show')
                                                    <a role="button" type="button" class="btn icon-item rounded-3 me-2 fs--2 icon-item-sm" href="{{ route('users.show', $user->id) }}">
                                                        <span class="far fa-eye">

                                                        </span>
                                                    </a>
                                                    @endcan
                                                    @endif
                                                    @endforeach

                                                    @foreach($user->roles as $key => $item)
                                                    @if($item->name == "Admin")
                                                    @can('user_delete')
                                                    <button class="btn icon-item rounded-3 me-2 fs--2 icon-item-sm" data-bs-toggle="modal" data-bs-target="#modal{{ $user->id }}">
                                                        <span class="far fa-trash-alt">

                                                        </span>
                                                    </button>
                                                    @endcan
                                                    @endif
                                                    @endforeach
                                                </div>
                                            </div>

                                            <div class="dropdown font-sans-serif btn-reveal-trigger 	d-md-none">
                                                <button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal-sm transition-none" type="button" id="crm-recent-leads-4" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
                                                    <span class="fas fa-ellipsis-h fs--2"></span>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="crm-recent-leads-4">
                                                    @foreach($user->roles as $key => $item)
                                                    @if($item->name == "Member")
                                                    @can('user_show')
                                                    <a class="dropdown-item" href="{{ route('users.show', $user->id) }}">{{__('View')}}</a>
                                                    @endcan
                                                    @endif
                                                    @endforeach

                                                    @foreach($user->roles as $key => $item)
                                                    @if($item->name == "Admin")
                                                    @can('user_delete')
                                                    <a class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#modal{{ $user->id }}">{{__('Delete')}}</a>
                                                    @endcan
                                                    @endif
                                                    @endforeach
                                                </div>
                                            </div>

                                            @endif
                                            @endforeach
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="modal{{ $user->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px">
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-content position-relative">
                                                    <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                                                        <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body p-0">
                                                        <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
                                                            <h4 class="mb-1" id="modalDeleteUser">{{__('Confirm Deletion')}}</h4>
                                                        </div>
                                                        <div class="p-4 pb-0">

                                                            <div class="mb-3">
                                                                <p class="fs--1">
                                                                    {{__('Do you want to delete user ')}}<span class="fw-bold">{{ ucwords($user->name) }}</span> ?
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
