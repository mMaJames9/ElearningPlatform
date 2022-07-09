<x-app-layout>

    <div class="card mb-3">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-12 text-center mb-4">
                    <div class="fs-1">{{__('Pricing')}}</div>
                    <h3 class="fs-2 fs-md-3">{{__('Silver planwith limited downloads')}}. <br class="d-none d-md-block" />{{__('Gold plan with unlimited downloads')}}</h3>

                    <div class="d-flex justify-content-center">
                        <label class="form-check-label me-2" for="pricingPlan">{{__('Monthly')}}</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" id="pricingPlan" type="checkbox" checked="checked"  />
                        </div>
                        <label class="form-check-label align-top" for="pricingPlan">{{__('Yearly')}}</label>
                    </div>
                </div>

                <div class="col-12 col-lg-9 col-xl-10 col-xxl-8">

                    <div class="alert alert-info border-2 mb-5" role="alert">
                        <div class="row">
                            <div class="col-12 col-lg d-flex align-items-center">
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
                            <div class="col-12 col-lg d-flex align-items-center">
                                {{-- @if($currentSubscription !== null && $currentSubscription?->plan->name !== 'Trial') --}}
                                <p class="flex-1 my-3">
                                    <form method="POST" action="{{ route('plans.destroy', $currentSubscription->plan) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-falcon-info me-1 mb-1" type="button">Cancel plan</button>
                                    </form>
                                </p>
                                {{-- @endif --}}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md">
                            <div class="border rounded-3 overflow-hidden mb-3 mb-md-0">
                                <div class="d-flex flex-between-center p-4">
                                    <div>
                                        <h3 class="fw-light fs-5 mb-0 text-primary">{{__('Silver')}}</h3>
                                        <h2 class="fw-light mt-0 text-primary"><sup class="fs-1">&dollar;</sup><span class="fs-3">0</span><span class="fs--2 mt-1">/ m</span></h2>
                                    </div>

                                    <div class="pe-3">
                                        <span class="far fa-star-half text-primary fs-5"></span>
                                    </div>

                                </div>
                                <div class="p-4 bg-light">
                                    <ul class="list-unstyled">
                                        <li class="border-bottom py-2"><span class="fas fa-check text-primary" data-fa-transform="shrink-2"></span> Unlimited Broadcasts</li>
                                        <li class="border-bottom py-2"><span class="fas fa-check text-primary" data-fa-transform="shrink-2"></span> Unlimited Sequences</li>
                                        <li class="py-2 border-bottom"><span class="fas fa-check text-primary" data-fa-transform="shrink-2"></span> Advanced marketing </li>
                                        <li class="py-2 border-bottom"><span class="fas fa-check text-primary" data-fa-transform="shrink-2"></span> Api &amp; Developer Tools</li>
                                        <li class="py-2 border-bottom text-300"><span class="fas fa-check" data-fa-transform="shrink-2"></span> Integrations</li>
                                        <li class="py-2 border-bottom text-300"><span class="fas fa-check" data-fa-transform="shrink-2"></span> Payments </li>
                                        <li class="py-2 border-bottom text-300"><span class="fas fa-check" data-fa-transform="shrink-2"></span> Payments</li>
                                        <li class="py-2 text-300"><span class="fas fa-check" data-fa-transform="shrink-2"></span> Unlimted Tags</li>
                                    </ul><button class="btn btn-outline-primary d-block w-100" type="button">{{__('Start Now')}}</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="border rounded-3 overflow-hidden">
                                <div class="d-flex flex-between-center p-4">
                                    <div>
                                        <h3 class="fw-light text-primary fs-5 mb-0">{{__('Gold')}}</h3>
                                        <h2 class="fw-light text-primary mt-0"><sup class="fs-1">&dollar;</sup><span class="fs-3">99</span><span class="fs--2 mt-1">/ m</span></h2>
                                    </div>

                                    <div class="pe-3">
                                        <span class="far fa-star text-primary fs-5"></span>
                                    </div>

                                </div>
                                <div class="p-4 bg-light">
                                    <ul class="list-unstyled">
                                        <li class="border-bottom py-2"><span class="fas fa-check text-primary" data-fa-transform="shrink-2"></span> Unlimited Broadcasts</li>
                                        <li class="border-bottom py-2"><span class="fas fa-check text-primary" data-fa-transform="shrink-2"></span> Unlimited Sequences</li>
                                        <li class="py-2 border-bottom"><span class="fas fa-check text-primary" data-fa-transform="shrink-2"></span> Advanced marketing </li>
                                        <li class="py-2 border-bottom"><span class="fas fa-check text-primary" data-fa-transform="shrink-2"></span> Api &amp; Developer Tools</li>
                                        <li class="py-2 border-bottom"><span class="fas fa-check text-primary" data-fa-transform="shrink-2"></span> Integrations</li>
                                        <li class="py-2 border-bottom"><span class="fas fa-check text-primary" data-fa-transform="shrink-2"></span> Payments</li>
                                        <li class="py-2 border-bottom"><span class="fas fa-check text-primary" data-fa-transform="shrink-2"></span> Unlimted Tags</li>
                                        <li class="py-2"><span class="fas fa-check text-primary" data-fa-transform="shrink-2"></span> Custom Fields</li>
                                    </ul><button class="btn btn-primary d-block w-100" type="button">Purchase Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
