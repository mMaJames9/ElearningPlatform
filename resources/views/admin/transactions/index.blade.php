<x-app-layout>

    <div class="card mb-3">
        <div class="card-header border-bottom">
            <div class="d-flex justify-content-between">
                <div class="align-self-center">
                    <h5 class="mb-0 fw-bold">{{__('Table of Transactions')}}</h5>
                    <p class="mb-0 mt-2 mb-0 fs--1 fw-medium">{{$data}} {{__('transaction(s)')}} {{$status}}</p>
                </div>
                <div class="ms-auto">
                    <div class="nav nav-pills nav-pills-falcon flex-grow-1" role="tablist">
                        <a class="d-none d-md-block btn btn-sm {{request()->is('admin/ressources/transactions/transactionsDay') ? 'active' : '' }}" href="{{ route('transactionsDay') }}">{{__('Today')}}</a>
                        <a class="btn btn-sm {{request()->is('admin/ressources/transactions/transactionsMonth') ? 'active' : '' }}" href="{{ route('transactionsMonth') }}">{{__('Month')}}</a>
                        <a class="btn btn-sm {{request()->is('admin/ressources/transactions/transactionsYear') ? 'active' : '' }}" href="{{ route('transactionsYear') }}">{{__('Year')}}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body pt-0">
            <div class="tab-content">

                {{-- <div id="bulk-select-replace-element" class="mt-4">
                    <a class="btn btn-falcon-success btn-sm" type="button" href="{{ route('transactions.create') }}">
                        <span class="fas fa-plus" data-fa-transform="shrink-3 down-2"></span>
                        <span class="ms-1">{{__('Add New transaction')}}</span>
                    </a>
                </div> --}}

                <div class="tab-pane preview-tab-pane active mt-4" transaction="tabpanel" aria-labelledby="tab-dom-f1f635ad-27f6-4e4f-8ac8-ea1fd3f4edd8" id="dom-f1f635ad-27f6-4e4f-8ac8-ea1fd3f4edd8">
                    <div id="tableTransactions" data-list='{"valueNames":["name", "type", "amount", "updated_at"], "page":10, "pagination":true}'>
                        <div class="table-responsive scrollbar">
                            <table class="table table-striped overflow-hidden fs--1 mb-0">
                                <thead class="bg-200 fw-bold">
                                    <tr class="align-middle py-3">
                                        <th class="text-start">#</th>
                                        <th class="sort" data-sort="name">{{__('Name')}}</th>
                                        <th class="sort" data-sort="type">{{__('Document Type')}}</th>
                                        <th class="sort" data-sort="amount">{{__('Transaction Amounnt')}}</th>
                                        <th class="sort" data-sort="updated_at">{{__('Date')}}</th>
                                    </tr>
                                </thead>
                                <tbody class="list align-middle text-nowrap" id="table-recent-leads-body">

                                    @foreach($transactions as $key => $transaction)
                                    <tr class="hover-actions-trigger btn-reveal-trigger hover-bg-100">
                                        <td class="text-start">{{ $loop->iteration }}</td>

                                        <td class="name">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar avatar-xl">
                                                    <img class="rounded-circle" src="{{ $transaction->user->profile_photo_url }}" alt="{{ $transaction->user->username }}" />
                                                </div>
                                                <h6 class="mb-0 ps-2 text-800">{{  ucwords($transaction->user->name) }}</h6>
                                            </div>
                                        </td>

                                        <td class="type">
                                            {{ ucwords($transaction->document->document_type) ?? '' }}
                                        </td>

                                        <td class="amount">
                                            {{ ucwords($transaction->transaction_amount) ?? '' }}
                                        </td>


                                        <td class="updated_at">
                                            {{ $transaction->created_at }}
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
