<x-app-layout>

    <div class="modal fade" id="subcriptionPayment" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px">
            <div class="modal-content position-relative">
                <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
                        <h4 class="mb-1" id="title">
                            <img class="my-2" src="{{ asset('assets/img/icons/spot-illustrations/falcon.png') }}" alt="logo" width="180" />
                        </h4>
                    </div>
                    <form id="subForm" method="POST" action="{{ route('plans.update', 1) }}" onsubmit="ShowLoading()">
                        @csrf
                        @method('PUT')

                        <div class="p-4 pb-0">

                            <div class="mb-3">
                                <label class="col-form-label" for="description">{{__('Description')}}</label>
                                <input class="form-control" id="description" name="description" type="text" readonly value="{{__('Paiememnt de l\'abonnement annuel')}}"/>
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label" for="amount">{{__('Amount')}}</label>
                                <input class="form-control" id="amount" type="text" readonly value="{{ $amount }} XAF"/>
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label" for="phone_number">{{__('Orange Money or MTN MoMo Number')}}</label>
                                <input class="form-control" id="phone_number" name="phone_number" type="text" data-inputmask-alias="+237 699 999 999" value="{{ Auth::user()->phone_number }}" />
                            </div>
                        </div>
                        <div class="modal-footer border-0">
                            <button class="btn btn-primary" type="submit" id="plan-subscription">
                                <span class="loading-icon d-none spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                                <span id="btn-text">{{__('Pay')}}</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
                                            <span class="fs-3">99</span>
                                            <span class="fs--2 mt-1">/ m</span>
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

    @section('scripts')

    <script type="text/javascript">
        $(document).ready(function() {
            $("#subForm").on("submit", function() {
                $(".result").text("");
                $(".loading-icon").removeClass("d-none");
                $("#plan-subscription").attr("disabled", true);
                $("#btn-txt").text("Processing ...");

                setTimeout(function(){

                    $(".loading-icon").addClass("d-none");
                    $("#plan-subscription").attr("disabled", false);
                    $("#btn-txt").text("Done.");
                }, 5000);
            });
        });
    </script>

    @endsection

</x-app-layout>
