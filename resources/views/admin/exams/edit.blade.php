<x-app-layout>
    <div class="row">
        <div class="card">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card-body">
                    
                    <h6 class="card-title mb-5">{{__('Update the Exam')}}</h6>
                    
                    <form class="forms-sample" method="POST" action="{{ route("exams.update", [$exam->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        <div class="mb-3">
                            <label class="form-label" for="exam_section">{{ __('Section') }}</label>
                            <select class="js-example-basic-single form-select" data-width="100%" @error('exam_section') is-invalid @enderror" id="exam_section" name="exam_section" :value="old('exam_section')" required autofocus>
                                @if ($exam->exam_section == "Francophone")
                                <option value="Fr" selected>Francophone</option>
                                <option value="En">Anglophone</option>
                                @else
                                <option value="Fr">Francophone</option>
                                <option value="En" selected>Anglophone</option>
                                @endif
                            </select>

                            @error('exam_section')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
    
                        <div class="mb-3">
                            <label class="form-label" for="exam_name">{{ __('Name') }}</label>
                            <input type="exam_name" class="@error('exam_name') is-invalid @enderror form-control" id="exam_name" placeholder="{{ __('Name of the exam') }}" name="exam_name" value="{{ old('exam_name', $exam->exam_name) }}" required autofocus>
    
                            @error('exam_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        
                        <div class="mt-5">
                            <button type="submit" class="btn btn-primary me-2">{{ __('Submit') }}</button>
                            <a role="button" class="btn btn-dark" href="{{ route('exams.index') }}">
                                {{ __('Back to the Table') }}
                            </a>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
