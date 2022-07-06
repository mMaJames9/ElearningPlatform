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
                                        <div class="bg-holder bg-auth-card-shape" style="background-image:url(assets/img/icons/spot-illustrations/half-circle.png);"></div>
                                        <!--/.bg-holder-->
                                        <div class="z-index-1 position-relative">
                                            <a class="link-light mb-4 font-sans-serif fs-4 d-inline-block fw-bolder" href="{{ route('welcome') }}">
                                                <img class="" src="{{ asset('assets/img/icons/spot-illustrations/falcon.png') }}" alt="logo" width="120" />
                                            </a>
                                            <p class="opacity-75 text-white">{{__('Hello, Friend! New here? Join us today! It takes only few steps. Enter your personal details and start journey with us')}}</p>
                                        </div>
                                    </div>
                                    <div class="mt-3 mb-4 mt-md-4 mb-md-5 light">
                                        <p class="pt-3 text-white">
                                            {{__('Have an account?')}}
                                            <br>
                                            <a class="btn btn-outline-light mt-2 px-4" href="{{ route('login') }}">
                                                {{__('Log In')}}
                                            </a>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-7 d-flex flex-center">
                                    <div class="p-4 p-md-5 flex-grow-1">
                                        <h3>{{__('Register')}}</h3>
                                        <form method="POST" action="{{ route('register') }}">
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

                                            <div class="row gx-2">
                                                <div class="mb-3 col-sm">
                                                    <label class="form-label" for="password">{{ __('Password') }}</label>
                                                    <input type="password" class="@error('password') is-invalid @enderror form-control" id="password" placeholder="{{ __('Password') }}" name="password" :value="old('password')" required autofocus>

                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <div class="mb-3 col-sm">
                                                    <label class="form-label" for="password_confirmation">{{ __('Confirm Password') }}</label>
                                                    <input type="password" class="@error('password_confirmation') is-invalid @enderror form-control" id="password_confirmation" placeholder="{{ __('Confirm') }}" name="password_confirmation" :value="old('password_confirmation')" required autofocus>

                                                    @error('password_confirmation')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="mb-4 col-sm">
                                                <label class="form-label" for="exam_id">{{ __('Classroom') }}</label>
                                                <select class="form-select @error('classroom_id') is-invalid @enderror" data-width="100%" id="classroom_id" name="classroom_id" :value="old('classroom_id')" required autofocus data-options='{"removeItemButton":true,"placeholder":true}'>
                                                    <option value="" disabled selected hidden>{{__('Select your classroom')}}...</option>
                                                    @foreach($classrooms as $id => $classroom)
                                                    <option value="{{ $id }}">{{ ucwords($classroom) }}</option>
                                                    @endforeach
                                                </select>

                                                @error('classroom_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            {{-- @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature()) --}}
                                            <div class="mb-5 form-check">
                                                <input type="checkbox" class="form-check-input" id="terms" type="checkbox" name="terms">
                                                <label class="form-check-label" for="terms">
                                                    {{__('I accept the')}}
                                                    <a target="_blank" target="_blank" href="'.route('terms.show').'">{{__('Terms of Service')}}</a>
                                                    {{__('and')}}
                                                    <a target="_blank" href="'.route('policy.show').'">{{__('Privacy Policy')}} </a>
                                                </label>
                                            </div>
                                            {{-- @endif --}}

                                            <div class="mb-3">
                                                <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">{{__('Register')}}</button>
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
