<x-app-layout>

    @section('navbar-info')
    <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
        <h1 class="welcome-text mb-0">{{__('Users')}}</h1>
        <h3 class="welcome-sub-text">{{$data}} {{__('user(s)')}} </h3>
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
                                    <a type="button" class="btn btn-primary btn-icon-text" href="{{ route('users.create')}}">
                                        <i class="mdi mdi-account-plus btn-icon-prepend"></i>
                                        {{__('Add new user')}}
                                    </a>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table id="order-listing" class="table text-center select-table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th class="text-left">{{__('Name')}}</th>
                                            <th>{{__('Email')}}</th>
                                            <th>{{__('Phone Number')}}</th>
                                            <th>{{__('Role')}}</th>
                                            <th>{{__('Created at')}}</th>
                                            <th>{{__('Actions')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>0</td>
                                            <td class="text-left">
                                                <div class="d-flex ">
                                                    <img src="{{ Auth::user()->profile_photo_url }}" alt="">
                                                    <div>
                                                        <h6>{{ Auth::user()->name ?? '' }}</h6>
                                                        <p>{{ Auth::user()->username ?? '' }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ Auth::user()->email }}</td>
                                            <td>{{ Auth::user()->phone_number }}</td>
                                            <td>
                                                <button class="btn-success btn-rounded btn-sm">
                                                    @foreach(Auth::user()->roles as $key => $item)
                                                    {{ $item->name }}
                                                    @endforeach
                                                </button>
                                            </td>
                                            <td>{{ Auth::user()->created_at }}</td>
                                            <td></td>
                                        </tr>
                                        @foreach($users as $key => $user)
                                        <tr class="">
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="text-left">
                                                <div class="d-flex ">
                                                    <img src="{{ $user->profile_photo_url }}" alt="">
                                                    <div>
                                                        <h6>{{ $user->name ?? '' }}</h6>
                                                        <p>{{ $user->username ?? '' }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="">{{ $user->email ?? '' }}</td>
                                            <td class="">{{ $user->phone_number ?? '' }}</td>
                                            <td class="">
                                                <button class="btn-success btn-rounded btn-sm">
                                                    @foreach($user->roles as $key => $item)
                                                    {{ $item->name }}
                                                    @endforeach
                                                </button>
                                            </td>
                                            <td class="">{{ $user->created_at ?? '' }}</td>
                                            <td class="text-center">
                                                @can('user_show')
                                                <a type="button" class="btn btn-inverse-secondary" href="{{ route('users.show', $user->id) }}">
                                                    <i class="mdi mdi-eye"></i>
                                                </a>
                                                @endcan

                                                @can('user_edit')
                                                <a type="button" class="btn btn-inverse-success" href="{{ route('users.edit', $user->id) }}">
                                                    <i class="mdi mdi-grease-pencil"></i>
                                                </a>
                                                @endcan

                                                @can('user_delete')
                                                <a type="button" class="btn btn-inverse-danger" data-bs-toggle="modal" data-bs-target="#modal{{ $user->id }}">
                                                    <i class="mdi mdi-delete"></i>
                                                </a>

                                                <div class="modal fade" id="modal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="ModalDeleteUser" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="ModalDeleteUser">{{__('Confirm Delete')}}</h5>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>You are about to delete <span class="fw-bold">{{ $user->name }}</span>.</p>
                                                                    <p>Click on "Confirm" to validate the action, or "Close" to cancel ...</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <input type="hidden" name="_method" value="DELETE">
                                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                    <button type="submit" class="btn btn-success">{{ __('Confirm') }}</button>

                                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">{{__('Close')}}</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endcan

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
        </div>
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2022. All rights reserved.</span>
            </div>
        </footer>
    </div>
</x-app-layout>
