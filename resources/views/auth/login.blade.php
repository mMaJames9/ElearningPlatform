<x-guest-layout>
    <main class="main" id="top">
        <div class="container-fluid">
            <div class="row min-vh-100 flex-center g-0">
                <div class="col-lg-8 col-xxl-5 py-3 position-relative">
                    <img class="bg-auth-circle-shape" src="{{asset('assets/img/icons/spot-illustrations/bg-shape.png')}}" alt="" width="250">
                    <img class="bg-auth-circle-shape-2" src="{{asset('assets/img/icons/spot-illustrations/shape-1.png')}}" alt="" width="150">
                    <div class="card overflow-hidden z-index-1">
                        <div class="card-body p-0">
                            <div class="row g-0 h-100">
                                <div class="col-md-5 text-center bg-card-gradient">
                                    <div class="position-relative p-4 pt-md-5 pb-md-7 light">
                                        <div class="bg-holder bg-auth-card-shape" style="background-image:url(assets/img/icons/spot-illustrations/half-circle.png);;"></div>
                                        {{-- /.bg-holder --}}
                                        <div class="z-index-1 position-relative">
                                            <a class="link-light mb-4 font-sans-serif fs-4 d-inline-block fw-bolder" href="{{ route('welcome') }}">
                                               <img class="my-2" src="{{ asset('assets/img/icons/spot-illustrations/falcon.png') }}" alt="logo" width="120" />
                                            </a>
                                            <p class="opacity-75 text-white">{{__('Welcome back! Happy to see you again! To connect with us, you can log in with your email address, phone number or username and your password.')}}</p>
                                        </div>
                                    </div>
                                    <div class="mt-3 mb-4 mt-md-4 mb-md-5 light">
                                        <p class="text-white">{{__('Don\'t have an account?')}}
                                            <br>
                                            <a class="btn btn-outline-light mt-2 px-4" href="{{ route('register') }}">
                                                {{__('Get started!')}}
                                            </a>
                                        </p>
                                        {{-- @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature()) --}}
                                        <p class="mb-0 mt-4 mt-md-5 fs--1 fw-semi-bold text-white opacity-75">
                                            {{__('Read our')}}
                                            <a class="text-decoration-underline text-white" target="_blank" href="'.route('terms.show').'">{{__('Terms of Service')}}</a>
                                            {{__('and')}}
                                            <a class="text-decoration-underline text-white" target="_blank" href="'.route('policy.show').'">{{__('Privacy Policy')}} </a>
                                        </p>
                                        {{-- @endif --}}
                                    </div>
                                </div>
                                <div class="col-md-7 d-flex flex-center">
                                    <div class="p-4 p-md-5 flex-grow-1">
                                        <div class="row flex-between-center">
                                            <div class="col-auto">
                                                <h3>{{__('Account Login')}}</h3>
                                            </div>
                                        </div>
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="login" class="form-label">{{ __('Login') }}</label>
                                                <input type="text" class="@error('login') is-invalid @enderror form-control" id="login" placeholder="{{ __('Login') }}" name="login" :value="old('login')" required autofocus />

                                                @error('login')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <div class="d-flex justify-content-between">
                                                    <label for="password" class="form-label">{{ __('Password') }}</label>
                                                </div>
                                                <input type="password" class="@error('password') is-invalid @enderror form-control" id="password" placeholder="{{ __('Password') }}" name="password" autocomplete="current-password" required>

                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="row flex-between-center">
                                                <div class="col-auto">
                                                    <div class="form-check mb-0">
                                                        <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                                                        <label class="form-check-label" for="remember_me">
                                                            {{ __('Remember me') }}
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    @if (Route::has('password.request'))
                                                    <a href="{{ route('password.request') }}" class="fs--1">{{ __('Forgot your password?') }}</a>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">{{ __('Log In') }}</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-guest-layout>
