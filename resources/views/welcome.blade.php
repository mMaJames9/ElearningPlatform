<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <!-- Required meta tags -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="{{__('The examsuccess.com web application is a digital library that allows students in general and technical secondary education in exam classes to better prepare for their exam by benefiting from a range of exam-type tests with their various answers. .') }}">
        <meta name="author" content="237 Exam Succes">
        <meta name="keywords" content="examsuces.com, 237, 237 Exam Succes">
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
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('vendors/swiper/swiper-bundle.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/overlayscrollbars/OverlayScrollbars.min.css') }}">

        <link rel="stylesheet" href="{{ asset('assets/css/theme.min.css') }}" id="style-default">


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

    </head>

    <body>
        <!-- ===============================================-->
        <!--    Main Content-->
        <!-- ===============================================-->
        <main class="main" id="top">
            <nav class="navbar navbar-standard navbar-expand-lg fixed-top navbar-dark py-3" data-navbar-darken-on-scroll="data-navbar-darken-on-scroll">
                <div class="container">
                    <a class="navbar-brand" href="{{ route('welcome') }}">
                        <span class="text-white dark__text-white">
                            <img class="my-2" src="{{ asset('assets/img/icons/spot-illustrations/exam-succes-white.png') }}" alt="logo" width="180" />
                        </span>
                    </a>
                    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarStandard" aria-controls="navbarStandard" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="fas fa-bars text-white"></span>
                    </button>

                    <div class="collapse navbar-collapse scrollbar" id="navbarStandard">
                        <ul class="navbar-nav ms-auto">

                        </ul>
                        <div class="my-3 d-flex justify-content-end">
                            <div class="me-2">
                                <a class="nav-link dropdown-toggle text-light fs-0" id="navbarDropdownLogin" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{__('Login')}}</a>
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
                                                            <span class="form-check-label mb-0" for="remember_me">
                                                                {{ __('Remember me') }}
                                                            </span>
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
                            </div>
                            <a class="btn btn-outline-light rounded-pill" href="#!" data-bs-toggle="modal" data-bs-target="#registerModal">{{__('Register')}}</a>
                        </div>
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
                                <div class="mb-5 col-sm">
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

                                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="terms" type="checkbox" name="terms">
                                    <label class="form-check-label" for="terms">
                                        {{__('I accept the')}}
                                        <a target="_blank" target="_blank" href="'.route('terms.show').'">{{__('Terms of Service')}}</a>
                                        {{__('and')}}
                                        <a target="_blank" href="'.route('policy.show').'">{{__('Privacy Policy')}} </a>
                                    </label>
                                </div>
                                @endif

                                <div class="mb-3">
                                    <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">{{__('Register')}}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <section class="py-0 overflow-hidden light" id="banner">
                <div class="bg-holder bg-no-repeat bg-center bg-cover mh-100 mw-100" style="background-image:url(assets/img/generic/bg-1.jpg)">

                </div>
                <!--/.bg-holder-->
                <div class="container">
                    <div class="row flex-center pt-8 pt-lg-10 pb-lg-9 pb-xl-0">
                        <div class="col-md-11 col-lg-8 col-xl-4 pb-7 pb-xl-9 text-center text-xl-start">
                            <h1 class="text-light fw-light">
                                <span class="typed-text fw-bold" data-typed-text='["General","Technical"]'></span>
                                <span>{{__('Education')}}.</span>
                                <br />
                                {{__('Preparation for the official exams')}}.
                            </h1>
                            <p class="lead text-light opacity-75">{{__('Subscribe and discover all the documentation you need to pass your exam')}}!</p>
                            <a class="btn btn-outline-light border-2 rounded-pill btn-lg mt-4 fs-0 py-2" href="{{ route('register') }}">
                                {{__('Join us now')}} !
                                <span class="fas fa-play ms-2" data-fa-transform="shrink-6 down-1"></span>
                            </a>
                        </div>
                        <div class="col-xl-7 offset-xl-1 align-self-end mt-4 mt-xl-0">
                            <div class="img-landing-banner">
                                <img class="img-fluid" src="{{ asset('assets/img/generic/learning-concept.png') }}" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="py-3 bg-light shadow-sm text-center">
                <div class="container">
                    <div class="row my-6">
                        <div class="col-lg-4">
                            <div class="card card-span h-100">
                                <div class="card-span-img">
                                    <span class="fa-solid fa-file-circle-question fs-4 text-info"></span>
                                </div>
                                <div class="card-body pt-6 pb-4">
                                    <h5 class="mb-2">{{__('Exam-typed Papers')}}</h5>
                                    <p>{{__('In this section you have a multitude of tests with answers from major schools in Cameroon. This is in order to multiply the efforts by becoming familiar with various forms of test and a timing that may be different from your own establishment.')}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-6 mt-lg-0">
                            <div class="card card-span h-100">
                                <div class="card-span-img">
                                    <span class="fas fa-file-lines fs-4 text-success"></span>
                                </div>
                                <div class="card-body pt-6 pb-4">
                                    <h5 class="mb-2">{{__('Past Exam Questions')}}</h5>
                                    <p>{{__('This section is an encyclopedia of old exam subjects with as many answers as possible for a better understanding of the student.')}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-6 mt-lg-0">
                            <div class="card card-span h-100">
                                <div class="card-span-img">
                                    <span class="fas fa-book fs-4 text-danger"></span>
                                </div>
                                <div class="card-body pt-6 pb-4">
                                    <h5 class="mb-2">{{__('Books')}}</h5>
                                    <p>{{__('The book section is notably made up of a wide range of documents which summarize in a way the methods and rules learned in class, but it also holds complete books of different subjects. This makes it more removable and less tedious for a student who wants to revise while traveling.')}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="light">
                <div class="bg-holder bg-no-repeat bg-center bg-cover mh-100 mw-100" style="background-image:url(assets/img/generic/bg-2.jpg)">

                </div>
                <div class="container">
                    <div class="row justify-content-start text-left">
                        <div class="col-9 col-md-8">
                            <p class="fs-3 fs--1 text-white">{{__('237 Exam Succes, Un pas vers mon diplôme')}} !</p>
                            <a class="btn btn-outline-light border-2 rounded-pill fs--1 py-2" type="button" ref="#!" data-bs-toggle="modal" data-bs-target="#registerModal">{{__('Discover')}}</a>
                        </div>
                    </div>
                </div>
            </section>

            <section class="bg-dark pt-8 pb-4 dark">
                <div class="container">
                    <div class="position-absolute btn-back-to-top bg-dark">
                        <a class="text-600" data-bs-offset-top="0" data-scroll-to="#banner">
                            <span class="fas fa-chevron-up" data-fa-transform="rotate-45">

                            </span>
                        </a>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <h5 class="text-uppercase text-white opacity-85 mb-3">{{__('About Us')}}</h5>
                            <p class="text-600">{{__('The 237 Exam Succes web application is a digital library that allows students in general and technical secondary education in exam classes to better prepare their exam by benefitting, after an annual subscription, from a great range of exam-typed papers proposed by all major schools in Cameroon and also from the past exam questions with the different answers.')}}</p>
                            <p class="text-600">{{__('But 237 Exam Succes does not stop there, because it gives subscribers the opportunity to freshen their memories in the book section regarding the different rules and theorems learned in class as revision.')}}</p>
                        </div>

                        <div class="col-lg-6">
                            <h5 class="text-uppercase text-white opacity-85 mb-3">{{__('Our Mission')}}</h5>
                            <p class="text-600">{{__('Il est évident que tout succès, aussi petit soit-il, est le fruit d\'une dose de volonté et d\'efforts consentis. Parfois et malheureusement, ces deux éléments ne sont pas assez. Mon équipe et moi avons travaillé de manière acharnée afin de mettre sur pieds cette application efficace et digeste. C\'est une bibliothèque numérique dans laquelle vous trouverez le nécessaire pour la réussite de votre examen.')}}</p>
                            <p class="text-600">{{__('Quel que soit l\'examen et surtout les matières que vous aurez, vous avez certainement fait le bon choix en souscrivant à ce projet.')}}</p>
                            <p class="text-600">{{__('Nous nous engageons à actualiser le contenu de cette bibliothèque afin de la rendre optimale dans vos recherches. Nous avons la ferme conviction que cette application vous aidera avant et pendant la préparation à votre examen officiel.')}}</p>
                        </div>

                        <div class="icon-group mt-4">
                            <a class="icon-item bg-dark text-facebook" target="_blank" href="#!">
                                <span class="fab fa-facebook-f"></span>
                            </a>
                            <a class="icon-item bg-dark text-twitter" target="_blank" href="#!">
                                <span class="fab fa-twitter"></span>
                            </a>
                            <a class="icon-item bg-dark text-linkedin" href="https://www.instagram.com/invites/contact/?i=9jndawrxvdl7&utm_content=p808kg9">
                                <span class="fab fa-instagram"></span>
                            </a>
                        </div>

                    </div>
                </div>
            </section>


            <section class="py-0 bg-dark dark">
                <div>
                    <hr class="my-0 text-600 opacity-25" />
                    <div class="container py-3">
                        <div class="row justify-content-between fs--1">
                            <div class="col-12 col-sm-auto text-center">
                                <p class="mb-0 text-600 opacity-85"><span class="d-none d-sm-inline-block">| </span>
                                    <br class="d-sm-none" /> 2022 &copy; <a href="https://examsucces.com">237 Exam Succes</a>
                                </p>
                                </p>
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
