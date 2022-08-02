<x-app-layout>

    <div class="card mb-3">
        <div class="card-header position-relative min-vh-25 mb-7">
            <div class="bg-holder rounded-3 rounded-bottom-0 profile-cover"></div>

            <div class="avatar-profile mb-3">
                <img class="rounded-3 border" src="{{url("/storage/uploads/documents/thumbnails/$paper->document_thumbnail")}}" alt="{{ ucwords($paper->document_type) ?? '' }}" style="background-color:white;" width="150" />
            </div>
        </div>
        <div class="card-body">
            <div class="row">

                <div class="col-lg-12">
                    <h4 class="mt-3 fw-bold mb-1">
                        @if ($paper->document_type == "Book")
                        {{ ucwords($paper->document_title) ?? '' }}
                        @else
                        {{__(' Exam of')}}
                        @foreach ($paper->subjects as $key => $item)
                        {{ ucwords($item->subject_name) ?? '' }}
                        @endforeach
                        @endif
                    </h4>

                    <h5 class="mb-4 fs-0 fw-normal">{{ ucwords($paper->document_type) }}</h5>
                </div>

                <div class="col-lg-7 px-3">
                    <div class="d-flex align-items-start flex-column h-100">
                        @if (isset($paper->document_description))
                        <div class="mb-auto">
                            <span class="text-uppercase me-3 text-400 fs--1 fw-bold" data-fa-transform="grow-1">{{__('Description')}}:</span>
                            <div class="flex-1 mb-5">
                                <h6 class="mb-0">{!! ucwords($paper->document_description) !!}</h6>
                            </div>
                        </div>
                        @endif

                        <div class="d-flex justify-content-end px-3 mb-lg-4">
                            <div>
                                <a class="btn btn-sm btn-falcon-default me-2" href="{{ route('papers.index') }}">
                                    <span>{{ __('Back to the List') }}</span>
                                </a>
                                @if($currentSubscription != null)
                                <a class="btn btn-sm btn-success me-2" href="{{ route('getDownload', $paper->id) }}">
                                    <span class="fas fa-cloud-download-alt"></span>
                                    <span>{{__('Download')}}</span>
                                </a>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>

                <div class="border-dashed-bottom my-4 d-lg-none"></div>

                <div class="col px-3 ms-lg-4">

                    @if (isset($paper->exam_id))
                    <div class="mb-3">
                        <span class="text-uppercase me-3 text-400 fs--1 fw-bold" data-fa-transform="grow-1">{{__('Exam')}}:</span>
                        <div class="flex-1">
                            <h6 class="mb-0">{{ ucwords($paper->exam->exam_name) }}</h6>
                        </div>
                    </div>
                    @endif

                    @if (isset($paper->subjects))
                    <div class="mb-3">
                        <span class="text-uppercase me-3 text-400 fs--1 fw-bold" data-fa-transform="grow-1">{{__('Subject(s)')}}:</span>
                        <div class="flex-1">
                            @foreach ($paper->subjects as $key => $item)
                            <small class="badge fw-semi-bold rounded-pill status badge-soft-primary">{{ ucwords($item->subject_name) ?? '' }}</small>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    @if (isset($paper->document_session))
                    <div class="mb-3">
                        <span class="text-uppercase me-3 text-400 fs--1 fw-bold" data-fa-transform="grow-1">{{__('Session')}}:</span>
                        <div class="flex-1">
                            <h6 class="mb-0">{{ date('F Y', strtotime($paper->document_session)) }}</h6>
                        </div>
                    </div>
                    @endif

                    @if (isset($paper->classrooms))
                    <div class="mb-3">
                        <span class="text-uppercase me-3 text-400 fs--1 fw-bold" data-fa-transform="grow-1">{{__('Grade')}}:</span>
                        <div class="flex-1">
                            @foreach ($paper->classrooms as $key => $item)
                            <small class="badge fw-semi-bold rounded-pill status badge-soft-info">{{ ucwords($item->classroom_name) ?? '' }}</small>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    @if (isset($paper->correction_path))
                    <div class="mb-3">
                        <span class="text-uppercase me-3 text-400 fs--1 fw-bold" data-fa-transform="grow-1">{{__('Correction')}}:</span>
                        <div class="flex-1">
                            <h6 class="mb-0">{{__('Yes')}}</h6>
                        </div>
                    </div>
                    @else
                    <div class="mb-3">
                        <span class="text-uppercase me-3 text-400 fs--1 fw-bold" data-fa-transform="grow-1">{{__('Correction')}}:</span>
                        <div class="flex-1">
                            <h6 class="mb-0">{{__('No')}}</h6>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
