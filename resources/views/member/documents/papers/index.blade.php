<x-app-layout>

    @include('partials._subscription-payment')

    @if ($papers->count() == 0)
    <div class="row flex-center min-vh-75 py-6 text-center">
        <div class="col-sm-10 col-md-8 col-lg-6 col-xxl-5">
            <div class="card">
                <div class="card-body p-4 p-sm-5">
                    <div class="fw-black text-300 lh-1 fs-7">{{__('Sorry')}}...</div>
                    <p class="lead mt-4 text-800 font-sans-serif fw-semi-bold w-md-75 w-xl-100 mx-auto">{{__('There are no papers for your classroom')}}</p>
                    <hr />
                    <p>{{__('Stay tuned. New papers will be available soon')}}</p>
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
                <div class="card-body scrollbar-overlay" style="max-height:26.5rem">

                    <form action="{{ URL::current() }}" method="GET">
                        @foreach ($subjects  as $key => $subject)
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
                            @if($subject->papers->count() == 0) disabled="" @endif />

                            <label class="form-check-label" for="{{ $subject->subject_name }}">
                                {{  ucwords($subject->subject_name) }}
                            </label>
                        </div>

                        @endforeach
                    </form>

                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header border-1">
                    <h6 class="mb-0">{{__('Exam Type')}}</h6>
                </div>
                <div class="card-body scrollbar-overlay pb-3" style="height:10rem">

                    <form action="{{ URL::current() }}" method="GET">
                        @foreach ($exams->unique('exam_name') as $key => $exam)
                        @php
                        $checked = [];
                        if(isset($_GET['exam']))
                        {
                            $checked = $_GET['exam'];
                        }
                        @endphp

                        <div class="form-check">
                            <input class="form-check-input" id="{{ $exam->exam_name }}" name="exam[]" type="checkbox" value="{{ $exam->id }}" onChange="this.form.submit()"
                            @if(in_array($exam->id, $checked)) checked @endif
                            @if($exam->count() == 0) disabled="" @endif />

                            <label class="form-check-label" for="{{ $exam->exam_name }}">
                                {{  ucwords($exam->exam_name) }}
                            </label>
                        </div>

                        @endforeach
                    </form>

                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header border-1">
                    <h6 class="mb-0">{{__('Year')}}</h6>
                </div>
                <div class="card-body scrollbar-overlay pb-3" style="height:10rem">

                    <form action="{{ URL::current() }}" method="GET">
                        @foreach ($years as $key => $year)
                        @php
                        $year_session = date('Y', strtotime($year->first()->document_session));
                        $checked = [];
                        if(isset($_GET['year']))
                        {
                            $checked = $_GET['year'];
                        }
                        @endphp

                        <div class="form-check">
                            <input class="form-check-input" id="{{ $year->first()->document_session }}" name="year[]" type="checkbox" value="{{ $year_session }}" onChange="this.form.submit()"
                            @if(in_array($year_session, $checked)) checked @endif
                            />

                            <label class="form-check-label" for="{{ $year->first()->document_session }}">
                                {{  $year_session }}
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
                    <h5 class="mb-0 fw-black">{{__('List of Papers')}}</h5>
                </div>
                <div class="card-body">

                    <div class="row">
                        @foreach ($papers as $key => $paper)

                        <div class="mb-4 col-md-6 col-xl-4">
                            <div class="border rounded-1 h-100 d-flex flex-column justify-content-between pb-3">
                                <div class="overflow-hidden">
                                    <div class="position-relative rounded-top overflow-hidden" style="max-height: 200px">
                                        <a class="d-bloc overflow-hidden">
                                            <img class="img-fluid bg-no-repeat bg-center bg-cover w-100" src="{{url("/storage/uploads/documents/thumbnails/$paper->document_thumbnail")}}" alt="{{ ucwords($paper->document_title) ?? '' }}" style="background-color:white;"/>
                                        </a>

                                    </div>
                                    <div class="p-3">
                                        <h5 class="fs-0">
                                            @foreach ($paper->subjects as $key => $item)
                                            <a class="text-dark">{{ ucwords($item->subject_name) ?? '' }}</a>
                                            @endforeach
                                        </h5>
                                        <p class="fs--1 mb-3">
                                            {{ date('F Y', strtotime($paper->document_session)) }}
                                        </p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end px-3">
                                    <div>
                                        @if($currentSubscription == null)
                                        <button class="btn btn-sm btn-falcon-success me-2 mb-2" type="button" data-bs-toggle="modal" data-bs-target="#subscribe{{ $paper->id }}">
                                            <span class="fas fa-cloud-download-alt"></span>
                                            <span>{{__('Download')}}</span>
                                        </button>

                                        <div class="modal fade" id="subscribe{{ $paper->id }}" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1" aria-labelledby="subscribeLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg mt-6" role="document">
                                                <div class="modal-content border-0">
                                                    <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                                                        <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body p-0">
                                                        <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
                                                            <h4 class="mb-1" id="subscribeLabel">{{ ucwords($item->subject_name) ?? '' }}</h4>
                                                            <p class="fs--2 mb-0">
                                                                {{ ucwords($paper->exam->exam_name) }}
                                                            </p>
                                                        </div>
                                                        <div class="p-4">
                                                            <div class="row">
                                                                <div class="col-lg d-none d-lg-block">
                                                                    <img class="rounded-3 border w-100" src="{{url("/storage/uploads/documents/thumbnails/$paper->document_thumbnail")}}" alt="{{ ucwords($paper->document_type) ?? '' }}" style="background-color:white;"/>
                                                                </div>

                                                                <div class="col-lg-9 col-12">
                                                                    <div class="d-flex">
                                                                        <span class="fa-stack ms-n1 me-3">
                                                                            <i class="fas fa-circle fa-stack-2x text-200"></i>
                                                                            <i class="fa-inverse fa-stack-1x text-primary fas fa-tag" data-fa-transform="shrink-2"></i>
                                                                        </span>
                                                                        <div class="flex-1">
                                                                            <h5 class="mb-2 fs-0">{{__('Session')}}</h5>
                                                                            <div class="d-flex">
                                                                                <span class="badge me-1 py-2 badge-soft-primary">{{ date('F Y', strtotime($paper->document_session)) }}</span>
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
                                                                            <h5 class="mb-2 fs-0">{{__('Serie(s)')}}</h5>
                                                                            <p class="text-word-break fs--1">
                                                                                @foreach ($paper->classrooms as $key => $item)
                                                                                <span class="badge me-1 mb-2 py-2 badge-soft-secondary">{{ ucwords($item->classroom_name) ?? '' }}</span>
                                                                                @endforeach
                                                                            </p>
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
                                        <a class="btn btn-sm btn-falcon-success me-2 mb-2" href="{{ route('downloadPaper', $paper->id) }}">
                                            <span class="fas fa-cloud-download-alt"></span>
                                            <span>{{__('Download')}}</span>
                                        </a>
                                        @endif
                                        <a class="btn btn-sm btn-primary me-2 mb-2" href="{{ route('papers.show', $paper->id) }}">
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

                {{ $papers->links() }}

            </div>
        </div>
    </div>

    <div class="d-lg-none d-md-block">
        @include('member.documents.papers.filter')
    </div>

    @endif

</x-app-layout>
