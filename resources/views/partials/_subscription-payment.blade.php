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
                            <span>{{__('Make sure your account balance is sufficient before initiating the payment. Otherwise the request will fail.')}}</span>
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
                }, 30000);
            });
        });
    </script>

@endsection
