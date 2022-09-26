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
                                                {{ __('Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                                            </p>

                                        </div>
                                    </div>

                                    <div class="mt-3 mb-4 mt-md-4 mb-md-5 light">
                                        <p class="mb-0 mt-4 mt-md-5 fs--1 fw-semi-bold text-white opacity-75">
                                            <a class="text-decoration-underline text-white me-2" href="{{ route('profile.show') }}">{{ __('Edit Profile') }}</a>
                                        </p>
                                    </div>

                                </div>
                                <div class="col-md-7 d-flex flex-center">
                                    <div class="p-4 p-md-5 flex-grow-1">
                                        <div class="text-center">
                                            <img class="d-block mx-auto mb-4" src="{{ asset('assets/img/icons/spot-illustrations/16.png') }}" alt="Email" width="100" />
                                            <h3 class="mb-2">{{__('Please check your email!')}}</h3>
                                            <p>{{__('An email has been sent to')}} <strong>{{ Auth::user()->email }}</strong>. {{__('Please click on the')}} <br class="d-none d-sm-block d-md-none" />{{_('included link to reset your password')}}.</p>
                                            <form method="POST" action="{{ route('verification.send') }}">
                                                @csrf
                                                <button type="submit" class="btn btn-primary btn-sm mt-3 mb-2">
                                                    <span class="fas fa-paper-plane me-1" data-fa-transform="shrink-4 down-1"></span>
                                                    {{ __('Resend Verification Email') }}
                                                </button>
                                            </form>
                                            @if (session('status') == 'verification-link-sent')
                                            <p class="opacity-75 text-info fs--1 mt-3">
                                                {{ __('A new verification link has been sent to the email address you provided in your profile settings.') }}
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
    </main>
</x-guest-layout>
