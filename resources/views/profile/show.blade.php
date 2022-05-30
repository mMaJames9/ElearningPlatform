<x-app-layout>
    @section('navbar-info')
    <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
        <h1 class="welcome-text mb-0">{{ __('Profile') }}</h1>
    </li>
    @endsection

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                    <ul class="nav nav-tabs nav-tabs-vertical-custom" role="tablist">

                                        @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                                        <li class="nav-item">
                                            <a class="nav-link active" id="profile-tab-custom" data-bs-toggle="tab" href="#profile-3" role="tab" aria-controls="profile-3" aria-selected="true">
                                                <p class="h4">{{ __('Profile Information') }}</p>
                                                <p class="card-description text-white">
                                                    {{ __('Update your account\'s profile information and email address.') }}
                                                </p>
                                            </a>
                                        </li>
                                        @endif

                                        @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                                        <li class="nav-item">
                                            <a class="nav-link" id="password-tab-custom" data-bs-toggle="tab" href="#password-3" role="tab" aria-controls="password-3" aria-selected="false">
                                                <p class="h4">{{ __('Update Password') }}</p>
                                                <p class="card-description text-white">
                                                    {{ __('Ensure your account is using a long, random password to stay secure.') }}
                                                </p>
                                            </a>
                                        </li>
                                        @endif

                                        @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                                        <li class="nav-item">
                                            <a class="nav-link" id="auth-tab-custom" data-bs-toggle="tab" href="#auth-3" role="tab" aria-controls="auth-3" aria-selected="false">
                                                <p class="h4">{{ __('Two Factor Authentication') }}</p>
                                                <p class="card-description text-white">
                                                    {{ __('Add additional security to your account using two factor authentication.') }}
                                                </p>
                                            </a>
                                        </li>
                                        @endif

                                        <li class="nav-item">
                                            <a class="nav-link" id="session-tab-custom" data-bs-toggle="tab" href="#session-3" role="tab" aria-controls="session-3" aria-selected="false">
                                                <p class="h4">{{ __('Browser Sessions') }}</p>
                                                <p class="card-description text-white">
                                                    {{ __('Manage and log out your active sessions on other browsers and devices.') }}
                                                </p>
                                            </a>
                                        </li>

                                        @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                                        <li class="nav-item">
                                            <a class="nav-link" id="account-tab-custom" data-bs-toggle="tab" href="#account-3" role="tab" aria-controls="account-3" aria-selected="false">
                                                <p class="h4">{{ __('Delete Account') }}</p>
                                                <p class="card-description text-white">
                                                    {{ __('Permanently delete your account.') }}
                                                </p>
                                            </a>
                                        </li>
                                        @endif

                                    </ul>
                                </div>


                                <div class="col-9">
                                    <div class="tab-content tab-content-vertical tab-content-vertical-custom">

                                        @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                                        <div class="tab-pane fade show active" id="profile-3" role="tabpanel" aria-labelledby="profile-tab-custom">
                                            @livewire('profile.update-profile-information-form')
                                        </div>
                                        @endif

                                        @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                                        <div class="tab-pane fade" id="password-3" role="tabpanel" aria-labelledby="password-tab-custom">
                                            @livewire('profile.update-password-form')
                                        </div>
                                        @endif

                                        @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                                        <div class="tab-pane fade" id="auth-3" role="tabpanel" aria-labelledby="auth-tab-custom">
                                            @livewire('profile.two-factor-authentication-form')
                                        </div>
                                        @endif

                                        <div class="tab-pane fade" id="session-3" role="tabpanel" aria-labelledby="session-tab-custom">
                                            @livewire('profile.logout-other-browser-sessions-form')
                                        </div>

                                        @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                                        <div class="tab-pane fade" id="account-3" role="tabpanel" aria-labelledby="account-tab-custom">
                                            @livewire('profile.delete-user-form')
                                        </div>
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
</x-app-layout>

