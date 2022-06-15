<x-app-layout>
    <div class="row">
        <div class="card">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card-body">
                    
                    <h6 class="card-title mb-5">{{__('Update the Subject')}}</h6>
                    
                    <form class="forms-sample" method="POST" action="{{ route("subjects.update", [$subject->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
    
                        <div class="mb-3">
                            <label class="form-label" for="subject_name">{{ __('Name') }}</label>
                            <input type="subject_name" class="@error('subject_name') is-invalid @enderror form-control" id="subject_name" placeholder="{{ __('Name of the subject') }}" name="subject_name" value="{{ old('subject_name', $subject->subject_name) }}" required autofocus>
    
                            @error('subject_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        
                        <div class="mt-5">
                            <button type="submit" class="btn btn-primary me-2">{{ __('Submit') }}</button>
                            <a role="button" class="btn btn-dark" href="{{ route('subjects.index') }}">
                                {{ __('Back to the Table') }}
                            </a>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
