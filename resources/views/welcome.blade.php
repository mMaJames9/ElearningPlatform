<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <!-- Required meta tags -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
        <meta name="author" content="ExamSucces">
        <meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- ===============================================-->
        <!--    Document Title-->
        <!-- ===============================================-->
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- ===============================================-->
        <!--    Favicons-->
        <!-- ===============================================-->
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/favicons/apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicons/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicons/favicon-16x16.png') }}">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicons/favicon.ico') }}">
        {{-- <link rel="manifest" href="{{ asset('assets/img/favicons/manifest.json') }}"> --}}
        <meta name="msapplication-TileImage" content="{{ asset('assets/img/favicons/mstile-150x150.png') }}">
        <meta name="theme-color" content="#ffffff">
        <script src="{{ asset('assets/js/config.js') }}" defer></script>
        <script src="{{ asset('vendors/overlayscrollbars/OverlayScrollbars.min.js') }}" defer></script>

        <!-- ===============================================-->
        <!--    Stylesheets-->
        <!-- ===============================================-->
        {{-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap">

        <link rel="stylesheet" href="{{ asset('vendors/swiper/swiper-bundle.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/overlayscrollbars/OverlayScrollbars.min.css') }}">

        <link rel="stylesheet" href="{{ asset('assets/css/theme.min.css') }}" id="style-default">
        <link rel="stylesheet" href="{{ asset('assets/css/user.min.css') }}" id="user-style-default">

        <link rel="stylesheet" href="{{ asset('assets/css/theme-rtl.min.css') }}" id="style-rtl">
        <link rel="stylesheet" href="{{ asset('assets/css/user-rtl.min.css') }}" id="user-style-rtl">

        <!-- ===============================================-->
        <!--    JavaScripts-->
        <!-- ===============================================-->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="{{ asset('js/core.js') }}" defer></script>
        <script src="{{ asset('vendors/inputmask/jquery.inputmask.bundle.js') }}" defer></script>
        <script src="{{ asset('vendors/anchorjs/anchor.min.js') }}" defer></script>
        <script src="{{ asset('vendors/is/is.min.js') }}" defer></script>
        <script src="{{ asset('vendors/swiper/swiper-bundle.min.js') }}" defer> </script>
        <script src="{{  asset('vendors/typed.js/typed.js') }}" defer></script>
        <script src="{{ asset('vendors/fontawesome/all.min.js') }}" defer></script>
        <script src="{{ asset('vendors/lodash/lodash.min.js') }}" defer></script>
        <script src="{{ asset('vendors/list.js/list.min.js') }}" defer></script>
        <script src="{{ asset('assets/js/theme.js') }}" defer></script>
        <script src="{{ asset('assets/js/inputmask.js') }}" defer></script>

        <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>

        <script>
            var isRTL = JSON.parse(localStorage.getItem('isRTL'));
            if (isRTL) {
                var linkDefault = document.getElementById('style-default');
                var userLinkDefault = document.getElementById('user-style-default');
                linkDefault.setAttribute('disabled', true);
                userLinkDefault.setAttribute('disabled', true);
                document.querySelector('html').setAttribute('dir', 'rtl');
            } else {
                var linkRTL = document.getElementById('style-rtl');
                var userLinkRTL = document.getElementById('user-style-rtl');
                linkRTL.setAttribute('disabled', true);
                userLinkRTL.setAttribute('disabled', true);
            }
        </script>

    </head>

    <body>
        <!-- ===============================================-->
        <!--    Main Content-->
        <!-- ===============================================-->
        <main class="main" id="top">
            <nav class="navbar navbar-standard navbar-expand-lg fixed-top navbar-dark" data-navbar-darken-on-scroll="data-navbar-darken-on-scroll">
                <div class="container">
                    <a class="navbar-brand" href="{{ route('welcome') }}">
                        <span class="text-white dark__text-white">
                            <img class="my-2" src="{{ asset('assets/img/icons/spot-illustrations/falcon.png') }}" alt="logo" width="120" />
                        </span>
                    </a>
                    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarStandard" aria-controls="navbarStandard" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse scrollbar" id="navbarStandard">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownLogin" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{__('Login')}}</a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-card" aria-labelledby="navbarDropdownLogin">
                                    <div class="card shadow-none navbar-card-login">
                                        <div class="card-body fs--1 p-4 fw-normal">
                                            <div class="row text-start justify-content-between align-items-center mb-2">
                                                <div class="col-auto">
                                                    <h5 class="mb-0">{{__('Log in')}}</h5>
                                                </div>
                                                <div class="col-auto">
                                                    <p class="fs--1 text-600 mb-0">{{__('or')}} <a href="{{ route('register') }}">{{__('Create an account')}}</a>
                                                    </p>
                                                </div>
                                            </div>
                                            <form method="POST" action="{{ route('login') }}">
                                                @csrf
                                                <div class="mb-3">
                                                    <input type="text" class="@error('login') is-invalid @enderror form-control" id="login" placeholder="{{ __('Login') }}" name="login" :value="old('login')" required autofocus />

                                                    @error('login')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <input type="password" class="@error('password') is-invalid @enderror form-control" id="login-password" placeholder="{{ __('Password') }}" name="password" autocomplete="current-password" required>

                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <div class="row flex-between-center">
                                                    <div class="col-auto">
                                                        <div class="form-check mb-0">
                                                            <input class="form-check-input" type="checkbox" id="remember_me" name="remember" />
                                                            <label class="form-check-label mb-0" for="remember_me">
                                                                {{ __('Remember me') }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        @if (Route::has('password.request'))
                                                        <a class="fs--1" href="{{ route('password.request') }}">
                                                            {{ __('Forgot password?') }}
                                                        </a>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">
                                                        {{ __('Log In') }}
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#!" data-bs-toggle="modal" data-bs-target="#registerModal">{{__('Register')}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body p-4">
                            <div class="row text-start justify-content-between align-items-center mb-2">
                                <div class="col-auto">
                                    <h5 id="modalLabel">{{__('Register')}}</h5>
                                </div>
                                <div class="col-auto">
                                    <p class="fs--1 text-600 mb-0">{{__('Have an account?')}}
                                        <a href="{{ route('login') }}">
                                        {{__('Log In')}}
                                        </a>
                                    </p>
                                </div>
                            </div>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="mb-3">
                                    <input type="text" class="@error('name') is-invalid @enderror form-control" id="name" placeholder="{{ __('Name') }}"
                                    name="name" :value="old('name')" required autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <input type="email" class="@error('email') is-invalid @enderror form-control" id="email" placeholder="{{ __('Email') }}" name="email" :value="old('email')" required autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="@error('username') is-invalid @enderror form-control" id="username" placeholder="{{ __('Username') }}" name="username" :value="old('username')" required autofocus>

                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="@error('phone_number') is-invalid @enderror form-control" id="phone_number" placeholder="{{ __('Phone Number') }}" name="phone_number" :value="old('phone_number')" required autofocus data-inputmask-alias="+237 699 999 999">

                                    @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="row gx-2">
                                    <div class="mb-3 col-sm">
                                        <input type="password" class="@error('password') is-invalid @enderror form-control" id="password" placeholder="{{ __('Password') }}" name="password" :value="old('password')" required autofocus>

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-sm">
                                        <input type="password" class="@error('password_confirmation') is-invalid @enderror form-control" id="password_confirmation" placeholder="{{ __('Confirm') }}" name="password_confirmation" :value="old('password_confirmation')" required autofocus>

                                        @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-4 col-sm">
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
                                <div class="form-check">
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

            <section class="py-0 overflow-hidden light" id="banner">
                <div class="bg-holder overlay" style="background-image:url(assets/img/generic/bg-1.jpg);background-position: center bottom;">

                </div>
                <!--/.bg-holder-->
                <div class="container">
                    <div class="row flex-center pt-8 pt-lg-10 pb-lg-9 pb-xl-0">
                        <div class="col-md-11 col-lg-8 col-xl-4 pb-7 pb-xl-9 text-center text-xl-start">
                            <a class="btn btn-outline-danger mb-4 fs--1 border-2 rounded-pill" href="#!">
                                <span class="me-2" role="img" aria-label="Gift">🎁</span>Become a pro</a>
                                <h1 class="text-white fw-light">Bring <span class="typed-text fw-bold" data-typed-text='["design","beauty","elegance","perfection"]'>

                                </span>
                                <br />to your webapp</h1>
                                <p class="lead text-white opacity-75">With the power of Falcon, you can now focus only on functionaries for your digital products, while leaving the UI design on us!</p>
                                <a class="btn btn-outline-light border-2 rounded-pill btn-lg mt-4 fs-0 py-2" href="{{ route('register') }}">Start building with the falcon<span class="fas fa-play ms-2" data-fa-transform="shrink-6 down-1">

                                </span>
                            </a>
                        </div>
                        <div class="col-xl-7 offset-xl-1 align-self-end mt-4 mt-xl-0">
                            <a class="img-landing-banner rounded" href="{{ route('welcome') }}">
                                <img class="img-fluid" src="{{ asset('assets/img/generic/dashboard-alt.jpg') }}" alt="" />
                            </a>
                        </div>
                    </div>
                </div>
            </section>

            <section class="py-3 bg-light shadow-sm">
                <div class="container">
                    <div class="row flex-center">
                        <div class="col-3 col-sm-auto my-1 my-sm-3 px-card">
                            <img class="landing-cta-img" height="40" src="{{ asset('assets/img/logos/b&w/6.png') }}" alt="" />
                        </div>
                        <div class="col-3 col-sm-auto my-1 my-sm-3 px-card">
                            <img class="landing-cta-img" height="45" src="{{ asset('assets/img/logos/b&w/11.png') }}" alt="" />
                        </div>
                        <div class="col-3 col-sm-auto my-1 my-sm-3 px-card">
                            <img class="landing-cta-img" height="30" src="{{ asset('assets/img/logos/b&w/2.png') }}" alt="" />
                        </div>
                        <div class="col-3 col-sm-auto my-1 my-sm-3 px-card">
                            <img class="landing-cta-img" height="30" src="{{ asset('assets/img/logos/b&w/4.png') }}" alt="" />
                        </div>
                        <div class="col-3 col-sm-auto my-1 my-sm-3 px-card">
                            <img class="landing-cta-img" height="35" src="{{ asset('assets/img/logos/b&w/1.png') }}" alt="" />
                        </div>
                        <div class="col-3 col-sm-auto my-1 my-sm-3 px-card">
                            <img class="landing-cta-img" height="40" src="{{ asset('assets/img/logos/b&w/10.png') }}" alt="" />
                        </div>
                        <div class="col-3 col-sm-auto my-1 my-sm-3 px-card">
                            <img class="landing-cta-img" height="40" src="{{ asset('assets/img/logos/b&w/12.png') }}" alt="" />
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <div class="container">
                    <div class="row justify-content-center text-center">
                        <div class="col-lg-8 col-xl-7 col-xxl-6">
                            <h1 class="fs-2 fs-sm-4 fs-md-5">WebApp theme of the future</h1>
                            <p class="lead">Built on top of Bootstrap 5, super modular Falcon provides you gorgeous design &amp; streamlined UX for your WebApp.</p>
                        </div>
                    </div>
                    <div class="row flex-center mt-8">
                        <div class="col-md col-lg-5 col-xl-4 ps-lg-6">
                            <img class="img-fluid px-6 px-md-0" src="{{  asset('assets/img/icons/spot-illustrations/50.png') }}" alt="" />
                        </div>
                        <div class="col-md col-lg-5 col-xl-4 mt-4 mt-md-0">
                            <h5 class="text-danger">
                                <span class="far fa-lightbulb me-2"></span>
                                PLAN
                            </h5>
                            <h3>Blueprint &amp; design </h3>
                            <p>With Falcon as your guide, now you have a fine-tuned state of the earth tool to make your wireframe a reality.</p>
                        </div>
                    </div>
                    <div class="row flex-center mt-7">
                        <div class="col-md col-lg-5 col-xl-4 pe-lg-6 order-md-2">
                            <img class="img-fluid px-6 px-md-0" src="{{ asset('assets/img/icons/spot-illustrations/49.png') }}" alt="" />
                        </div>
                        <div class="col-md col-lg-5 col-xl-4 mt-4 mt-md-0">
                            <h5 class="text-info">
                                <span class="far fa-object-ungroup me-2"></span>
                                BUILD
                            </h5>
                            <h3>38 Sets of components</h3>
                            <p>Build any UI effortlessly with Falcon's robust set of layouts, 38 sets of built-in elements, carefully chosen colors, typography, and css helpers.</p>
                        </div>
                    </div>
                    <div class="row flex-center mt-7">
                        <div class="col-md col-lg-5 col-xl-4 ps-lg-6">
                            <img class="img-fluid px-6 px-md-0" src="{{ asset('assets/img/icons/spot-illustrations/48.png') }}" alt="" />
                        </div>
                        <div class="col-md col-lg-5 col-xl-4 mt-4 mt-md-0">
                            <h5 class="text-success">
                                <span class="far fa-paper-plane me-2"></span>
                                DEPLOY
                            </h5>
                            <h3>Review and test</h3>
                            <p>From IE to iOS, rigorously tested and optimized Falcon will give the near perfect finishing to your webapp; from the landing page to the logout screen.</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="bg-light text-center">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <h1 class="fs-2 fs-sm-4 fs-md-5">Here's what's in it for you</h1>
                            <p class="lead">Things you will get right out of the box with Falcon.</p>
                        </div>
                    </div>
                    <div class="row mt-6">
                        <div class="col-lg-4">
                            <div class="card card-span h-100">
                                <div class="card-span-img">
                                    <span class="fab fa-sass fs-4 text-info"></span>
                                </div>
                                <div class="card-body pt-6 pb-4">
                                    <h5 class="mb-2">Bootstrap 5.x</h5>
                                    <p>Build your webapp with the world's most popular front-end component library along with Falcon's 32 sets of carefully designed elements.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-6 mt-lg-0">
                            <div class="card card-span h-100">
                                <div class="card-span-img">
                                    <span class="fab fa-node-js fs-5 text-success"></span>
                                </div>
                                <div class="card-body pt-6 pb-4">
                                    <h5 class="mb-2">SCSS &amp; Javascript files</h5>
                                    <p>With your purchased copy of Falcon, you will get all the uncompressed & documented SCSS and Javascript source code files.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-6 mt-lg-0">
                            <div class="card card-span h-100">
                                <div class="card-span-img">
                                    <span class="fab fa-gulp fs-6 text-danger"></span>
                                </div>
                                <div class="card-body pt-6 pb-4">
                                    <h5 class="mb-2">Gulp based workflow</h5>
                                    <p>All the painful or time-consuming tasks in your development workflow such as compiling the SCSS or transpiring the JS are automated.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="bg-200 text-center">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-9 col-xl-8">
                            <div class="swiper-container theme-slider" data-swiper='{"autoplay":true,"spaceBetween":5,"loop":true,"loopedSlides":5,"slideToClickedSlide":true}'>
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="px-5 px-sm-6">
                                            <p class="fs-sm-1 fs-md-2 fst-italic text-dark">Falcon is the best option if you are looking for a theme built with Bootstrap. On top of that, Falcon&apos;s creators and support staff are very brilliant and attentive to users&apos; needs.</p>
                                            <p class="fs-0 text-600">- Scott Tolinski, Web Developer</p>
                                            <img class="w-auto mx-auto" src="{{ asset('assets/img/logos/google.png') }}" alt="" height="45" />
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="px-5 px-sm-6">
                                            <p class="fs-sm-1 fs-md-2 fst-italic text-dark">We&apos;ve become fanboys! Easy to change the modular design, great dashboard UI, enterprise-class support, fast loading time. What else do you want from a Bootstrap Theme?</p>
                                            <p class="fs-0 text-600">- Jeff Escalante, Developer</p>
                                            <img class="w-auto mx-auto" src="{{ asset('assets/img/logos/netflix.png') }}" alt="" height="30" />
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="px-5 px-sm-6">
                                            <p class="fs-sm-1 fs-md-2 fst-italic text-dark">When I first saw Falcon, I was totally blown away by the care taken in the interface. It felt like something that I&apos;d really want to use and something I could see being a true modern replacement to the current class of Bootstrap themes.</p>
                                            <p class="fs-0 text-600">- Liam Martens, Designer</p>
                                            <img class="w-auto mx-auto" src="{{ asset('assets/img/logos/paypal.png') }}" alt="" height="45" />
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-nav">
                                    <div class="swiper-button-next swiper-button-white">

                                    </div>
                                    <div class="swiper-button-prev swiper-button-white"> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="light">
                <div class="bg-holder overlay" style="background-image:url(assets/img/generic/bg-2.jpg);background-position: center top;">

                </div>
                <div class="container">
                    <div class="row justify-content-center text-center">
                        <div class="col-lg-8">
                            <p class="fs-3 fs-sm-4 text-white">Join our community of 20,000+ developers and content creators on their mission to build better sites and apps.</p>
                            <button class="btn btn-outline-light border-2 rounded-pill btn-lg mt-4 fs-0 py-2" type="button">Start your webapp</button>
                        </div>
                    </div>
                </div>
            </section>

            <section class="bg-dark pt-8 pb-4 light">
                <div class="container">
                    <div class="position-absolute btn-back-to-top bg-dark">
                        <a class="text-600" data-bs-offset-top="0" data-scroll-to="#banner">
                            <span class="fas fa-chevron-up" data-fa-transform="rotate-45">

                            </span>
                        </a>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <h5 class="text-uppercase text-white opacity-85 mb-3">Our Mission</h5>
                            <p class="text-600">Falcon enables front end developers to build custom streamlined user interfaces in a matter of hours, while it gives backend developers all the UI elements they need to develop their web app.And it's rich design can be easily integrated with backends whether your app is based on ruby on rails, laravel, express or any other server side system.</p>
                            <div class="icon-group mt-4">
                                <a class="icon-item bg-white text-facebook" href="#!">
                                    <span class="fab fa-facebook-f">

                                    </span>
                                </a>
                                <a class="icon-item bg-white text-twitter" href="#!">
                                    <span class="fab fa-twitter">

                                    </span>
                                </a>
                                <a class="icon-item bg-white text-google-plus" href="#!">
                                    <span class="fab fa-google-plus-g">

                                    </span>
                                </a>
                                <a class="icon-item bg-white text-linkedin" href="#!">
                                    <span class="fab fa-linkedin-in">

                                    </span>
                                </a>
                                <a class="icon-item bg-white" href="#!">
                                    <span class="fab fa-medium-m">

                                    </span>
                                </a>
                            </div>
                        </div>
                        <div class="col ps-lg-6 ps-xl-8">
                            <div class="row mt-5 mt-lg-0">
                                <div class="col-6 col-md-3">
                                    <h5 class="text-uppercase text-white opacity-85 mb-3">Company</h5>
                                    <ul class="list-unstyled">
                                        <li class="mb-1">
                                            <a class="link-600" href="#!">About</a>
                                        </li>
                                        <li class="mb-1">
                                            <a class="link-600" href="#!">Contact</a>
                                        </li>
                                        <li class="mb-1">
                                            <a class="link-600" href="#!">Careers</a>
                                        </li>
                                        <li class="mb-1">
                                            <a class="link-600" href="#!">Blog</a>
                                        </li>
                                        <li class="mb-1">
                                            <a class="link-600" href="#!">Terms</a>
                                        </li>
                                        <li class="mb-1">
                                            <a class="link-600" href="#!">Privacy</a>
                                        </li>
                                        <li>
                                            <a class="link-600" href="#!">Imprint</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-6 col-md-3">
                                    <h5 class="text-uppercase text-white opacity-85 mb-3">Product</h5>
                                    <ul class="list-unstyled">
                                        <li class="mb-1">
                                            <a class="link-600" href="#!">Features</a>
                                        </li>
                                        <li class="mb-1">
                                            <a class="link-600" href="#!">Roadmap</a>
                                        </li>
                                        <li class="mb-1">
                                            <a class="link-600" href="#!">Changelog</a>
                                        </li>
                                        <li class="mb-1">
                                            <a class="link-600" href="#!">Pricing</a>
                                        </li>
                                        <li class="mb-1">
                                            <a class="link-600" href="#!">Docs</a>
                                        </li>
                                        <li class="mb-1">
                                            <a class="link-600" href="#!">System Status</a>
                                        </li>
                                        <li class="mb-1">
                                            <a class="link-600" href="#!">Agencies</a>
                                        </li>
                                        <li class="mb-1">
                                            <a class="link-600" href="#!">Enterprise</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col mt-5 mt-md-0">
                                    <h5 class="text-uppercase text-white opacity-85 mb-3">From the Blog</h5>
                                    <ul class="list-unstyled">
                                        <li>
                                            <h5 class="fs-0 mb-0">
                                                <a class="link-600" href="#!"> Interactive graphs and charts</a>
                                            </h5>
                                            <p class="text-600 opacity-50">Jan 15 &bull; 8min read </p>
                                        </li>
                                        <li>
                                            <h5 class="fs-0 mb-0">
                                                <a class="link-600" href="#!"> Lifetime free updates</a>
                                            </h5>
                                            <p class="text-600 opacity-50">Jan 5 &bull; 3min read &starf;</p>
                                        </li>
                                        <li>
                                            <h5 class="fs-0 mb-0">
                                                <a class="link-600" href="#!"> Merry Christmas From us</a>
                                            </h5>
                                            <p class="text-600 opacity-50">Dec 25 &bull; 2min read</p>
                                        </li>
                                        <li>
                                            <h5 class="fs-0 mb-0">
                                                <a class="link-600" href="#!"> The New Falcon Theme</a>
                                            </h5>
                                            <p class="text-600 opacity-50">Dec 23 &bull; 10min read </p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section class="py-0 bg-dark light">
                <div>
                    <hr class="my-0 text-600 opacity-25" />
                    <div class="container py-3">
                        <div class="row justify-content-between fs--1">
                            <div class="col-12 col-sm-auto text-center">
                                <p class="mb-0 text-600 opacity-85">Thank you for creating with Falcon <span class="d-none d-sm-inline-block">| </span>
                                    <br class="d-sm-none" /> 2021 &copy; <a class="text-white opacity-85" href="https://themewagon.com">Themewagon</a>
                                </p>
                            </div>
                            <div class="col-12 col-sm-auto text-center">
                                <p class="mb-0 text-600 opacity-85">v3.4.0</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <!-- ===============================================-->
        <!--    End of Main Content-->
        <!-- ===============================================-->

        @include('partials._settings-panel')

    </body>
</html>
