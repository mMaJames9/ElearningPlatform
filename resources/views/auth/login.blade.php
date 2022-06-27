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
                                        <h5 class="text-muted fw-normal mb-4">{{__('Welcome Back! Happy to see you again!')}}</h5>
                                        <form class="forms-sample" method="POST" action="{{ route('login') }}">
                                            @csrf

                                            <div class="mb-4">
                                                <label for="login" class="form-label">{{ __('Login') }}</label>
                                                <input type="text" class="@error('login') is-invalid @enderror form-control" id="login" placeholder="{{ __('Login') }}" name="login" :value="old('login')" required autofocus>

                                                @error('login')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="password" class="form-label">{{ __('Password') }}</label>
                                                    </div>
                                                    <div class="col text-end">
                                                        @if (Route::has('password.request'))
                                                        <a href="{{ route('password.request') }}" class="auth-link text-black form-text">{{ __('Forgot your password?') }}</a>
                                                        @endif
                                                    </div>
                                                </div>
                                                <input type="password" class="@error('password') is-invalid @enderror form-control" id="password" placeholder="{{ __('Password') }}" name="password" autocomplete="current-password" required>

                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                                                <label class="form-check-label" for="remember_me">
                                                    {{ __('Remember me') }}
                                                </label>
                                            </div>

                                            <div>
                                                <button class="btn btn-primary me-2 mb-2 mb-md-0 text-white">{{ __('Log In') }}</button>
                                            </div>
                                            <a href="{{ route('register') }}" class="d-block mt-3">{{__('Don\'t have an account? Create')}}</a>
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
