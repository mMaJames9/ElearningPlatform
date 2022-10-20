<x-app-layout>

    <div class="card mb-3">
        <div class="card-header border-bottom">
            <div class="d-flex justify-content-between">
                <div class="align-self-center">
                    <h5 class="mb-0 fw-bold">{{__('Table of Subscriptions')}}</h5>
                    <p class="mb-0 fs--1 fw-medium">{{$data}} {{__('subscription(s)')}} {{$status}}</p>
                </div>
                <div class="ms-auto text-center">
                    <div class="nav nav-pills nav-pills-falcon flex-grow-1" role="tablist">
                        <a class="d-none d-md-block btn btn-sm {{ request()->routeIs('subscriptionsDay') ? 'active' : '' }}" href="{{ route('subscriptionsDay') }}">{{__('Today')}}</a>
                        <a class="btn btn-sm {{ request()->routeIs('subscriptionsMonth') ? 'active' : '' }}" href="{{ route('subscriptionsMonth') }}">{{__('Month')}}</a>
                        <a class="btn btn-sm {{ request()->routeIs('subscriptionsYear') ? 'active' : '' }}" href="{{ route('subscriptionsYear') }}">{{__('Year')}}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body pt-0">
            <div class="tab-content">

                {{-- <div id="bulk-select-replace-element" class="mt-4">
                    <a class="btn btn-falcon-success btn-sm" type="button" href="{{ route('subscriptions.create') }}">
                        <span class="fas fa-plus" data-fa-transform="shrink-3 down-2"></span>
                        <span class="ms-1">{{__('Add New subscription')}}</span>
                    </a>
                </div> --}}

                <div class="tab-pane preview-tab-pane active mt-4" role="tabpanel">
                    <div id="tableSubscriptions" data-list='{"valueNames":["name", "subscription", "price", "updated_at"], "page":10, "pagination":true}'>
                        <div class="table-responsive scrollbar">
                            <table class="table table-striped fs--1 mb-0">
                                <thead class="bg-200 fw-bold">
                                    <tr class="align-middle py-3">
                                        <th class="text-start">#</th>
                                        <th class="sort" data-sort="name">{{__('Name')}}</th>
                                        <th class="sort" data-sort="subscription">{{__('Subscription')}}</th>
                                        <th class="sort" data-sort="price">{{__('Price')}}</th>
                                        <th class="sort" data-sort="updated_at">{{__('Date')}}</th>
                                    </tr>
                                </thead>
                                <tbody class="list align-middle text-nowrap">

                                    @foreach($subscriptions as $key => $subscription)
                                    <tr class="hover-actions-trigger btn-reveal-trigger hover-bg-100">
                                        <td class="text-start">{{ $loop->iteration }}</td>

                                        <td class="name">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar avatar-xl">
                                                    <img class="rounded-circle" src="{{ $subscription->user->profile_photo_url }}" alt="{{ $subscription->user->username }}" />
                                                </div>
                                                <h6 class="mb-0 ps-2 text-800">{{  ucwords($subscription->user->name) }}</h6>
                                            </div>
                                        </td>

                                        <td class="subscription">
                                            @if ($subscription->suppressed_at == null)
                                            <span class="badge badge rounded-pill badge-soft-success">
                                                {{__('Active')}}
                                                <span class="ms-1 fas fa-check" data-fa-transform="shrink-2"></span>
                                            </span>
                                            @else
                                            <span class="badge badge rounded-pill badge-soft-danger">
                                                {{__('Canceled')}}
                                                <span class="ms-1 fas fa-ban" data-fa-transform="shrink-2"></span>
                                            </span>
                                            @endif
                                        </td>

                                        <td class="price">
                                            {{ ucwords($subscription->subscriptionPrices->last()->pivot->subscription_price) ?? ''  }} XAF
                                        </td>


                                        <td class="updated_at">
                                            {{ $subscription->created_at }}
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
