<x-app-layout>

    @include('partials._subscription-payment')

    <div class="card mb-3">
        <div class="card-body">
            <div class="row justify-content-center">

                <div class="col-12 col-lg-6">

                    <div class="alert alert-info border-2 mb-5" role="alert">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="bg-info me-3 icon-item">
                                    <span class="fas fa-info-circle text-white fs-3"></span>
                                </div>
                                <p class="mb-0 flex-1">
                                    <span class="fw-bold">{{ $currentSubscription->plan->name ?? 'No active' }} {{__('plan')}}</span>

                                    @if($currentSubscription !== null)
                                    <span class="fw-light">{{__('active until')}}</span>
                                    {{ date('d F Y', strtotime($currentSubscription?->expired_at)) }}
                                    @endif
                                </p>
                            </div>
                            <div class="d-flex align-items-center">
                                @if($currentSubscription !== null && $currentSubscription?->plan->name !== 'Trial')
                                <p class="flex-1">
                                    <form method="POST" action="{{ route('plans.destroy', $currentSubscription->plan) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-falcon-info me-1 mb-1">{{__('Cancel plan')}}</button>
                                    </form>
                                </p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md">
                            <div class="border rounded-3 overflow-hidden">
                                <div class="d-flex flex-between-center p-4">
                                    <div>
                                        <h3 class="fw-light text-primary fs-5 mb-0">{{__('Subscribe')}}</h3>
                                        <h2 class="fw-light text-primary mt-0">
                                            <span class="fs-3">{{ $amount }} XAF</span>
                                            <span class="fs--2 mt-1">/ {{__('year')}}</span>
                                        </h2>
                                    </div>

                                    <div class="pe-3">
                                        <span class="far fa-star text-primary fs-5"></span>
                                    </div>

                                </div>
                                <div class="p-4 bg-light">
                                    <ul class="list-unstyled">
                                        <li class="border-bottom py-2">
                                            <span class="fas fa-check text-primary" data-fa-transform="shrink-2"></span>
                                            {{__('Unlimited Downloads')}}
                                        </li>
                                    </ul>

                                    @if($currentSubscription == null)
                                    <button class="btn btn-primary d-block w-100 mt-5" data-bs-toggle="modal" data-bs-target="#subcriptionPayment">
                                        <span>{{__('Purchase Now')}}</span>
                                    </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
