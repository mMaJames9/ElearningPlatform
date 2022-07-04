<x-jet-action-section>
    <x-slot name="content">
        <div class="card mb-3">
            <div class="card-header">
                <h5 class="mb-0">{{__('Two Factor Authentification')}}</h5>
            </div>
            <div class="card-body bg-light" name="content">
                <h5 class="fs-0">
                @if ($this->enabled)
                    @if ($showingConfirmation)
                    {{ __('Finish enabling two factor authentication.') }}
                    @else
                    {{ __('You have enabled two factor authentication.') }}
                    @endif
                @else
                {{ __('You have not enabled two factor authentication.') }}
                @endif
                </h5>

                <p class="fs--1">{{ __('When two factor authentication is enabled, you will be prompted for a secure, random token during authentication. You may retrieve this token from your phone\'s Google Authenticator application.') }}</p>

                @if ($this->enabled)
                    @if ($showingQrCode)
                    <p class="fs--1 fw-medium">
                        @if ($showingConfirmation)
                            {{ __('To finish enabling two factor authentication, scan the following QR code using your phone\'s authenticator application or enter the setup key and provide the generated OTP code.') }}
                        @else
                            {{ __('Two factor authentication is now enabled. Scan the following QR code using your phone\'s authenticator application or enter the setup key.') }}
                        @endif
                    </p>

                    <div class="mt-4">
                        {!! $this->user->twoFactorQrCodeSvg() !!}
                    </div>

                    <p class="fs--1 fw-medium">
                        {{ __('Setup Key') }}: {{ decrypt($this->user->two_factor_secret) }}
                    </p>

                    @if ($showingConfirmation)
                    <div class="mt-4">
                        <x-jet-label for="code" value="{{ __('Code') }}" />

                        <x-jet-input id="code" type="text" name="code" class="block mt-1 w-1/2" inputmode="numeric" autofocus autocomplete="one-time-code"
                            wire:model.defer="code"
                            wire:keydown.enter="confirmTwoFactorAuthentication" />

                        <x-jet-input-error for="code" class="mt-2" />
                    </div>
                    @endif
                @endif

                    @if ($showingRecoveryCodes)
                    <p class="fs--1 fw-medium">
                        {{ __('Store these recovery codes in a secure password manager. They can be used to recover access to your account if your two factor authentication device is lost.') }}
                    </p>

                    <div class="grid gap-1 max-w-xl mt-4 px-4 py-4 font-mono text-sm bg-gray-100 rounded-lg">
                        @foreach (json_decode(decrypt($this->user->two_factor_recovery_codes), true) as $code)
                            <div>{{ $code }}</div>
                        @endforeach
                    </div>
                    @endif
                @endif

                @if (! $this->enabled)
                <x-jet-confirms-password wire:then="enableTwoFactorAuthentication">
                    <a class="btn btn-falcon-primary d-block w-100 mt-5" wire:loading.attr="disabled"  data-bs-toggle="modal" data-bs-target="#confirmingPassword">
                        {{ __('Enable') }}
                    </a>
                </x-jet-confirms-password>
                @else
                    @if ($showingRecoveryCodes)
                    <x-jet-confirms-password wire:then="regenerateRecoveryCodes">
                        <a class="btn btn-falcon-secondary d-block w-100 mt-5" wire:loading.attr="disabled" data-bs-toggle="modal" data-bs-target="#confirmingPassword">
                            {{ __('Regenerate Recovery Codes') }}
                        </a>
                    </x-jet-confirms-password>

                    @elseif ($showingConfirmation)
                    <x-jet-confirms-password wire:then="confirmTwoFactorAuthentication">
                        <a class="btn btn-falcon-secondary d-block w-100 mt-5" wire:loading.attr="disabled" data-bs-toggle="modal" data-bs-target="#confirmingPassword">
                            {{ __('Regenerate Recovery Codes') }}
                        </a>
                    </x-jet-confirms-password>

                    @else
                    <x-jet-confirms-password wire:then="showRecoveryCodes">
                        <a class="btn btn-falcon-secondary d-block w-100 mt-5" wire:loading.attr="disabled" data-bs-toggle="modal" data-bs-target="#confirmingPassword">
                            {{ __('Show Recovery Codes') }}
                        </a>
                    </x-jet-confirms-password>
                    @endif

                    @if ($showingConfirmation)
                    <x-jet-confirms-password wire:then="disableTwoFactorAuthentication">
                        <a class="btn btn-falcon-secondary d-block w-100 mt-5" wire:loading.attr="disabled" data-bs-toggle="modal" data-bs-target="#confirmingPassword">
                            {{ __('Cancel') }}
                        </a>
                    </x-jet-confirms-password>
                    @else
                    <x-jet-confirms-password wire:then="disableTwoFactorAuthentication">
                        <a class="btn btn-falcon-danger d-block w-100 mt-5" wire:loading.attr="disabled" data-bs-toggle="modal" data-bs-target="#confirmingPassword">
                            {{ __('Disable') }}
                        </a>
                    </x-jet-confirms-password>
                    @endif
                @endif
            </div>
        </div>
    </x-slot>
</x-jet-action-section>
