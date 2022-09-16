<x-app-layout>

    <div class="card mb-3">
        <div class="card-header border-bottom">
            <div class="row flex-between-end">
                <div class="col-auto align-self-center">
                    <h5 class="mb-0 fw-bold">{{__('Create a New Exam')}}</h5>
                </div>
            </div>
        </div>
        <div class="card-body pt-0 col-12 col-xxl-6 grid-margin">

            <div class="tab-content mt-4">

                <form method="POST" action="{{ route('exams.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="exam_section">{{ __('Section') }}</label>

                        <select class="form-select js-choice @error('exam_section') is-invalid @enderror" id="exam_section" name="exam_section" data-options='{"removeItemButton":true,"placeholder":true}'>
                            <option value="" selected disabled hidden>{{__('Select section')}}...</option>
                            <option value="Fr">{{__('Francophone')}}</option>
                            <option value="En">{{__('Anglophone')}}</option>
                        </select>

                        @error('exam_section')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="@error('exam_name') is-invalid @enderror form-control" id="exam_name" placeholder="{{ __('Name of the exam') }}" name="exam_name" :value="old('exam_name')" required autofocus>

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
