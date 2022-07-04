<x-jet-action-section>
    <x-slot name="content">
        <div class="card mb-3">
            <div class="card-header">
                <h5 class="mb-0">{{__('Browser Sessions')}}</h5>
            </div>
            <div class="card-body bg-light">

                <p class="fs--1 mt-2 mb-5">{{ __('If necessary, you may log out of all of your other browser sessions across all of your devices. Some of your recent sessions are listed below; however, this list may not be exhaustive. If you feel your account has been compromised, you should also update your password.') }}</p>

                @if (count($this->sessions) > 0)
                    @foreach ($this->sessions as $session)
                    <div class="d-flex">

                        @if ($session->agent->isDesktop())
                        <a>
                            <span class="fas fa-desktop fa-lg" width="56"></span>
                        </a>
                        @else
                        <a>
                            <span class="fas fa-mobile-alt fa-lg" width="56"></span>
                        </a>
                        @endif

                        <div class="flex-1 position-relative ps-3">
                            <h6 class="fs-0 mb-0">{{ $session->agent->platform() ? $session->agent->platform() : 'Unknown' }} - {{ $session->agent->browser() ? $session->agent->browser() : 'Unknown' }}
                            </h6>
                            <p class="mb-1">
                                <span class="fs--1 fw-medium">{{ $session->ip_address }},
                                    @if ($session->is_current_device)
                                    <span class="text-success fs--1 fw-bold">{{ __('This device') }}</span>
                                    @else
                                    <span class="fs--1 fw-bold">{{ __('Last active') }} {{ $session->last_active }}</span>
                                    @endif
                                </span>
                            </p>
                        </div>
                    </div>
                    @endforeach
                @endif

                <div class="d-flex align-items-center mt-5">
                    <a class="btn btn-primary me-2" wire:click="confirmLogout" wire:loading.attr="disabled" data-bs-toggle="modal" data-bs-target="#confirmingLogout">{{ __('Log Out Other Browser Sessions') }}</a>

                    <x-jet-action-message class="text-success fs--1 fw-bold" on="loggedOut">
                        {{ __('Done.') }}
                    </x-jet-action-message>
                </div>

                <x-jet-dialog-modal wire:model="confirmingLogout">

                    <x-slot name="title">{{ __('Log Out Other Browser Sessions') }}</x-slot>

                    <x-slot name="content">
                        <p class="text-word-break fs--1">
                            {{ __('If necessary, you may log out of all of your other browser sessions across all of your devices. Some of your recent sessions are listed below; however, this list may not be exhaustive. If you feel your account has been compromised, you should also update your password.') }}
                        </p>
                        <div class="mb-3" x-data="{}" x-on:confirming-logout-other-browser-sessions.window="setTimeout(() => $refs.password.focus(), 250)">
                            <input class="form-control"  type="password" placeholder="{{ __('Password') }}" x-ref="password" wire:model.defer="password" wire:keydown.enter="logoutOtherBrowserSessions" />
                            <x-jet-input-error for="password" class="mt-2" />
                        </div>
                    </x-slot>

                    <x-slot name="footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal" wire:click="$toggle('confirmingLogout')" wire:loading.attr="disabled">{{ __('Cancel') }}</button>
                        <button class="btn btn-primary" type="button" wire:click="logoutOtherBrowserSessions" wire:loading.attr="disabled">{{ __('Log Out Other Browser Sessions') }} </button>
                    </x-slot>

                </x-jet-dialog-modal>

            </div>
        </div>

    </x-slot>
</x-jet-action-section>
