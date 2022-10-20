@section('scripts')
<script>
    var p_book = {{ $p_book }};
    var p_paper = {{ $p_paper }};

    const days = @json($days);
    const subs = @json($subs);
    const subscriptionArr = @json($subscriptionArr);
    const last_subscriptionArr = @json($last_subscriptionArr);

    function submitForm()
    {
        var x = document.getElementsByName('referrer_form');
        x[0].submit();
    }
</script>

<script src="{{ asset('assets/js/statistics.js') }}?v=2"></script>
@endsection

<div class="row g-3 mb-3">
    <div class="col-xxl-6 col-xl-12">
        <div class="row g-3">
            <div class="col-12">
                <div class="card bg-transparent-50 overflow-hidden">
                    <div class="card-header position-relative">
                        <div class="bg-holder d-none d-md-block bg-card z-index-1" style="background-image:url({{ asset('assets/img/illustrations/ecommerce-bg.png') }});background-size:230px;background-position:right bottom;z-index:-1;">

                        </div>
                        <div class="position-relative z-index-2">
                            <div>
                                <h3 class="text-primary mb-1">{{__('Hello')}}, <span class="text-info fw-medium">{{ Auth::user()->name }}!</h3>
                                <p>{{__('Welcome to the CRM')}}</p>
                            </div>
                            <div class="d-flex py-3">
                                <div class="pe-3">
                                    <p class="text-600 fs--1 fw-medium">Today's visit </p>
                                    <h4 class="text-800 mb-0">{{ number_format(14209, 0, ',', ' ') }}</h4>
                                </div>
                                <div class="ps-3">
                                    <p class="text-600 fs--1">Today’s total sales </p>
                                    <h4 class="text-800 mb-0">{{ number_format(21349, 0, ',', ' ') }} XAF</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body p-0">
                        <ul class="mb-0 list-unstyled">
                            @if($new_user !== 0)
                            <li class="alert mb-0 rounded-0 py-3 px-card alert-info border-x-0 border-top-0">
                                <div class="row flex-between-center">
                                    <div class="col">
                                        <div class="d-flex">
                                            <div class="fas fa-circle mt-1 fs--2"></div>
                                            <p class="fs--1 ps-2 mb-0">
                                                <strong>{{ $new_user }} {{__('users')}} </strong>
                                                {{__('today')}}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-auto d-flex align-items-center">
                                        <a class="alert-link fs--1 fw-medium" href="{{ route('users.index') }}">
                                            {{__('View users')}}
                                            <i class="fas fa-chevron-right ms-1 fs--2"></i>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            @endif

                            @if ($new_subscribers !== 0)
                            <li class="alert mb-0 rounded-0 py-3 px-card greetings-item border-top border-x-0 border-top-0">
                                <div class="row flex-between-center">
                                    <div class="col">
                                        <div class="d-flex">
                                            <div class="fas fa-circle mt-1 fs--2 text-primary"></div>
                                            <p class="fs--1 ps-2 mb-0">
                                                <strong>{{ $new_subscribers }} {{_('new subscriptions')}} </strong>
                                                {{__('today')}}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-auto d-flex align-items-center">
                                        <a class="alert-link fs--1 fw-medium" href="{{ route('subscriptionsDay') }}">
                                            {{__('View subscriptions')}}
                                            <i class="fas fa-chevron-right ms-1 fs--2"></i>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="card h-md-100 ecommerce-card-min-width">
                            <div class="card-header pb-0">
                                <h6 class="mb-0 mt-2 d-flex align-items-center">
                                    {{__('Weekly Subscriptions')}}
                                    <span class="ms-1 text-400" data-bs-toggle="tooltip" data-bs-placement="top" title="{{__('Calculated based on subscriptions from the last 7 days')}}">
                                        <span class="far fa-question-circle" data-fa-transform="shrink-1"></span>
                                    </span>
                                </h6>
                            </div>
                            <div class="card-body d-flex flex-column justify-content-end">
                                <div class="row">
                                    <div class="col">
                                        <p class="font-sans-serif lh-1 mb-1 fs-2">{{ $count_subs }}</p>
                                        <span class="badge badge-soft-{{ $week_growth >= 0 ? 'success' : 'danger' }} rounded-pill fs--2">{{$week_growth }}%</span>
                                    </div>
                                    <div class="col-auto ps-0">
                                        <div class="echart-bar-weekly-sales h-100 echart-bar-weekly-sales-smaller-width"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="col-md-6">
                        <div class="card product-share-doughnut-width">
                            <div class="card-header pb-0">
                                <h6 class="mb-0 mt-2 d-flex align-items-center">Product Share</h6>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex flex-column justify-content-between">
                                        <p class="font-sans-serif lh-1 mb-1 fs-2">34.6%</p>
                                        <span class="badge badge-soft-warning rounded-pill fs--2">
                                            <span class="fas fa-caret-up me-1"></span>
                                            3.5%
                                        </span>
                                    </div>
                                    <div>
                                        <canvas class="my-n5" id="marketShareDoughnut" width="112"></canvas>
                                        <p class="mb-0 text-center fs--2 mt-4 text-500">
                                            Target:
                                            <span class="text-800">55%</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    <div class="col-md-6">
                        <div class="card h-md-100 h-100">
                            <div class="card-body">
                                <div class="row h-100 justify-content-between g-0">
                                    <div class="col-5 col-sm-6 col-xxl pe-2">
                                        <h6 class="mt-1">{{ __('Count Documents') }}</h6>
                                        <div class="fs--2 mt-3">
                                            <div class="d-flex flex-between-center mb-1">
                                                <div class="d-flex align-items-center">
                                                    <span class="dot bg-primary"></span>
                                                    <span class="fw-semi-bold">{{__('Books')}}</span>
                                                </div>
                                                <div class="d-xxl-none">{{ $p_book }}%</div>
                                            </div>
                                            <div class="d-flex flex-between-center mb-1">
                                                <div class="d-flex align-items-center">
                                                    <span class="dot bg-success"></span>
                                                    <span class="fw-semi-bold">{{__('Papers')}}</span>
                                                </div>
                                                <div class="d-xxl-none">{{ $p_paper }}%</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto position-relative">
                                        <div class="echart-product-share"></div>
                                        <div class="position-absolute top-50 start-50 translate-middle text-dark fs-2">{{ $documents }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card h-100">
                            <div class="card-header pb-0">
                                <h6 class="mb-0 mt-2 d-flex align-items-center">{{__('Monthly Downloads')}}</h6>
                            </div>
                            <div class="card-body">
                                <div class="row align-items-end">
                                    <div class="col">
                                        <p class="font-sans-serif lh-1 mb-1 fs-2">{{ $downloads }}</p>
                                        <div class="badge badge-soft-{{ $down_growth >= 0 ? 'primary' : 'danger' }}  rounded-pill fs--2">
                                            <span class="fas fa-caret-up me-1"></span>
                                            {{ $down_growth }}%
                                        </div>
                                    </div>
                                    <div class="col-auto ps-0">
                                        <div class="total-order-ecommerce" data-echarts='{"series":[{"type":"line","data": {{ json_encode($numb) }} }],"grid":{"bottom":"-10px"}}'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="col-xxl-6 col-xl-12">
        <div class="card py-3 mb-3">
            <div class="card-body py-3">

                <div class="row g-0">
                    <div class="col-6 col-md-4 border-200 border-bottom border-end pb-4">
                        <h6 class="pb-1 text-700">{{__('Exams')}}</h6>
                        <p class="font-sans-serif lh-1 mb-3 pb-1 fs-2">{{ $exams }}</p>
                    </div>
                    <div class="col-6 col-md-4 border-200 border-md-200 border-bottom border-md-end pb-4 ps-3">
                        <h6 class="pb-1 text-700">{{__('Classrooms')}}</h6>
                        <p class="font-sans-serif lh-1 mb-3 pb-1 fs-2">{{ $classrooms }}</p>
                    </div>
                    <div class="col-6 col-md-4 border-200 border-bottom border-end border-md-end-0 pb-4 pt-4 pt-md-0 ps-md-3">
                        <h6 class="pb-1 text-700">{{__('Subjects')}}</h6>
                        <p class="font-sans-serif lh-1 mb-3 pb-1 fs-2">{{ $subjects }}</p>
                    </div>
                    <div class="col-6 col-md-4 border-200 border-md-200 border-bottom border-md-bottom-0 border-md-end pt-4 pb-md-0 ps-3 ps-md-0">
                        <h6 class="pb-1 text-700">{{__('Members')}}</h6>
                        <p class="font-sans-serif lh-1 mb-3 pb-1 fs-2">{{ $members }}</p>
                    </div>
                    <div class="col-6 col-md-4 border-200 border-md-bottom-0 border-end pt-4 pb-md-0 ps-md-3">
                        <h6 class="pb-1 text-700">{{__('Suscribers')}}</h6>
                        <p class="font-sans-serif lh-1 mb-3 pb-1 fs-2">{{ $suscribers }}</p>
                    </div>
                    <div class="col-6 col-md-4 pb-0 pt-4 ps-3">
                        <h6 class="pb-1 text-700">{{__('Administrators')}}</h6>
                        <p class="font-sans-serif lh-1 mb-3 pb-1 fs-2">{{ $admins }}</p>
                    </div>
                </div>

            </div>
        </div>

        <div class="card">
            <div class="card-header">

                <div class="row flex-between-center g-0">
                    <div class="col-auto">
                        <h6 class="mb-0">{{__('Total Sales')}}</h6>
                    </div>
                    <div class="col-auto d-flex">
                        <div class="form-check mb-0 d-flex">
                            <input class="form-check-input form-check-input-primary" id="ecommerceLastMonth" type="checkbox" checked="checked" />
                            <label class="form-check-label ps-2 fs--2 text-600 mb-0" for="ecommerceLastMonth">
                                {{__('This Year')}}
                                <span class="text-dark d-none d-md-inline">: {{ number_format($sum_user_subscriptions, 0, ',', ' ') }} FCFA</span>
                            </label>
                        </div>
                        <div class="form-check mb-0 d-flex ps-0 ps-md-3">
                            <input class="form-check-input ms-2 form-check-input-success opacity-75" id="ecommercePrevYear" type="checkbox" checked="checked" />
                            <label class="form-check-label ps-2 fs--2 text-600 mb-0" for="ecommercePrevYear">
                                {{__('Prev Year')}}
                                <span class="text-dark d-none d-md-inline">: {{ number_format($sum_user_last_subscriptions, 0, ',', ' ') }} FCFA</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-auto">

                    </div>
                </div>

            </div>

            <div class="card-body pe-xl-4">
                <div class="echart-line-total-sales-ecommerce" data-echart-responsive="true" data-options='{"optionOne":"ecommerceLastMonth","optionTwo":"ecommercePrevYear"}'></div>
            </div>
        </div>
    </div>
</div>

<div class="row g-3 mb-3">

    <div class="col-12">
        <div class="card z-index-1" id="recentPurchaseTable" data-list='{"valueNames":["referrer","phone_number","referrals","sub_amount","payment_amount"],"page":7,"pagination":true}'>
            <div class="card-header">
                <div class="row flex-between-center">
                    <div class="col-6 col-sm-auto d-flex align-items-center pe-0">
                        <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">{{__('Refferers Payment')}} </h5>
                    </div>
                    <div class="col-6 col-sm-auto ms-auto text-end ps-0">
                        <div id="table-purchases-actions">
                            <div class="d-flex">
                                <form action="{{ URL::current() }}" method="GET">
                                    <select class="form-select form-select-sm" aria-label="Bulk actions" name="percentage" id="form_percentage" onchange="this.form.submit();" required>
                                        <option selected disabled hidden>{{__('Select payout %')}}</option>
                                        <option value="2" {{ $percentage == 2 ? 'selected' : '' }}>2%</option>
                                        <option value="3" {{ $percentage == 3 ? 'selected' : '' }}>3%</option>
                                        <option value="5" {{ $percentage == 5 ? 'selected' : '' }}>5%</option>
                                    </select>
                                </form>
                                @if(isset($percentage) && $percentage !== null)
                                <button class="btn btn-primary btn-sm ms-2" type="button" data-bs-toggle="modal" data-bs-target="#confirmPayout">{{__('Pay')}}</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body px-0 py-0">
                <div class="table-responsive scrollbar">
                    <table class="table fs--1 mb-0">
                        <thead class="bg-200 text-900">
                            <tr class="align-middle py-3">
                                <th class="text-start">#</th>
                                <th class="sort" data-sort="referrer">{{__('Referrer')}}</th>
                                <th class="sort" data-sort="referrals">{{__('Referrals')}}</th>
                                <th class="sort" data-sort="sub_amount">{{__('Total subscription amount')}}</th>
                                <th class="sort" data-sort="payment_amount">{{__('Referrer payment amount')}}</th>
                            </tr>
                        </thead>
                        <tbody class="list align-middle text-nowrap" id="table-purchase-body">

                            @php
                                $totalPay = array();
                            @endphp

                            <form name="referrer_form" action="{{ route('plans.store') }}" method="POST">
                                @csrf

                                <input type="hidden" name="percentage" value="{{ $percentage }}">
                                @foreach ($users as $key => $user)
                                @foreach ($user->getReferrals() as $key => $referral)
                                @if ($referral->relationships->count() > 0)
                                <tr class="btn-reveal-trigger">
                                    <td class="text-start">{{ $loop->iteration }}</td>
                                    <th class="referrer">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-xl">
                                                <img class="rounded-circle" src="{{ $user->profile_photo_url }}" alt="{{ $user->username }}" />
                                            </div>
                                            <h6 class="mb-0 ps-2 text-800">{{ ucwords($user->name) }}</h6>
                                        </div>
                                    </th>
                                    <td class="referrals">
                                        @if ($referral->relationships->count() == 1)
                                        {{$referral->relationships->count() }} {{__('referral')}}
                                        @else
                                        {{$referral->relationships->count() }} {{__('referrals')}}
                                        @endif
                                    </td>
                                    <td class="sub_amount">
                                        @php
                                        $array = array();
                                        foreach ($referral->relationships as $key => $relationship) {
                                            if ($relationship->user->subscriptionPrices->isNotEmpty()) {
                                                $array[] = $relationship->user->subscriptionPrices->first()->pivot->subscription_price;
                                            }
                                            else {
                                                $array[] = null;
                                            }
                                        }
                                        $total = array_sum($array);
                                        @endphp
                                        {{ number_format($total, 0, ',', ' ') }} XAF
                                    </td>
                                    <td class="payment_amount">
                                        @if(isset($percentage) && $percentage !== null)
                                        @php
                                            $ref_payment = ($percentage / 100) * $total;
                                            $totalPay[] = $ref_payment;
                                        @endphp
                                        <input type="hidden" name="percentage[]" value={{ $ref_payment }}>
                                        {{ number_format($ref_payment, 0, ',', ' ') }} XAF
                                        @else
                                        --
                                        @endif
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                                @endforeach
                            </form>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <div class="row align-items-center">
                    <div class="pagination d-none"></div>
                    <div class="col">
                        <p class="mb-0 fs--1">
                            <span class="d-none d-sm-inline-block me-2" data-list-info="data-list-info"> </span>
                        </p>
                    </div>
                    <div class="col-auto d-flex">
                        <button class="btn btn-sm btn-primary" type="button" data-list-pagination="prev">
                            <span>Previous</span>
                        </button>
                        <button class="btn btn-sm btn-primary px-4 ms-2" type="button" data-list-pagination="next">
                            <span>Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@if(isset($percentage) && $percentage !== null)
<div class="modal fade" id="confirmPayout" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px">
        <div class="modal-content position-relative">
            <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
                    <h4 class="mb-1" id="modalExampleDemoLabel">{{__('Confirm referrers payment')}}</h4>
                </div>
                <div class="p-4 pb-0">

                    <div class="mb-3">
                        <p class="fs--1">
                            {{__('You are about to pay a total amount of') }} {{ number_format(array_sum($totalPay), 0, ',', ' ') }} XAF {{__('for all the referrers from Exam succes. Please confirm payment.')}}
                        </p>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">{{__('Close')}}</button>
                <button class="btn btn-success" type="button" onclick="submitForm();">{{__('Confirm')}}</button>
            </div>
        </div>
    </div>
</div>
@endif
