<x-app-layout>

    <div class="card mb-3">
        <div class="card-header border-bottom">
            <div class="row flex-between-end">
                <div class="col-auto align-self-center">
                    <h5 class="mb-0 fw-bold">{{__('Update the Exam')}}</h5>
                </div>
            </div>
        </div>
        <div class="card-body pt-0 col-12 col-xxl-6 grid-margin">

            <div class="tab-content mt-4">

                <form method="POST" action="{{ route("exams.update", [$exam->id]) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    <div class="form-floating mb-3">
                        <select class="form-select js-choice  @error('exam_section') is-invalid @enderror" id="exam_section" size="1" name="exam_section" data-options='{"removeItemButton":true,"placeholder":true}'>
                            <option value="Fr" @if(($exam->exam_section) === 'Fr') selected @endif>{{__('Francophone')}}</option>
                            <option value="En" @if(($exam->exam_section) === 'En') selected @endif>{{__('Anglophone')}}</option>
                        </select>

                        @error('exam_section')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <label class="form-label" for="exam_section">{{ __('Section') }}</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="@error('exam_name') is-invalid @enderror form-control" id="exam_name" placeholder="{{ __('Name of the exam') }}" name="exam_name" value="{{ old('exam_name', $exam->exam_name) }}" required autofocus>

                        @error('exam_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <label class="form-label" for="exam_name">{{ __('Name') }}</label>
                    </div>

                    <div class="mt-5">
                        <button type="submit" class="btn btn-falcon-primary me-1 mb-1">{{ __('Submit') }}</button>
                        <a role="button" class="btn btn-outline-secondary me-1 mb-1" href="{{ route('exams.index') }}">
                            {{ __('Back to the Table') }}
                        </a>
                    </div>

                </form>

            </div>
        </div>
    </div>

</x-app-layout>
