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

                                        <div class="z-index-1 position-relative">
                                            <a class="link-light mb-4 font-sans-serif fs-4 d-inline-block fw-bolder" href="{{ route('welcome') }}">
                                                <img class="my-2" src="{{ asset('assets/img/icons/spot-illustrations/exam-succes-white.png') }}" alt="logo" width="180" />
                                             </a>
                                            <p class="opacity-75 text-white">
                                                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                                            </p>

                                        </div>
                                    </div>

                                    <div class="mt-3 mb-4 mt-md-4 mb-md-5 light">
                                        <p class="text-white">{{__('Don\'t have an account?')}}
                                            <br>
                                            <a class="btn btn-outline-light mt-2 px-4" href="{{ route('register') }}">
                                                {{__('Get started!')}}
                                            </a>
                                        </p>
                                    </div>

                                </div>
                                <div class="col-md-7 d-flex flex-center">
                                    <div class="p-4 p-md-5 flex-grow-1">
                                        <div class="text-center text-md-start">
                                            <h4 class="mb-0">{{__('Forgot your password?')}}</h4>
                                            <p class="mb-4">{{__('Enter your email and we\'ll send you a reset link.')}}</p>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-sm-8 col-md">
                                                <form class="mb-2" method="POST" action="{{ route('password.email') }}">
                                                    @csrf

                                                    <input class="form-control" id="email" type="email" name="email" :value="old('email')" required autofocus placeholder="{{__('Email address')}}" />
                                                    <div class="mb-3"></div>
                                                    <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">
                                                        {{ __('Email Password Reset Link') }}
                                                    </button>
                                                </form>

                                                @if (session('status'))
                                                <p class="opacity-75 text-info fs--1 mt-3">
                                                    {{ session('status') }}
                                                </p>
                                                @endif

                                            </div>
                                        </div>
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
