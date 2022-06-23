<x-app-layout>

    <div class="row">
        {{-- Profile Photos --}}
        @if (Laravel\Fortify\Features::canUpdateProfileInformation())
        @livewire('profile.update-profile-information-form')
        @endif

        {{-- Password --}}
        <div class="col-md-8 col-xl-4 middle-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                        @livewire('profile.update-password-form')
                    @endif
                </div>
            </div>
        </div>


        <div class="col-xl-4">
            <div class="row">
                {{-- Two Factor --}}
                <div class="col-md-12">
                    @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                        @livewire('profile.two-factor-authentication-form')
                    @endif
                </div>

                {{-- Brower Sessions --}}
                <div class="col-md-12">
                    @livewire('profile.logout-other-browser-sessions-form')
                </div>
            </div>
        </div>

        {{-- Delete User --}}
        <div class="col-md-8 col-xl-4 middle-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                        @livewire('profile.delete-user-form')
                    @endif
                </div>
            </div>
        </div>

    </div>

</x-app-layout>


