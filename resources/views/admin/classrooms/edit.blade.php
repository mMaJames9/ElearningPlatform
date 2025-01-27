<x-app-layout>

    <div class="card mb-3">
        <div class="card-header border-bottom">
            <div class="row flex-between-end">
                <div class="col-auto align-self-center">
                    <h5 class="mb-0 fw-bold">{{__('Update the Classroom')}}</h5>
                </div>
            </div>
        </div>
        <div class="card-body pt-0 col-12 col-xxl-6 grid-margin">

            <div class="tab-content mt-4">

                <form method="POST" action="{{ route("classrooms.update", [$classroom->id]) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    <div class="form-floating mb-3">
                        <input type="text" class="@error('classroom_name') is-invalid @enderror form-control" id="classroom_name" placeholder="{{ __('Name of the classroom') }}" name="classroom_name" value="{{ old('classroom_name', $classroom->classroom_name) }}" required autofocus>

                        @error('classroom_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <label class="form-label" for="classroom_name">{{ __('Name') }}</label>
                    </div>

                    <div class="mt-5">
                        <button type="submit" class="btn btn-falcon-primary me-1 mb-1">{{ __('Submit') }}</button>
                        <a role="button" class="btn btn-outline-secondary me-1 mb-1" href="{{ route('classrooms.index') }}">
                            {{ __('Back to the Table') }}
                        </a>
                    </div>

                </form>

            </div>
        </div>
    </div>

</x-app-layout>