<x-app-layout>

    <div class="card mb-3">
        <div class="card-header position-relative min-vh-25 mb-7">
            <div class="bg-holder rounded-3 rounded-bottom-0 profile-cover"></div>

            <div class="avatar-profile mb-3">
                <img class="rounded-3 border" src="{{url("/storage/uploads/documents/thumbnails/$paper->document_thumbnail")}}" alt="{{ ucwords($paper->document_type) ?? '' }}" style="background-color:white;" width="150" />
            </div>
        </div>
        <div class="card-body">
            <div class="row">

                <div class="col-lg-12">
                    <h4 class="mt-3 fw-bold mb-1">
                        @if ($paper->document_type == "Book")
                        {{ ucwords($paper->document_title) ?? '' }}
                        @else
                        {{__(' Exam of')}}
                        @foreach ($paper->subjects as $key => $item)
                        {{ ucwords($item->subject_name) ?? '' }}
                        @endforeach
                        @endif
                    </h4>

                    <h5 class="mb-4 fs-0 fw-normal">{{ ucwords($paper->document_type) }}</h5>
                </div>

                <div class="col-lg-7 px-3">
                    <div class="d-flex align-items-start flex-column h-100">
                        @if (isset($paper->document_description))
                        <div class="mb-auto">
                            <span class="text-uppercase me-3 text-400 fs--1 fw-bold" data-fa-transform="grow-1">{{__('Description')}}:</span>
                            <div class="flex-1 mb-5">
                                <h6 class="mb-0">{!! ucwords($paper->document_description) !!}</h6>
                            </div>
                        </div>
                        @endif

                        <div class="d-flex justify-content-end px-3 mb-lg-4">
                            <div>
                                <a class="btn btn-sm btn-falcon-default me-2" href="{{ route('books.index') }}">
                                    <span>{{ __('Back to the List') }}</span>
                                </a>
                                @if($currentSubscription != null)
                                <a class="btn btn-sm btn-success me-2" href="{{ route('getDownload', $paper->id) }}">
                                    <span class="fas fa-cloud-download-alt"></span>
                                    <span>{{__('Download')}}</span>
                                </a>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>

                <div class="border-dashed-bottom my-4 d-lg-none"></div>

                <div class="col px-3 ms-lg-4">

                    @if (isset($paper->exam_id))
                    <div class="mb-3">
                        <span class="text-uppercase me-3 text-400 fs--1 fw-bold" data-fa-transform="grow-1">{{__('Exam')}}:</span>
                        <div class="flex-1">
                            <h6 class="mb-0">{{ ucwords($paper->exam->exam_name) }}</h6>
                        </div>
                    </div>
                    @endif

                    @if (isset($paper->subjects))
                    <div class="mb-3">
                        <span class="text-uppercase me-3 text-400 fs--1 fw-bold" data-fa-transform="grow-1">{{__('Subject(s)')}}:</span>
                        <div class="flex-1">
                            @foreach ($paper->subjects as $key => $item)
                            <small class="badge fw-semi-bold rounded-pill status badge-soft-primary">{{ ucwords($item->subject_name) ?? '' }}</small>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    @if (isset($paper->document_session))
                    <div class="mb-3">
                        <span class="text-uppercase me-3 text-400 fs--1 fw-bold" data-fa-transform="grow-1">{{__('Session')}}:</span>
                        <div class="flex-1">
                            <h6 class="mb-0">{{ date('F Y', strtotime($paper->document_session)) }}</h6>
                        </div>
                    </div>
                    @endif

                    @if (isset($paper->classrooms))
                    <div class="mb-3">
                        <span class="text-uppercase me-3 text-400 fs--1 fw-bold" data-fa-transform="grow-1">{{__('Grade')}}:</span>
                        <div class="flex-1">
                            @foreach ($paper->classrooms as $key => $item)
                            <small class="badge fw-semi-bold rounded-pill status badge-soft-info">{{ ucwords($item->classroom_name) ?? '' }}</small>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    @if (isset($paper->correction_path))
                    <div class="mb-3">
                        <span class="text-uppercase me-3 text-400 fs--1 fw-bold" data-fa-transform="grow-1">{{__('Correction')}}:</span>
                        <div class="flex-1">
                            <h6 class="mb-0">{{__('Yes')}}</h6>
                        </div>
                    </div>
                    @else
                    <div class="mb-3">
                        <span class="text-uppercase me-3 text-400 fs--1 fw-bold" data-fa-transform="grow-1">{{__('Correction')}}:</span>
                        <div class="flex-1">
                            <h6 class="mb-0">{{__('No')}}</h6>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
