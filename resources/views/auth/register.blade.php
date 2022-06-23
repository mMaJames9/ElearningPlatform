<x-guest-layout>
    <div class="main-wrapper">
        <div class="page-wrapper full-page">
            <div class="page-content d-flex align-items-center justify-content-center">

                <div class="row w-100 mx-0 auth-page">
                    <div class="col-md-8 col-xl-6 mx-auto">
                        <div class="card">
                            <div class="row">
                                <div class="col-md-4 pe-md-0">
                                    <div class="auth-side-wrapper">

                                    </div>
                                </div>
                                <div class="col-md-8 ps-md-0">
                                    <div class="auth-form-wrapper px-4 py-5">
                                        <img class="mb-5" src="{{ asset('images/logo.png') }}" alt="logo" width="40%">
                                        <h5 class="text-muted fw-normal mb-4">{{__('New here? Join us today! It takes only few steps')}}</h5>

                                        <form class="forms-sample" method="POST" action="{{ route('register') }}">
                                            @csrf

                                            <div class="mb-3">
                                                <label class="form-label" for="name">{{ __('Name') }}</label>
                                                <input type="text" class="@error('name') is-invalid @enderror form-control" id="name" placeholder="{{ __('Name') }}" name="name" :value="old('name')" required autofocus>

                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label" for="email">{{ __('Email') }}</label>
                                                <input type="email" class="@error('email') is-invalid @enderror form-control" id="email" placeholder="{{ __('Email') }}" name="email" :value="old('email')" required autofocus>

                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label" for="username">{{ __('Username') }}</label>
                                                <input type="text" class="@error('username') is-invalid @enderror form-control" id="username" placeholder="{{ __('Username') }}" name="username" :value="old('username')" required autofocus>

                                                @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label" for="phone_number">{{ __('Phone Number') }}</label>
                                                <input type="text" class="@error('phone_number') is-invalid @enderror form-control" id="phone_number" placeholder="{{ __('Phone Number') }}" name="phone_number" :value="old('phone_number')" required autofocus data-inputmask-alias="+237 699 999 999">

                                                @error('phone_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label" for="password">{{ __('Password') }}</label>
                                                <input type="password" class="@error('password') is-invalid @enderror form-control" id="password" placeholder="{{ __('Password') }}" name="password" :value="old('password')" required autofocus>

                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label" for="password_confirmation">{{ __('Confirm Password') }}</label>
                                                <input type="password" class="@error('password_confirmation') is-invalid @enderror form-control" id="password_confirmation" placeholder="{{ __('Confirm Password') }}" name="password_confirmation" :value="old('password_confirmation')" required autofocus>

                                                @error('password_confirmation')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                            <div class="form-check mb-3">
                                                <input type="checkbox" class="form-check-input" id="terms" type="checkbox" name="terms">
                                                <label class="form-check-label" for="terms">
                                                    !! __('I agree to the :terms_of_service and :privacy_policy', ['terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',]) !!}
                                                </label>
                                            </div>
                                            @endif

                                            <div>
                                                <button class="btn btn-primary text-white me-2 mb-2 mb-md-0">{{ __('Sign Up') }}</button>
                                            </div>
                                            <a href="{{ route('login') }}" class="d-block mt-3 text-muted">{{__('Already have an account? Log In')}}</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</x-guest-layout>
