<x-app-layout>
    <div class="row">

        @if(session('error'))
            <script>
                window.addEventListener("load", function () {
                    Toastify({
                        text: "{{ session('error') }}",
                        duration: 5000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        backgroundColor: "#dc3545",
                    }).showToast();
                });
            </script>
        @endif

        <div class="card">
            <div class="col-md-6 grid-margin stretch-card" id="stretch-card">
                <div class="card-body">

                    @if ($document->document_type == "Book")
                    <h6 class="card-title fw-bolder fs-3 mb-5">{{ ucwords($document->document_title) ?? '' }}</h6>
                    @else
                    <h6 class="card-title fw-bolder fs-4 mb-5">
                        {{__(' Exam of')}}
                        @foreach ($document->subjects as $key => $item)
                        {{ ucwords($item->subject_name) ?? '' }}
                        @endforeach
                    </h6>
                    @endif

                    <div class="row">
                        <div class="col-md mb-4 text-center">
                            <img class="align-middle rounded img-fluid border-1 w-100" src="{{url("/storage/uploads/documents/thumbnails/$document->document_thumbnail")}}" alt="{{ ucwords($document->document_type) ?? '' }}">
                        </div>
                        <div class="col-md-8 d-flex flex-column justify">

                            <div class="mt-3">
                                <label class="tx-11 fw-bolder mb-0 text-uppercase">{{__('Document Type')}}:</label>
                                <p class="text-muted">{{ ucwords($document->document_type) }}</p>
                            </div>

                            @if (isset($document->exam_id))
                            <div class="mt-3">
                                <label class="tx-11 fw-bolder mb-0 text-uppercase">{{__('Exam')}}:</label>
                                <p class="text-muted">{{ ucwords($document->exam->exam_name) }}</p>
                            </div>
                            @endif

                            @if (isset($document->subjects))
                            <div class="mt-3">
                                <label class="tx-11 fw-bolder mb-0 text-uppercase">{{__('Subject(s)')}}:</label>
                                <p class="text-muted">
                                    @foreach ($document->subjects as $key => $item)
                                    <span class="badge bg-secondary">{{ ucwords($item->subject_name) ?? '' }}</span>
                                    @endforeach
                                </p>
                            </div>
                            @endif

                            @if (isset($document->document_description))
                            <div class="mt-3">
                                <label class="tx-11 fw-bolder mb-0 text-uppercase">{{__('Description')}}:</label>
                                <p class="text-muted">{!! ucwords($document->document_description) !!}</p>
                            </div>
                            @endif

                            @if (isset($document->document_session))
                            <div class="mt-3">
                                <label class="tx-11 fw-bolder mb-0 text-uppercase">{{__('Session')}}:</label>
                                <p class="text-muted">{{ date('F Y', strtotime($document->document_session)) }}</p>
                            </div>
                            @endif

                            @if (isset($document->classrooms))
                            <div class="mt-3">
                                <label class="tx-11 fw-bolder mb-0 text-uppercase">{{__('Serie(s)')}}:</label>
                                <p class="text-muted">
                                    @foreach ($document->classrooms as $key => $item)
                                    <span class="badge bg-secondary">{{ ucwords($item->classroom_name) ?? '' }}</span>
                                    @endforeach
                                </p>
                            </div>
                            @endif

                            @if (isset($document->correction_path))
                            <div class="mt-3">
                                <label class="tx-11 fw-bolder mb-0 text-uppercase">{{__('Correction Document')}}:</label>
                                <p class="text-muted">{{__('Yes')}}</p>
                            </div>
                            @else
                            <div class="mt-3">
                                <label class="tx-11 fw-bolder mb-0 text-uppercase">{{__('Correction Document')}}:</label>
                                <p class="text-muted">{{__('No  ')}}</p>
                            </div>
                            @endif

                            @if (isset($document->document_price))
                            <div class="mt-3">
                                <label class="tx-11 fw-bolder mb-0 text-uppercase">{{__('Price')}}:</label>
                                <p class="text-muted fw-bolder">{{ $document->document_price }}</p>
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="mt-5">
                        <a role="button" class="btn btn-dark" href="{{ route('documents.index') }}">
                            {{ __('Back to the Table') }}
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
