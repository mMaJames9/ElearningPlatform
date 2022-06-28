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
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card-body">

                    <h6 class="card-title mb-5">{{__('Update the Document')}}</h6>
                    <form class="forms-sample" method="POST" action="{{ route("documents.update", [$document->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        <div class="mb-3">
                            <label class="form-label" for="subjects">{{ __('Subject(s)') }}</label>
                            <select class="js-example-basic-single form-select @error('subjects') is-invalid @enderror" multiple="multiple" data-width="100%" id="subjects" name="subjects[]" autofocus>
                                @foreach($subjects as $id => $subjects)
                                <option value="{{ $id }}" {{ (in_array($id, old('subjects', [])) || $document->subjects->contains($id)) ? 'selected' : '' }}>{{ ucwords($subjects) }}</option>
                                @endforeach
                            </select>

                            @error('subjects')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        @if ($document->document_type == "Book")
                        <div id="docTitle" class="mb-3">
                            <label class="form-label" for="document_title">{{ __('Title') }}</label>
                            <input type="text" class="@error('document_title') is-invalid @enderror form-control" id="document_title" placeholder="{{ __('Title of the document') }}" name="document_title" value="{{ old('document_title', $document->document_title) }}" autofocus>

                            @error('document_title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        @endif

                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label" for="exam_id">{{ __('Exam') }}</label>
                                <select class="js-example-basic-single form-select @error('exam_id') is-invalid @enderror" data-width="100%" id="exam_id" name="exam_id" value="{{ old('exam_id', $document->exam_id) }}" autofocus>
                                    @foreach($exams as $id => $exam)
                                    <option value="{{ $id }}" {{ ($document->exam ? $document->exam->id : old('exam_id')) == $id ? 'selected' : '' }}>{{ ucwords($exam) }}</option>
                                    @endforeach
                                </select>

                                @error('exam_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            @if ($document->document_type == "Paper")
                            <div id="sessionDoc" class="col">
                                <label class="form-label" for="document_session">{{ __('Session') }}</label>
                                <input type="month" class="@error('document_session') is-invalid @enderror form-control" id="document_session" name="document_session" value="{{ old('document_session', $document->document_session) }}" autofocus>

                                @error('document_session')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="classrooms">{{ __('Serie(s)') }}</label>
                            <select class="js-example-basic-single form-select @error('classrooms') is-invalid @enderror" multiple="multiple" data-width="100%" id="classrooms" name="classrooms[]" autofocus>
                                @foreach($classrooms as $id => $classrooms)
                                <option value="{{ $id }}" {{ (in_array($id, old('classrooms', [])) || $document->classrooms->contains($id)) ? 'selected' : '' }}>{{ ucwords($classrooms) }}</option>
                                @endforeach
                            </select>

                            @error('classrooms')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        @if ($document->document_type == "Book")
                        <div id="docDescr" class="mb-3">
                            <label class="form-label" for="document_description">{{ __('Description') }}</label>
                            <textarea class="@error('document_description') is-invalid @enderror form-control" id="tinymceExample" rows="15" placeholder="{{ __('Description of the document') }}" name="document_description" autofocus> {{$document->document_description}}</textarea>

                            @error('document_description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        @endif

                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label" for="document_path">{{ __('Upload the document') }}</label>
                                <input type="file" accept=".pdf" class="@error('document_path') is-invalid @enderror" id="document_path" name="document_path" value="{{ old('document_path', $document->document_path) }}" autofocus>

                                @error('document_path')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            @if ($document->document_type == "Paper")
                            <div id="pathCorr" class="col">
                                <label class="form-label" for="correction_path">{{ __('Upload the correction') }}</label>
                                <input type="file" accept=".pdf" class="@error('correction_path') is-invalid @enderror" id="correction_path" name="correction_path" value="{{ old('correction_path', $document->correction_path) }}" autofocus>

                                @error('correction_path')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="document_price">{{ __('Price') }}</label>
                            <input type="text" data-inputmask="'alias': 'currency'" class="@error('document_price') is-invalid @enderror form-control" id="document_price" name="document_price" :value="old('document_price')" value="{{ old('document_price', $document->document_price) }}" autofocus>

                            @error('document_price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="mt-5">
                            <button type="submit" class="btn btn-primary me-2">{{ __('Submit') }}</button>
                            <a role="button" class="btn btn-dark" href="{{ route('documents.index') }}">
                                {{ __('Back to the Table') }}
                            </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    @section('scripts')
    <script type="text/javascript">
        $(document).ready(function()
        {
            $( document ).on('change', '#document_type', function()
            {
                var responseID = $(this).val();

                if(responseID == "Book")
                {
                    $('#sessionDoc').addClass("visually-hidden");
                    $('#pathCorr').addClass("visually-hidden");
                    $('#docDescr').removeClass("visually-hidden");
                    $('#docTitle').removeClass("visually-hidden");
                }
                else
                {
                    $('#sessionDoc').removeClass("visually-hidden");
                    $('#pathCorr').removeClass("visually-hidden");
                    $('#docDescr').addClass("visually-hidden");
                    $('#docTitle').addClass("visually-hidden");
                }
            });
        })
    </script>
    @endsection

</x-app-layout>
