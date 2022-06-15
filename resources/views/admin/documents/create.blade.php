<x-app-layout>
    <div class="row">
        <div class="card">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card-body">
                    
                    <h6 class="card-title mb-5">{{__('Create a New Document')}}</h6>
                    
                    <form class="forms-sample" method="POST" action="{{ route('documents.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="document_type">{{ __('Type') }}</label>
                            <select class="js-example-basic-single form-select" data-width="100%" @error('document_type') is-invalid @enderror" id="document_type" name="document_type" required autofocus>
                                <option disabled selected hidden>{{ __('--- Select document type ---') }}</option>
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
                            <label class="form-label" for="subjects">{{ __('Subject') }}</label>
                            <select class="js-example-basic-single form-select" data-width="100%" @error('subjects') is-invalid @enderror" id="subjects" name="subjects[]" :value="old('subjects')" required autofocus>
                                <option disabled selected hidden>{{ __('--- Select the subject of the document ---') }}</option>
                                @foreach($subjects as $id => $subjects)
                                <option value="{{ $id }}" {{ in_array($id, old('subjects', [])) ? 'selected' : '' }}>{{ $subjects }}</option>
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
                            <input type="text" class="@error('document_title') is-invalid @enderror form-control" id="document_title" placeholder="{{ __('Title of the document') }}" name="document_title" :value="old('document_title')" autofocus>
    
                            @error('document_title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label" for="exam_id">{{ __('Exam') }}</label>
                                <select class="js-example-basic-single form-select" data-width="100%" @error('exam_id') is-invalid @enderror" id="exam_id" name="exam_id" :value="old('exam_id')" required autofocus>
                                    <option disabled selected hidden>{{ __('--- Select the corresponding exam ---') }}</option>
                                    @foreach($exams as $id => $exam)
                                    <option value="{{ $id }}">{{ $exam }}</option>
                                    @endforeach
                                </select>
    
                                @error('exam_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div id="sessionDoc" class="col">
                                <label class="form-label" for="document_session">{{ __('Session') }}</label>
                                <input type="month" class="@error('document_session') is-invalid @enderror form-control" id="document_session" name="document_session" :value="old('document_session')" autofocus>
    
                                @error('document_session')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="document_serie">{{ __('Serie') }}</label>
                            <select class="js-example-basic-multiple form-select" multiple="multiple" data-width="100%" @error('document_serie') is-invalid @enderror" id="document_serie" name="document_serie[]" :value="old('document_serie')" required autofocus>
                                <option disabled hidden>{{ __('--- Select the concerned class(es) ---') }}</option>
                                <option value="3ième ALL">3ième ALL</option>
                                <option value="3ième ESP">3ième ESP</option>
                                <option value="Première A4 ALL">Première A4 ALL</option>
                                <option value="Première A4 ESP">Première A4 ESP</option>
                                <option value="Première C">Première C</option>
                                <option value="Première D">Première D</option>
                                <option value="Première E">Première E</option>
                                <option value="Première TI">Première TI</option>
                                <option value="Tle A4 ALL">Tle A4 ALL</option>
                                <option value="Tle A4 ESP">Tle A4 ESP</option>
                                <option value="Tle ABI (A Bilingue)">Tle ABI (A Bilingue)</option>
                                <option value="Tle C">Tle C</option>
                                <option value="Tle D">Tle D</option>
                                <option value="Tle E">Tle E</option>
                                <option value="Tle TI">Tle TI</option>
                            </select>

                            @error('document_serie')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div id="docDescr" class="mb-3">
                            <label class="form-label" for="document_description">{{ __('Description') }}</label>
                            <textarea class="@error('document_description') is-invalid @enderror form-control" rows="5" id="document_description" placeholder="{{ __('Description of the document') }}" name="document_description" :value="old('document_description')" autofocus></textarea>
    
                            @error('document_description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label" for="document_path">{{ __('Upload the document') }}</label>
                                <input type="file" accept=".pdf" class="@error('document_path') is-invalid @enderror" id="document_path" name="document_path" required autofocus>
    
                                @error('document_path')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div id="pathCorr" class="col">
                                <label class="form-label" for="correction_path">{{ __('Upload the correction') }}</label>
                                <input type="file" accept=".pdf" class="@error('correction_path') is-invalid @enderror" id="correction_path" name="correction_path" autofocus>
    
                                @error('correction_path')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="document_price">{{ __('Price') }}</label>
                            <input type="text" data-inputmask="'alias': 'currency'" class="@error('document_price') is-invalid @enderror form-control" id="document_price" name="document_price" :value="old('document_price')" required autofocus>

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
