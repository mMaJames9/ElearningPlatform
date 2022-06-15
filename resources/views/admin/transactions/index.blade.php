<x-app-layout>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-5">
                        <div class="col">
                            <h6 class="card-title">Table of Transactions</h6>
                            <p class="text-muted mb-3">{{'$data'}} {{__('transaction(s)')}}</p>
                        </div>
                        {{-- <div class="col text-end">
                            @can('user_create')
                            <a class="btn btn-outline-primary" href="{{ route('users.create')}}" role="button">
                                <i class="link-icon" data-feather="plus"></i>
                                {{__('Add new user')}}
                            </a>
                            @endcan
                        </div> --}}
                    </div>
                    
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                {{-- @foreach($users as $key => $user) --}}
                                <tr>
                                    <td class="text-center">{{ $user->email ?? '' }}</td>
                                </tr>
                                {{-- @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</x-app-layout>
