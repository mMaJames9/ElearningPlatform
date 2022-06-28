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
                                    <th>{{__('Date')}}</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($transactions as $key => $transaction)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ ucwords($transaction->user->name) ?? '' }}</td>
                                    <td>
                                        <a class="preview_hover">
                                            {{ ucwords($transaction->document->document_type) ?? '' }}
                                            <iframe onload="hideNavbar()" id="description_frame" class="description_frame" src="{{ route('documents.show', $transaction->document->id) }}" scrolling="no" frameborder="0" marginheight="0%" marginwidth="0%" width="100%" height="100%"></iframe>
                                        </a>
                                    </td>
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

    @section('scripts')
    <script>
        $(".preview_hover").mouseover(function() {
        $(this).children(".description_frame").show();
        }).mouseout(function() {
        $(this).children(".description_frame").hide();
        });

        function hideNavbar() {
            $("#description_frame").contents().find("#navbar").remove();
            $("#description_frame").contents().find("#page-content").removeClass("page-content");
            $("#description_frame").contents().find("#stretch-card").removeClass("col-md-6");
        }

    </script>
    @endsection

</x-app-layout>
