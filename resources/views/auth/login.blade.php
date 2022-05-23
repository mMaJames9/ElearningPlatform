<x-guest-layout>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
                <div class="row flex-grow">
                    <div class="col-lg-6 d-flex align-items-center justify-content-center">
                        <div class="auth-form-transparent text-left p-3">
                            <div class="brand-logo">
                                <img src="{{ asset('images/logo.svg') }}" alt="logo">
                            </div>
                            <h4>{{__('Welcome Back!')}}</h4>
                            <h6 class="fw-light">{{__('Happy to see you again!')}}</h6>

                            <form class="pt-3" method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group">
                                    <label for="login">{{ __('Login') }}</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="ti-user text-primary"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="@error('login') is-invalid @enderror form-control form-control-lg border-left-0" id="login" placeholder="{{ __('Login') }}" name="login" :value="old('login')" required autofocus>

                                        @error('login')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password">{{ __('Password') }}</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="ti-lock text-primary"></i>
                                            </span>
                                        </div>
                                        <input type="password" class="@error('password') is-invalid @enderror form-control form-control-lg border-left-0" id="password" placeholder="{{ __('Password') }}" name="password" autocomplete="current-password" required>

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row my-2 align-items-center">
                                    <div class="col-6 form-check">
                                        <label for="remember_me" class="form-check-label text-muted">
                                            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                                            {{ __('Remember me') }}
                                        </label>
                                    </div>
                                    <div class="col-6 form-check text-end">
                                        @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="auth-link text-black">{{ __('Forgot your password?') }}</a>
                                        @endif
                                    </div>
                                </div>
                                <div class="my-3">
                                    <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">{{ __('Log In') }}</button>
                                </div>
                                <div class="text-center mt-4 fw-light">
                                    {{__('Don\'t have an account?')}}
                                    <a href="{{ route('register') }}" class="text-primary">{{__('Create')}}</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 login-half-bg d-flex flex-row">
                        <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2022  All rights reserved.</p>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
</x-guest-layout>
