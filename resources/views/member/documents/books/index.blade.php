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

    @if ($books->count() == 0)
    <div class="row flex-center min-vh-75 py-6 text-center">
        <div class="col-sm-10 col-md-8 col-lg-6 col-xxl-5">
            <div class="card">
                <div class="card-body p-4 p-sm-5">
                    <div class="fw-black text-300 lh-1 fs-7">{{__('Sorry')}}...</div>
                    <p class="lead mt-4 text-800 font-sans-serif fw-semi-bold w-md-75 w-xl-100 mx-auto">{{__('There are no books for your classroom')}}</p>
                    <hr />
                    <p>{{__('Stay tuned. New books will be available soon')}}</p>
                    <a class="btn btn-success btn-sm mt-3" href="{{ route('dashboard') }}">
                        <span class="fas fa-home me-2"></span>
                        <span>{{__('Take me home')}}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="row">
        <div class="col-lg-3 d-none d-lg-block">

            <div class="card mb-4">
                <div class="card-header border-1">
                    <h6 class="mb-0">{{__('Subject')}}</h6>
                </div>
                <div class="card-body scrollbar-overlay" style="height:26.5rem">

                    <form action="{{ URL::current() }}" method="GET">
                        @foreach ($subjects as $key => $subject)
                        @php
                        $checked = [];
                        if(isset($_GET['subject']))
                        {
                            $checked = $_GET['subject'];
                        }
                        @endphp

                        <div class="form-check">
                            <input class="form-check-input" id="{{ $subject->subject_name }}" name="subject[]" type="checkbox" value="{{ $subject->id }}" onChange="this.form.submit()"
                            @if(in_array($subject->id, $checked)) checked @endif
                            @if($subject->books->count() == 0) disabled="" @endif />

                            <label class="form-check-label" for="{{ $subject->subject_name }}">
                                {{  ucwords($subject->subject_name) }}
                            </label>
                        </div>

                        @endforeach
                    </form>

                </div>
            </div>

        </div>

        <div class="col-12 col-lg-9">
            <div class="card mb-4">
                <div class="card-header border-1">
                    <h5 class="mb-0 fw-black">{{__('List of Books')}}</h5>
                </div>
                <div class="card-body">

                    <div class="row">
                        @foreach ($books as $key => $book)
                        <div class="mb-4 col-md-6 col-xl-4">
                            <div class="border rounded-1 h-100 d-flex flex-column justify-content-between pb-3">
                                <div class="overflow-hidden">
                                    <div class="position-relative rounded-top overflow-hidden" style="max-height: 200px">
                                        <a class="d-bloc overflow-hidden">
                                            <img class="img-fluid bg-no-repeat bg-center bg-cover w-100" src="{{url("/storage/uploads/documents/thumbnails/$book->document_thumbnail")}}" alt="{{ ucwords($book->document_title) ?? '' }}" style="background-color:white;"/>
                                        </a>

                                    </div>
                                    <div class="p-3">
                                        <h5 class="fs-0">
                                            <a class="text-dark">{{ ucwords($book->document_title) ?? '' }}</a>
                                        </h5>
                                        <p class="fs--1 mb-3">
                                            @foreach ($book->subjects as $key => $item)
                                            <small class="badge fw-semi-bold rounded-pill status badge-soft-primary">{{ ucwords($item->subject_name) ?? '' }}</small>
                                            @endforeach
                                        </p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end px-3">
                                    <div>
                                        @if($currentSubscription == null)
                                        <button class="btn btn-sm btn-falcon-success me-2 mb-2" type="button" data-bs-toggle="modal" data-bs-target="#subscribe{{ $book->id }}">
                                            <span class="fas fa-cloud-download-alt"></span>
                                            <span>{{__('Download')}}</span>
                                        </button>

                                        <div class="modal fade" id="subscribe{{ $book->id }}" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1" aria-labelledby="subscribeLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg mt-6" role="document">
                                                <div class="modal-content border-0">
                                                    <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                                                        <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>

                                                    <div class="modal-body p-0">
                                                        <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
                                                            <h4 class="mb-1" id="subscribeLabel">{{ ucwords($book->document_title) ?? '' }}</h4>
                                                            <p class="fs--2 mb-0">
                                                                {{ ucwords($book->exam->exam_name) }}
                                                            </p>
                                                        </div>
                                                        <div class="p-4">
                                                            <div class="row">
                                                                <div class="col-lg d-none d-lg-block">
                                                                    <img class="rounded-3 border w-100" src="{{url("/storage/uploads/documents/thumbnails/$book->document_thumbnail")}}" alt="{{ ucwords($book->document_type) ?? '' }}" style="background-color:white;"/>
                                                                </div>

                                                                <div class="col-lg-9 col-12">
                                                                    <div class="d-flex">
                                                                        <span class="fa-stack ms-n1 me-3">
                                                                            <i class="fas fa-circle fa-stack-2x text-200"></i>
                                                                            <i class="fa-inverse fa-stack-1x text-primary fas fa-tag" data-fa-transform="shrink-2"></i>
                                                                        </span>
                                                                        <div class="flex-1">
                                                                            <h5 class="mb-2 fs-0">{{__('Subject(s)')}}</h5>
                                                                            <div class="d-flex">
                                                                                @foreach ($book->subjects as $key => $item)
                                                                                <span class="badge me-1 py-2 badge-soft-primary">{{ ucwords($item->subject_name) ?? '' }}</span>
                                                                                @endforeach
                                                                            </div>
                                                                            <hr class="my-4" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="d-flex">
                                                                        <span class="fa-stack ms-n1 me-3">
                                                                            <i class="fas fa-circle fa-stack-2x text-200"></i>
                                                                            <i class="fa-inverse fa-stack-1x text-primary fas fa-align-left" data-fa-transform="shrink-2"></i>
                                                                        </span>
                                                                        <div class="flex-1">
                                                                            <h5 class="mb-2 fs-0">{{__('Description')}}</h5>
                                                                            <p class="text-word-break fs--1">{!! Str::words(strip_tags($book->document_description), 50, '...') !!}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="p-4">
                                                            <button class="btn btn-success rounded-pill btn-lg d-block w-100 p-2 p-lg-3" data-bs-toggle="modal" data-bs-target="#subcriptionPayment">
                                                                <span class="fas fa-rocket me-2"></span>
                                                                <span>{{__('Subscribe to download')}}</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @else
                                        <a class="btn btn-sm btn-falcon-success me-2 mb-2" href="{{ route('downloadBook', $book->id) }}">
                                            <span class="fas fa-cloud-download-alt"></span>
                                            <span>{{__('Download')}}</span>
                                        </a>
                                        @endif
                                        <a class="btn btn-sm btn-primary me-2 mb-2" href="{{ route('books.show', $book->id) }}">
                                            <span>{{__('See More')}}</span>
                                            <span class="fas fa-arrow-right"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>

                {{ $books->links() }}

            </div>
        </div>
    </div>

    <div class="d-lg-none d-md-block">
        @include('member.documents.books.filter')
    </div>

    @endif

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
