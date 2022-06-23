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
                            <h6 class="card-title">Table of Transactions</h6>
                            <p class="text-muted mb-3">{{$data}} {{__('transaction(s)')}} {{$status}}</p>
                        </div>
                        <div class="col text-end">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('transactionsDay') }}" class="btn btn-outline-primary {{request()->is('admin/ressources/transactions/transactionsDay') ? 'active' : '' }}">{{__('Today')}}</a>
                                <a href="{{ route('transactionsMonth') }}" class="btn btn-outline-primary {{request()->is('admin/ressources/transactions/transactionsMonth') ? 'active' : '' }}">{{__('Month')}}</a>
                                <a href="{{ route('transactionsYear') }}" class="btn btn-outline-primary {{request()->is('admin/ressources/transactions/transactionsYear') ? 'active' : '' }}">{{__('Year')}}</a>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="dataTableExample" class="table table-hover text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{__('User Name')}}</th>
                                    <th>{{__('Document Type')}}</th>
                                    <th>{{__('Transaction Amounnt')}}</th>
                                    <th>{{__('Updated at')}}</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($transactions as $key => $transaction)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $transaction->user->name ?? '' }}</td>
                                    <td>{{ $transaction->document->document_type ?? '' }}</td>
                                    <td>{{ $transaction->transaction_amount ?? '' }}</td>
                                    <td>{{ $transaction->updated_at ?? '' }}</td>
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
