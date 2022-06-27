<x-app-layout>
    <div class="row">

        @if(session('status'))
            <script>
                window.addEventListener("load", function () {
                    Toastify({
                        text: "{{ session('status') }}",
                        duration: 5000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        backgroundColor: "#198754",
                    }).showToast();
                });
            </script>
        @endif

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
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card-body">

                    <h6 class="card-title mb-5">{{__('Create a New Classroom')}}</h6>

                    <form class="forms-sample" method="POST" action="{{ route('classrooms.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label" for="classroom_name">{{ __('Name') }}</label>
                            <input type="classroom_name" class="@error('classroom_name') is-invalid @enderror form-control" id="classroom_name" placeholder="{{ __('Name of the classroom') }}" name="classroom_name" :value="old('classroom_name')" required autofocus>

                            @error('classroom_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mt-5">
                            <button type="submit" class="btn btn-primary me-2">{{ __('Submit') }}</button>
                            <a role="button" class="btn btn-dark" href="{{ route('classrooms.index') }}">
                                {{ __('Back to the Table') }}
                            </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
