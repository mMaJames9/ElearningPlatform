<x-app-layout>

    <div class="card mb-3">
        <div class="card-header border-bottom">
            <div class="row flex-between-end">
                <div class="col-auto align-self-center">
                    <h5 class="mb-0 fw-bold">{{__('Create a New Document')}}</h5>
                </div>
            </div>
        </div>
        <div class="card-body pt-0 col-12 col-xxl-6 grid-margin">

            <div class="tab-content mt-4">

                <form method="POST" action="{{ route('documents.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="document_type">{{ __('Type') }}</label>
                        <select class="form-select js-choice @error('document_type') is-invalid @enderror" data-width="100%" id="document_type" name="document_type" required autofocus data-options='{"removeItemButton":true,"placeholder":true}'>
                            <option value="" selected disabled hidden>{{__('Select the document type')}}...</option>
                            <option value="Paper">{{ __('Paper') }}</option>
                            <option value="Book">{{ __('Book') }}</option>
                        </select>

                        @error('document_type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="subjects">{{ __('Subject(s)') }}</label>
                        <select class="form-select js-choice @error('subjects') is-invalid @enderror" multiple="multiple" data-width="100%" id="subjects" name="subjects[]" :value="old('subjects')" required autofocus data-options='{"removeItemButton":true,"placeholder":true}' required>
                            <option value="" disabled hidden>{{__('Select the subject(s)')}}...</option>
                            @foreach($subjects as $id => $subjects)
                            <option value="{{ $id }}" {{ in_array($id, old('subjects', [])) ? 'selected' : '' }}>{{ ucwords($subjects) }}</option>
                            @endforeach
                        </select>

                        @error('subjects')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div id="docTitle" class="mb-3">
                        <label class="form-label" for="document_title">{{ __('Title') }}</label>
                        <input type="text" class="@error('document_title') is-invalid @enderror form-control py-2" id="document_title" placeholder="{{ __('Title of the document') }}" name="document_title" :value="old('document_title')" autofocus>

                        @error('document_title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="mb-3 col-12 col-lg">
                            <label class="form-label" for="exam_id">{{ __('Exam') }}</label>
                            <select class="form-select js-choice @error('exam_id') is-invalid @enderror" data-width="100%" id="exam_id" name="exam_id" :value="old('exam_id')" required autofocus data-options='{"removeItemButton":true,"placeholder":true}'>
                                <option value="" disabled selected hidden>{{__('Select the corresponding exam')}}...</option>
                                @foreach($exams as $id => $exam)
                                <option value="{{ $id }}">{{ ucwords($exam) }}</option>
                                @endforeach
                            </select>

                            @error('exam_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div id="sessionDoc" class="mb-3 col-12 col-lg">
                            <label class="form-label" for="document_session">{{ __('Session') }}</label>
                            <input type="month" class="@error('document_session') is-invalid @enderror form-control py-2" id="document_session" name="document_session" :value="old('document_session')" autofocus>

                            @error('document_session')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="classrooms">{{ __('Serie(s)') }}</label>
                        <select class="form-select js-choice @error('classrooms') is-invalid @enderror" multiple="multiple" data-width="100%" id="classrooms" name="classrooms[]" :value="old('classrooms')" required autofocus data-options='{"removeItemButton":true,"placeholder":true}'>
                            <option value="" disabled hidden>{{__('Select the classroom(s)')}}...</option>
                            @foreach($classrooms as $id => $classrooms)
                            <option value="{{ $id }}" {{ in_array($id, old('classrooms', [])) ? 'selected' : '' }}>{{ ucwords($classrooms) }}</option>
                            @endforeach
                        </select>

                        @error('classrooms')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <div class="col-12 col-md mb-3">
                            <label class="form-label" for="document_path">{{ __('Upload the document') }}</label>
                            <input type="file" accept=".pdf" class="@error('document_path') is-invalid @enderror" id="document_path" name="document_path" required autofocus>

                            @error('document_path')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div id="pathCorr" class="col-12 col-md mb-3">
                            <label class="form-label" for="correction_path">{{ __('Upload the correction') }}</label>
                            <input type="file" accept=".pdf" class="@error('correction_path') is-invalid @enderror" id="correction_path" name="correction_path" autofocus>

                            @error('correction_path')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div id="docDescr" class="mb-3">
                        <label class="form-label" for="document_description">{{ __('Description') }}</label>
                        <textarea class="tinymce @error('document_description') is-invalid @enderror form-control" placeholder="{{ __('Description of the document') }}" name="document_description" :value="old('document_description')" autofocus></textarea>

                        @error('document_description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="mt-5">
                        <button type="submit" class="btn btn-falcon-primary me-1 mb-1">{{ __('Submit') }}</button>
                        <a role="button" class="btn btn-outline-secondary me-1 mb-1" href="{{ route('documents.index') }}">
                            {{ __('Back to the Table') }}
                        </a>
                    </div>
                </form>

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

                    $('#document_title').attr('required', '');
                    $('#exam_id').attr('required', '');

                    $('#document_session').removeAttr('required');
                    $('#correction_path').removeAttr('required');
                }
                else
                {
                    $('#sessionDoc').removeClass("visually-hidden");
                    $('#pathCorr').removeClass("visually-hidden");
                    $('#docDescr').addClass("visually-hidden");
                    $('#docTitle').addClass("visually-hidden");

                    $('#document_session').attr('required', '');
                    $('#correction_path').attr('required', '');

                    $('#document_title').removeAttr('required');
                }
            });
        })
    </script>
    @endsection

</x-app-layout>
