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
                            <h6 class="card-title">Table of Users</h6>
                            <p class="text-muted mb-3">{{$data}} {{__('user(s)')}}</p>
                        </div>
                        <div class="col text-end">
                            @can('user_create')
                            <a class="btn btn-outline-primary" href="{{ route('users.create') }}" role="button">
                                <i class="link-icon" data-feather="plus"></i>
                                {{__('Add new user')}}
                            </a>
                            @endcan
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="dataTableExample" class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-left">{{__('Name')}}</th>
                                    <th class="text-center">{{__('Email')}}</th>
                                    <th class="text-center">{{__('Phone Number')}}</th>
                                    <th class="text-center">{{__('Role')}}</th>
                                    <th class="text-center">{{__('Updated at')}}</th>
                                    <th class="text-center">{{__('Actions')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">0</td>
                                    <td class="text-left text-wrap" width="30%">
                                        <div class="d-flex align-items-center">
                                            <div class="me-3">
                                                <img src="{{ Auth::user()->profile_photo_url }}" class="rounded-circle wd-35" alt="">
                                            </div>
                                            <div>
                                                <div class="d-flex justify-content-between">
                                                    <h6 class="text-body mb-2">{{ Auth::user()->name ?? '' }}</h6>
                                                </div>
                                                <p class="text-muted tx-13">{{ Auth::user()->username ?? '' }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">{{ Auth::user()->email }}</td>
                                    <td class="text-center">{{ Auth::user()->phone_number }}</td>
                                    <td class="text-center">
                                        @foreach(Auth::user()->roles as $key => $item)
                                        <span class="badge bg-primary">{{ $item->name }}</span>
                                        @endforeach
                                    </td>
                                    <td class="text-center">{{ Auth::user()->created_at }}</td>
                                    <td class="text-center"></td>
                                </tr>
                                @foreach($users as $key => $user)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="me-3">
                                                <img src="{{ $user->profile_photo_url }}" class="rounded-circle wd-35" alt="">
                                            </div>
                                            <div>
                                                <div class="d-flex justify-content-between">
                                                    <h6 class="text-body mb-2">{{ ucwords($user->name) ?? '' }}</h6>
                                                </div>
                                                <p class="text-muted tx-13">{{ $user->username ?? '' }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">{{ $user->email ?? '' }}</td>
                                    <td class="text-center">{{ $user->phone_number }}</td>
                                    <td class="text-center">
                                        @foreach($user->roles as $key => $item)
                                        @if($item->name == "Super Admin")
                                        <span class="badge bg-primary">{{ $item->name }}</span>
                                        @elseif ($item->name == "Admin")
                                        <span class="badge bg-info">{{ $item->name }}</span>
                                        @else
                                        <span class="badge bg-success">{{ $item->name }}</span>
                                        @endif
                                        @endforeach
                                    </td>
                                    <td class="text-center">{{ $user->created_at }}</td>
                                    <td class="text-center">
                                        @foreach($user->roles as $key => $item)
                                        @if($item->name != "Super Admin")
                                        <div class="dropdown mb-2">
                                            <button class="btn p-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                @foreach($user->roles as $key => $item)
                                                @if($item->name == "Member")
                                                @can('user_show')
                                                <a class="dropdown-item d-flex align-items-center" href="{{ route('users.show', $user->id) }}">
                                                    <i data-feather="eye" class="icon-sm me-2"></i>
                                                    <span class="">{{__(' Show')}}</span>
                                                </a>
                                                @endcan
                                                @endif
                                                @endforeach

                                                @foreach($user->roles as $key => $item)
                                                @if($item->name == "Admin")
                                                @can('user_delete')
                                                <a role="button" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#modal{{ $user->id }}">
                                                    <i data-feather="trash" class="icon-sm me-2"></i>
                                                    <span class="">{{__(' Delete')}}</span>
                                                </a>
                                                @endcan
                                                @endif
                                                @endforeach
                                            </div>
                                        </div>

                                        <!-- Modal -->
                                        <div class="modal fade" id="modal{{ $user->id }}" tabindex="-1" aria-labelledby="ModalDeleteUser" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="ModalDeleteUser">{{__('Confirm Deletion')}}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            {{__('Do you want to delete user ')}}<span class="fw-bold">{{ ucwords($user->name) }}</span> ?
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
                                        @endif
                                        @endforeach
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
